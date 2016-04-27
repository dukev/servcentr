<?php

namespace app\modules\users\models;

use yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use developeruz\db_rbac\interfaces\UserRbacInterface;

class User extends ActiveRecord implements IdentityInterface, UserRbacInterface
{  
    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['name', 'login', 'password'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['login'], 'string', 'max' => 15],
        ];
    }

    public function attributeLabels()
    {
        return [
           'id' => 'ID',
           'name' => 'Пользователь',
           'login' => 'Логин',
           'password' => 'Пароль',
           'authKey' => 'AuthKey',
        ];
    }

    /**
    * @inheritdoc
    */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        //return static::findOne(['token' => $token]);
    }
    
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public function getUserName()
    {
        return $this->name;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
        
            $this->authKey = Yii::$app->security->generateRandomString();
            $this->password = Yii::$app->security->generatePasswordHash($this->password);
            return true;
        }
        return false;
    }
}