<?php

namespace markavespirtu\user\models;

use Yii;

/**
 * This is the model class for table "userinfo".
 */
class UserInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userinfo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lastname', 'firstname', 'emp_no', 'position'], 'required'],
            [['lastname', 'firstname', 'middlename', 'extname', 'emp_no', 'position'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'lastname' => 'Last Name',
            'firstname' => 'First Name',
            'middlename' => 'Middle Name',
            'extname' => 'Suffix',
            'emp_no' => 'Employee ID',
            'position' => 'Position',
        ];
    }


    /**
     * @return Full name of User
     */

    public function getFullName(){
        return $this->firstname." ".$this->middlename." ".$this->lastname." ".$this->extname;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
