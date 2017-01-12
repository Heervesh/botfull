<?php

/**
*@file
*contains \Drupal\bot\bot_aggregator\Form\BotAggregatorForm
*/

namespace Drupal\bot\bot_aggregator\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class BotAggregatorForm extends ConfigFormBase {

  /**
  *{@inheridoc}
  */
  public function getFormId() {
    return 'bot_aggregator_form';
  }
 
  public function buildForm(array $form, FormStateInterface $form_state){
    $form['redirection'] = array(
     '#markup' => '<p>' . t('To define which channels an aggregated feed is reported to, edit the <a href="@url">feed configuration itself</a>.',
       array('@url' => url('admin/config/services/aggregator'))) . '</p>', // just a helpful bit of redirection in lieu of a README no one will see.
    );
    
    return parent::buildForm($form, $form_state);
  }
  
  /**
  *{@inheridoc}
  */
  public function submitForm(array &$form, FormStateInterface $form_state){
    parent::submitForm($form, $form_state);
    
    $bot_drupal_api_function_dumps= $form_state->getValue('bot_drupal_api_function_dumps');
    $bot_drupal_api_function_dump_update_frequency= $form_state->getValue('bot_drupal_api_function_dump_update_frequency');
  }
}
