<?php

namespace Tests\Feature;

use App\Services\UserServices;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private UserServices $userService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userService = $this->app->make(UserServices::class);
    }

    public function testLoginSuccess()
    {
        self::assertTrue($this->userService->login('khannedy', 'rahasia'));
    }

    public function testLoginUserNotFound()
    {
        self::assertFalse($this->userService->login('eko', 'eko'));
    }

    public function testLoginWrongPassword()
    {
        self::assertFalse($this->userService->login('khannedy', 'salah'));
    }
}
