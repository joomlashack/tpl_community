<?php
/**
 * @package     Community
 * @subpackage  Functions
 *
 * @copyright   Copyright (C) 2005 - 2014 Joomlashack. Meritage Assets.  All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// Restrict Access to within Joomla
defined('_JEXEC') or die('Restricted access');

define( 'YOURBASEPATH', dirname(__FILE__) );

$app = JFactory::getApplication();

$headline			= $this->params->get("headline");
$slogan				= $this->params->get("slogan");
$headerstyle		= $this->params->get("logo", "text");
$logogridsize		= $this->params->get("logowidth");
$logoheight			= $this->params->get("logoheight");

class WrightTemplate extends WrightTemplateBase {
	public $suffixes = true;  // allows stacked suffixes
}
