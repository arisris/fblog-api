<?php
// path to composer autoload
require("./vendor/autoload.php");

// php error settings
error_reporting(E_ALL);
ini_set("display_errors", 1);

// constants
define("PATH_BASE", dirname(__FILE__) . "/");
define("PATH_APPLICATION", PATH_BASE . "application/");
define("PATH_RESOURCES", PATH_BASE . "resources/");
define("PATH_JIG", PATH_RESOURCES . "jig-data/");
define("PATH_CACHE", PATH_RESOURCES . "cache/");
define("PATH_LOGS", PATH_RESOURCES . "logs/");
define("PATH_TEMP", PATH_RESOURCES . "tmp/");
define("PATH_LOCALES", PATH_RESOURCES . "locales/");
define("PATH_UPLOADS", PATH_RESOURCES . "uploads/");
define("PATH_UI", PATH_RESOURCES . "ui/");

$app = \Base::instance();
$app->set("DB", new \DB\Jig(PATH_JIG)); // for jig
//$app->set("DB", new \DB\Sql("sqlite:" . PATH_RESOURCES . "data.db")); // for PDO sqlite
//$app->set("DB", new \DB\Sql("host=localhost;port=3306;dbname=mydb", "username", "password", [] /* array of PDO options */)); // for mysql
//$app->set("DB", new \DB\Mongo("mongodb://localhost:27017","testdb"); // for mongodb
$app->set("CACHE", "folder=" . PATH_CACHE);
$app->set("PATH_APPLICATION", PATH_APPLICATION);
$app->set("LOGS", PATH_LOGS);
$app->set("TEMP", PATH_TEMP);
$app->set("UPLOADS", PATH_UPLOADS);
$app->set("LOCALES", PATH_LOCALES);
$app->set("UI", PATH_UI);
$app->config(PATH_APPLICATION . "config.ini");
if (php_sapi_name() === "cli") {
  $app->config(PATH_APPLICATION . "routes.cli.ini");
} else {
  $app->config(PATH_APPLICATION . "routes.web.ini");
}
$app->run();
