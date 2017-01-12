<?php

/**
*@file
*contains \Drupal\bot\bot_karma\Form\BotKarmaForm
*/

namespace Drupal\bot\bot_karma\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class BotKarmaForm  extends ConfigFormBase {

  /**
  *{@inheridoc}
  */
  public function getFormId() {
    return 'bot_karma_form';
  }
  public function buildForm(array $form, FormStateInterface $form_state){
    $form['#prefix'] = t('The following variables are available for use in responses: !who, !channel.');

    $form['bot_karma_self_responses'] = array(
      '#default_value' => $config->get('bot_karma_self_responses', _bot_karma_self_responses()),
      '#description'   => t('List the randomized responses, one per line, when a user attempts to karma themselves.'),
      '#title'         => $this =>t('Self-karma responses'),
      '#type'          => 'textarea',
    );
    
    return parent::buildForm($form, $form_state);
  }
  
  /**
  *{@inheridoc}
  */
  public function submitForm(array &$form, FormStateInterface $form_state){
    parent::submitForm($form, $form_state)
    
    $bot_karma_self_responses= $form_state->getValue('bot_karma_self_responses');

  }
  
}
