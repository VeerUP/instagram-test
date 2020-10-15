<?php

namespace src\tests\unit\forms\console;

use Codeception\Test\Unit;
use src\forms\console\PostForm;

class PostFormTest extends Unit
{
    public function testBlank()
    {
        $form = new PostForm();
        expect_not($form->validate());
    }

    public function testCorrect()
    {
        $form = new PostForm([
            'id' => 1,
            'ownerId' => 1,
            'createdAt' => time(),
            'image' => 'https://test.test/img.jpg',
            'caption' => 'test caption',
            'url' => 'https://test.test'
        ]);
        expect_that($form->validate());
    }
}
