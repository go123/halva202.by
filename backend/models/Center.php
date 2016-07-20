<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "center".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Level2item[] $level2items
 * @property Level3item[] $level3items
 * @property User1Journal[] $user1Journals
 */
class Center extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'center';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 100],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevel2items()
    {
        return $this->hasMany(Level2item::className(), ['center_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevel3items()
    {
        return $this->hasMany(Level3item::className(), ['content_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser1Journals()
    {
        return $this->hasMany(User1Journal::className(), ['content_id' => 'id']);
    }
}
