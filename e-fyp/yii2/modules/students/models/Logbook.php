<?php

namespace app\modules\students\models;

use Yii;

/**
 * This is the model class for table "logbook".
 *
 * @property integer $logbookID
 * @property integer $week
 * @property string $logbookactivity
 * @property string $files
 * @property integer $acknowledgement
 * @property string $comment
 * @property string $student_fk
 *
 * @property Students $studentFk
 */
class Logbook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $checked;
    public static function tableName()
    {
        return 'logbook';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['week', 'logbookactivity'], 'required'],
            [['week', 'acknowledgement'], 'integer'],
            [['logbookactivity', 'files', 'comment'], 'string', 'max' => 255],
            [['student_fk'], 'string', 'max' => 20],
            [['student_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['student_fk' => 'studentID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'logbookID' => 'Logbook ID',
            'week' => 'Week',
            'logbookactivity' => 'Activities to achieve planned milestones',
            'files' => 'Uploaded Documents',
            'acknowledgement' => 'Acknowledge By Supervisor',
            'comment' => 'Comments',
            'student_fk' => 'Student Fk',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentFk()
    {
        return $this->hasOne(Students::className(), ['studentID' => 'student_fk']);
    }

    public function getTwoWeekText(){
        return $this->twoweeks[$this->week];
    }

    public function getTwoWeeks(){

        return array(
            2=>'Week 2',
            4=>'Week 4',
            6=>'Week 6',
            8=>'Week 8',
            10=>'Week 10',
        );
    }

    public function getAckText(){
        return $this->acknowledge[$this->acknowledgement];
    }

    public function getAcknowledge(){
        return array(
            0=>'Pending',
            1=>'Reviewed By Supervisor',
            2=>'Satisfactory',
            3=>'Unsatisfactory',
            );
    }
}
