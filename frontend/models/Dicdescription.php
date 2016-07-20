<?php

namespace app\models;

use Yii;

// this file is used:
// frontend/models/dictionary.php
// // frontend/controllers/Dicdescription.php

$session = Yii::$app->session;
$session->open();

/**
 * This is the model class for table "dic_description".
 *
 * @property integer $id
 * @property string $titleOfView
 * @property string $titleRU
 * @property string $ru
 * @property string $titleEN
 * @property string $en
 * @property string $comment
 */
class Dicdescription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dic_description';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titleOfView'/* , 'titleRU', 'ru', 'titleEN', 'en', 'comment' */], 'required'],
            [['ru', 'en', 'comment'], 'string'],
            [['titleOfView'], 'string', 'max' => 50],
            [['titleRU', 'titleEN'], 'string', 'max' => 300],
            [['titleOfView'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titleOfView' => 'Title Of View',
            'titleRU' => 'Title Ru',
            'ru' => 'Ru',
            'titleEN' => 'Title En',
            'en' => 'En',
            'comment' => 'Comment',
        ];
    }
}