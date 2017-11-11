<?php

/**
 * Implements hook_panels_layouts().
 */
$plugin = array(
    'title' => t('Research library three column 7-2-3'),
    'category' => t('Omega: 12 Column Grid'),
    'icon' => 'reslib_threecol_7_2_3.png',
    'theme' => 'reslib_threecol_7_2_3_theme',
    'admin css' => 'omega_12_threecol_4_4_4.css',
    'regions' => array(
      'left' => t('Left side'),
      'middle' => t('Middle column'),
      'right' => t('Right side')
    ),
  );


