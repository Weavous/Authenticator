<?php

namespace Tests\Feature\App\Http\Controllers\AuthController;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class UserShouldBeAbleToSeeErrorsWhenBadRequestIsProvidedTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_should_display_proper_details_when_bad_payload_is_provided()
    {
        $this->postJson('api/v1/sign-up', [])->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)->assertExactJson([
            'errors' => [
                'email' => [
                    'The email field is required.'
                ],
                'name' => [
                    'The name field is required.'
                ],
                'password' => [
                    'The password field is required.'
                ]
            ],
            'message' => 'The name field is required. (and 2 more errors)'
        ]);
    }
}
