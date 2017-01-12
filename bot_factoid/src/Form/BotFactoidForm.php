<?php

/**
*@file
*contains \Drupal\bot\bot_factoid\Form\BotFactoidForm
*/

namespace Drupal\bot\bot_factoid\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class BotFactoidForm extends ConfigFormBase {

  /**
  *{@inheridoc}
  */
  public function getFormId() {
    return 'bot_factoid_form';
  }
 
  public function buildForm(array $form, FormStateInterface $form_state){
    $form['bot_factoid_stopwords'] = array(
      '#default_value' =>$config->get('bot_factoid_stopwords', _bot_factoid_stopwords()),
      '#description'   => t('List the words that cannot be the subject of a factoid.'),
      '#rows'          => 15,
      '#title'         => $this =>t('Stopwords'),
      '#type'          => 'textarea',
    );
    
    return parent::buildForm($form, $form_state);
  }
  
  /**
  *{@inheridoc}
  */
  public function submitForm(array &$form, FormStateInterface $form_state){
     parent::submitForm($form, $form_state)
    
     $bot_factoid_stopwords= $form_state->getValue('bot_factoid_stopwords');
     

  }
}
