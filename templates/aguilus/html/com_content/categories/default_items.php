<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$lang	= JFactory::getLanguage();

if (count($this->items[$this->parent->id]) > 0 && $this->maxLevelcat != 0) :
?>
	<?php 
	$items = $this->items[$this->parent->id];
	if(count($items)>5) { //limit it to 5
		$items = array_slice($items, 0, 5);
	}
	/*$itemscount = (count($items));

	//shitf every 2nd item to second row
	for($i=0; $i<$itemscount; $i++) {
		if($i%2==1) {
			array_push($items, $items[$i]); 
			unset($items[$i]);
		}
	}

	$counter = 0;
	*///use JS instead
	
	foreach($items as $id => $item) : ?>
		<?php
		if ($this->params->get('show_empty_categories_cat') || $item->numitems || count($item->getChildren())) :
		?>
		<div class="category">
			<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id));?>">
				<div class="thumb">
					<?php if ($item->getParams()->get('image')) : ?>
						<img src="<?php echo $item->getParams()->get('image'); ?>" alt="<?php echo htmlspecialchars($item->getParams()->get('image_alt')); ?>" />
					<?php endif; ?>
				</div>
				
				<?php if ($this->params->get('show_subcat_desc_cat') == 1) :?>
					<?php if ($item->description) : ?>
						<div class="category-desc">
							<?php echo JHtml::_('content.prepare', $item->description, '', 'com_content.categories'); ?>
						</div>
					<?php endif; ?>
				<?php endif; ?>

				<h3 class="page-header item-title">
					<?php echo $this->escape($item->title); ?>
					
					<?php if ($this->params->get('show_cat_num_articles_cat') == 1) :?>
						<span class="badge badge-info tip hasTooltip" title="<?php echo JHtml::tooltipText('COM_CONTENT_NUM_ITEMS'); ?>">
							<?php echo $item->numitems; ?>
						</span>
					<?php endif; ?>
					<?php if (count($item->getChildren()) > 0 && $this->maxLevelcat > 1) : ?>
						<a id="category-btn-<?php echo $item->id;?>" href="#category-<?php echo $item->id;?>" 
							data-toggle="collapse" data-toggle="button" class="btn btn-mini pull-right"><span class="icon-plus"></span></a>
					<?php endif; ?>
				</h3>
			</a>

			<?php if (count($item->getChildren()) > 0 && $this->maxLevelcat > 1) :?>
				<div class="collapse fade" id="category-<?php echo $item->id;?>">
				<?php
				$this->items[$item->id] = $item->getChildren();
				$this->parent = $item;
				$this->maxLevelcat--;
				echo $this->loadTemplate('items');
				$this->parent = $item->getParent();
				$this->maxLevelcat++;
				?>
				</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<?php
			/*$counter++;
			if($counter>=$itemscount/2) {
				$counter = 0;
				echo '<div class="clear"></div>';
			}*///use JS instead
		 ?>
	<?php endforeach; ?>
<?php endif; ?>
<div class="clear"></div>