<?php

namespace Tests\Unit\Policies;

use App\Semestre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class SemestrePolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_semestre()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Semestre));
    }

    /** @test */
    public function user_can_view_semestre()
    {
        $user = $this->createUser();
        $semestre = factory(Semestre::class)->create();
        $this->assertTrue($user->can('view', $semestre));
    }

    /** @test */
    public function user_can_update_semestre()
    {
        $user = $this->createUser();
        $semestre = factory(Semestre::class)->create();
        $this->assertTrue($user->can('update', $semestre));
    }

    /** @test */
    public function user_can_delete_semestre()
    {
        $user = $this->createUser();
        $semestre = factory(Semestre::class)->create();
        $this->assertTrue($user->can('delete', $semestre));
    }
}
