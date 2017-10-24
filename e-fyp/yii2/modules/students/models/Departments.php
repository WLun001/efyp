<?php

namespace app\modules\students\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property string $department
 * @property integer $faculty_fk
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department', 'faculty_fk'], 'required'],
            [['faculty_fk'], 'integer'],
            [['department'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'department' => 'Department',
            'faculty_fk' => 'Faculty',
        ];
    }

    public function getFacultyFk()
    {
        return $this->hasOne(Faculty::className(), ['facultyID' => 'faculty_fk']);
    }
}
