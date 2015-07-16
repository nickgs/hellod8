<?php
/**
 * Our first Drupal 8 controller.
 */
namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\hello\HelloService;
use Symfony\Component\DependencyInjection\ContainerInterface;

class HelloController extends ControllerBase {
    
  protected $helloServ;

  //our contructor is injected with our service.
  public function __construct(HelloService $s) {
    $this->helloServ = $s;
  }
  
  //This is the interesting method. ControllerBase will call this.
  public static function create(ContainerInterface $container) {
    //and create an instance of this class, injecting our service!
    return new static($container->get('hello.hello_service'));
  }
  
  public function sayHi($name) {
    $count = $this->config("hello.settings")->get("default_count");
    $phrase = $this->config("hello.settings")->get("phrase");
    $output = "";
 
    for($i=0; $i < $count; $i++) {
        $output .= "{$phrase} <hr/>";
    }
    
    return array(
        '#markup'=>$output,
      );
  }
  
  public function sayHiTheme($name) {
    $this->helloServ->doSomeWork();
    
    return array(
        '#theme'=>'say_hello',
        '#name' => $name,
      );
  }
}