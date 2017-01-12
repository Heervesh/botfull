<?php

/**
*@file
*contains \Drupal\bot_agotchi\Form\BotAgotchiForm
*/

namespace Drupal\bot_agotchi\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class  botagotchiform extends ConfigFormBase {

  /**
  *{@inheridoc}
  */
  public function getFormId() {
    return 'bot_agotchi_form';
  }
  
  public function buildForm(array $form, FormStateInterface $form_state){

    $form['#prefix'] = t('The following variables are available for use in responses: !nick, !channel.');

    $form['bot_agotchi_feeding_responses'] = array(
      '#default_value' => $config->get('bot_agotchi_feeding_responses', _bot_agotchi_feeding_responses()),
      '#description'   => t('List the responses, one per line, your botagotchi will say when fed a botsnack.'),
      '#title'         => $this =>t('Feeding responses'),
      '#type'          => 'textarea',
    );
    $form['bot_agotchi_greeting_responses'] = array(
      '#default_value' => $config->get('bot_agotchi_greeting_responses', _bot_agotchi_greeting_responses()),
      '#description'   => t('List the responses, one per line, your botagotchi will say when it hears a greeting.'),
      '#title'         => $this =>t('Greeting responses'),
      '#type'          => 'textarea',
    );
    $form['bot_agotchi_greeting_randomness'] = array(
      '#default_value' => $config->get('bot_agotchi_greeting_randomness', 65),
      '#description'   => t('The percentage that your botagotchi will actually respond to a heard greeting.'),
      '#title'         => $this =>t('Greeting randomness'),
      '#type'          => 'textfield',
    );
    $form['bot_agotchi_thankful_responses'] = array(
      '#default_value' => $config->get('bot_agotchi_thankful_responses', _bot_agotchi_thankful_responses()),
      '#description'   => t('List the responses, one per line, your botagotchi will say when it has been thanked.'),
      '#title'         => $this =>t('Thankful responses'),
      '#type'          => 'textarea',
    );
    
    return parent::buildForm($form, $form_state);
   }
   
   /**
  *{@inheridoc}
  */
  public function submitForm(array &$form, FormStateInterface $form_state){
    parent::submitForm($form, $form_state);
    
    $bot_agotchi_feeding_responses= $form_state->getValue('bot_agotchi_feeding_responses');
    $bot_agotchi_greeting_responses= $form_state->getValue('bot_agotchi_greeting_responses');
    $bot_agotchi_greeting_randomness= $form_state->getValue('bot_agotchi_greeting_randomness');
    $bot_agotchi_thankful_responses= $form_state->getValue('bot_agotchi_thankful_responses');
    
    
  }
}
