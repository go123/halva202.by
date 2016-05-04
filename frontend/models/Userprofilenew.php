<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userprofilenew".
 *
 * @property integer $id
 * @property string $name
 */
class Userprofilenew extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userprofilenew';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
			'name' => 'Name',
            /* [
			
			'name2' => 'Ссылка',
			'format' => 'raw',
			'value' => function($data){
				return Html::a(
					'Перейти',
					$data->url,
					[
						'title' => 'Смелей вперед!',
						'target' => '_blank'
					]
				);
			}
			] */
			
        ];
    }
}
