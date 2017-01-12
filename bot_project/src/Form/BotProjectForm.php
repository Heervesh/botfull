<?php

/**
*@file
*contains \Drupal\bot\bot_project\Form\BotProjectForm
*/

namespace Drupal\bot\bot_project\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class BotProjectForm extends ConfigFormBase {

  /**
  *{@inheridoc}
  */
  public function getFormId() {
    return 'bot_project_form';
  }
 
  public function buildForm(array $form, FormStateInterface $form_state){
    $form['bot_project_project'] = array(
      '#collapsible'   => TRUE,
      '#title'         => t('project.module integration'),
      '#type'          => 'fieldset',
    );
    $form['bot_project_project']['bot_project_project_enable'] = array(
      '#default_value' =>$config->get('bot_project_project_enable', FALSE),
      '#title'         => t('Enable project.module issue lookups'),
      '#type'          => 'checkbox',
    );
    $form['bot_project_project']['bot_project_project_url_regexp'] = array(
      '#default_value' =>$config->get('bot_project_project_url_regexp', NULL),
      '#description'   => t('Lookup issues when matched in conversation (ex. %example).', array('%example' => 'http://[\w\d\-]*?\.?drupal\.org/node/\d+')),
      '#title'         => t('URL regexp for issue lookups'),
      '#type'          => 'textfield',
    );
    $form['bot_project_project']['bot_project_project_url'] = array(
      '#default_value' =>$config->get('bot_project_project_url', NULL),
      '#description'   => t('Define the base URL used with node ID issue lookups (ex. %example).', array('%example' => 'http://drupal.org/')),
      '#title'         => t('Base URL (for node ID lookups)'),
      '#type'          => 'textfield',
    );
    $form['bot_project_project']['bot_project_project_nid_min'] = array(
      '#default_value' =>$config->get('bot_project_project_nid_min', 0),
      '#description'   => t('Lookup issues ("#1234" or "1234" as the entire message) at the base URL larger than this node ID.'),
      '#title'         => t('Minimum node ID for lookups'),
      '#type'          => 'textfield',
    ); 
    $form['bot_project_project']['bot_project_project_nid_max'] = array(
      '#default_value' =>$config->get('bot_project_project_nid_max', 99999),
      '#description'   => t('Lookup issues ("#1234" or "1234" as the entire message) at the base URL smaller than this node ID.'),
      '#title'         => t('Maximum node ID for lookups'),
      '#type'          => 'textfield',
    );

    $form['bot_project_trac'] = array(
       '#collapsible'   => TRUE,
       '#title'         => t('Trac integration'),
       '#type'          => 'fieldset',
    );
    $form['bot_project_trac']['bot_project_trac_enable'] = array(
      '#default_value' =>$config->get('bot_project_trac_enable', FALSE),
      '#title'         => t('Enable Trac lookups'),
      '#type'          => 'checkbox',
    );
    $form['bot_project_trac']['bot_project_trac_url_regexp'] = array(
      '#default_value' =>$config->get('bot_project_trac_url_regexp', NULL),
      '#description'   => t('Lookup data when matched in conversation (ex. %example).', array('%example' => 'http://www.example.com/trac/(changeset|ticket)/\d+')),
      '#title'         => t('URL regexp for data lookups'),
      '#type'          => 'textfield',
    );
    $form['bot_project_trac']['bot_project_trac_url'] = array(
      '#default_value' =>$config->get('bot_project_trac_url', NULL),
      '#description'   => t('Define the base URL used with numerical lookups (ex. %example).', array('%example' => 'http://www.example.com/trac/')),
      '#title'         => t('Base URL (for numerical lookups)'),
      '#type'          => 'textfield',
    );
    $form['bot_project_trac']['bot_project_trac_num_min'] = array(
      '#default_value' =>$config->get('bot_project_trac_num_min', 0),
      '#description'   => t('Lookup data ("#1234", "1234", or "r1234" as the entire message) at the base URL larger than this number.'),
      '#title'         => t('Minimum numerical value for lookups'),
      '#type'          => 'textfield',
    );
    $form['bot_project_trac']['bot_project_trac_num_max'] = array(
      '#default_value' =>$config->get('bot_project_trac_num_max', 99999),
      '#description'   => t('Lookup data ("#1234", "1234", or "r1234" as the entire message) at the base URL smaller than this number.'),
      '#title'         => t('Maximum numerical for lookups'),
      '#type'          => 'textfield',
   );
   
   return parent::buildForm($form, $form_state);
  }
  
   /**
   *{@inheridoc}
   */
   public function submitForm(array &$form, FormStateInterface $form_state){
     parent::submitForm($form, $form_state)
    
     $bot_project_project= $form_state->getValue('bot_project_project');
     $bot_project_project_enable= $form_state->getValue('bot_project_project_enable');
     $bot_project_project_url_regexp= $form_state->getValue('bot_project_project_url_regexp');
     $bot_project_project_url= $form_state->getValue('bot_project_project_url');
     $bot_project_project_nid_min= $form_state->getValue('bot_project_project_nid_min');
     $bot_project_project_nid_max= $form_state->getValue('bot_project_project_nid_max');
     $bot_project_trac= $form_state->getValue('bot_project_trac');
     $bot_project_trac_enable= $form_state->getValue('bot_project_trac_enable');
     $bot_project_trac_url_regexp= $form_state->getValue('bot_project_trac_url_regexp');
     $bot_project_trac_num_min= $form_state->getValue('bot_project_trac_num_min');
     $bot_project_trac_num_max= $form_state->getValue('bot_project_trac_num_max');
     
   
   
   } 
}
