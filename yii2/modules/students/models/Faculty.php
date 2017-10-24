<?php

namespace app\modules\students\models;

use Yii;

/**
 * This is the model class for table "faculty".
 *
 * @property integer $facultyID
 * @property string $faculty
 *
 * @property Departments[] $departments
 */
class Faculty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faculty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['faculty'], 'required'],
            [['faculty'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'facultyID' => 'Faculty ID',
            'faculty' => 'Faculty',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Departments::className(), ['faculty_fk' => 'facultyID']);
    }
}
