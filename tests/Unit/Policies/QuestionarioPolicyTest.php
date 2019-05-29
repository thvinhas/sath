<?php

namespace Tests\Unit\Policies;

use App\Questionario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class QuestionarioPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_questionario()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Questionario));
    }

    /** @test */
    public function user_can_view_questionario()
    {
        $user = $this->createUser();
        $questionario = factory(Questionario::class)->create();
        $this->assertTrue($user->can('view', $questionario));
    }

    /** @test */
    public function user_can_update_questionario()
    {
        $user = $this->createUser();
        $questionario = factory(Questionario::class)->create();
        $this->assertTrue($user->can('update', $questionario));
    }

    /** @test */
    public function user_can_delete_questionario()
    {
        $user = $this->createUser();
        $questionario = factory(Questionario::class)->create();
        $this->assertTrue($user->can('delete', $questionario));
    }
}
