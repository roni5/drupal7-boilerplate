<?php

/**
 * @file
 * Theme button function.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */

/**
 * Implements theme_menu_local_task().
 */
function ultima_menu_local_task(&$vars) {

  $link = $variables['element']['#link'];

  // Uncomment code below to rename the "View" tab for certain node types
  /*
  // Check if the link title is "View"
  if ($link['title'] == t('View')) {
    // Make sure we are on single node page
    if (arg(0) == 'node' && arg(1)) {
      $node = node_load(arg(1));
      // Do this for specific content types
      if ($node->type == 'page') {
        $link['title'] = t('View full page');
      }
    }
  }
  */

  // Continue building the local task link
  $link_text = $link['title'];

  if (!empty($variables['element']['#active'])) {
    // Add text to indicate active tab for non-visual users.
    $active = '<span class="element-invisible">' . t('(active tab)') . '</span>';

    // If the link does not contain HTML already, check_plain() it now.
    // After we set 'html'=TRUE the link will not be sanitized by l().
    if (empty($link['localized_options']['html'])) {
      $link['title'] = check_plain($link['title']);
    }
    $link['localized_options']['html'] = TRUE;
    $link_text = t('!local-task-title!active', array('!local-task-title' => $link['title'], '!active' => $active));
  }

  return '<li' . (!empty($variables['element']['#active']) ? ' class="active"' : '') . '>' . l($link_text, $link['href'], $link['localized_options']) . "</li>\n";

}