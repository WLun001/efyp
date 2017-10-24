<?php

namespace app\modules\students\models;

use Yii;
use app\modules\students\models\Course;
use app\modules\students\models\Fyptype;
/**
 * This is the model class for table "report".
 *
 * @property integer $id
 * @property string $name
 * @property string $start
 * @property string $due
 * @property integer $course
 * @property integer $fyptype
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'start', 'due', 'course', 'fyptype'], 'required'],
            [['start', 'due'], 'safe'],
            [['fyptype'], 'integer'],
            [['name','course'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'start' => 'Start',
            'due' => 'Due',
            'course' => 'course',
            'fyptype' => 'Fyp Type',
        ];
    }

    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['course' => 'courses']);
    }

    public function getFypType()
    {
        return $this->hasOne(Fyptype::className(), ['fypID' => 'fyptype']);
    }
}
