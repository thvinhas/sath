<?php

namespace Tests\Unit\Models;

use App\User;
use App\Perguntas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class PerguntasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_perguntas_has_name_link_attribute()
    {
        $perguntas = factory(Perguntas::class)->create();

        $title = __('app.show_detail_title', [
            'name' => $perguntas->name, 'type' => __('perguntas.perguntas'),
        ]);
        $link = '<a href="'.route('perguntas.show', $perguntas).'"';
        $link .= ' title="'.$title.'">';
        $link .= $perguntas->name;
        $link .= '</a>';

        $this->assertEquals($link, $perguntas->name_link);
    }

    /** @test */
    public function a_perguntas_has_belongs_to_creator_relation()
    {
        $perguntas = factory(Perguntas::class)->make();

        $this->assertInstanceOf(User::class, $perguntas->creator);
        $this->assertEquals($perguntas->creator_id, $perguntas->creator->id);
    }
}
