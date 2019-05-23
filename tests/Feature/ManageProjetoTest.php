<?php

namespace Tests\Feature;

use App\Projeto;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageProjetoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_projeto_list_in_projeto_index_page()
    {
        $projeto = factory(Projeto::class)->create();

        $this->loginAsUser();
        $this->visitRoute('projetos.index');
        $this->see($projeto->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Projeto 1 name',
            'description' => 'Projeto 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_projeto()
    {
        $this->loginAsUser();
        $this->visitRoute('projetos.index');

        $this->click(__('projeto.create'));
        $this->seeRouteIs('projetos.create');

        $this->submitForm(__('projeto.create'), $this->getCreateFields());

        $this->seeRouteIs('projetos.show', Projeto::first());

        $this->seeInDatabase('projetos', $this->getCreateFields());
    }

    /** @test */
    public function validate_projeto_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('projetos.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_projeto_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('projetos.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_projeto_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('projetos.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Projeto 1 name',
            'description' => 'Projeto 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_projeto()
    {
        $this->loginAsUser();
        $projeto = factory(Projeto::class)->create(['name' => 'Testing 123']);

        $this->visitRoute('projetos.show', $projeto);
        $this->click('edit-projeto-'.$projeto->id);
        $this->seeRouteIs('projetos.edit', $projeto);

        $this->submitForm(__('projeto.update'), $this->getEditFields());

        $this->seeRouteIs('projetos.show', $projeto);

        $this->seeInDatabase('projetos', $this->getEditFields([
            'id' => $projeto->id,
        ]));
    }

    /** @test */
    public function validate_projeto_name_update_is_required()
    {
        $this->loginAsUser();
        $projeto = factory(Projeto::class)->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('projetos.update', $projeto), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_projeto_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $projeto = factory(Projeto::class)->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('projetos.update', $projeto), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_projeto_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $projeto = factory(Projeto::class)->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('projetos.update', $projeto), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_projeto()
    {
        $this->loginAsUser();
        $projeto = factory(Projeto::class)->create();
        factory(Projeto::class)->create();

        $this->visitRoute('projetos.edit', $projeto);
        $this->click('del-projeto-'.$projeto->id);
        $this->seeRouteIs('projetos.edit', [$projeto, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('projetos', [
            'id' => $projeto->id,
        ]);
    }
}
