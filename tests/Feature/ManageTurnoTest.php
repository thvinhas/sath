<?php

namespace Tests\Feature;

use App\Turno;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageTurnoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_turno_list_in_turno_index_page()
    {
        $turno = factory(Turno::class)->create();

        $this->loginAsUser();
        $this->visitRoute('turnos.index');
        $this->see($turno->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Turno 1 name',
            'description' => 'Turno 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_turno()
    {
        $this->loginAsUser();
        $this->visitRoute('turnos.index');

        $this->click(__('turno.create'));
        $this->seeRouteIs('turnos.create');

        $this->submitForm(__('turno.create'), $this->getCreateFields());

        $this->seeRouteIs('turnos.show', Turno::first());

        $this->seeInDatabase('turnos', $this->getCreateFields());
    }

    /** @test */
    public function validate_turno_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('turnos.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_turno_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('turnos.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_turno_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('turnos.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Turno 1 name',
            'description' => 'Turno 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_turno()
    {
        $this->loginAsUser();
        $turno = factory(Turno::class)->create(['name' => 'Testing 123']);

        $this->visitRoute('turnos.show', $turno);
        $this->click('edit-turno-'.$turno->id);
        $this->seeRouteIs('turnos.edit', $turno);

        $this->submitForm(__('turno.update'), $this->getEditFields());

        $this->seeRouteIs('turnos.show', $turno);

        $this->seeInDatabase('turnos', $this->getEditFields([
            'id' => $turno->id,
        ]));
    }

    /** @test */
    public function validate_turno_name_update_is_required()
    {
        $this->loginAsUser();
        $turno = factory(Turno::class)->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('turnos.update', $turno), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_turno_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $turno = factory(Turno::class)->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('turnos.update', $turno), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_turno_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $turno = factory(Turno::class)->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('turnos.update', $turno), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_turno()
    {
        $this->loginAsUser();
        $turno = factory(Turno::class)->create();
        factory(Turno::class)->create();

        $this->visitRoute('turnos.edit', $turno);
        $this->click('del-turno-'.$turno->id);
        $this->seeRouteIs('turnos.edit', [$turno, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('turnos', [
            'id' => $turno->id,
        ]);
    }
}
