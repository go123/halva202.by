<?php

namespace common\models;

use Yii;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, txt', 'maxFiles' => 4],
			// [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => '*', 'maxFiles' => 4],
        ];
    }
    
    public function upload($center_id)
    {
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                // $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
				$file->saveAs('images/center/center'.$center_id.'/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}