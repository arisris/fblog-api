<?php
namespace App\Model;

class PostsCategories extends Model {
  protected $table = "posts_categories";
  protected $fieldConf = [
    "name" => [
      "type" => "VARCHAR256",
      "nullable" => false,
      "required" => true
    ],
    "posts" => [
      "has-many" => [Posts::class, "categories"]
    ],
    "created_at" => [
      "type" => "TIMESTAMP"
    ],
    "updated_at" => [
      "type" => "TIMESTAMP",
      "default" => "CUR_STAMP"
    ]

  ];
}