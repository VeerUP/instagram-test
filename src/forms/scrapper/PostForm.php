<?php

namespace src\forms\scrapper;

use src\entities\Owner;
use yii\base\Model;

class PostForm extends Model
{
    /**
     * @var int
     */
    public int $id;
    /**
     * @var int
     */
    public int $ownerId;
    /**
     * @var int
     */
    public int $createdAt;
    /**
     * @var string
     */
    public string $image;
    /**
     * @var string
     */
    public string $caption;
    /**
     * @var string
     */
    public string $url;

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
            [['image'], 'string', 'max' => 512],
            [['caption'], 'default'],
            [['id'], 'unique', 'targetClass' => Owner::class, 'targetAttribute' => ['id' => 'id']],
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
