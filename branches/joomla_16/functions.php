<?php
// Restrict Access to within Joomla
defined('_JEXEC') or die('Restricted access');

/**
 * Core template class to manage misc. overrides and other features
 *
 * INSTRUCTIONS:  Just include this file in any template override to gain access
 * i.e. require_once(JPATH_THEMES.DS.$mainframe->getTemplate().'/functions.php');
 */	 
class jShackFunc {
	/**
	 * Parses text and separates with a span
	 *
	 * @author  JoomlaShack
	 * @param	string 	$title 		The title or text to parse
	 * @param	string 	$separator	User separator
	 */	
	function titleStyle($title, $separator = '//') {
		// Take title and parse, if needed
		if (strpos($title, $separator)) {
			$title = explode($separator, $title);
			return $title[0] . ' ' . $separator . ' <em>' . $title[1] . '</em>';
		} else {
			return $title; // Return raw title if separator doesn't exist
		}	 
	}
	
	/**
	 *  Get template parameters (for use with the overrides since you can't access them otherwise)
	 *  
	 *  EXAMPLE USAGE:
	 *  $templateParams = jShackFunc::getTemplateParams(); 
	 *  echo $templateParams->get( 'PARAM1', 'default1' );
	 *
	 * @author       JoomlaShack
	 */	
	function getTemplateParams() {
		jimport('joomla.version');
		$version = new JVersion;
		$app = & JFactory::getApplication(); // Set the J object

		if ($version->getShortVersion() >= 1.6)
		{
			jimport('joomla.form.form');
			$db = & JFactory::getDBO();
			$menu = $app->getMenu();
			$active = $menu->getActive();
			if ($active->template_style_id) $query = "SELECT params FROM #__template_styles WHERE `id` = '".$active->template_style_id."' LIMIT 1";
			else $query = "SELECT params FROM #__template_styles WHERE `client_id` = '0' AND `home` = '1' LIMIT 1";
			$db->setQuery($query);
			$result = $db->loadResult();
			$params = new JForm(json_decode($result));

			return $params->getName();
		}
		else
		{

			// Pull in the params file of the template
			$params_file = JPATH_THEMES.DS.$app->getTemplate().DS.'params.ini';
			$content = '';

			// If the params.ini is readable, get content
			if (is_readable( $params_file ) ) {
			   $content = file_get_contents( $params_file );
			} else {
				echo 'Warning: Template params.ini file is not writable.';
				exit();
			}

			// Assign parameters object
			$templateParams = new JParameter( $content );

			return $templateParams; // return object
		}
	}
	
}