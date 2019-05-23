<?php

namespace Tests\Unit\Policies;

use App\Turma;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class TurmaPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_turma()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Turma));
    }

    /** @test */
    public function user_can_view_turma()
    {
        $user = $this->createUser();
        $turma = factory(Turma::class)->create();
        $this->assertTrue($user->can('view', $turma));
    }

    /** @test */
    public function user_can_update_turma()
    {
        $user = $this->createUser();
        $turma = factory(Turma::class)->create();
        $this->assertTrue($user->can('update', $turma));
    }

    /** @test */
    public function user_can_delete_turma()
    {
        $user = $this->createUser();
        $turma = factory(Turma::class)->create();
        $this->assertTrue($user->can('delete', $turma));
    }
}
