<?php

namespace Drupal\comment_approver\Plugin;

use Drupal\Component\Plugin\PluginBase;

/**
 * Base class for Comment approver plugins.
 */
abstract class CommentApproverBase extends PluginBase implements CommentApproverInterface {

  /**
   * {@inheritdoc}
   */
  public function getLabel() {
    return $this->pluginDefinition['label'];
  }

  /**
   * {@inheritdoc}
   */
  public function getDescription() {
    return $this->pluginDefinition['description'];
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm() {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function getConfiguration() {
    return $this->configuration ? $this->configuration : $this->defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function setConfiguration(array $configuration) {
    $this->configuration = $configuration;
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function calculateDependencies() {
    return [];
  }

}
