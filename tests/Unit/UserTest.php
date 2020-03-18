<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

//use Tests\TestCase;

/**
 * Class UserTest
 * @package Tests\Unit
 */
class UserTest extends TestCase
{
    private $user;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->user = new User();
        $this->user->name = 'John';
        $this->user->middle_name = 'Washington';
        $this->user->last_name = 'Doe';
        $this->user->email = 'admin@admin.com';
    }

    /**
     * @test
     * @return void
     */
    public function user_full_name()
    {
        $getDisplayNameUser = $this->user->getDisplayNameUser($this->user);

        $this->assertNotEmpty($getDisplayNameUser);
        $this->assertIsString($getDisplayNameUser);
        $this->assertEquals(
            $this->user->name.' '.$this->user->middle_name.' '.$this->user->last_name,
            $getDisplayNameUser
        );
    }

    /**
     * @test
     * @return void
     */
    public function user_name_lastName()
    {
        $this->user->middle_name = null;

        $getDisplayNameUser = $this->user->getDisplayNameUser($this->user);

        $this->assertNotEmpty($getDisplayNameUser);
        $this->assertIsString($getDisplayNameUser);
        $this->assertEquals(
            $this->user->name.' '.$this->user->last_name,
            $getDisplayNameUser
        );
    }

    /**
     * @test
     * @return void
     */
    public function user_name()
    {
        $this->user->middle_name = null;
        $this->user->last_name = null;

        $regExp = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix';

        $getDisplayNameUser = $this->user->getDisplayNameUser($this->user);

        $this->assertRegExp($regExp, $getDisplayNameUser);
        $this->assertNotNull($getDisplayNameUser);
        $this->assertNotEmpty($getDisplayNameUser);
        $this->assertIsString($getDisplayNameUser);
        $this->assertEquals(
            $this->user->email,
            $getDisplayNameUser
        );
    }

    /**
     * @test
     * @return void
     */
    public function user_lastName()
    {
        $this->user->name = null;
        $this->user->middle_name = null;

        $regExp = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix';

        $getDisplayNameUser = $this->user->getDisplayNameUser($this->user);

        $this->assertRegExp($regExp, $getDisplayNameUser);
        $this->assertNotNull($getDisplayNameUser);
        $this->assertNotEmpty($getDisplayNameUser);
        $this->assertIsString($getDisplayNameUser);
        $this->assertEquals(
            $this->user->email,
            $getDisplayNameUser
        );
    }

}
