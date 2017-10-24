<?php

namespace app\modules\students\models;

use Yii;

/**
 * This is the model class for table "calendar".
 *
 * @property integer $calendarID
 * @property string $activities
 * @property string $date
 * @property integer $fypTypeID
 *
 * @property Fyptype $fypType
 */
class Calendar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['activities', 'date', 'fypTypeID'], 'required'],
            [['date'], 'safe'],
            [['fypTypeID'], 'integer'],
            [['activities'], 'string', 'max' => 255],
            [['fypTypeID'], 'exist', 'skipOnError' => true, 'targetClass' => Fyptype::className(), 'targetAttribute' => ['fypTypeID' => 'fypID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'calendarID' => 'Calendar ID',
            'activities' => 'Activities',
            'date' => 'Date',
            'fypTypeID' => 'Fyp Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFypType()
    {
        return $this->hasOne(Fyptype::className(), ['fypID' => 'fypTypeID']);
    }

    public function getWeeks(){

        return array(
            1=>'w1',
            2=>'w2',
            3=>'w3',
            4=>'w4',
            5=>'w5',
            6=>'w6',
            7=>'w7',
        );
    }
}
