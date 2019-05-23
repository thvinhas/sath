<?php

namespace Tests\Unit\Policies;

use App\Projeto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class ProjetoPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_projeto()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Projeto));
    }

    /** @test */
    public function user_can_view_projeto()
    {
        $user = $this->createUser();
        $projeto = factory(Projeto::class)->create();
        $this->assertTrue($user->can('view', $projeto));
    }

    /** @test */
    public function user_can_update_projeto()
    {
        $user = $this->createUser();
        $projeto = factory(Projeto::class)->create();
        $this->assertTrue($user->can('update', $projeto));
    }

    /** @test */
    public function user_can_delete_projeto()
    {
        $user = $this->createUser();
        $projeto = factory(Projeto::class)->create();
        $this->assertTrue($user->can('delete', $projeto));
    }
}
