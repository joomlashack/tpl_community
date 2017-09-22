<?php
/**
 * @package     Community
 * @subpackage  Template File
 *
 * @copyright   Copyright (C) 2005 - 2016 Joomlashack. Meritage Assets.  All rights reserved.
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