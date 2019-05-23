<?php

namespace Tests\Unit\Models;

use App\User;
use App\Projeto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class ProjetoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_projeto_has_name_link_attribute()
    {
        $projeto = factory(Projeto::class)->create();

        $title = __('app.show_detail_title', [
            'name' => $projeto->name, 'type' => __('projeto.projeto'),
        ]);
        $link = '<a href="'.route('projetos.show', $projeto).'"';
        $link .= ' title="'.$title.'">';
        $link .= $projeto->name;
        $link .= '</a>';

        $this->assertEquals($link, $projeto->name_link);
    }

    /** @test */
    public function a_projeto_has_belongs_to_creator_relation()
    {
        $projeto = factory(Projeto::class)->make();

        $this->assertInstanceOf(User::class, $projeto->creator);
        $this->assertEquals($projeto->creator_id, $projeto->creator->id);
    }
}
