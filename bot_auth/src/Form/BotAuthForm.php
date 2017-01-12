<?php

/**
*@file
*contains \Drupal\bot\bot_auth\Form\BotAuthForm
*/

namespace Drupal\bot_auth\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class BotAuthForm extends ConfigFormBase {

  /**
  *{@inheridoc}
  */
  public function getFormId() {
    return 'bot_auth_form';
  }
 
  public function buildForm(array $form, FormStateInterface $form_state){
  
  
  
  
  
  
  
  
    return parent::buildForm($form, $form_state);
  }
  
  /**
  *{@inheridoc}
  */
  public function submitForm(array &$form, FormStateInterface $form_state){
    parent::submitForm($form, $form_state)
    
    $bot_drupal_api_function_dumps= $form_state->getValue('bot_drupal_api_function_dumps');
    $bot_drupal_api_function_dump_update_frequency= $form_state->getValue('bot_drupal_api_function_dump_update_frequency');
}
