<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

$active	= JSite::getMenu()->getActive();
if (!isset($active->id)) $active->id = 0;
$doc = JFactory::getDocument();
$app =& JFactory::getApplication();
if ($params->get('jquery', '1') == '1') $doc->addScript('http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js');
if ($params->get('easing', '1') == '1') $doc->addScript(JURI::base().'modules/mod_slidedownboxmenu/assets/jquery.easing.1.3.js');
if ($params->get('styles', '1') == '1') $doc->addStylesheet(JURI::base().'templates/'.$app->getTemplate().'/html/mod_slidedownboxmenu/style.css');
$doc->addScriptDeclaration("
// Slide down box menu
jQuery.noConflict();
jQuery(function() {
	jQuery('#sdt_menu > li').bind('mouseenter',function(){
		var elem = jQuery(this);
		elem.find('img')
			 .stop(true)
			 .animate({
				'width':'170px',
				'height':'170px',
				'left':'0px'
			 },400,'easeOutBack')
			 .andSelf()
			 .find('.sdt_wrap')
			 .stop(true)
			 .animate({'top':'90px'},500,'easeOutBack')
			 .andSelf()
			 .find('.sdt_active')
			 .stop(true)
			 .animate({'height':'170px'},300,function(){
			var sub_menu = elem.find('.sdt_box');
			if(sub_menu.length){
				//var pleft = sub_menu.parent().position().left;
				//sub_menu.css('left',pleft);
				var left = '170px';
				if(elem.parent().children().length == elem.index()+1)
					left = '-170px';
				sub_menu.show().animate({'left':left},200);
			}
		});
	}).bind('mouseleave',function(){
		var elem = jQuery(this);
		var sub_menu = elem.find('.sdt_box');
		if(sub_menu.length)
			sub_menu.hide().css('left','0px');

		elem.find('.sdt_active')
			 .stop(true)
			 .animate({'height':'0px'},300)
			 .andSelf().find('img')
			 .stop(true)
			 .animate({
				'width':'0px',
				'height':'0px',
				'left':'85px'},400)
			 .andSelf()
			 .find('.sdt_wrap')
			 .stop(true)
			 .animate({'top':'0px'},500);
	});
});

");
$i = 1;
?>

<ul id="sdt_menu" class="sdt_menu">
<?php foreach ($rows as $item) : ?>
	<?php
		$parent = array_shift($item);
		$menu_params = new JParameter($parent->params);
	?>
	<li class="<?php echo ($i&1) ? 'odd' : 'even' ; ?>">
		<?php $link = $parent->link; if ($parent->type == 'component') $link .= '&Itemid='.$parent->id; ?>
		<a href="<?php echo JRoute::_($link); ?>"<?php if ($parent->id == $active->id) echo ' class="active"'; ?>>
			<img src="<?php echo JURI::base(true).'/images/stories/'.$menu_params->get('menu_image'); ?>" alt="<?php echo $parent->name; ?>" />
			<span class="sdt_active"></span>
			<span class="sdt_wrap">
				<span class="sdt_link"><?php echo $parent->name; ?></span>
				<span class="sdt_descr"><?php echo $menu_params->get('page_title'); ?></span>
			</span>
		</a>
		<?php if (count($item)) : ?>
		<div class="sdt_box">
			<?php foreach ($item as $subitem) : ?>
			<?php $link = $subitem->link; ?>
			<?php if ($subitem->type == 'separator') : ?><span><?php echo $subitem->name; ?></span>
			<?php elseif ($subitem->type == 'url') : ?><a href="<?php echo $link ?>"><?php echo $subitem->name; ?></a>
			<?php else : ?><a href="<?php echo JRoute::_($link.'&Itemid='.$subitem->id); ?>"<?php if ($subitem->id == $active->id) echo ' class="active"'; ?>><?php echo $subitem->name; ?></a>
			<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</li>
	<?php $i++ ?>
<?php endforeach; ?>
</ul>