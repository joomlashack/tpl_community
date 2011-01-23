<?php // no direct access
defined('_JEXEC') or die('Restricted access');
// Include the template specific functions
require_once(JPATH_THEMES.DS.$mainframe->getTemplate().'/functions.php');

// Assign template parameters
$templateParams 	= &jShackFunc::getTemplateParams();
$titleSeparator		= $templateParams->get('titleseparator');
?>

<?php $canEdit   = ($this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own')); ?>
<?php if ($this->item->state == 0) : ?>
<div class="system-unpublished">
<?php endif; ?>

<div class="articleheading<?php echo $this->params->get('pageclass_sfx')?>">
<?php if ($this->item->params->get('show_title') || $this->item->params->get('show_pdf_icon') || $this->item->params->get('show_print_icon') || $this->item->params->get('show_email_icon') || $canEdit) : ?>
	<?php if ($this->item->params->get('show_title')) : ?>
		<?php if (
			$this->item->params->get('show_pdf_icon') ||
			$this->item->params->get( 'show_print_icon' ) ||
			$this->item->params->get('show_email_icon')
				) : ?>
		<div class="article-icons<?php echo $this->params->get('pageclass_sfx')?>">
			<?php if ($this->item->params->get('show_pdf_icon')) : ?>
			<?php echo JHTML::_('icon.pdf', $this->item, $this->item->params, $this->access); ?>
			<?php endif; ?>

			<?php if ( $this->item->params->get( 'show_print_icon' )) : ?>
			<?php echo JHTML::_('icon.print_popup', $this->item, $this->item->params, $this->access); ?>
			<?php endif; ?>

			<?php if ($this->item->params->get('show_email_icon')) : ?>
			<?php echo JHTML::_('icon.email', $this->item, $this->item->params, $this->access); ?>
			<?php endif; ?>
			   <?php if ($canEdit) : ?>
			   <?php echo JHTML::_('icon.edit', $this->item, $this->item->params, $this->access); ?>
		   <?php endif; ?>
		</div>
		<?php endif; ?>
		
		<?php if ($this->item->params->get('link_titles') && $this->item->readmore_link != '') : ?>
		<div class="title_wrapper"><h2><span><a href="<?php echo $this->item->readmore_link; ?>" class="contentpagetitle<?php echo $this->item->params->get( 'pageclass_sfx' ); ?>">
			<?php echo jShackFunc::titleStyle($this->escape($this->item->title), $titleSeparator); ?></a></span></h2></div>
		<?php else : ?>
			<div class="title_wrapper"><h2><span><?php echo jShackFunc::titleStyle($this->escape($this->item->title), $titleSeparator); ?></span></h2></div>
		<?php endif; ?>

	<?php endif; ?>

<?php endif; ?>
</div>
<div class="contentpaneopen<?php echo $this->item->params->get( 'pageclass_sfx' ); ?>">
<?php  if (!$this->item->params->get('show_intro')) :
	echo $this->item->event->afterDisplayTitle;
endif; ?>
<?php echo $this->item->event->beforeDisplayContent; ?>

<?php if (($this->item->params->get('show_section') && $this->item->sectionid) || ($this->item->params->get('show_category') && $this->item->catid)) : ?>

		<?php if ($this->item->params->get('show_section') && $this->item->sectionid && isset($this->item->section)) : ?>
		<span>
			<?php if ($this->item->params->get('link_section')) : ?>
				<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getSectionRoute($this->item->sectionid)).'">'; ?>
			<?php endif; ?>
			<?php echo $this->item->section; ?>
			<?php if ($this->item->params->get('link_section')) : ?>
				<?php echo '</a>'; ?>
			<?php endif; ?>
				<?php if ($this->item->params->get('show_category')) : ?>
				<?php echo ' - '; ?>
			<?php endif; ?>
		</span>
		<?php endif; ?>
		<?php if ($this->item->params->get('show_category') && $this->item->catid) : ?>
		<span>
			<?php if ($this->item->params->get('link_category')) : ?>
				<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug, $this->item->sectionid)).'">'; ?>
			<?php endif; ?>
			<?php echo $this->item->category; ?>
			<?php if ($this->item->params->get('link_category')) : ?>
				<?php echo '</a>'; ?>
			<?php endif; ?>
		</span>
		<?php endif; ?>

<?php endif; ?>

<?php if ( intval($this->item->modified) != 0 && $this->item->params->get('show_modify_date')) : ?>

	<div class="modifydate<?php echo $this->params->get('pageclass_sfx')?>">
		<?php echo JText::sprintf('LAST_UPDATED2', JHTML::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC2'))); ?>
	</div>
<?php endif; ?>

<?php if ($this->item->params->get('show_url') && $this->item->urls) : ?>

		<a href="http://<?php echo $this->item->urls ; ?>" onclick="window.open(this.href); return false;">
			<?php echo $this->item->urls; ?></a>

<?php endif; ?>

<?php if (isset ($this->item->toc)) : ?>
	<?php echo $this->item->toc; ?>
<?php endif; ?>
<?php echo $this->item->text; ?>

<?php if ($this->item->params->get('show_readmore') && $this->item->readmore) : ?>

		<a href="<?php echo $this->item->readmore_link; ?>" class="button readon<?php echo $this->item->params->get('pageclass_sfx'); ?>">
			<?php if ($this->item->readmore_register) :
				echo JText::_('Register to read more...');
			elseif ($readmore = $this->item->params->get('readmore')) :
				echo $readmore;
			else :
				echo 'Read More';
			endif; ?></a>

<?php endif; ?>


<?php if ($this->item->state == 0) : ?>
</div>
<?php endif; ?>
</div>
<div class='articlefooter<?php echo $this->params->get('pageclass_sfx')?>'>
	<?php if (($this->params->get('show_author')) && ($this->item->author != "") || $this->params->get('show_create_date')) : ?>
	<div class="auth_info<?php echo $this->params->get('pageclass_sfx')?>">
		<?php if (($this->params->get('show_author')) && ($this->item->author != "")) : ?>
			<span class="small"><?php JText::printf( 'Written by', ($this->item->created_by_alias ? $this->item->created_by_alias : $this->item->author) ); ?></span>
		<?php endif; ?>

		<?php if ($this->params->get('show_create_date')) : ?>

			<span class="createdate">
				<?php echo JHTML::_('date', $this->item->created, JText::_('DATE_FORMAT_LC2')) ?>
			</span>

		<?php endif; ?>
	</div>
	<?php endif; ?>
</div>
<span class="article_separator">&nbsp;</span>
<?php echo $this->item->event->afterDisplayContent; ?>