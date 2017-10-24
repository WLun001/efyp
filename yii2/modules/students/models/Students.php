<?php

namespace app\modules\students\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property string $name
 * @property integer $race
 * @property integer $gender
 * @property integer $faculty
 * @property string $course
 * @property integer $fypType
 * @property string $picture
 * @property string $studentID
 * @property string $email
 * @property string $phone
 *
 * @property Ganttchart[] $ganttcharts
 * @property Logbook[] $logbooks
 * @property Course $course0
 * @property Faculty $faculty0
 * @property Fyptype $fypType0
 * @property Title[] $titles
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $password;
    // public $checked;
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'race', 'gender', 'faculty', 'course', 'fypType', 'picture', 'studentID', 'email', 'phone','password'], 'required'],
            [['race', 'gender', 'faculty', 'fypType'], 'integer'],
            [['name', 'picture', 'email'], 'string', 'max' => 255],
            [['course'], 'string', 'max' => 40],
            [['studentID', 'phone'], 'string', 'max' => 20],
            [['studentID'], 'unique'],
            [['course'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course' => 'courseID']],
            [['faculty'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty' => 'facultyID']],
            [['fypType'], 'exist', 'skipOnError' => true, 'targetClass' => Fyptype::className(), 'targetAttribute' => ['fypType' => 'fypID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'race' => 'Race',
            'gender' => 'Gender',
            'faculty' => 'Faculty',
            'course' => 'Course',
            'fypType' => 'Fyp Type',
            'picture' => 'Picture',
            'studentID' => 'Student ID',
            'email' => 'Email',
            'phone' => 'Phone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGanttcharts()
    {
        return $this->hasMany(Ganttchart::className(), ['studentID_fk' => 'studentID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogbooks()
    {
        return $this->hasMany(Logbook::className(), ['student_fk' => 'studentID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse0()
    {
        return $this->hasOne(Course::className(), ['courseID' => 'course']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFaculty0()
    {
        return $this->hasOne(Faculty::className(), ['facultyID' => 'faculty']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFypType0()
    {
        return $this->hasOne(Fyptype::className(), ['fypID' => 'fypType']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTitles()
    {
        return $this->hasMany(Title::className(), ['student_fk' => 'studentID']);
    }

    public function getGenders(){
        return array('Male','Female');
    }

    public function getRaces(){
        return array('Malay','Chinese','Indian','Others');
    }

    public function getGenderText(){
        return $this->genders[$this->gender];
    }

    public function getRaceText(){
        return $this->races[$this->race];
    }


}
