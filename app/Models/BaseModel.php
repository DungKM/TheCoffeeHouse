<?php

namespace App\Models;

use PDO;

class BaseModel
{

  protected $conn;
  protected $sqlBuilder;

  public function __construct()
  {
    try {

      $this->conn = new PDO("mysql:host=localhost;dbname=duan1;charset=utf8", "root", "");
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (\PDOException $e) {
      throw $e->getMessage();
    }
  }

  // function all() : lấy ra dữ liệu của bảng -> static lấy dữ liệu trực tiếp từ lớp đó
  // this ko tồn tại trong phương thức tĩnh static
  public static function all()
  {
    $model = new static;
    $model->sqlBuilder = "SELECT *FROM $model->tableName ORDER BY id DESC";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $result;
  }
  // Top 3 first product
  public static function top3_new_product(){
    $model = new static;
    $model->sqlBuilder = "SELECT *FROM $model->tableName ORDER BY id DESC LIMIT 0, 3";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $result;
  }
  // Top 6 first product
  public static function top6_new_product(){
    $model = new static;
    $model->sqlBuilder = "SELECT *FROM $model->tableName ORDER BY id DESC LIMIT 0, 6";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $result;
  }

  // function insert : thêm dữ liệu
  // params : $data là 1 mảng dữ liệu có cấu trúc như sau
  // $data = [name => 'dungha',age => 40, address=> 'Hà Nội',...]

  // Thêm dữ liệu
  public function insert($data = [])
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
    $stmt->execute($data);
  }
 

  public static function findOne($id)
  {
    $model = new static;
    $model->sqlBuilder = "SELECT * FROM $model->tableName WHERE id = '$id'";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));
    if ($result) {
      return $result[0];
    }
    return false;
  }

  public function update($id, $data = [])
  {
    $this->sqlBuilder = "UPDATE $this->tableName SET";
    foreach ($data as $colName => $value) {
      $this->sqlBuilder .= "`$colName`=:$colName, ";
    }
    $this->sqlBuilder = rtrim($this->sqlBuilder, ", ");
    $this->sqlBuilder .= " WHERE id=:id";
    echo $this->sqlBuilder;
    $data['id'] = $id;

    $stmt = $this->conn->prepare($this->sqlBuilder);
    $stmt->execute($data);
  }

  public function delete($id)
  {
    $this->sqlBuilder = "DELETE FROM $this->tableName WHERE id=$id";
    $stmt = $this->conn->prepare($this->sqlBuilder);
    $stmt->execute();
  }

  public function where($colName, $condition, $value)
  {
    $this->sqlBuilder = "SELECT * FROM $this->tableName WHERE `$colName` $condition '$value'";
    return $this;
  }
  public function andWhere($colName, $condition, $value)
  {
    $this->sqlBuilder .= " AND `$colName` $condition '$value' ";
    return $this;
  }
  public function orWhere($colName, $condition, $value)
  {
    $this->sqlBuilder .= " OR `$colName` $condition '$value' ";
    return $this;
  }
  public function get()
  {
    $stmt = $this->conn->prepare($this->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $result;
  }
}
