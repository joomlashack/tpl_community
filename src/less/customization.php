<?php
/**
 * @package     Wright
 * @subpackage  Template File
 *
 * @copyright   Copyright (C) 2005 - 2019 Joomlashack.   All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 *
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

// Access template parameters
$document = JFactory::getDocument();

// Set your variables overrides for variables-something.less.
// These variables overrides are defined on templateDetails.xml below 'style' field
$lessCustomizationVars = array (
    '@color_one'    => $document->params->get('color_one', '#1e5d74'),
    '@color_two'    => $document->params->get('color_two', '#1598c4'),
    '@color_three'  => $document->params->get('color_three', '#15C69A')
);

// Run the compiler
require_once dirname(__FILE__) . '/../wright/build/less/compiler.php';
$build = new WrightLessCompiler;
$build->start('custom', $lessCustomizationVars);