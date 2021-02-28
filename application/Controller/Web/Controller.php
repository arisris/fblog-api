<?php
namespace App\Controller\Web;

class Controller extends \App\Controller\Controller {
  function f3() {
    echo \dump(\Base::instance());
  }
}