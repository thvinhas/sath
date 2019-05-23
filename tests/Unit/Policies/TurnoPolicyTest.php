<?php

namespace Tests\Unit\Policies;

use App\Turno;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class TurnoPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_turno()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Turno));
    }

    /** @test */
    public function user_can_view_turno()
    {
        $user = $this->createUser();
        $turno = factory(Turno::class)->create();
        $this->assertTrue($user->can('view', $turno));
    }

    /** @test */
    public function user_can_update_turno()
    {
        $user = $this->createUser();
        $turno = factory(Turno::class)->create();
        $this->assertTrue($user->can('update', $turno));
    }

    /** @test */
    public function user_can_delete_turno()
    {
        $user = $this->createUser();
        $turno = factory(Turno::class)->create();
        $this->assertTrue($user->can('delete', $turno));
    }
}
