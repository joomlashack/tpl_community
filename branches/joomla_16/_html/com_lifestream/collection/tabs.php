<? // $Id: tabs.php 49 2010-08-24 23:19:24Z jeremy $ 
defined('_JEXEC') or die('Restricted access'); ?>

<? if ($params->get('cssstyle','light') !== 'disabled') : ?>
<style src="<?= JURI::root() ?>templates/<?= JFactory::getApplication()->getTemplate() ?>/html/com_lifestream/<?= $params->get('cssstyle','light')?>.css" />
<? endif; ?>

<?= $params->get('beforestream','') ?>

<div id="lifestream_collection-<?= key($feeds); ?>" class="lifestream">
<?= @helper('tabs.startPane') ?>
<? 
foreach ($streams as $id => $stream) :
	$title = $stream['feed']['title'];
	$items = $stream['items'];
	$i = 0;
	$tabtitle = $title;
	if ($params->get('tabicon', '1') == '1')
	{
		$tabtitle = '<img src="'.@$mediaurl.'/com_lifestream/images/icons/elegant/'.$stream['feed']['type'].'/'.$stream['feed']['type'].'_16.png" /> '.$title;
	}

?>
	<?= @helper('tabs.startPanel', array('title' => $tabtitle)) ?>
	<ul class="stream" id="<?=$stream['feed']['type'].'-'.$id?>">
	<? foreach ($items as $item) : ?>
		<? if ($params->get('count','0') == '0' || $i < $params->get('count','0')) : ?>
		<li class="list_<?= $item['type'] ?>" title="<?= @escape($item['title']); ?>">
			<?= KFactory::get('plg.lifestream.'.$item['type'].'.adapter')->parse($item); ?>
		</li>
		<? $i++; endif; ?>
	<? endforeach; ?>
	<? if (!count($items)) : ?>
		<?= @text('NO ITEMS FOUND'); ?>
	<? endif; ?>
	</ul>
	<?= @helper('tabs.endPanel') ?>
<? endforeach; ?>
<?= @helper('tabs.endPane') ?>
</div>

<?= $params->get('afterstream','') ?>