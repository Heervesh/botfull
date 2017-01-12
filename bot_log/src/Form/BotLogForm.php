<?php

/**
*@file
*contains \Drupal\bot\bot_log\Form\BotLogForm
*/

namespace Drupal\bot\bot_log\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class BotLogForm extends ConfigFormBase {

  /**
  *{@inheridoc}
  */
  public function getFormId() {
    return 'bot_log_form';
  }
 
  public function buildForm(array $form, FormStateInterface $form_state){
    // get a list of all joined channels, sans passwords.
    $joined_channels = preg_split('/\s*,\s*/', $config->get('bot_channels', '#test'));
    $channel_options = array(); // HOW MAY I HELP YOU!?
    foreach ($joined_channels as $k => $v) {
    $channel = preg_replace('/(.*) .*/', '\1', $v);
    $channel_options[$channel] = $channel;
   }

    // we don't use checkboxes because it doesn't want
    // to accept an array key name of "#channel".
    $form['bot_log_channels'] = array (
      '#default_value'  => $config->get('bot_log_channels', array()),
      '#description'    => t('Select the channels to log.'),
      '#multiple'       => TRUE,
      '#options'        => $channel_options,
      '#size'           => 10,
      '#type'           => 'select',
      '#title'          => t('IRC channels'),
    );

    // @todo if we've been logging a channel, but no longer join it, the logs
    // become unaccessible. frando solved this by doing a non-scalable DISTINCT
    // across the entire log table. we should do this only on the admin page and
    // let the user decide which now-not-logged channels to show publicly. we
    // then would add these channels to all lookups of var bot_log_channels.
  }
  /**
  *{@inheridoc}
  */
  public function submitForm(array &$form, FormStateInterface $form_state){
    parent::submitForm($form, $form_state)
    
    $bot_log_channels= $form_state->getValue('bot_log_channels');
  }
 
}
