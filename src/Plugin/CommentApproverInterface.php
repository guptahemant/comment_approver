<?php

namespace Drupal\comment_approver\Plugin;

use Drupal\Component\Plugin\PluginInspectionInterface;

/**
 * Defines an interface for Comment approver plugins.
 */
interface CommentApproverInterface extends PluginInspectionInterface {

  /**
   * Return the name of the ice cream flavor.
   *
   * @return string
   */
  public function getLabel();

  /**
   * Returns the description of Comment Approver.
   *
   * @return string
   */
  public function getDescription();

  /**
   * Returns True if comment is ok.
   *
   * @return boolean
   */
  public function isCommentFine($comment);

}
