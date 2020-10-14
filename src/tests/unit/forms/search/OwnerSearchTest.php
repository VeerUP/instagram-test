<?php

namespace src\tests\unit\forms\search;

use Codeception\Test\Unit;
use src\forms\search\OwnerSearch;

class OwnerSearchTest extends Unit
{
    public function testCorrect()
    {
        $form = new OwnerSearch();
        $form->username = 'test-user';
        expect_that($form->validate());
    }
}
