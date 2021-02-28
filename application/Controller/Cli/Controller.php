<?php
namespace App\Controller\Cli;
use Ahc\Cli\Output\Writer;
use Sabre\Event\Promise;
use Sabre\Event\Loop;
use App\Model;

class Controller extends \App\Controller\Controller {
  protected $writer;
  protected $color;
  function __construct() {
    $this->writer = new Writer();
  }
  function serve($app) {
    $host = $app->get("GET.host") ?? "127.0.0.1";
    $port = $app->get("GET.port") ?? 8000;
    $target = $app->get("GET.target") ?? "./";
    $this->writer->colors("<whiteBold>Web Server is running at:</end> <greenBold>http://". $host . ":" . $port . "</end><eol/>Type Ctrl+C to close.....<eol/>");
    \exec("php -S ". $host . ":" . $port . " -t " . $target);
  }
  function db_setup() {
    $models = [
      Model\Users::class,
      Model\Posts::class,
      Model\PostsCategories::class,
      Model\PostsTags::class,
      Model\PostsComments::class
    ];
    $id = 0;
    while (isset($models[$id])) {
      try {
        $this->writer->colors("<green>Setup Model:</end> {$models[$id]}<eol/>");
        call_user_func($models[$id] . "::setup");
      } catch (\Exception $e) {
        $this->writer->warn($e->getMessage(), true);
        exit(1);
      }
      if ($id === count($models)-1) $this->writer->colors(PHP_EOL . "Done.....". str_repeat(PHP_EOL, 3));
      $id++;
      sleep(1);
    }
  }
}