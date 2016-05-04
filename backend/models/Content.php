<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "content".
 *
 * @property integer $id
 * @property string $title
 * @property integer $moderation
 * @property integer $listsql_id
 * @property integer $parent_id
 * @property integer $grade_id
 * @property string $additionalInformation
 *
 * @property Result[] $results
 */
class Content extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['title', 'moderation', 'listsql_id', 'parent_id', 'additionalInformation'], 'required'],
            [['moderation', 'listsql_id', 'parent_id', 'grade_id'], 'integer'],
            [['additionalInformation'], 'string'],
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
            'moderation' => 'Moderation',
            'listsql_id' => 'Listsql ID',
            'parent_id' => 'Parent ID',
            'grade_id' => 'Grade ID',
            'additionalInformation' => 'Additional Information',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResults()
    {
        return $this->hasMany(Result::className(), ['content_id' => 'id']);
    }
	
	// myself
	public function getListsql()
    {
        return $this->hasOne(Listsql::className(), ['id' => 'listsql_id']);
    }
	// /myself
}
