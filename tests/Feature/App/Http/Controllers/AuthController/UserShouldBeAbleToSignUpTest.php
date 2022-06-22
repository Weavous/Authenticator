<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class UserShouldBeAbleToSignUpTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_should_store_an_user_when_payload_is_valid()
    {
        $this->postJson('api/v1/sign-up', [
            'email' => 'johndoe@email.com',
            'name' => 'John Doe',
            'password' => 'password'
        ])->assertStatus(Response::HTTP_CREATED)->assertJsonStructure([
            'created_at',
            'email',
            'id',
            'name',
            'updated_at'
        ]);
    }
}
