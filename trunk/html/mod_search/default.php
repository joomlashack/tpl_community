<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<form action="index.php" method="post" id="searchform">
	<div class="search<?php echo $params->get('moduleclass_sfx') ?>">
		<?php
		    $output = '<div><input name="searchword" id="mod_search_searchword" maxlength="'.$maxlength.'" alt="'.$button_text.'" class="inputbox'.$moduleclass_sfx.'" type="text" size="'.$width.'" value="'.$text.'"  onblur="if(this.value==\'\') this.value=\''.$text.'\';" onfocus="if(this.value==\''.$text.'\') this.value=\'\';" /></div>';
			$button = '<div class="submitBtn"><div>
			 <input value="'.$button_text.'" type="submit"></input>
			</div></div>';			

			switch ($button_pos) :
			    case 'top' :
				    $button = $button.'<br />';
				    $output = $button.$output;
				    break;

			    case 'bottom' :
				    $button = '<br />'.$button;
				    $output = $output.$button;
				    break;

			    case 'right' :
				    $output = $output.$button;
				    break;

			    case 'left' :
			    default :
				    $output = $button.$output;
				    break;
			endswitch;

			echo $output;
		?>
	</div>
	<div><input type="hidden" name="task"   value="search" /></div>
	<div><input type="hidden" name="option" value="com_search" /></div>
</form>