<?php

namespace App\Models;

use PDO;

class Cart extends BaseModel
{
    protected $tableName = 'cart';

    public static function insert_cart($iduser, $idpro, $img, $name, $price, $number, $id_bill)
    {
        $model = new static;
        $model->sqlBuilder = "INSERT INTO `cart`(`id_user`, `id_products`, `image`, `name`, `price`, `number`, `id_bill`) VALUES ('$iduser','$idpro','$img','$name','$price','$number','$id_bill')";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }


   
}
