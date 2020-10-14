<?php

namespace src\entities;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%owner}}".
 *
 * @property int $id
 * @property string $username
 * @property int $created_at
 *
 * @property Post[] $posts
 */
class Owner extends ActiveRecord
{
    public const INSTAGRAM_HOST = 'https://www.instagram.com';

    public static function create($username): Owner
    {
        $owner = new static();
        $owner->username = $username;
        return $owner;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return self::INSTAGRAM_HOST . '/' . $this->username;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%owner}}';
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return ActiveQuery
     */
    public function getPosts(): ActiveQuery
    {
        return $this->hasMany(Post::class, ['owner_id' => 'id']);
    }

    /**
     * {@inheritDoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'updatedAtAttribute' => null,
            ],
        ];
    }
}
