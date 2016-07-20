<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "line1".
 *
 * @property integer $id
 * @property string $title
 * @property integer $center_id
 *
 * @property Center $center
 * @property Line2[] $line2s
 */
class Lineprevn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        // return 'line1';
		$prevN = $_SESSION['nowN']-1;
		return 'line'.$prevN;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['center_id'], 'integer'],
            [['title'], 'string', 'max' => 500],
            [['center_id'], 'exist', 'skipOnError' => true, 'targetClass' => Center::className(), 'targetAttribute' => ['center_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title of parent',
            'center_id' => 'Center ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCenter()
    {
        return $this->hasOne(Center::className(), ['id' => 'center_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLine2s()
    {
        return $this->hasMany(Line2::className(), ['parentId' => 'id']);
    }
}
