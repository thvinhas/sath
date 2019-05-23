<?php

namespace Tests\Feature;

use App\Curso;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageCursoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_curso_list_in_curso_index_page()
    {
        $curso = factory(Curso::class)->create();

        $this->loginAsUser();
        $this->visitRoute('cursos.index');
        $this->see($curso->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Curso 1 name',
            'description' => 'Curso 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_curso()
    {
        $this->loginAsUser();
        $this->visitRoute('cursos.index');

        $this->click(__('curso.create'));
        $this->seeRouteIs('cursos.create');

        $this->submitForm(__('curso.create'), $this->getCreateFields());

        $this->seeRouteIs('cursos.show', Curso::first());

        $this->seeInDatabase('cursos', $this->getCreateFields());
    }

    /** @test */
    public function validate_curso_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('cursos.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_curso_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('cursos.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_curso_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('cursos.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Curso 1 name',
            'description' => 'Curso 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_curso()
    {
        $this->loginAsUser();
        $curso = factory(Curso::class)->create(['name' => 'Testing 123']);

        $this->visitRoute('cursos.show', $curso);
        $this->click('edit-curso-'.$curso->id);
        $this->seeRouteIs('cursos.edit', $curso);

        $this->submitForm(__('curso.update'), $this->getEditFields());

        $this->seeRouteIs('cursos.show', $curso);

        $this->seeInDatabase('cursos', $this->getEditFields([
            'id' => $curso->id,
        ]));
    }

    /** @test */
    public function validate_curso_name_update_is_required()
    {
        $this->loginAsUser();
        $curso = factory(Curso::class)->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('cursos.update', $curso), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_curso_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $curso = factory(Curso::class)->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('cursos.update', $curso), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_curso_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $curso = factory(Curso::class)->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('cursos.update', $curso), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_curso()
    {
        $this->loginAsUser();
        $curso = factory(Curso::class)->create();
        factory(Curso::class)->create();

        $this->visitRoute('cursos.edit', $curso);
        $this->click('del-curso-'.$curso->id);
        $this->seeRouteIs('cursos.edit', [$curso, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('cursos', [
            'id' => $curso->id,
        ]);
    }
}
