<?php

namespace App\Models;

use PDO;

class Products extends BaseModel
{
  protected $tableName = 'products';

  public static function getcategry()
  {
    $model = new static;
    $model->sqlBuilder = "SELECT *,categories.name as namecate,categories.id as idcate FROM products JOIN categories ON products.id_ct = categories.id GROUP BY categories.id";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $result;
  }

  public static function load_similar_products($id, $id_ct)
  {
    $model = new static;
    $model->sqlBuilder = "SELECT * FROM products WHERE id_ct= " . $id_ct . " AND id <>" . $id;
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $result;
  }
  public static function loadal_product($kyw = "", $id_category = 0)
  {
    $model = new static;
    $model->sqlBuilder = "SELECT * FROM products WHERE 1";
    if ($kyw != "") {
      $model->sqlBuilder .= " and name_pro like '%" . $kyw . "%'";
    }
    if ($id_category > 0) {
      $model->sqlBuilder .= " and id_ct ='" . $id_category . "'";
    }
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $result;
  }

  public function updateAmount($newAmount, $id)
  {
    $this->sqlBuilder = "UPDATE `products` SET `number` = '$newAmount' WHERE `products`.`id` = '$id' ";
    $stmt = $this->conn->prepare($this->sqlBuilder);
    $stmt->execute();
  }



  public static function loadall_statistical()
  {
    $model = new static;
    $model->sqlBuilder = "select categories.id as code_category, categories.name as name_catgteory,count(products.id) as count_products, min(products.price) as min_price, max(products.price) as max_price, avg(products.price) as avg_price";
    $model->sqlBuilder .= " from products left join categories on categories.id=products.id_ct";
    $model->sqlBuilder .= " group by categories.id order by categories.id desc";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $result;
  }
}
