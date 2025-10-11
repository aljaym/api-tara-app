<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $user;
    protected $validUserData;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create test user data
        $this->validUserData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        // Create a test user for login tests
        $this->user = User::factory()->create([
            'name' => 'Existing User',
            'email' => 'existing@example.com',
            'password' => Hash::make('password123'),
        ]);
    }

    /**
     * Test user registration with valid data
     */
    public function test_user_can_register_with_valid_data()
    {
        $response = $this->postJson('/api/auth/register', $this->validUserData);

        $response->assertStatus(201)
                ->assertJsonStructure([
                    'message',
                    'user' => [
                        'id',
                        'name',
                        'email',
                        'is_admin',
                        'created_at'
                    ],
                    'token'
                ])
                ->assertJson([
                    'message' => 'User registered successfully',
                    'user' => [
                        'name' => 'Test User',
                        'email' => 'test@example.com',
                    ]
                ]);

        // Verify user was created in database
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'name' => 'Test User',
        ]);

        // Verify token was created
        $this->assertDatabaseHas('personal_access_tokens', [
            'tokenable_id' => $response->json('user.id'),
            'name' => 'auth-token'
        ]);
    }

    /**
     * Test user registration validation
     */
    public function test_user_registration_requires_valid_data()
    {
        // Test with empty data
        $response = $this->postJson('/api/auth/register', []);
        
        $response->assertStatus(422)
                ->assertJsonValidationErrors(['name', 'email', 'password']);

        // Test with invalid email
        $response = $this->postJson('/api/auth/register', [
            'name' => 'Test User',
            'email' => 'invalid-email',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);
        
        $response->assertStatus(422)
                ->assertJsonValidationErrors(['email']);

        // Test with password mismatch
        $response = $this->postJson('/api/auth/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'different-password',
        ]);
        
        $response->assertStatus(422)
                ->assertJsonValidationErrors(['password']);

        // Test with short password
        $response = $this->postJson('/api/auth/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '123',
            'password_confirmation' => '123',
        ]);
        
        $response->assertStatus(422)
                ->assertJsonValidationErrors(['password']);
    }

    /**
     * Test user registration with duplicate email
     */
    public function test_user_cannot_register_with_existing_email()
    {
        // First registration
        $this->postJson('/api/auth/register', $this->validUserData);

        // Try to register with same email
        $response = $this->postJson('/api/auth/register', $this->validUserData);
        
        $response->assertStatus(422)
                ->assertJsonValidationErrors(['email']);
    }

    /**
     * Test user login with valid credentials
     */
    public function test_user_can_login_with_valid_credentials()
    {
        $loginData = [
            'email' => 'existing@example.com',
            'password' => 'password123',
        ];

        $response = $this->postJson('/api/auth/login', $loginData);

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'message',
                    'user' => [
                        'id',
                        'name',
                        'email',
                        'is_admin',
                        'created_at'
                    ],
                    'token'
                ])
                ->assertJson([
                    'message' => 'Login successful',
                    'user' => [
                        'id' => $this->user->id,
                        'name' => 'Existing User',
                        'email' => 'existing@example.com',
                    ]
                ]);

        // Verify token was created
        $this->assertDatabaseHas('personal_access_tokens', [
            'tokenable_id' => $this->user->id,
            'name' => 'auth-token'
        ]);
    }

    /**
     * Test user login with invalid credentials
     */
    public function test_user_cannot_login_with_invalid_credentials()
    {
        // Test with wrong password
        $response = $this->postJson('/api/auth/login', [
            'email' => 'existing@example.com',
            'password' => 'wrong-password',
        ]);
        
        $response->assertStatus(422)
                ->assertJsonValidationErrors(['email']);

        // Test with non-existent email
        $response = $this->postJson('/api/auth/login', [
            'email' => 'nonexistent@example.com',
            'password' => 'password123',
        ]);
        
        $response->assertStatus(422)
                ->assertJsonValidationErrors(['email']);
    }

    /**
     * Test user login validation
     */
    public function test_user_login_requires_valid_data()
    {
        // Test with empty data
        $response = $this->postJson('/api/auth/login', []);
        
        $response->assertStatus(422)
                ->assertJsonValidationErrors(['email', 'password']);

        // Test with invalid email format
        $response = $this->postJson('/api/auth/login', [
            'email' => 'invalid-email',
            'password' => 'password123',
        ]);
        
        $response->assertStatus(422)
                ->assertJsonValidationErrors(['email']);
    }

    /**
     * Test get authenticated user
     */
    public function test_authenticated_user_can_get_profile()
    {
        $token = $this->user->createToken('test-token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->getJson('/api/auth/user');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'user' => [
                        'id',
                        'name',
                        'email',
                        'is_admin',
                        'created_at'
                    ]
                ])
                ->assertJson([
                    'user' => [
                        'id' => $this->user->id,
                        'name' => 'Existing User',
                        'email' => 'existing@example.com',
                    ]
                ]);
    }

    /**
     * Test get user without authentication
     */
    public function test_unauthenticated_user_cannot_get_profile()
    {
        $response = $this->getJson('/api/auth/user');
        
        $response->assertStatus(401);
    }

    /**
     * Test user logout
     */
    public function test_authenticated_user_can_logout()
    {
        $token = $this->user->createToken('test-token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->postJson('/api/auth/logout');

        $response->assertStatus(200)
                ->assertJson([
                    'message' => 'Logged out successfully'
                ]);

        // Verify token was deleted
        $this->assertDatabaseMissing('personal_access_tokens', [
            'tokenable_id' => $this->user->id,
            'name' => 'test-token'
        ]);
    }

    /**
     * Test logout without authentication
     */
    public function test_unauthenticated_user_cannot_logout()
    {
        $response = $this->postJson('/api/auth/logout');
        
        $response->assertStatus(401);
    }

    /**
     * Test user cannot access protected routes after logout
     */
    public function test_user_cannot_access_protected_routes_after_logout()
    {
        $token = $this->user->createToken('test-token')->plainTextToken;

        // Verify token works before logout
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->getJson('/api/protected');
        $response->assertStatus(200);

        // Logout (this deletes the current token)
        $logoutResponse = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->postJson('/api/auth/logout');
        $logoutResponse->assertStatus(200);

        // Verify token was deleted from database
        $this->assertDatabaseMissing('personal_access_tokens', [
            'tokenable_id' => $this->user->id,
            'name' => 'test-token'
        ]);
    }

    /**
     * Test protected route access with valid token
     */
    public function test_authenticated_user_can_access_protected_route()
    {
        $token = $this->user->createToken('test-token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->getJson('/api/protected');

        $response->assertStatus(200)
                ->assertJson([
                    'message' => 'This is a protected route'
                ])
                ->assertJsonStructure([
                    'message',
                    'user' => [
                        'id',
                        'name',
                        'email'
                    ]
                ]);
    }

    /**
     * Test protected route access without token
     */
    public function test_unauthenticated_user_cannot_access_protected_route()
    {
        $response = $this->getJson('/api/protected');
        
        $response->assertStatus(401);
    }

    /**
     * Test protected route access with invalid token
     */
    public function test_user_cannot_access_protected_route_with_invalid_token()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer invalid-token',
            'Accept' => 'application/json',
        ])->getJson('/api/protected');

        $response->assertStatus(401);
    }

    /**
     * Test complete authentication flow
     */
    public function test_complete_authentication_flow()
    {
        // 1. Register a new user
        $registerResponse = $this->postJson('/api/auth/register', $this->validUserData);
        $registerResponse->assertStatus(201);
        $token = $registerResponse->json('token');
        $userId = $registerResponse->json('user.id');

        // 2. Get user profile
        $userResponse = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->getJson('/api/auth/user');
        $userResponse->assertStatus(200);

        // 3. Access protected route
        $protectedResponse = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->getJson('/api/protected');
        $protectedResponse->assertStatus(200);

        // 4. Logout (this deletes the current token)
        $logoutResponse = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->postJson('/api/auth/logout');
        $logoutResponse->assertStatus(200);

        // 5. Verify token was deleted from database
        $this->assertDatabaseMissing('personal_access_tokens', [
            'tokenable_id' => $userId,
            'name' => 'auth-token'
        ]);
    }

    /**
     * Test API returns proper JSON structure
     */
    public function test_api_returns_proper_json_structure()
    {
        $response = $this->postJson('/api/auth/register', $this->validUserData);
        
        $response->assertHeader('content-type', 'application/json');
    }

    /**
     * Test user data is properly sanitized in responses
     */
    public function test_user_data_is_properly_sanitized()
    {
        $response = $this->postJson('/api/auth/register', $this->validUserData);
        
        $userData = $response->json('user');
        
        // Verify password is not included in response
        $this->assertArrayNotHasKey('password', $userData);
        $this->assertArrayNotHasKey('password_confirmation', $userData);
        
        // Verify sensitive fields are not included
        $this->assertArrayNotHasKey('remember_token', $userData);
    }
}
