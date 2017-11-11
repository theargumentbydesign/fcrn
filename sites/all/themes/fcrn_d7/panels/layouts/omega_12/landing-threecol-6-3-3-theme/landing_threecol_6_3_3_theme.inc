<?php

/**
 * Implements hook_panels_layouts().
 */
$plugin = array(
    'title' => t('Landing pages three col 6-3-3'),
    'category' => t('Omega: 12 Column Grid'),
    'icon' => 'landing_threecol_6_3_3.png',
    'theme' => 'landing_threecol_6_3_3_theme',
    'admin css' => 'omega_12_threecol_4_4_4.css',
    'regions' => array(
      'left' => t('Left side'),
      'middle' => t('Middle column'),
      'right' => t('Right side')
    ),
  );


