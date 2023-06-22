<?php

namespace App\Models;

use PDO;

class Bills extends BaseModel
{
   protected $tableName = 'bill';

   public static function getAllBill()
   {
      $model = new static;
      $model->sqlBuilder = "SELECT *,bill.id as bill_id ,sum(cart.number) as sumcart FROM bill JOIN cart ON bill.id= cart.id_bill group by bill.id";
      $stmt = $model->conn->prepare($model->sqlBuilder);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_CLASS);
      return $result;
   }
   public static function list_bill($id_bill)
   {
      $model = new static;
      $model->sqlBuilder = "SELECT cart.id as cart_id,cart.name as cartname,cart.price as cartprice,cart.number as cartnumber,cart.image as image FROM bill JOIN cart ON bill.id= cart.id_bill WHERE bill.id ='$id_bill'  group by bill.id";
      $stmt = $model->conn->prepare($model->sqlBuilder);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_CLASS);
      return $result;
   }
   
   public static function finOnebill($id_user){
      $model = new static;
      $model->sqlBuilder = "SELECT * FROM bill WHERE id_user='$id_user'";
      $stmt = $model->conn->prepare($model->sqlBuilder);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_CLASS);
      return $result;
   }
   public static function onebill($id){
      $model = new static;
      $model->sqlBuilder = "SELECT * FROM bill WHERE id='$id'";
      $stmt = $model->conn->prepare($model->sqlBuilder);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_CLASS);
      return $result;
   }

   public  function insert_bill($data = [])
   {
      $this->sqlBuilder = "INSERT INTO $this->tableName(";
      $colName = '';
      $params = '';

      foreach ($data as $key => $value) {
         $colName .= "`$key`, ";
         $params .= ":$key, ";
      }
      //Xóa dấu ', ' ở bên phải chuỗi
      $colName = rtrim($colName, ', ');
      $params = rtrim($params, ', ');
      //Nối vào chuỗi SQL
      $this->sqlBuilder .= $colName . ") VALUES(" . $params . ")";
      $stmt = $this->conn->prepare($this->sqlBuilder);
      $stmt->execute( $data);
     return $this->conn->lastInsertId();
     
   }
}
