<?php
namespace App\Model;

class Users extends Model {
  protected $table = "users";
  protected $fieldConf = [
    "name" => [
      "type" => "VARCHAR256",
      "nullable" => false,
      "required" => true,
    ],
    "mail" => [
      "type" => "VARCHAR256",
      "nullable" => false,
      "required" => true,
      "index" => true
    ],
    "password" => [
      "type" => "VARCHAR256",
      "nullable" => false,
      "required" => true
    ],
    "reset_token" => [
      "type" => "VARCHAR512"
    ],
    "photoUrl" => [
      "type" => "VARCHAR512",
      "nullable" => false,
      "default" => "/user.jpg"
    ],
    "posts" => [
      "has-many" => [Posts::class, "author"]
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