<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "result".
 *
 * @property integer $id
 * @property integer $mark
 * @property string $comment
 */
class Result extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'result';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mark', 'comment'], 'required'],
            [['mark'], 'integer'],
            [['comment'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mark' => 'Mark',
            'comment' => 'Comment',
        ];
    }
	public function getCenter()
    {
        return $this->hasOne(Center::className(), ['id' => 'center_id']);
    }
	
	public function knowMark($center_id, $customer_id)
	{
		if($record = $this->find()->where(['customer_id'=>$customer_id, 'center_id'=>$center_id])->one())
		{return $record->mark;}
		else {return 0;}
	}
}
