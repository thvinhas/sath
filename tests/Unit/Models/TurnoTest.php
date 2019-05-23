<?php

namespace Tests\Unit\Models;

use App\User;
use App\Turno;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class TurnoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_turno_has_name_link_attribute()
    {
        $turno = factory(Turno::class)->create();

        $title = __('app.show_detail_title', [
            'name' => $turno->name, 'type' => __('turno.turno'),
        ]);
        $link = '<a href="'.route('turnos.show', $turno).'"';
        $link .= ' title="'.$title.'">';
        $link .= $turno->name;
        $link .= '</a>';

        $this->assertEquals($link, $turno->name_link);
    }

    /** @test */
    public function a_turno_has_belongs_to_creator_relation()
    {
        $turno = factory(Turno::class)->make();

        $this->assertInstanceOf(User::class, $turno->creator);
        $this->assertEquals($turno->creator_id, $turno->creator->id);
    }
}
