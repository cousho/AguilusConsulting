<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_menu
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
$size = count($list);
?>
<?php 
    $app = JFactory::getApplication();
    $menu = $app->getMenu();
    $active = $menu->getActive();
    $baseparentid = $active->tree[1];
    $baseparent = $menu->getItem($baseparentid)->title;
	$class= $size>0?'parent':'';
?>
<?php if( $baseparent):  ?>
<h2 class="<?php echo $class ?>"><?php echo $baseparent ?></h2>
<ul class="menu<?php echo $class_sfx;?>"<?php
	$tag = '';
	if ($params->get('tag_id')!=NULL) {
		$tag = $params->get('tag_id').'';
		echo ' id="'.$tag.'"';
	}
?>><?php
//for set first or last class codes only

$index = 0;
$isFirst = true;
$lastItems = array(); //all last item IDs


//get the base Item

$menus = array();
foreach($list as $l) {
	if($l->id ==  $baseparentid){
		$menus = $l;
		break;
	} else
		continue;
}


foreach ( array_reverse ( $list, TRUE ) as $v ) {
   if ( !isset ( $lastItems[$v->parent_id] ) )
      $lastItems[$v->parent_id] = $v->id;
}
//endof for set first or last class
foreach ($list as $i => &$item) :
	$class = 'item-'.$item->id;
	if ($item->id == $active_id) {
		$class .= ' current';
	}

	if (in_array($item->id, $path)) {
		$class .= ' active';
	}
	elseif ($item->type == 'alias') {
		$aliasToId = $item->params->get('aliasoptions');
		if (count($path) > 0 && $aliasToId == $path[count($path)-1]) {
			$class .= ' active';
		}
		elseif (in_array($aliasToId, $path)) {
			$class .= ' alias-parent-active';
		}
	}

	if ($item->deeper) {
		$class .= ' deeper';
	}

	if ($item->parent) {
		$class .= ' parent';
	}
	
	$class .= ' level'.$item->level;
	
	//set first or last class
	$index++;
	if($isFirst) {
		$class .= ' first';
		$isFirst = false;
	}
	if(in_array($item->id, $lastItems)) {
		$class .= ' last';
	}
	if ($item->deeper) {
		$isFirst = true; //for next <li>
	}
	//endof set first or last class

	if (!empty($class)) {
		$class = ' class="'.trim($class).'"';
	}

	echo '<li'.$class.'>';

	// Render the menu item.
	switch ($item->type) :
		case 'separator':
		case 'url':
		case 'component':
			require JModuleHelper::getLayoutPath('mod_menu', 'default_'.$item->type);
			break;

		default:
			require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
			break;
	endswitch;

	// The next item is deeper.
	if ($item->deeper) {
		echo '<ul>';
	}
	// The next item is shallower.
	elseif ($item->shallower) {
		echo '</li>';
		echo str_repeat('</ul></li>', $item->level_diff);
	}
	// The next item is on the same level.
	else {
		echo '</li>';
	}
endforeach;
?></ul>
<?php endif;  ?>
