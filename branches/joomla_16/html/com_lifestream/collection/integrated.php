<? // $Id: integrated.php 49 2010-08-24 23:19:24Z jeremy $ 
defined('_JEXEC') or die('Restricted access'); ?>

<? if ($params->get('cssstyle','light') !== 'disabled') : ?>
<style src="<?= JURI::root() ?>templates/<?= JFactory::getApplication()->getTemplate() ?>/html/com_lifestream/<?= $params->get('cssstyle','light')?>.css" />
<? endif; ?>

<?= $params->get('beforestream','') ?>

<div id="lifestream_integrated-<?= key($feeds); ?>" class="lifestream">

<ul class="stream">
<? $i = 0; ?>
<? foreach ($streams as $timestamp => $item) : ?>
	<? if ($params->get('count','0') == '0' || $i < $params->get('count','0')) : ?>
	<li class="list_<?= $item['type'] ?>" title="<?= @escape($item['title']); ?>">
		<?= KFactory::get('plg.lifestream.'.$item['type'].'.adapter')->parse($item); ?>
	</li>
	<? $i++; endif; ?>
<? endforeach; ?>
<? if (!count($streams)) : ?>
	<?= @text('NO ITEMS FOUND'); ?>
<? endif; ?>
</ul>

</div>

<?= $params->get('afterstream','') ?>