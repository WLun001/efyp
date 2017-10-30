<?php

namespace app\modules\students\models;
use yii\web\UploadedFile;

use Yii;

class UpLoadFile extends \yii\db\ActiveRecord
{
	
    public $files;

	public function rules(){
		return [
            [['files'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xlsx, csv', 'maxSize' => 1000000],
        ];
	}

	public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->files as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}

?>