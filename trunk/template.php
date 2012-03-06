<?php
/**
 * @copyright	Copyright (C) 2005 - 2009 Joomlashack LLC
 */
// no direct access
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


?>
<doctype>
<html>
<head>
<w:head />

<!--[if lte IE 6]>
	<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->document->template ?>/css/ie6.css" media="screen" />
	<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->document->template ?>/js/pngfix.js"></script>
	<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->document->template ?>/js/ie6.js"></script>
<script>
  POS_BrowserPNG.fix('img.trans,#logo-graphic h1 a,.trans,a.forgotpass,a.forgotuser,a.regusr,ul.checklist li,.designer a,.arrow,.readon,.submitBtn');
</script>
<![endif]-->
<!--[if IE]><link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->document->template ?>/css/ie.css" media="screen" />
<![endif]-->
<style type="text/css" media="screen">
#logo-graphic h1 a{
width:<?php echo ((80*$logogridsize)-20);?>px;
line-height:<?php echo $logoheight;?>px;
height:<?php echo $logoheight;?>px;}
</style>
</head>
<body>
	
	<div id="headerWrapper" style="height:<?php echo $logoheight;?>px;">
		<div id="header" class="container_12 clearfix">
			<div class="grid_<?php echo $logogridsize;?> alpha">
				<div class="inside clearfix">
				<!--Sets a grid the size of chosen parameter-->
					<w:logo />
				</div><!--End of .inside-->
			</div>
			<?php if($this->countModules('top')) : ?>
			<!--Uses up the rest of the grid for a module-->
			<div id="inset" class="grid_<?php echo (12-$logogridsize);?> omega clearfix">
				<w:module name="top" chrome="xhtml" />
			</div>
			<?php endif; ?>
		</div><!-- #header -->
	</div><!-- #headerWrapper -->	

	<?php if($this->countModules('menu')) : ?>
	<div id="menuWrapper">
		<div id="menu" class="container_12 clearfix">		
			<w:module name="menu" chrome="none" />
		</div><!-- #menu -->
	</div><!-- #menuWrapper -->
	<?php endif; ?>

	<?php if($this->countModules('grid-top')) : ?>
	<div id="banner_wrapper" class="clearfix">
		<div id="banner" class="container_12 clearfix">
			<w:module type="grid" name="grid-top" grid="6" chrome="wrightflexgrid" />
			<div class="clear">&nbsp;</div>
		</div><!-- #banner -->
	</div><!-- #banner_wrapper -->
	<?php endif; ?>	

	<div id="main_wrapper" class="clearfix">
		<div id="main_area_wrapper" class="container_12 clearfix">
			<div id="area_content" class="clearfix">
				<!--Start of main content-->
			  <section id="main">
			      <?php if ($this->countModules('breadcrumbs')) : ?>
        		  <div id="pathway">
        		    <div id="pathway-inner">
        		      <w:module type="single" name="breadcrumbs" chrome="none" />
        		      <div class="clear"></div>
        		    </div>
        		  </div>
        		  <div class="clear"></div>
        		  <?php endif; ?>
			      <w:content />
			
			  </section>
			  <?php if($this->countModules('sidebar1')) : ?>
			  <aside id="sidebar1">
			  	<w:module name="sidebar1" chrome="wrightflexgrid" />
			  </aside>
			  <?php endif; ?>
			 
			  <aside id="sidebar2">
			  	<w:module name="sidebar2" chrome="wrightflexgrid" />
			  </aside>
			
			  <div class="clear">&nbsp;</div>
			  <!--End of main content-->			
			</div><!-- #area_content -->
		</div><!-- #main_area -->
	</div><!-- #main_wrapper -->	

	<div id="footerWrapper">
		<div id="footer" class="container_12 clearfix">
			<w:module type="grid" name="grid-bottom" chrome="wrightflexgrid" />
		<div id="copyright" class="grid_12">
				<w:module name="footer" chrome="xhtml" />
			</div> 
			<div class="grid_12"><w:footer /></div>
		</div><!-- #footer -->
	</div>
	
	<w:module name="debug" chrome="none" />
	</body>
	</html>
