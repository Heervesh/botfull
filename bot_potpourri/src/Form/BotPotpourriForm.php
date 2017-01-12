<?php

/**
*@file
*contains \Drupal\bot\bot_potpourri\Form\BotPotpourriForm
*/

namespace Drupal\bot\bot_potpourri\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class BotPotpourriForm extends ConfigFormBase {

  /**
  *{@inheridoc}
  */
  public function getFormId() {
    return 'bot_potpourri_form';
  }
  public function buildForm(array $form, FormStateInterface $form_state){
  
  
  
    return parent::buildForm($form, $form_state);
  } 
}
