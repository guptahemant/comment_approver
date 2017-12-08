<?php

namespace Drupal\comment_approver\Plugin;

use Drupal\Component\Plugin\PluginBase;

/**
 * Base class for Comment approver plugins.
 */
abstract class CommentApproverBase extends PluginBase implements CommentApproverInterface {

  /**
   * {inheritdoc}.
   */
  public function getLabel() {
    return $this->pluginDefinition['label'];
  }

  /**
   * {inheritdoc}.
   */
  public function getDescription() {
    return $this->pluginDefinition['description'];
  }

}
