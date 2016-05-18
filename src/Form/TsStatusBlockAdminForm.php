<?php

/**
 * @file
 * Contains \Drupal\ts_status_block\Form\TsStatusBlockAdminForm.
 */

namespace Drupal\ts_status_block\Form;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Path\AliasManagerInterface;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Path\PathValidatorInterface;
use Drupal\Core\Routing\RequestContext;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides form for ts control popup.
 */
class TsStatusBlockAdminForm extends ConfigFormBase {

  /**
   * The path alias manager.
   *
   * @var \Drupal\Core\Path\AliasManagerInterface
   */
  protected $aliasManager;

  /**
   * The path validator.
   *
   * @var \Drupal\Core\Path\PathValidatorInterface
   */
  protected $pathValidator;

  /**
   * The request context.
   *
   * @var \Drupal\Core\Routing\RequestContext
   */
  protected $requestContext;

  /**
   * Constructs an TsStatusBlockAdminForm object.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The factory for configuration objects.
   * @param \Drupal\Core\Path\AliasManagerInterface $alias_manager
   *   The path alias manager.
   * @param \Drupal\Core\Path\PathValidatorInterface $path_validator
   *   The path validator.
   * @param \Drupal\Core\Routing\RequestContext $request_context
   *   The request context.
   */
  public function __construct(ConfigFactoryInterface $config_factory, AliasManagerInterface $alias_manager, PathValidatorInterface $path_validator, RequestContext $request_context) {
    parent::__construct($config_factory);

    $this->aliasManager = $alias_manager;
    $this->pathValidator = $path_validator;
    $this->requestContext = $request_context;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('path.alias_manager'),
      $container->get('path.validator'),
      $container->get('router.request_context')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ts_status_block_admin_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'ts_status_block.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $config = $this->config('ts_status_block.settings');

    $form['ts_status_block'] = array(
      '#type'  => 'details',
      '#title' => t('Settings'),
      '#open' => TRUE,
    );

    $form['ts_status_block']['ip_message'] = array(
      '#type' => 'textfield',
      '#title' => t('Put the ip of the server'),
      '#size' => 30,
      '#required' => TRUE,
    );

    $form['ts_status_block']['port_message'] = array(
      '#type' => 'textfield',
      '#title' => t('Put the port of the server'),
      '#size' => 30,
      '#required' => TRUE,
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('ts_status_block.settings')
      ->set('ip_message', $form_state->getValue('ip_message'))
      ->set('port_message', $form_state->getValue('port_message'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
