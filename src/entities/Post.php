<?php

namespace src\entities;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%post}}".
 *
 * @property int $id
 * @property string $url
 * @property string $image
 * @property string|null $caption
 * @property int $owner_id
 * @property int $created_at
 *
 * @property Owner $owner
 */
class Post extends ActiveRecord
{
    public static function create($id, $url, $image, $caption, $ownerId, $createdAt): self
    {
        $post = new static();
        $post->id = $id;
        $post->url = $url;
        $post->image = $image;
        $post->caption = $caption;
        $post->owner_id = $ownerId;
        $post->created_at = $createdAt;
        return $post;
    }

    public function edit($image, $caption): void
    {
        $this->image = $image;
        $this->caption = $caption;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%post}}';
    }

    /**
     * Gets query for [[Owner]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(Owner::className(), ['id' => 'owner_id']);
    }
}
