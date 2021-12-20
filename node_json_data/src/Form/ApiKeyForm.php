<?php

namespace Drupal\node_json_data\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ApiKeyForm.
 */
class ApiKeyForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'node_json_data.apikey',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'api_key_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('node_json_data.apikey');
    $form['your_api_key'] = [
      '#type' => 'textfield',
      '#title' => $this->t('your api key'),
      '#maxlength' => 16,
      '#size' => 16,
      '#default_value' => '',
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('node_json_data.apikey')
      ->set('your_api_key', $form_state->getValue('your_api_key'))
      ->save();
  }

}
