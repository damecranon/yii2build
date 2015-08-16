<?php

namespace common\models;

use Yii;
use backend\models\Role;
use backend\models\Status;
use backend\models\UserType;
use common\models\User;

class ValueHelpers
{
    public static function roleMatch($role_name)
    {
        $userHasRoleName = Yii::$app->user->identity->role->role_name;
          return $userHasRoleName == $role_name ? true : false;
    }

    public static function getUsersRoleValue($userId=null)
    {
        if ($userId == null) {
            $userRoleValue = Yii::$app->user->identity->role->role_name;
            return isset($userRoleValue) ? $userRoleValue : false;
        } else {
            $user = User::findone($userId);
            $userRoleValue = $user->role->role_name;
            return isset($userRoleValue) ? $userRoleValue : false;
        }
    }

    public static function getRoleValue($role_name)
    {
        $role = Role::find('role_name')
            ->where(['role_name' => $role_name])
            ->one();
        return isset($role->role_name) ? $role->role_name : false;
    }

    public static function isRoleNameValid($role_name)
    {
        $role = Role::find('role_name')
            ->where(['role_name' => $role_name])
            ->one();
        return isset($role->role_name) ? true : false;
    }

    public static function statusMatch($status_name)
    {
        $userHasStatusName = Yii::$app->user->identity->status->status_name;
        return $userHasStatusName == $status_name ? true : false;
    }

    public static function getStatusId($status_name)
    {
        $status = Status::find('id')
            ->where(['status_name' => $status_name])
            ->one();
        return isset($status->id) ? $status->id : false;
    }

    public static function userTypeMatch($user_type_name)
    {
        $userHasUserTypeName = Yii::$app->user->identity->user_type->user_type_name;
            return $userHasUserTypeName == $user_type_name ? true : false;
    }


}


