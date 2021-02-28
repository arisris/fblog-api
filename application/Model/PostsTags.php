<?php
namespace App\Model;

class PostsTags extends Model {
  protected $table = "posts_tags";
  protected $fieldConf = [
    "name" => [
      "type" => "VARCHAR256",
      "nullable" => false,
      "required" => true
    ],
    "posts" => [
      "has-many" => [Posts::class, "tags"]
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