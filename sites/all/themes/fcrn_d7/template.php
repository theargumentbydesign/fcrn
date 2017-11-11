<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 *
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */





function fcrn_d7_form_alter(&$form, &$form_state, $form_id) {
if ($form_id == 'user_login_block') {
$form['links']['#markup'] = ' <a class="user-register" href="/user/register">' . t('Create new account') . '</a>' . ' <a class="user-password" href="/user/password">' . t('Forgotten Password?') . '</a>' . ' <a class="fb-connect" href="user/simple-fb-connect">' . t('Sign in with Facebook') . '</a>';
}

unset($form['account']['current_pass']);
unset($form['account']['current_pass_required_values']);
$form['#validate'] = array_diff($form['#validate'], array('user_validate_current_pass'));

}



/**
 * Theme the loggedinblock that shows for logged-in users.
 */
function fcrn_d7_lt_loggedinblock($variables){
  return l(t('MY ACCOUNT'), 'user/me') .'  ' . l(t('Log out'), 'user/logout');
}



function forum_thread_icon_path() {
  return "/sites/default/themes/fcrn_d7/img/forum/";
}


/**
 * Implements hook_menu_local_tasks_alter().
 */
function fcrn_d7_menu_local_tasks_alter(&$data, $router_item, $root_path) {
  global $user;
switch($root_path){
    case 'forum/%' : // for example 'page/view/news'
      $item = menu_get_item('forum');
      if ($item['access']) {
        $data['actions']['output'][] = array(
          '#theme' => 'menu_local_action',
          '#link' => $item,
        );
      }
    break;
  }
}
 
function fcrn_d7_menu_link(array $variables) {
	
  $element = $variables['element'];
  $sub_menu = '';
$custom_class = str_replace(' ','-',strtolower(check_plain($element['#title'])));
$element['#attributes']['class'][] = $custom_class;
  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}


function fcrn_d7_form_comment_form_alter(&$form, &$form_state) {
	$form['your_comment'] = array(
	 '#type' => 'fieldset',
	  '#collapsed' => FALSE,
	  '#weight' => 2, 
		); 
	 $form['your_comment']['subject'] = $form['subject']; 
	 unset($form['subject']); 
	 $form['your_comment']['subject']['#weight'] = -10; 
	  $form['your_comment']['comment_body'] = $form['comment_body']; 
	  unset($form['comment_body']); 
	  $form['author']['homepage']['#access'] = FALSE; 
	  $form['author']['mail']['#required'] = TRUE; 
	  }
	  
	  
	    
	  
	  

   
function fcrn_d7_form_user_register_form_alter(&$form, &$form_state,$form_id) {
// Only show name field on registration form or user can change own username.
  $form['account']['name'] = array(
    '#type' => 'textfield',
    '#title' => t('Choose a username'),
    '#maxlength' => USERNAME_MAX_LENGTH,
    '#description' => t('This will be your login name. Use only letters, numbers, spaces, hyphens and underscores.'),
    '#required' => TRUE,
    '#attributes' => array('class' => array('username')),
  );

  $form['account']['mail'] = array(
    '#type' => 'textfield',
    '#title' => t('Your email'),
    '#maxlength' => EMAIL_MAX_LENGTH,
    '#description' => t('A valid e-mail address that we can use to contact you. This is not made public and will only be used for password resets, or to receive news or notifications by e-mail.'),
    '#required' => TRUE,
    '#default_value' => (!$register ? $account->mail : ''),
  );
}

function  fcrn_d7_filter_tips($tips, $long = FALSE, $extra = '') {
  return '';
}
function  fcrn_d7_filter_tips_more_info () {
  return '';
}

	 function fcrn_d7_theme(&$existing, $type, $theme, $path){
  $hooks = array();
   // Make user-register.tpl.php available
  $hooks['user_register_form'] = array (
     'render element' => 'form',
     'path' => drupal_get_path('theme','fcrn_d7'),
     'template' => 'templates/user-register',
     'preprocess functions' => array('fcrn_d7_preprocess_user_register_form'),
  );
  return $hooks;
}

function fcrn_d7_preprocess_user_register_form(&$vars) {
  $args = func_get_args();
  array_shift($args);
  $form_state['build_info']['args'] = $args; 
  $vars['form'] = drupal_build_form('user_register_form', $form_state['build_info']['args']);
} 
