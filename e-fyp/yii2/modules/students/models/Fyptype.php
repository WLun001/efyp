<?php

namespace app\modules\students\models;

use Yii;

/**
 * This is the model class for table "fyptype".
 *
 * @property integer $fypID
 * @property string $fypType
 */
class Fyptype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fyptype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fypType'], 'required'],
            [['fypType'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fypID' => 'Fyp ID',
            'fypType' => 'Fyp Type',
        ];
    }

    //     public function getDownloads()
    // {
    //     return $this->hasMany(Downloads::className(), ['tZoneID' => 'zID'])->orderBy('tName ASC');
    // }

}
