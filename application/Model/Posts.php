<?php
namespace App\Model;

class Posts extends Model {
  protected $table = "posts";
  protected $fieldConf = [
    "name" => [
      "type" => "VARCHAR256",
      "nullable" => false,
      "required" => true
    ],
    "image" => [
      "type" => "VARCHAR256"
    ],
    "slug" => [
      "type" => "VARCHAR256",
      "nullable" => false,
      "required" => true,
      "index" => true
    ],
    "body" => [
      "type" => "LONGTEXT"
    ],
    "published" => [
      "type" => "VARCHAR128",
      "nullable" => false,
      "default" => "publish"
    ],
    "comments_enabled" => [
      "type" => "BOOLEAN",
      "default" => true
    ],
    "comments" => [
      "has-many" => [PostsComments::class, "posts"]
    ],
    "categories" => [
      "has-many" => [PostsCategories::class, "posts"]
    ],
    "tags" => [
      "has-many" => [PostsTags::class, "posts"]
    ],
    "author" => [
      "belongs-to-one" => Users::class
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