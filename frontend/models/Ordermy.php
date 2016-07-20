<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ordermy".
 *
 * @property integer $id
 * @property string $email
 * @property integer $web
 * @property integer $phys
 * @property integer $math
 * @property integer $chem
 * @property integer $go
 * @property integer $many
 * @property string $comment
 */
class Ordermy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ordermy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'/* , 'comment' */], 'required'],
            [['web', 'phys', 'math', 'chem', 'go', 'many'], 'integer'],
            [['comment'], 'string'],
            
			[['email'], 'string', 'max' => 200],
			['email', 'filter', 'filter' => 'trim'],
            ['email', 'email'],
			
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'web' => 'web-программирование',
            'phys' => 'физика',
            'math' => 'математика',
            'chem' => 'химия',
            'go' => 'в принципе, можно и не ждать набора группы, а приступать прямо сейчас, но вполне неплохо, что количество людей будет добавляться',
            'many' => 'обожаю заниматься в группе, так что дождусь набора группы (в комментариях, просьба, поконкретнее написать какое количество людей вас устроит (минимум/максимум))',
            'comment' => 'Пожелания,предложения, дополнительные контакты, комментарии',
        ];
    }
}
