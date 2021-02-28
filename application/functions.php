<?php
if (!function_exists("dump")) {
  function dump() {
    $o = "";
    foreach (func_get_args() as $val) {
      $o .= print_r($val, true) . PHP_EOL;
    }
    return \Base::instance()->CLI
      ? PHP_EOL . $o . PHP_EOL
      : "<pre>" . PHP_EOL . $o . "</pre>";
  }
}
