<?php
namespace App\Model;

class PostsComments extends Model {
  protected $table = "posts_comments";
  protected $fieldConf = [
    "author_name" => [
      "type" => "VARCHAR128",
      "required" => true,
      "nullable" => false
    ],
    "author_mail" => [
      "type" => "VARCHAR128",
      "required" => true,
      "nullable" => false
    ],
    "posts" => [
      "belongs-to-one" => Posts::class
    ],
    "replies" => [
      "has-many" => [PostsComments::class, "replies"]
    ],
    "body" => [
      "type" => "TEXT"
    ],
    "approved" => [
      "type" => "INT1"
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