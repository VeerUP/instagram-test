<?php

namespace src\tests\unit\forms\manage;

use Codeception\Test\Unit;
use src\forms\manage\OwnerForm;

class OwnerFormTest extends Unit
{
    public function testBlank()
    {
        $form = new OwnerForm();
        $form->username = '';
        expect_not($form->validate());
    }

    public function testCorrect()
    {
        $form = new OwnerForm();
        $form->username = 'test-user';
        expect_that($form->validate());
    }
}
