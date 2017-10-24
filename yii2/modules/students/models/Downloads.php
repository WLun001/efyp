<?php

namespace app\modules\students\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "downloads".
 *
 * @property integer $downloadID
 * @property string $documents
 * @property integer $fypType_ID
 *
 * @property Fyptype $fypType
 */
class Downloads extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'downloads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [ 'fypType_ID', 'required'],
            [['fypType_ID'], 'integer'],
             [['documents'], 'string', 'max' => 255],
            [['fypType_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Fyptype::className(), 'targetAttribute' => ['fypType_ID' => 'fypID']],
            [['documents'], 'safe'],
            [['documents'], 'file', 'extensions' => 'doc, docx, pdf'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'downloadID' => 'Download ID',
            'documents' => 'Upload Documents',
            'fypType_ID' => 'Fyp Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFypType()
    {
        return $this->hasOne(Fyptype::className(), ['fypID' => 'fypType_ID']);
    }



}
