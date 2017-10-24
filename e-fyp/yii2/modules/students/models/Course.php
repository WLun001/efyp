<?php

namespace app\modules\students\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property string $courseID
 * @property string $courseName
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['courseID', 'courseName'], 'required'],
            [['courseID'], 'string', 'max' => 40],
            [['courseName'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'courseID' => 'Course ID',
            'courseName' => 'Course Name',
        ];
    }
}
