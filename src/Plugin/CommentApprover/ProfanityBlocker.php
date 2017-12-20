<?php

namespace Drupal\comment_approver\Plugin\CommentApprover;

use Drupal\comment_approver\Plugin\CommentApproverBase;

/**
 * Provides a 'vanilla' flavor.
 *
 * @CommentApprover(
 *   id = "profanity_blocker",
 *   label = @Translation("Profanity Blocker"),
 *   description = @Translation("Blocks a comment if it contains profanity words")
 * )
 */
class ProfanityBlocker extends CommentApproverBase {

  /**
   * {@inheritdoc}.
   */
  public function isCommentFine($comment) {
    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm() {
    $config = $this->getConfiguration();
    $myform['testWords'] = array(
      '#type' => 'textfield',
      '#title' => t('Add a comma seperated list of words to test'),
      '#default_value' => $config['testWords'],
    );
    return $myform;
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return ['testWords' => 'shit,hell'];
  }

}
