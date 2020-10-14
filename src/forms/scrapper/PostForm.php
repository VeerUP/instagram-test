<?php

namespace src\forms\scrapper;

use src\entities\Owner;
use src\entities\Post;
use yii\base\Model;

class PostForm extends Model
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var int
     */
    public $ownerId;
    /**
     * @var int
     */
    public $createdAt;
    /**
     * @var string
     */
    public $image;
    /**
     * @var string
     */
    public $caption;
    /**
     * @var string
     */
    public $url;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'url', 'image', 'ownerId', 'createdAt'], 'required'],
            [['id', 'ownerId', 'createdAt'], 'integer'],
            [['caption'], 'string'],
            [['url'], 'string', 'max' => 255],
            [['url'], 'url'],
            [['image'], 'string', 'max' => 512],
            [['caption'], 'default'],
            [['id'], 'unique', 'targetClass' => Post::class, 'targetAttribute' => ['id' => 'id']],
            [
                ['ownerId'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Owner::class,
                'targetAttribute' => ['ownerId' => 'id']
            ],
        ];
    }
}
