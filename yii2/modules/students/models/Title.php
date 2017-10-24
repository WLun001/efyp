<?php

namespace app\modules\students\models;
use Yii;
use app\modules\students\models\Staff;
/**
 * This is the model class for table "title".
 *
 * @property integer $titleID
 * @property string $title
 * @property string $batch
 * @property integer $category
 * @property integer $faculty
 * @property string $departments
 * @property string $descriptions
 * @property string $equipment
 * @property string $course
 * @property integer $status
 * @property integer $supervisor
 * @property integer $coSupervisor
 * @property integer $moderator
 * @property string $student_fk
 *
 * @property Fyptype $category0
 * @property Staffs $coSupervisor0
 * @property Departments $departments0
 * @property Faculty $faculty0
 * @property Staffs $moderator0
 * @property Students $studentFk
 * @property Staffs $supervisor0
 */
class Title extends \yii\db\ActiveRecord
{
    public $courseArray;
    public function getStatusText(){

        return $this->statusoptions[$this->status];
    }

    public function getStatusoptions(){

         return array(
                    0 => 'Unregistered',
                    1 => 'Registered',
            );
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'title';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'batch', 'category', 'faculty', 'departments', 'descriptions', 'equipment', 'course', 'supervisor'], 'required'],
            [['category', 'faculty', 'status', 'supervisor', 'coSupervisor', 'moderator'], 'integer'],
            [['descriptions', 'equipment'], 'string'],
            [['title', 'batch', 'departments', 'course'], 'string', 'max' => 255],
            [['student_fk'], 'string', 'max' => 20],
            [['coSupervisor'], 'exist', 'skipOnError' => true, 'targetClass' => Staff::className(), 'targetAttribute' => ['coSupervisor' => 'id']],
            [['departments'], 'exist', 'skipOnError' => true, 'targetClass' => Departments::className(), 'targetAttribute' => ['departments' => 'department']],
            [['faculty'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty' => 'facultyID']],
            [['moderator'], 'exist', 'skipOnError' => true, 'targetClass' => Staff::className(), 'targetAttribute' => ['moderator' => 'id']],
            [['student_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['student_fk' => 'studentID']],
            [['supervisor'], 'exist', 'skipOnError' => true, 'targetClass' => Staff::className(), 'targetAttribute' => ['supervisor' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'titleID' => 'Title ID',
            'title' => 'Title',
            'batch' => 'Batch Of Year',
            'category' => 'FYP Category',
            'faculty' => 'Faculty',
            'departments' => 'Departments',
            'descriptions' => 'Project Descriptions',
            'equipment' => 'Equipment Required',
            'course' => 'Suitable For Course',
            'status' => 'Status',
            'supervisor' => 'Supervisor',
            'coSupervisor' => 'Co Supervisor',
            'moderator' => 'Moderator',
            'student_fk' => 'Student ID',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoSupervisor0()
    {
        return $this->hasOne(Staff::className(), ['id' => 'coSupervisor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments0()
    {
        return $this->hasOne(Departments::className(), ['department' => 'departments']);
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
    public function getModerator0()
    {
        return $this->hasOne(Staff::className(), ['id' => 'moderator']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentFk()
    {
        return $this->hasOne(Students::className(), ['studentID' => 'student_fk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupervisor0()
    {
        return $this->hasOne(Staff::className(), ['id' => 'supervisor']);
    }


    public function getStatusWord(){
        return $this->status0[$this->status];
    }

    public function getStatus0(){
        return array(
                0=>'Unregistered',
                1=>'Registered'
            );
    }

    public function getCategoryWord(){
        return $this->category0[$this->category];
    }

    public function getCategory0(){
        return array(
                1=>'Project 1',
                2=>'Project 2',
                3=>'Part 1',
                4=>'Part 2',
            );
    }
}
