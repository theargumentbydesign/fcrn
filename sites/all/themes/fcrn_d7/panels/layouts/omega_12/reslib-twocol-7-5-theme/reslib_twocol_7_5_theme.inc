<?php

/**
 * Implements hook_panels_layouts().
 */
$plugin = array(
    'title' => t('Research library two column 7-5'),
    'category' => t('Omega: 12 Column Grid'),
    'icon' => 'reslib_twocol_7_5.png',
    'theme' => 'reslib_twocol_7_5_theme',
    'admin css' => 'omega_12_twocol_9-3.css',
    'regions' => array(
      'middle' => t('Middle column'),
      'right' => t('Right side')
    ),
  );


