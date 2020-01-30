<?php
/**
 * @package     Community
 * @subpackage  Template File
 *
 * @copyright   Copyright (C) 2005 - 2019 Joomlashack. Meritage Assets.  All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

$document       = JFactory::getDocument();
$featuredImage  = $this->params->get('featuredImage', '');

if($featuredImage) {
    $style = '#featured{background-image: url(' . Juri::base() . $featuredImage . ');}';
    $document->addStyleDeclaration($style);
}

if (version_compare(JVERSION, '4', 'lt')) {

	// Menu classes for Joomla 3
	$toolbarMenuClasses = 'navbar-fixed-top navbar-inverse';
	$mainMenuClasses    = '';
	$bottomMenuClasses  = 'navbar-inverse navbar-transparent';
}
else {

	// Menu classes for Joomla 4
	$toolbarMenuClasses = 'fixed-top';
	$mainMenuClasses    = 'navbar-dark bg-primary';
	$bottomMenuClasses  = 'navbar-dark';
}