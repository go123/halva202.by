<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "line2".
 *
 * @property integer $id
 * @property string $title
 * @property string $titleRu
 * @property string $titleEn
 * @property string $commentRu
 * @property string $commentEn
 * @property double $idFloatOrder
 *
 * @property Line3[] $line3s
 * @property Line32[] $line32s
 */
class Linen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        // return 'line2';
		return 'line'.$_SESSION['nowN'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'/* , 'titleRu', 'titleEn', 'commentRu', 'commentEn' */], 'required'],
            [['commentRu', 'commentEn'], 'string'],
            [['idFloatOrder'], 'number'],
            [['title'], 'string', 'max' => 500],
            [['titleRu', 'titleEn'], 'string', 'max' => 100],
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
			'line1.title' => 'Title of parent',
            'titleRu' => 'Title Ru',
            'titleEn' => 'Title En',
            'commentRu' => 'Comment Ru',
            'commentEn' => 'Comment En',
            'idFloatOrder' => 'Id Float Order',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
	/* public function getLine1()
    {
        return $this->hasOne(Line1::className(), ['id' => 'lineParentN_id']);
    } */
	public function getLineprevn()
    {
        return $this->hasOne(Lineprevn::className(), ['id' => 'lineParentN_id']);
    }
}
