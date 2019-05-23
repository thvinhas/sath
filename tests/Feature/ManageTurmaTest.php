<?php

namespace Tests\Feature;

use App\Turma;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageTurmaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_turma_list_in_turma_index_page()
    {
        $turma = factory(Turma::class)->create();

        $this->loginAsUser();
        $this->visitRoute('turmas.index');
        $this->see($turma->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Turma 1 name',
            'description' => 'Turma 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_turma()
    {
        $this->loginAsUser();
        $this->visitRoute('turmas.index');

        $this->click(__('turma.create'));
        $this->seeRouteIs('turmas.create');

        $this->submitForm(__('turma.create'), $this->getCreateFields());

        $this->seeRouteIs('turmas.show', Turma::first());

        $this->seeInDatabase('turmas', $this->getCreateFields());
    }

    /** @test */
    public function validate_turma_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('turmas.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_turma_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('turmas.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_turma_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('turmas.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Turma 1 name',
            'description' => 'Turma 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_turma()
    {
        $this->loginAsUser();
        $turma = factory(Turma::class)->create(['name' => 'Testing 123']);

        $this->visitRoute('turmas.show', $turma);
        $this->click('edit-turma-'.$turma->id);
        $this->seeRouteIs('turmas.edit', $turma);

        $this->submitForm(__('turma.update'), $this->getEditFields());

        $this->seeRouteIs('turmas.show', $turma);

        $this->seeInDatabase('turmas', $this->getEditFields([
            'id' => $turma->id,
        ]));
    }

    /** @test */
    public function validate_turma_name_update_is_required()
    {
        $this->loginAsUser();
        $turma = factory(Turma::class)->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('turmas.update', $turma), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_turma_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $turma = factory(Turma::class)->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('turmas.update', $turma), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_turma_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $turma = factory(Turma::class)->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('turmas.update', $turma), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_turma()
    {
        $this->loginAsUser();
        $turma = factory(Turma::class)->create();
        factory(Turma::class)->create();

        $this->visitRoute('turmas.edit', $turma);
        $this->click('del-turma-'.$turma->id);
        $this->seeRouteIs('turmas.edit', [$turma, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('turmas', [
            'id' => $turma->id,
        ]);
    }
}
