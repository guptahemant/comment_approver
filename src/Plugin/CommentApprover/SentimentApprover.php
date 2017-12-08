<?php

namespace Drupal\comment_approver\Plugin\CommentApprover;

use Drupal\comment_approver\Plugin\CommentApproverBase;

/**
 * Provides a 'vanilla' flavor.
 *
 * @CommentApprover(
 *   id = "sentiment",
 *   label = @Translation("Sentiment"),
 *   description = @Translation("Use Sentiment api for tests")
 * )
 */
class SentimentApprover extends CommentApproverBase {

  /**
   * {@inheritdoc}.
   */
  public function isCommentFine($comment) {
    return TRUE;
  }

}
