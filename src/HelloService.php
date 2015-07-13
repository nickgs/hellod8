<?php

namespace Drupal\hello;

class HelloService {

  public function doSomeWork() {
    //some heavy lifting.
    drupal_set_message("Hello Services");
  }
}
