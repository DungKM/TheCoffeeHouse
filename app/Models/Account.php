<?php

namespace App\Models;

use PDO;

class Account extends BaseModel
{
    protected $tableName = 'account';


    public static function checklogin($email, $password)
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM account WHERE email='" . $email . "' AND password='" . $password . "'";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public static function insert_account($email, $user, $password)
    {
        $model = new static;
        $model->sqlBuilder = "INSERT INTO account(email,user,password) VALUES('$email','$user','$password')";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public static function check_mail($email)
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM account WHERE email='" . $email . "'";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
