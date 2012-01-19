<?php
/**
 * @copyright	Copyright (C) 2005 - 2009 Joomlashack LLC
 */
// no direct access
defined('_JEXEC') or die('Restricted access');
define( 'YOURBASEPATH', dirname(__FILE__) );

$app = JFactory::getApplication();

$sidecolumnwidth	= $this->params->get("sidecolumnwidth");
$leftcolgrid		= "3";
$rightcolgrid		= "3";
$maingrid			= "6";
$slogan				= $this->params->get("slogan");
$headline			= $this->params->get("headline");
$slogan				= $this->params->get("slogan");
$headerstyle		= $this->params->get("headerstyle", "text");
$logogridsize		= $this->params->get("logogridsize");
$logoheight			= $this->params->get("logoheight");
$style				= $this->params->get("style");
$HeaderScr 			= $this->params->get("headerscript","");
$FooterScr 			= $this->params->get("footerscript","");
$layoutstyle 		= $this->params->get("layoutstyle"); 
$mootools_enabled   = ($this->params->get("mootools_enabled", 1)  == 0)?"false":"true";
$caption_enabled    = ($this->params->get("caption_enabled", 1)  == 0)?"false":"true";
require( YOURBASEPATH.DS."grid.php");
require( YOURBASEPATH.DS."/js/template.css.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/core.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/layout.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template<?php echo $style;?>.css" type="text/css" /> <!-- $scheme in this variable is for demo only - live version should be $style -->
<!--[if lte IE 6]>
	<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ie6.css" media="screen" />
	<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/pngfix.js"></script>
	<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/ie6.js"></script>
<script>
  POS_BrowserPNG.fix('img.trans,#logo-graphic h1 a,.trans,a.forgotpass,a.forgotuser,a.regusr,ul.checklist li,.designer a,.arrow,.readon,.submitBtn');
</script>
<![endif]-->
<!--[if IE]><link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ie.css" media="screen" />
<![endif]-->
<style type="text/css" media="screen">
#logo-graphic h1 a{
width:<?php echo ((80*$logogridsize)-20);?>px;
line-height:<?php echo $logoheight;?>px;
height:<?php echo $logoheight;?>px;}
</style>
<?php echo $HeaderScr; ?>
</head>
<body id="<?php echo $style; ?>">

	
	<div id="headerWrapper" style="height:<?php echo $logoheight;?>px;">
		<div id="header" class="container_12 clearfix">
			<div class="grid_<?php echo $logogridsize;?> alpha">
				<div class="inside clearfix">
				<!--Sets a grid the size of chosen parameter-->
				<?php if ($headerstyle != "module") :?>
					<div id="logo-<?php echo $headerstyle;?>">
						<h1><a href="<?php echo JURI::base(); ?>" title="<?php echo $app->getCfg('sitename'); ?>"><?php echo $headline;?></a></h1>
						<h2><?php echo $slogan;?></h2>
					</div>
					<?php else: ?>
						<jdoc:include type="modules" name="logo" style="raw" />
					<?php endif; ?>
				</div><!--End of .inside-->
			</div>
			<?php if($this->countModules('newsflash')) : ?>
			<!--Uses up the rest of the grid for a module-->
			<div id="inset" class="grid_<?php echo (12-$logogridsize);?> omega clearfix">
				<jdoc:include type="modules" name="newsflash" style="XHTML" />
			</div>
			<?php endif; ?>
		</div><!-- #header -->
	</div><!-- #headerWrapper -->	

	<?php if($this->countModules('menu')) : ?>
	<div id="menuWrapper">
		<div id="menu" class="container_12 clearfix">		
			<jdoc:include type="modules" name="menu" style="raw" />
		</div><!-- #menu -->
	</div><!-- #menuWrapper -->
	<?php endif; ?>

	<?php if($this->countModules('user1')) : ?>
	<div id="banner_wrapper" class="clearfix">
		<div id="banner" class="container_12 clearfix">
			<jdoc:include type="modules" name="user1" grid="<?php echo $user1gridcount;?>" style="shackgridrounded" />
			<div class="clear">&nbsp;</div>
		</div><!-- #banner -->
	</div><!-- #banner_wrapper -->
	<?php endif; ?>	

	<div id="main_wrapper" class="clearfix">
		<div id="main_area_wrapper" class="container_12 clearfix">
			<div id="area_content" class="clearfix">
				<!--Start of main content-->
			  <div class="<?php echo $maingrid;?> maincontent">
			    <div class="inside">
			      <jdoc:include type="message" />
				  <jdoc:include type="modules" name="breadcrumb" style="raw" />
			      <?php if($this->countModules('user2')) : ?>
			      <!--Start of Top Main Col Banners Module (user2)-->
			      <jdoc:include type="modules" name="user2" grid="<?php echo $user2gridcount;?>" style="shackflexgrid" />
			      <div class="clear">&nbsp;</div>
			      <!--End of Top Main Col Banners Module (user2)-->
			      <?php endif; ?>
			      <jdoc:include type="component" />
			      <?php if($this->countModules('user3')) : ?>
			      <!--Start of Bottom Main Col Banners Module (user3)-->
			      <jdoc:include type="modules" name="user3" grid="<?php echo $user3gridcount;?>" style="shackflexgrid" />
			      <div class="clear">&nbsp;</div>
			      <!--End of Bottom Main Col Banners Module (user3)-->
			      <?php endif; ?>
			    </div>
			  </div>
			  <?php if($this->countModules('left')) : ?>
			  <div class="<?php echo $leftcolgrid;?> left">
			    <jdoc:include type="modules" name="left" style="shackrounded2" />
			  </div>
			  <?php endif; ?>
			  <?php if($this->countModules('right')) : ?>
			  <div class="<?php echo $rightcolgrid;?> right">
			    <jdoc:include type="modules" name="right" style="shackrounded2" />
			  </div>
			  <?php endif; ?>
			  <div class="clear">&nbsp;</div>
			  <!--End of main content-->			
			</div><!-- #area_content -->
		</div><!-- #main_area -->
	</div><!-- #main_wrapper -->	

	<div id="footerWrapper">
		<div id="footer" class="container_12 clearfix">
			<jdoc:include type="modules" name="user4" grid="<?php echo $user4gridcount;?>" style="shackgridrounded" />
			<div id="copyright" class="grid_12">
		 		<jdoc:include type="modules" name="copyright" style="xhtml" />
			</div>
			<div class="grid_12"><?php echo $jstpl; ?></div>
		</div><!-- #footer -->
	</div>

	<jdoc:include type="modules" name="debug" />
	<?php echo $FooterScr; ?>
	</body>
	</html>