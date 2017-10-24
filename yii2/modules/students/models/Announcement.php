<?php

namespace app\modules\students\models;

use Yii;

/**
 * This is the model class for table "announcement".
 *
 * @property integer $announcementID
 * @property string $title
 * @property string $body
 * @property integer $fypTypeID
 */
class Announcement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'announcement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'body', 'fypTypeID'], 'required'],
            [['fypTypeID'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['body'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'announcementID' => 'Announcement ID',
            'title' => 'Title',
            'body' => 'Body',
            'fypTypeID' => 'Fyp Type ID',
        ];
    }

    public function getFypType()
    {
        return $this->hasOne(Fyptype::className(), ['fypID' => 'fypTypeID']);
    }
}
