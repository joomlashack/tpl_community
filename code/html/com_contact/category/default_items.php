<?php
/** $Id: default_items.php 10381 2008-06-01 03:35:53Z pasamio $ */
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<?php foreach($this->items as $item) : ?>
<tr class="sectiontableentry<?php echo $item->odd + 1; ?>">
	<td align="right" class="w5">
		<?php echo $item->count +1; ?>
	</td>
	<td>
		<a href="<?php echo $item->link; ?>" class="category<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
			<?php echo $item->name; ?></a>
	</td>
	<?php if ( $this->params->get( 'show_position' ) ) : ?>
	<td>
		<?php echo $item->con_position; ?>
	</td>
	<?php endif; ?>
	<?php if ( $this->params->get( 'show_email' ) ) : ?>
	<td class="w20">
		<?php echo $item->email_to; ?>
	</td>
	<?php endif; ?>
	<?php if ( $this->params->get( 'show_telephone' ) ) : ?>
	<td class="w15">
		<?php echo $item->telephone; ?>
	</td>
	<?php endif; ?>
	<?php if ( $this->params->get( 'show_mobile' ) ) : ?>
	<td class="w15">
		<?php echo $item->mobile; ?>
	</td>
	<?php endif; ?>
	<?php if ( $this->params->get( 'show_fax' ) ) : ?>
	<td class="w15">
		<?php echo $item->fax; ?>
	</td>
	<?php endif; ?>
</tr>
<?php endforeach; ?>