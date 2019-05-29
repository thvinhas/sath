<?php

namespace Tests\Unit\Models;

use App\User;
use App\Questionario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class QuestionarioTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_questionario_has_name_link_attribute()
    {
        $questionario = factory(Questionario::class)->create();

        $title = __('app.show_detail_title', [
            'name' => $questionario->name, 'type' => __('questionario.questionario'),
        ]);
        $link = '<a href="'.route('questionarios.show', $questionario).'"';
        $link .= ' title="'.$title.'">';
        $link .= $questionario->name;
        $link .= '</a>';

        $this->assertEquals($link, $questionario->name_link);
    }

    /** @test */
    public function a_questionario_has_belongs_to_creator_relation()
    {
        $questionario = factory(Questionario::class)->make();

        $this->assertInstanceOf(User::class, $questionario->creator);
        $this->assertEquals($questionario->creator_id, $questionario->creator->id);
    }
}
