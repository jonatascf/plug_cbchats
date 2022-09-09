<?php
/**
* Community Builder (TM)
* @version $Id: $
* @package CommunityBuilder
* @copyright (C) 2004-2022 www.joomlapolis.com / Lightning MultiCom SA - and its licensors, all rights reserved
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
*/

if ( ! ( defined( '_VALID_CB' ) || defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Session\Session;
use Joomla\CMS\MVC\View\HtmlView;
use Joomla\CMS\Form\Form;

global $_PLUGINS;

$_PLUGINS->loadPluginGroup( 'user' );

/**
 * Class cbforumsTab
 * Tab for CB Forum
 */
class cbchatsTab extends cbTabHandler
{
	/**
	 * Generates the HTML to display the user Chats tab
	 */
	public function getDisplayTab( $tab, $user, $ui ) {
		
		global $_CB_framework;
		
		if (file_exists(JPATH_SITE .'/components/com_tabapapo/controller.php')) {
		
			if (!class_exists('tabapapoController')) {
				
				require_once (JPATH_SITE .'/components/com_tabapapo/controller.php');
				
			}

			$controller = new tabapapoController();

			ob_start();
			$controller->execute('cb_display');
			$html = ob_get_contents();
			ob_end_clean();
		
		} else {
			
			$html = "<h2>The Tabapapo Chat Component is not installed on Joomla.</h2>" .
					'<p>You can download it on <a href="https://tabaoca.org" target="_blank">Tabaoca Site</a>.</p>';
			
		}

		return $html;

	}

}
