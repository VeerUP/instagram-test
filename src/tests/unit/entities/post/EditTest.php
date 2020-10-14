<?php

namespace src\tests\unit\entities\post;

use Codeception\Test\Unit;
use src\entities\Post;

class EditTest extends Unit
{
    public function testSuccess()
    {
        $post = Post::create(
            $id = 1,
            $url = 'https://test.test',
            $image = 'https://test.test/image.jpg',
            $caption = 'test caption',
            $ownerId = 1,
            $createdAt = time()
        );

        $post->edit(
            $image = 'https://test.test/new_image.jpg',
            $caption = 'test new caption'
        );

        self::assertEquals($image, $post->image);
        self::assertEquals($caption, $post->caption);
    }
}