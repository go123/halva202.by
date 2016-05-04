<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userprofile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $info
 * @property string $infoOnlyForMe
 * @property string $myOpinion
 * @property string $pupilOpinion
 *
 * @property User $user
 */
class Userprofile2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userprofile';
    }

    
}
