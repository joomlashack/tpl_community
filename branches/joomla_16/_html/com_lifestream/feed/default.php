<? // $Id: default.php 50 2010-08-26 00:54:55Z jeremy $ 
defined('_JEXEC') or die('Restricted access'); ?>

<? if ($params->get('cssstyle','light') !== 'disabled') : ?>
<style src="<?= JURI::root() ?>templates/<?= JFactory::getApplication()->getTemplate() ?>/html/com_lifestream/<?= $params->get('cssstyle','light')?>.css" />
<? endif; ?>

<?= $params->get('beforestream','') ?>

<div id="lifestream_<?= $feed->type.'-'.$feed->id; ?>" class="lifestream">

<ul class="stream">
<? foreach ($item as $row) : ?>

	<li class="list_<?= $row['type'] ?>" title="<?= @escape($row['title']); ?>">
		<?= KFactory::get('plg.lifestream.'.$row['type'].'.adapter')->parse($row); ?>
	</li>

<? endforeach; ?>
<? if (!count($item)) : ?>
	<li><?= @text('No items found') ?></li>
<? endif; ?>
</ul>

</div>

<?= $params->get('afterstream','') ?>