<?php

namespace App\Models;

use PDO;

 class Comment extends BaseModel {
    protected $tableName = 'comments';

    public static function loadall_comments($id_pro){
      $model = new static;
      $model->sqlBuilder ="select * from comments where 1";
      if($id_pro > 0) $model->sqlBuilder .= " AND id_pro='".$id_pro."'";
      else
      $model->sqlBuilder .= " order by id desc";
      $stmt = $model->conn->prepare($model->sqlBuilder);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_CLASS);
      return $result;
  }
 }

