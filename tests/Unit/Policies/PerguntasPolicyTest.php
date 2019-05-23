<?php

namespace Tests\Unit\Policies;

use App\Perguntas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class PerguntasPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_perguntas()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Perguntas));
    }

    /** @test */
    public function user_can_view_perguntas()
    {
        $user = $this->createUser();
        $perguntas = factory(Perguntas::class)->create();
        $this->assertTrue($user->can('view', $perguntas));
    }

    /** @test */
    public function user_can_update_perguntas()
    {
        $user = $this->createUser();
        $perguntas = factory(Perguntas::class)->create();
        $this->assertTrue($user->can('update', $perguntas));
    }

    /** @test */
    public function user_can_delete_perguntas()
    {
        $user = $this->createUser();
        $perguntas = factory(Perguntas::class)->create();
        $this->assertTrue($user->can('delete', $perguntas));
    }
}
