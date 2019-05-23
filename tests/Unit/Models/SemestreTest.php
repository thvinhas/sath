<?php

namespace Tests\Unit\Models;

use App\User;
use App\Semestre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class SemestreTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_semestre_has_name_link_attribute()
    {
        $semestre = factory(Semestre::class)->create();

        $title = __('app.show_detail_title', [
            'name' => $semestre->name, 'type' => __('semestre.semestre'),
        ]);
        $link = '<a href="'.route('semestres.show', $semestre).'"';
        $link .= ' title="'.$title.'">';
        $link .= $semestre->name;
        $link .= '</a>';

        $this->assertEquals($link, $semestre->name_link);
    }

    /** @test */
    public function a_semestre_has_belongs_to_creator_relation()
    {
        $semestre = factory(Semestre::class)->make();

        $this->assertInstanceOf(User::class, $semestre->creator);
        $this->assertEquals($semestre->creator_id, $semestre->creator->id);
    }
}
