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

// Don't modify this file!
// Set your variables overrides for variables-something.scss.
// These variables overrides are defined on templateDetails.xml below 'style' field
$scssCustomizationVars = array (
    '$color-two'    => $document->params->get('color_two', '#1598c4'),
    '$color-three'  => $document->params->get('color_three', '#15C69A')
);

// Run the compiler - 'generic' is the default style
require_once dirname(__FILE__) . '/../wright/build/scss/compiler.php';
$build = new WrightScssCompiler;
$build->start('blue', $scssCustomizationVars);