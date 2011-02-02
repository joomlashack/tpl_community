<?php
/**
 * $Id: default.php 11328 2008-12-12 19:22:41Z kdevine $
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

$cparams = JComponentHelper::getParams ('com_media');
?>
<div class="articleheadingnone">
	<br />
	<div class="title_wrapper">
		<h2><span><?php echo $this->params->get( 'page_title' ); ?></span></h2>
	</div>
</div>
<?php if ( $this->params->get( 'show_page_title', 1 ) && !$this->contact->params->get( 'popup' ) && $this->params->get('page_title') != $this->contact->name ) : ?>
	<div class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
		<?php echo $this->params->get( 'page_title' ); ?>
	</div>
<?php endif; ?>
<div id="component-contact">
<table cellpadding="0" cellspacing="0" border="0" class="contentpaneopennone<?php echo $this->params->get( 'pageclass_sfx' ); ?> w100">
<?php if ( $this->params->get( 'show_contact_list' ) && count( $this->contacts ) > 1) : ?>
<tr>
	<td colspan="2" align="center">
<!--		<br /> -->
		<form action="<?php echo JRoute::_('index.php') ?>" method="post" name="selectForm" id="selectForm">
		<?php echo JText::_( 'Select Contact' ); ?>:
			<br />
			<?php echo JHTML::_('select.genericlist',  $this->contacts, 'contact_id', 'class="inputbox" onchange="this.form.submit()"', 'id', 'name', $this->contact->id);?>
			<input type="hidden" name="option" value="com_contact" />
		</form>
	</td>
</tr>
<?php endif; ?>
<?php if ( $this->contact->name && $this->contact->params->get( 'show_name' ) ) : ?>
<tr>
	<td class="contentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?> w100" style="height: 75px;">
		<?php echo $this->contact->name; ?>
	</td>
	<td rowspan="6" align="right" valign="top">
	<?php if ( $this->contact->image && $this->contact->params->get( 'show_image' ) ) : ?>
		<div style="float: right;">
			<?php echo JHTML::_('image', 'images/stories' . '/'.$this->contact->image, JText::_( 'Contact' )); ?>
		</div>
	<?php endif; ?>
	</td>
</tr>
<?php endif; ?>
<?php if ( $this->contact->con_position && $this->contact->params->get( 'show_position' ) ) : ?>
<tr>
	<td class="contentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?> w100">
	<?php echo $this->contact->con_position; ?>
		<br /><br />
	</td>
</tr>
<?php endif; ?>
<tr>
	<td class="contentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?> w100">
		<table border="0" class="w100">
		<tr>
			<td>
				<?php echo $this->loadTemplate('address'); ?>
			</td>
		</tr>
		</table>
	</td>
	<td>&nbsp;</td>
</tr>
<?php if ( $this->contact->params->get( 'allow_vcard' ) ) : ?>
<tr>
	<td class="contentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?> w100" colspan="2" style="height: 60px; vertical-align: middle;">
	<?php echo JText::_( 'Download information as a' );?>
		<a href="<?php echo JURI::base(); ?>index.php?option=com_contact&amp;task=vcard&amp;contact_id=<?php echo $this->contact->id; ?>&amp;format=raw&amp;tmpl=component">
			<?php echo JText::_( 'VCard' );?></a>
	</td>
</tr>
<?php endif;
if ( $this->contact->params->get('show_email_form') && ($this->contact->email_to || $this->contact->user_id))
	echo $this->loadTemplate('form');
?>
</table>
</div>
<div class="articlefooternone"> </div>