<?php

namespace Tests\Unit\Models;

use App\User;
use App\Turma;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class TurmaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_turma_has_name_link_attribute()
    {
        $turma = factory(Turma::class)->create();

        $title = __('app.show_detail_title', [
            'name' => $turma->name, 'type' => __('turma.turma'),
        ]);
        $link = '<a href="'.route('turmas.show', $turma).'"';
        $link .= ' title="'.$title.'">';
        $link .= $turma->name;
        $link .= '</a>';

        $this->assertEquals($link, $turma->name_link);
    }

    /** @test */
    public function a_turma_has_belongs_to_creator_relation()
    {
        $turma = factory(Turma::class)->make();

        $this->assertInstanceOf(User::class, $turma->creator);
        $this->assertEquals($turma->creator_id, $turma->creator->id);
    }
}
