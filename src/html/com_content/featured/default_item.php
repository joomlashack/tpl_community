<?php
/**
 * @package     Community
 * @subpackage  Overrider
 *
 * @copyright   Copyright (C) 2005 - 2020 Joomlashack. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access.
defined('_JEXEC') or die;

$app = JFactory::getApplication();

require_once JPATH_THEMES . '/' . $app->getTemplate() . '/wright/html/overrider.php';

$this->item->wrightElementsStructure = Array(
    "div.article-content",
    "title",
    "icons",
    "article-info",
    "legendtop",
    "content",
    "legendbottom",
    "article-info-below",
    "article-info-split",
    "/div",
    "image"
);

include Overrider::getOverride('com_content.featured', 'default_item');