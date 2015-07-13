<?php

/**
 * @file
 * Contains \Drupal\hello\Plugin\Block\HelloBlock
 */

namespace Drupal\hello\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Hello' block.
 *
 * @Block(
 *   id = "hello_block",
 *   admin_label = @Translation("Hello block"),
 * )
 */
class HelloBlock extends BlockBase {
  public function build() {
    return array(
      '#markup' => $this->t("This is a an awesome block!"),
    );
  }
}
