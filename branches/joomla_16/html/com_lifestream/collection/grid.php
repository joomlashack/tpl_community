<? // $Id: grid.php 49 2010-08-24 23:19:24Z jeremy $ 
defined('_JEXEC') or die('Restricted access'); ?>

<? if ($params->get('cssstyle','light') !== 'disabled') : ?>
<style src="<?= JURI::root() ?>templates/<?= JFactory::getApplication()->getTemplate() ?>/html/com_lifestream/<?= $params->get('cssstyle','light')?>.css" />
<? endif; ?>

<?= $params->get('beforestream','') ?>

<div id="lifestream_collection-<?= key($feeds); ?>" class="lifestream">
<?
$col = 1;
foreach ($streams as $id => $stream) :
	$title = $stream['feed']['title'];
	$items = $stream['items'];
	$i = 0;
?>
<div class="grid cols_<?= $params->get('cols','2') ?>">
	<h3><?= $title ?></h3>
	<ul class="stream" id="<?=$stream['feed']['type'].'-'.$id?>">
	<? foreach ($items as $item) : ?>
		<? if ($params->get('count','0') == '0' || $i < $params->get('count','0')) : ?>
		<li class="list_<?= $item['type'] ?>" title="<?= @escape($item['title']); ?>">
			<?= KFactory::get('plg.lifestream.'.$item['type'].'.adapter')->parse($item); ?>
		</li>
		<? $i++; ?>
		<? endif; ?>
	<? endforeach; ?>
	<? if (!count($items)) : ?>
		<?= @text('NO ITEMS FOUND'); ?>
	<? endif; ?>
	</ul>
</div>
	<? if ($params->get('cols','2') <= $col) { $col = 1; ?><div class="clear"></div><? } else { $col++; } ?>
<? endforeach; ?>
	<div class="clear"></div>
</div>

<?= $params->get('afterstream','') ?>