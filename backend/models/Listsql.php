<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "listsql".
 *
 * @property integer $id
 * @property string $title
 * @property integer $parent_id
 * @property double $order_idFloat
 * @property integer $needForSite
 *
 * @property Result[] $results
 */
class Listsql extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'listsql';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'parent_id', 'order_idFloat', 'needForSite'], 'required'],
            [['parent_id', 'needForSite'], 'integer'],
            [['order_idFloat'], 'number'],
            [['title'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'parent_id' => 'Parent ID',
            'order_idFloat' => 'Order Id Float',
            'needForSite' => 'Need For Site',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResults()
    {
        return $this->hasMany(Result::className(), ['listsql_id' => 'id']);
    }
}
