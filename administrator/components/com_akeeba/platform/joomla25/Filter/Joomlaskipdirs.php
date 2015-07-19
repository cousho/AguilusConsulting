<?php
/**
 * Akeeba Engine
 * The modular PHP5 site backup engine
 *
 * @copyright Copyright (c)2009-2014 Nicholas K. Dionysopoulos
 * @license   GNU GPL version 3 or, at your option, any later version
 * @package   akeebaengine
 *
 */

namespace Akeeba\Engine\Filter;

// Protection against direct access
defined('AKEEBAENGINE') or die();

use Akeeba\Engine\Factory;
use Akeeba\Engine\Platform;

/**
 * Subdirectories exclusion filter. Excludes temporary, cache and backup output
 * directories' contents from being backed up.
 */
class Joomlaskipdirs extends Base
{
	public function __construct()
	{
		$this->object      = 'dir';
		$this->subtype     = 'children';
		$this->method      = 'direct';
		$this->filter_name = 'Joomlaskipdirs';

		// We take advantage of the filter class magic to inject our custom filters
		$configuration = Factory::getConfiguration();
		$jreg          = \JFactory::getConfig();

		$tmpdir = $jreg->get('tmp_path');
		$logsdir = $jreg->get('log_path');

		// Get the site's root
		if ($configuration->get('akeeba.platform.override_root', 0))
		{
			$root = $configuration->get('akeeba.platform.newroot', '[SITEROOT]');
		}
		else
		{
			$root = '[SITEROOT]';
		}

		$this->filter_data[$root] = array(
			// Output & temp directory of the component
			$this->treatDirectory($configuration->get('akeeba.basic.output_directory')),

			// Joomla! temporary directory
			$this->treatDirectory($tmpdir),

			// Joomla! logs directory
			$this->treatDirectory($logsdir),

			// default temp directory
			$this->treatDirectory(JPATH_SITE . '/tmp'),
			'tmp',
			$this->treatDirectory(Platform::getInstance()->get_site_root() . '/tmp'),

			// Joomla! front- and back-end cache, as reported by Joomla!
			$this->treatDirectory(JPATH_CACHE),
			$this->treatDirectory(JPATH_ADMINISTRATOR . '/cache'),
			$this->treatDirectory(JPATH_ROOT . '/cache'),
			// cache directories fallback
			'cache',
			'administrator/cache',
			// Joomla! front- and back-end cache, as calculated by us (redundancy, for funky server setups)
			$this->treatDirectory(Platform::getInstance()->get_site_root() . '/cache'),
			$this->treatDirectory(Platform::getInstance()->get_site_root() . '/administrator/cache'),

			// This is not needed except on sites running SVN or beta releases
			$this->treatDirectory(JPATH_ROOT . '/installation'),
			// ...and the fallbacks
			'installation',
			$this->treatDirectory(Platform::getInstance()->get_site_root() . '/installation'),

			// Default backup output (many people change it, forget to remove old backup archives and they end up backing up old backups)
			$this->treatDirectory(JPATH_ADMINISTRATOR . '/components/com_akeeba/backup'),
			'administrator/components/com_akeeba/backup',
			$this->treatDirectory(Platform::getInstance()->get_site_root() . '/administrator/components/com_akeeba/backup'),

			// MyBlog's cache
			$this->treatDirectory(JPATH_SITE . '/components/libraries/cmslib/cache'),
			// ...and fallbacks
			'components/libraries/cmslib/cache',
			$this->treatDirectory(Platform::getInstance()->get_site_root() . '/components/libraries/cmslib/cache'),

			// Used by Plesk to store its logs. It's in the public root, owned by root and read-only. Yipee!
			$this->treatDirectory(JPATH_ROOT . '/logs'),
			'logs',
			$this->treatDirectory(Platform::getInstance()->get_site_root() . '/logs'),

			// Some developers hardcode this path for their log files. I guess they never heard of Joomla!'s Global Configuration?
			$this->treatDirectory(JPATH_ROOT . '/log'),
			'log',
			$this->treatDirectory(Platform::getInstance()->get_site_root() . '/log'),
		);

		parent::__construct();
	}
}