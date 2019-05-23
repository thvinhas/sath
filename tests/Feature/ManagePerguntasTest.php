<?php

namespace Tests\Feature;

use App\Perguntas;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManagePerguntasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_perguntas_list_in_perguntas_index_page()
    {
        $perguntas = factory(Perguntas::class)->create();

        $this->loginAsUser();
        $this->visitRoute('perguntas.index');
        $this->see($perguntas->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Perguntas 1 name',
            'description' => 'Perguntas 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_perguntas()
    {
        $this->loginAsUser();
        $this->visitRoute('perguntas.index');

        $this->click(__('perguntas.create'));
        $this->seeRouteIs('perguntas.create');

        $this->submitForm(__('perguntas.create'), $this->getCreateFields());

        $this->seeRouteIs('perguntas.show', Perguntas::first());

        $this->seeInDatabase('perguntas', $this->getCreateFields());
    }

    /** @test */
    public function validate_perguntas_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('perguntas.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_perguntas_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('perguntas.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_perguntas_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('perguntas.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Perguntas 1 name',
            'description' => 'Perguntas 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_perguntas()
    {
        $this->loginAsUser();
        $perguntas = factory(Perguntas::class)->create(['name' => 'Testing 123']);

        $this->visitRoute('perguntas.show', $perguntas);
        $this->click('edit-perguntas-'.$perguntas->id);
        $this->seeRouteIs('perguntas.edit', $perguntas);

        $this->submitForm(__('perguntas.update'), $this->getEditFields());

        $this->seeRouteIs('perguntas.show', $perguntas);

        $this->seeInDatabase('perguntas', $this->getEditFields([
            'id' => $perguntas->id,
        ]));
    }

    /** @test */
    public function validate_perguntas_name_update_is_required()
    {
        $this->loginAsUser();
        $perguntas = factory(Perguntas::class)->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('perguntas.update', $perguntas), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_perguntas_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $perguntas = factory(Perguntas::class)->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('perguntas.update', $perguntas), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_perguntas_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $perguntas = factory(Perguntas::class)->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('perguntas.update', $perguntas), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_perguntas()
    {
        $this->loginAsUser();
        $perguntas = factory(Perguntas::class)->create();
        factory(Perguntas::class)->create();

        $this->visitRoute('perguntas.edit', $perguntas);
        $this->click('del-perguntas-'.$perguntas->id);
        $this->seeRouteIs('perguntas.edit', [$perguntas, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('perguntas', [
            'id' => $perguntas->id,
        ]);
    }
}
