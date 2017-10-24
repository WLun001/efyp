<?php

namespace app\modules\students\models;

use Yii;

/**
 * This is the model class for table "ganttchart".
 *
 * @property integer $id
 * @property string $activity
 * @property integer $start
 * @property integer $end
 * @property string $datecompletion
 * @property string $studentID_fk
 *
 * @property Students $studentIDFk
 */
class Ganttchart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    
    public static function tableName()
    {
        return 'ganttchart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['activity', 'start', 'end', 'datecompletion'], 'required'],
            [['start', 'end'], 'integer'],
            [['datecompletion'], 'safe'],
            [['activity'], 'string', 'max' => 255],
            [['studentID_fk'], 'string', 'max' => 20],
            [['studentID_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['studentID_fk' => 'studentID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'activity' => ' Project Activity',
            'start' => 'Start Week',
            'end' => 'End Week',
            'datecompletion' => 'Planned Completion Date',
            'studentID_fk' => 'Student Id Fk',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentIDFk()
    {
        return $this->hasOne(Students::className(), ['studentID' => 'studentID_fk']);
    }

    public function getWeeksTextStart(){
        return $this->weeks[$this->start];
    }

    public function getWeeksTextEnd(){
        return $this->weeks[$this->end];
    }

    public function getWeeks(){

        return array(
            1=>'Week 1',
            2=>'Week 2',
            3=>'Week 3',
            4=>'Week 4',
            5=>'Week 5',
            6=>'Week 6',
            7=>'Week 7',
            8=>'Week 8',
            9=>'Week 9',
            10=>'Week 10',
            11=>'Week 11',
            12=>'Week 12',
        );
    }
}
