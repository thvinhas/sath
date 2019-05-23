<?php

namespace Tests\Unit\Policies;

use App\Curso;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class CursoPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_curso()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Curso));
    }

    /** @test */
    public function user_can_view_curso()
    {
        $user = $this->createUser();
        $curso = factory(Curso::class)->create();
        $this->assertTrue($user->can('view', $curso));
    }

    /** @test */
    public function user_can_update_curso()
    {
        $user = $this->createUser();
        $curso = factory(Curso::class)->create();
        $this->assertTrue($user->can('update', $curso));
    }

    /** @test */
    public function user_can_delete_curso()
    {
        $user = $this->createUser();
        $curso = factory(Curso::class)->create();
        $this->assertTrue($user->can('delete', $curso));
    }
}
