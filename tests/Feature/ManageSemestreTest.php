<?php

namespace Tests\Feature;

use App\Semestre;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageSemestreTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_semestre_list_in_semestre_index_page()
    {
        $semestre = factory(Semestre::class)->create();

        $this->loginAsUser();
        $this->visitRoute('semestres.index');
        $this->see($semestre->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Semestre 1 name',
            'description' => 'Semestre 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_semestre()
    {
        $this->loginAsUser();
        $this->visitRoute('semestres.index');

        $this->click(__('semestre.create'));
        $this->seeRouteIs('semestres.create');

        $this->submitForm(__('semestre.create'), $this->getCreateFields());

        $this->seeRouteIs('semestres.show', Semestre::first());

        $this->seeInDatabase('semestres', $this->getCreateFields());
    }

    /** @test */
    public function validate_semestre_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('semestres.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_semestre_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('semestres.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_semestre_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('semestres.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Semestre 1 name',
            'description' => 'Semestre 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_semestre()
    {
        $this->loginAsUser();
        $semestre = factory(Semestre::class)->create(['name' => 'Testing 123']);

        $this->visitRoute('semestres.show', $semestre);
        $this->click('edit-semestre-'.$semestre->id);
        $this->seeRouteIs('semestres.edit', $semestre);

        $this->submitForm(__('semestre.update'), $this->getEditFields());

        $this->seeRouteIs('semestres.show', $semestre);

        $this->seeInDatabase('semestres', $this->getEditFields([
            'id' => $semestre->id,
        ]));
    }

    /** @test */
    public function validate_semestre_name_update_is_required()
    {
        $this->loginAsUser();
        $semestre = factory(Semestre::class)->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('semestres.update', $semestre), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_semestre_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $semestre = factory(Semestre::class)->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('semestres.update', $semestre), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_semestre_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $semestre = factory(Semestre::class)->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('semestres.update', $semestre), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_semestre()
    {
        $this->loginAsUser();
        $semestre = factory(Semestre::class)->create();
        factory(Semestre::class)->create();

        $this->visitRoute('semestres.edit', $semestre);
        $this->click('del-semestre-'.$semestre->id);
        $this->seeRouteIs('semestres.edit', [$semestre, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('semestres', [
            'id' => $semestre->id,
        ]);
    }
}
