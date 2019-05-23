<?php

namespace Tests\Unit\Models;

use App\User;
use App\Curso;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class CursoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_curso_has_name_link_attribute()
    {
        $curso = factory(Curso::class)->create();

        $title = __('app.show_detail_title', [
            'name' => $curso->name, 'type' => __('curso.curso'),
        ]);
        $link = '<a href="'.route('cursos.show', $curso).'"';
        $link .= ' title="'.$title.'">';
        $link .= $curso->name;
        $link .= '</a>';

        $this->assertEquals($link, $curso->name_link);
    }

    /** @test */
    public function a_curso_has_belongs_to_creator_relation()
    {
        $curso = factory(Curso::class)->make();

        $this->assertInstanceOf(User::class, $curso->creator);
        $this->assertEquals($curso->creator_id, $curso->creator->id);
    }
}
