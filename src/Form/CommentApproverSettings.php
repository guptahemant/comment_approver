<?php

namespace Drupal\comment_approver\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\comment_approver\Plugin\CommentApproverManager;
use Drupal\comment_approver\CommentTesterInterface;

/**
 * Class CommentApproverSettings.
 */
class CommentApproverSettings extends ConfigFormBase {

  /**
   * Drupal\comment_approver\Plugin\CommentApproverManager definition.
   *
   * @var \Drupal\comment_approver\Plugin\CommentApproverManager
   */
  protected $pluginManagerCommentApprover;

  /**
   * Constructs a new CommentApproverSettings object.
   */
  public function __construct(
    ConfigFactoryInterface $config_factory,
      CommentApproverManager $plugin_manager_comment_approver
    ) {
    parent::__construct($config_factory);
    $this->pluginManagerCommentApprover = $plugin_manager_comment_approver;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('plugin.manager.comment_approver')
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'comment_approver.commentapproversettings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'comment_approver_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('comment_approver.commentapproversettings');
    $plugins = $this->pluginManagerCommentApprover->getDefinitions();
    $options = [];
    $options_description = [];

    foreach ($plugins as $plugin) {
      $options[$plugin['id']] = $plugin['label'];
      $options_description[$plugin['id']]['#description'] = $plugin['description'];
    }

    $form['select_tests_to_perform'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Select tests to perform'),
      '#description' => $this->t('Select the tests which will be performed on a comment to publish/unpublish them automatically'),
      '#options' => $options,
      '#default_value' => $config->get('select_tests_to_perform') ? $config->get('select_tests_to_perform') : array_keys($options),
    ];
    $form['select_tests_to_perform'] += $options_description;

    $options_mode = [
      CommentTesterInterface::DEFAULT => $this->t('Bypass the comment approver'),
      CommentTesterInterface::APPROVER => $this->t('Work as comment approver'),
      CommentTesterInterface::BLOCKER => $this->t('Work as comment blocker'),
    ];
    $options_mode_description = [
      CommentTesterInterface::DEFAULT => ['#description' => $this->t('Default drupal flow will be followed')],
      CommentTesterInterface::APPROVER => ['#description' => $this->t('If all tests passes then the comment is approved')],
      CommentTesterInterface::BLOCKER => ['#description' => $this->t('If any test fails then comment is blocked')],
    ];
    $form['mode'] = [
      '#type' => 'radios',
      '#title' => $this->t('Mode of operation'),
      '#description' => $this->t('Select the mode in which this module works'),
      '#options' => $options_mode,
      '#default_value' => $config->get('mode') ? $config->get('mode') : CommentTesterInterface::APPROVER,
    ];
    $form['mode'] += $options_mode_description;
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('comment_approver.commentapproversettings')
      ->set('select_tests_to_perform', $form_state->getValue('select_tests_to_perform'))
      ->set('mode', $form_state->getValue('mode'))
      ->save();
  }

}
