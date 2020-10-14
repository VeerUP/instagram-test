<?php

namespace src\tests\unit\entities\owner;

use Codeception\Test\Unit;
use src\entities\Owner;

class CreateTest extends Unit
{
    public function testSuccess()
    {
        $owner = Owner::create(
            $username = 'buzova86',
        );

        self::assertEquals($username, $owner->username);
        self::assertEquals(Owner::INSTAGRAM_HOST . '/' . $username, $owner->getUrl());
    }
}