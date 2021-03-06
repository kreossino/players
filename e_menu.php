<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2015 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 *
*/

if (!defined('e107_INIT')) { exit; }

//v2.x Standard for extending menu configuration within Menu Manager. (replacement for v1.x config.php)
	
class players_menu
{
	function __construct()
	{
		e107::lan('players','menu',true); // English_menu.php or {LANGUAGE}_menu.php
	}

	/**
	 * Configuration Fields.
	 * @return array
	 */
	public function config($menu='')
	{

		$fields = array();
		$fields['playersCaption']      = array('title'=> "Caption", 'type'=>'text', 'multilan'=>true, 'writeParms'=>array('size'=>'xxlarge'));
		$fields['playersCount']        = array('title'=> "Enabled", 'type'=>'number');
		$fields['playersCustom']       = array('title'=> "Enabled", 'type'=>'method'); // see below.

        return $fields;

	}

}

// optional - for when using custom methods above.

class players_menu_form extends e_form
{

	function playersCustom($curVal)
	{

		$frm = e107::getForm();
		$opts = array(1,2,3,4);
		$frm->select('playersCustom', $opts, $curVal);


	}


}


?>

