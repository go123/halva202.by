<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quiz".
 *
 * @property integer $id
 * @property string $question
 * @property string $answer1
 * @property string $answer2
 * @property string $answer3
 * @property string $answer4
 * @property double $queue
 */
class Quiz extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quiz';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question', 'answer1', 'answer2', 'answer3', 'answer4', 'queue'], 'required'],
            [['question'], 'string'],
            [['queue'], 'number'],
            [['answer1', 'answer2', 'answer3', 'answer4'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question' => 'Question',
            'answer1' => 'Answer1',
            'answer2' => 'Answer2',
            'answer3' => 'Answer3',
            'answer4' => 'Answer4',
            'queue' => 'Queue',
        ];
    }
}
