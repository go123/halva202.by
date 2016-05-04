<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dictionary".
 *
 * @property integer $id
 * @property string $field
 * @property string $title
 * @property string $titleEN
 * @property string $description
 * @property string $descriptionEN
 * @property string $link
 * @property string $linkEN
 * @property string $addInfo
 */
class Dictionary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dictionary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['field', 'title', 'titleEN', 'description', 'descriptionEN', 'link', 'linkEN', 'addInfo'], 'required'],
            [['description', 'descriptionEN', 'addInfo'], 'string'],
            [['field'], 'string', 'max' => 30],
            [['title', 'titleEN'], 'string', 'max' => 300],
            [['link', 'linkEN'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'field' => 'Field',
            'title' => 'Title',
            'titleEN' => 'Title En',
            'description' => 'Description',
            'descriptionEN' => 'Description En',
            'link' => 'Link',
            'linkEN' => 'Link En',
            'addInfo' => 'Add Info',
        ];
    }
}
