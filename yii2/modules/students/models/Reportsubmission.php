<?php

namespace app\modules\students\models;

use Yii;

/**
 * This is the model class for table "reportsubmission".
 *
 * @property integer $id
 * @property string $report
 * @property string $submissiondate
 * @property string $student_id
 * @property string $files
 */
class Reportsubmission extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reportsubmission';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'files'], 'required'],
            [['submissiondate'], 'safe'],
            [['report', 'files'], 'string', 'max' => 255],
            [['student_id'], 'string', 'max' => 20],
            [['courseID'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'report' => 'Report',
            'submissiondate' => 'Submissiondate',
            'student_id' => 'Student ID',
            'files' => 'Files',
            'courseID'=>'Course',
        ];
    }
}
