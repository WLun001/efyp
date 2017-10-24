<?php

namespace app\modules\students\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property integer $roleID
 * @property string $roles
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['roles'], 'required'],
            [['roles'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'roleID' => 'Role ID',
            'roles' => 'Roles',
        ];
    }

    public function getSchedule()
    {
        return $this->hasMany(Schedule::className(),
            ['scheduleID' => 'scheduleID'])
            -> viaTable('responsible',
            ['roleID' => 'roleID']);
    }
}
