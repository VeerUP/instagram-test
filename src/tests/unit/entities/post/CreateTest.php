<?php

namespace src\tests\unit\entities\post;

use Codeception\Test\Unit;
use src\entities\Post;

class CreateTest extends Unit
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

        self::assertEquals($id, $post->id);
        self::assertEquals($url, $post->url);
        self::assertEquals($image, $post->image);
        self::assertEquals($caption, $post->caption);
        self::assertEquals($ownerId, $post->owner_id);
        self::assertEquals($createdAt, $post->created_at);
    }
}
