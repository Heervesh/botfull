<?php

/**
*@file
*contains \Drupal\bot\Form\bot_form
*/

namespace Drupal\bot\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class bot_form extends ConfigFormBase {

  /**
  *{@inheridoc}
  */
  public function getFormId() {
    return 'bot_form';
  }
 
  public function buildForm(array $form, FormStateInterface $form_state){
    $form['bot_server'] = array(
      '#default_value' => $config->get('bot_server', 'irc.freenode.net'),
      '#description'   => t('Enter the IRC server the bot will connect to.'),
      '#title'         => t('IRC server'),
      '#type'          => 'textfield',
    );
    $form['bot_server_port'] = array(
      '#default_value' => $config->get('bot_server_port', 6667),
      '#description'   => t('Enter the IRC port of the IRC server. 6667 is the most common configuration.'),
      '#title'         => t('IRC server port'),
      '#type'          => 'textfield',
    );
    $form['bot_nickname'] = array(
      '#default_value' => $config->get('bot_nickname', 'bot_module'),
      '#description'   => t('Enter the nickname the bot will login as.'),
      '#title'         => t('Bot nickname'),
      '#type'          => 'textfield',
    );
    $form['bot_channels'] = array(
      '#default_value' => $config->get('bot_channels', '#test'),
      '#description'   => t('Enter a comma-separated list of channels the bot will automatically join.'),
      '#rows'          => 3,
      '#title'         => t('Bot channels'),
      '#type'          => 'textarea',
    );
    $form['bot_debugging'] = array(
      '#default_value' => $config->get('bot_debugging', 0), // spits out a TON of (useful) stuff.
      '#description'   => t('If checked, send Net_SmartIRC\'s SMARTIRC_DEBUG_ALL to the shell.'),
      '#options'       => array('0' => t('No'), '1' => t('Yes')),
      '#title'         => t('Enable debugging'),
      '#type'          => 'checkbox',
    );
    
    return parent::buildForm($form, $form_state);
  }

  /**
  *{@inheridoc}
  */
  public function submitForm(array &$form, FormStateInterface $form_state){
    parent::submitForm($form, $form_state);
    
    $bot_server= $form_state->getValue('bot_server');
    $bot_server_port= $form_state->getValue('bot_server_port');
    $bot_nickname= $form_state->getValue('bot_nickname');
    $bot_channels= $form_state->getValue('bot_channels');
    $bot_debugging= $form_state->getValue('bot_debugging');
  }
}
