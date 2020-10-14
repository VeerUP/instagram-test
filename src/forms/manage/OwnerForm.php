<?php

namespace src\forms\manage;

use yii\base\Model;

class OwnerForm extends Model
{
    /**
     * @var string
     */
    public string $username;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'required'],
            ['username', 'string', 'max' => 255],
        ];
    }
}
