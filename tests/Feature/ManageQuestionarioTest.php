<?php

namespace Tests\Feature;

use App\Questionario;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageQuestionarioTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_questionario_list_in_questionario_index_page()
    {
        $questionario = factory(Questionario::class)->create();

        $this->loginAsUser();
        $this->visitRoute('questionarios.index');
        $this->see($questionario->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Questionario 1 name',
            'description' => 'Questionario 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_questionario()
    {
        $this->loginAsUser();
        $this->visitRoute('questionarios.index');

        $this->click(__('questionario.create'));
        $this->seeRouteIs('questionarios.create');

        $this->submitForm(__('questionario.create'), $this->getCreateFields());

        $this->seeRouteIs('questionarios.show', Questionario::first());

        $this->seeInDatabase('questionarios', $this->getCreateFields());
    }

    /** @test */
    public function validate_questionario_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('questionarios.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_questionario_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('questionarios.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_questionario_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('questionarios.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Questionario 1 name',
            'description' => 'Questionario 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_questionario()
    {
        $this->loginAsUser();
        $questionario = factory(Questionario::class)->create(['name' => 'Testing 123']);

        $this->visitRoute('questionarios.show', $questionario);
        $this->click('edit-questionario-'.$questionario->id);
        $this->seeRouteIs('questionarios.edit', $questionario);

        $this->submitForm(__('questionario.update'), $this->getEditFields());

        $this->seeRouteIs('questionarios.show', $questionario);

        $this->seeInDatabase('questionarios', $this->getEditFields([
            'id' => $questionario->id,
        ]));
    }

    /** @test */
    public function validate_questionario_name_update_is_required()
    {
        $this->loginAsUser();
        $questionario = factory(Questionario::class)->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('questionarios.update', $questionario), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_questionario_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $questionario = factory(Questionario::class)->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('questionarios.update', $questionario), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_questionario_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $questionario = factory(Questionario::class)->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('questionarios.update', $questionario), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_questionario()
    {
        $this->loginAsUser();
        $questionario = factory(Questionario::class)->create();
        factory(Questionario::class)->create();

        $this->visitRoute('questionarios.edit', $questionario);
        $this->click('del-questionario-'.$questionario->id);
        $this->seeRouteIs('questionarios.edit', [$questionario, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('questionarios', [
            'id' => $questionario->id,
        ]);
    }
}
