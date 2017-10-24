<?php

namespace app\modules\students\models;

use Yii;
use app\modules\students\models\Faculty;

/**
 * This is the model class for table "staff".
 *
 * @property integer $id
 * @property string $userID
 * @property integer $role
 * @property string $name
 * @property integer $faculty_fk
 * @property string $departments_fk
 * @property string $email
 * @property string $contactNo
 *
 * @property Roles $role0
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $roleArray;
    public $password;
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userID', 'role', 'name', 'faculty_fk', 'departments_fk', 'email', 'contactNo'], 'required'],
            [['faculty_fk'], 'integer'],
            [['userID', 'name', 'departments_fk', 'email','role'], 'string', 'max' => 255],
            [['contactNo'], 'string', 'max' => 20],
            [['userID'], 'unique'],
            [['faculty'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty' => 'facultyID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userID' => 'User ID',
            'role' => 'Role',
            'name' => 'Name',
            'faculty_fk' => 'Faculty',
            'departments_fk' => 'Departments',
            'email' => 'Email',
            'contactNo' => 'Contact No',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRolesText(){

        $roleArr = explode(",", $this->role);
        $roleInTextArr = array();
        foreach($roleArr as $arole){
            array_push($roleInTextArr, $this->roles[$arole]);

        }

        return implode(", ", $roleInTextArr);
    }

    public function getRoles()
    {
        return array(1 => 'Admin',
                     2 => 'FYP Coordinator',
                     3 => 'Lecturer (Supervisors/Co-supervisors/Moderators)');
    }

    public function getFaculty()
    {
        return $this->hasOne(Faculty::className(), ['facultyID' => 'faculty_fk']);
    }


}
