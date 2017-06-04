<?php

// Generated e107 Plugin Admin Area 

require_once('../../class2.php');
if (!getperms('P')) 
{
	e107::redirect('admin');
	exit;
}

e107::lan(e_CURRENT_PLUGIN,true, true);


class players_adminArea extends e_admin_dispatcher
{

	protected $modes = array(	
	
		'main'	=> array(
			'controller' 	=> 'player_ui',
			'path' 			=> null,
			'ui' 			=> 'player_form_ui',
			'uipath' 		=> null
		),
		
  'player_role'	=> array(
  			'controller' 	=> 'player_role_ui',
  			'path' 			=> null,
  			'ui' 			=> 'player_role_form_ui',
  			'uipath' 		=> null
  		),
	);	
	
	
	protected $adminMenu = array(

		'main/list'			=> array('caption'=> LAN_MANAGE, 'perm' => 'P'),
		'main/create'		=> array('caption'=> LAN_CREATE, 'perm' => 'P'),

    'player_role/list'			=> array('caption'=> PLAYER_ROLE_01, 'perm' => 'P'),
		'player_role/create'		=> array('caption'=> PLAYER_ROLE_02, 'perm' => 'P'),
    
	//	 'main/custom'		=> array('caption'=> 'Custom Page', 'perm' => 'P')
	);

	protected $adminMenuAliases = array(
		'main/edit'	=> 'main/list'				
	);	
	
	protected $menuTitle = 'Volleyball Team';
}




				
class player_ui extends e_admin_ui
{
			
		protected $pluginTitle		= 'Volleyball Team';
		protected $pluginName		= e_CURRENT_PLUGIN;
		protected $eventName		= 'players-player'; // remove comment to enable event triggers in admin. 		
		protected $table			= 'player';
		protected $pid				= 'id';
		protected $perPage			= 20; 
		protected $batchDelete		= true;
		protected $batchCopy		= true;		
	//	protected $sortField		= 'somefield_order';
	//	protected $orderStep		= 10;
	//	protected $tabs				= array('Tabl 1','Tab 2'); // Use 'tab'=>0  OR 'tab'=>1 in the $fields below to enable. 
		
	//	protected $listQry      	= "SELECT * FROM `#tableName` WHERE field != '' "; // Example Custom Query. LEFT JOINS allowed. Should be without any Order or Limit.
	
		protected $listOrder		= 'numeromaglia ASC';


		protected $fields 		= array (  'checkboxes' =>   array ( 'title' => '', 'type' => null, 'data' => null, 'width' => '5%', 'thclass' => 'center', 'forced' => '1', 'class' => 'center', 'toggle' => 'e-multiselect',  ),
		  'id' =>   array ( 'title' => LAN_ID, 'data' => 'int', 'width' => '5%', 'batch' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'foto' =>   array ( 'title' => PLAYER_PHOTO, 'type' => 'image', 'data' => 'str', 'width' => 'auto', 'inline' => true, 'help' => '', 'readParms' => 'thumb=80x80', 'writeParms' => 'media=players_image', 'class' => 'left', 'thclass' => 'left',  ),
		  'nomecognome' =>   array ( 'title' => PLAYER_FULLNAME, 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'datanascita' =>   array ( 'title' => PLAYER_BIRTHDAY, 'type' => 'datestamp', 'data' => 'int', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'altezza' =>   array ( 'title' => PLAYER_HEIGHT, 'type' => 'number', 'data' => 'int', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'telefono' =>   array ( 'title' => PLAYER_PHONE, 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'filter' => true,'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'email' =>   array ( 'title' => PLAYER_EMAIL, 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'filter' => true,'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'nick' =>   array ( 'title' => PLAYER_NICK, 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'help' => '', 'inline' => true, 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'squadra' =>   array ( 'title' => PLAYER_TEAM, 'type' => 'dropdown', 'data' => 'str', 'width' => 'auto', 'filter' => true, 'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
      'ruolo' =>   array ( 'title' => PLAYER_ROLE, 'type' => 'dropdown', 'data' => 'str', 'width' => 'auto', 'filter' => true, 'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'numeromaglia' =>   array ( 'title' => PLAYER_DRESSNUMBER, 'type' => 'number', 'data' => 'int', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'urlinstagram' =>   array ( 'title' => PLAYER_INSTAGRAM, 'type' => 'url', 'data' => 'str', 'width' => 'auto', 'batch' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'urlfacebook' =>   array ( 'title' => PLAYER_FACEBOOK, 'type' => 'url', 'data' => 'str', 'width' => 'auto', 'batch' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'urltwitter' =>   array ( 'title' => PLAYER_TWITTER, 'type' => 'url', 'data' => 'str', 'width' => 'auto', 'batch' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'societa' =>   array ( 'title' => PLAYER_SOCIETY, 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'filter' => true, 'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'nazionalita' =>   array ( 'title' => PLAYER_NATIONALITY, 'type' => 'country', 'data' => 'str', 'width' => 'auto', 'filter' => true,'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'annoingresso' =>   array ( 'title' => PLAYER_ARRIVALYEAR, 'type' => 'number', 'data' => 'int', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'scadenzacertificato' =>   array ( 'title' => PLAYER_CERTIFICATE, 'type' => 'datestamp', 'data' => 'int', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'note' =>   array ( 'title' => LAN_DESCRIPTION, 'type' => 'bbarea', 'data' => 'str', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'active' =>   array ( 'title' => LAN_ACTIVE, 'type' => 'boolean', 'data' => 'int', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'incarico' =>   array ( 'title' => PLAYER_ASSIGNMENT, 'type' => 'dropdown', 'data' => 'str', 'width' => 'auto', 'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'visibile' =>   array ( 'title' => LAN_VISIBILITY, 'type' => 'userclass', 'data' => 'str', 'width' => 'auto', 'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'options' =>   array ( 'title' => LAN_OPTIONS, 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => '1',  ),
		);		


		protected $fieldpref = array('id',  'foto', 'nomecognome', 'datanascita', 'altezza', 'nazionalita', 'nick', 'squadra', 'ruolo', 'numeromaglia',  'societa', 'annoingresso', 'scadenzacertificato', 'active', 'incarico', 'visibile');
		

	//	protected $preftabs        = array('General', 'Other' );
		protected $prefs = array(
		); 

	
		public function init()
		{
			// Set drop-down values (if any). 
			$this->fields['squadra']['writeParms']['optArray'] = array('' => '' ,'Serie C' => 'Serie C', '1° Division' => '1° Divisione', 'Giovanile' => 'Giovanile', 'Staff Tecnico - Dirigenza' => 'Staff Tecnico - Dirigenza'); // Example Drop-down array. 		

 
 	/*		$this->fields['ruoloold']['writeParms']['optArray'] = array('' => '' , 'Palleggiatore' => 'Palleggiatore','Schiacciatore' => 'Schiacciatore', 'Opposto' => 'Opposto',
       'Centrale' => 'Centrale', 'Libero' => 'Libero',  'Allenatore' => 'Allenatore', '2* Allenatore' => '2* Allenatore', 'Direttore Sportivo' => 'Direttore Sportivo', 
       'Direttore Tecnico' => 'Direttore Tecnico', 'Presidente' => 'Presidente', 'Vice Presidente' => 'Vice Presidente', 'Preparatore Atletico' => 'Preparatore Atletico',
         'Massaggiatore' => 'Massaggiatore', 'Medico' =>  'Medico', 'Massaggiatore' => 'Massaggiatore',  'Dirigente' => 'Dirigente'); // Example Drop-down array. 
		 */
			$this->fields['incarico']['writeParms']['optArray'] = array('' => '', 'Capitano' => 'Capitano','Vice Capitano'=> 'Vice Capitano', 'Player' => 'Player'); // Example Drop-down array. 
      
       $players = e107::getDB()->retrieve('player_role', 'role_id,role_name', true, true);
        foreach ($players AS $player) {
            $this->player_role[$player['role_id']] = $player['role_name'];
        }
   
     $this->fields['ruolo']['writeParms'] = $this->player_role;
		}

		
		// ------- Customize Create --------
		
		public function beforeCreate($new_data)
		{
			return $new_data;
		}
	
		public function afterCreate($new_data, $old_data, $id)
		{
			// do something
		}

		public function onCreateError($new_data, $old_data)
		{
			// do something		
		}		
		
		
		// ------- Customize Update --------
		
		public function beforeUpdate($new_data, $old_data, $id)
		{
			return $new_data;
		}

		public function afterUpdate($new_data, $old_data, $id)
		{
			// do something	
		}
		
		public function onUpdateError($new_data, $old_data, $id)
		{
			// do something		
		}		
		
			

public function customPage()
		{
			$ns = e107::getRender();
			$text = "Hello World!";
			$ns->tablerender("Hello",$text);	
			
		}

			
}
				


class player_form_ui extends e_admin_form_ui
{

}		

class player_role_ui extends e_admin_ui
{
			
		protected $pluginTitle		= 'Volleyball Team';
		protected $pluginName		= 'players';
	//	protected $eventName		= 'players-player_role'; // remove comment to enable event triggers in admin. 		
		protected $table			= 'player_role';
		protected $pid				= 'role_id';
		protected $perPage			= 20; 
		protected $batchDelete		= true;
		protected $batchExport     = true;
		protected $batchCopy		= true;

	//	protected $sortField		= 'somefield_order';
	//	protected $sortParent      = 'somefield_parent';
	//	protected $treePrefix      = 'somefield_title';

	//	protected $tabs				= array('Tabl 1','Tab 2'); // Use 'tab'=>0  OR 'tab'=>1 in the $fields below to enable. 
		
	//	protected $listQry      	= "SELECT * FROM `#tableName` WHERE field != '' "; // Example Custom Query. LEFT JOINS allowed. Should be without any Order or Limit.
	
		protected $listOrder		= 'role_id DESC';
	
		protected $fields 		= array (  'checkboxes' =>   array ( 'title' => '', 'type' => null, 'data' => null, 'width' => '5%', 'thclass' => 'center', 'forced' => '1', 'class' => 'center', 'toggle' => 'e-multiselect',  ),
		  'role_id' =>   array ( 'title' => LAN_ID, 'data' => 'int', 'width' => '5%', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'role_name' =>   array ( 'title' => PLAYER_ROLE_03, 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'role_type' =>   array ( 'title' => PLAYER_ROLE_05, 'type' => 'dropdown', 'data' => 'str', 'width' => 'auto', 'batch' => 'true', 'filter' => true, 
      'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),		  
      'role_desc' =>   array ( 'title' => PLAYER_ROLE_04, 'type' => 'textarea', 'data' => 'str', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'options' =>   array ( 'title' => LAN_OPTIONS, 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => '1',  ),
		);		
		
		protected $fieldpref = array('role_name', 'role_desc' );
		
	
		public function init()
		{
			// Set drop-down values (if any). 
	    $this->fields['role_type']['writeParms']['optArray'] = array('' => '', 'Player' => PLAYER_ROLE_06,'Staff'=> PLAYER_ROLE_07); // Example Drop-down array.
		}

		
		// ------- Customize Create --------
		
		public function beforeCreate($new_data,$old_data)
		{
			return $new_data;
		}
	
		public function afterCreate($new_data, $old_data, $id)
		{
			// do something
		}

		public function onCreateError($new_data, $old_data)
		{
			// do something		
		}		
		
		
		// ------- Customize Update --------
		
		public function beforeUpdate($new_data, $old_data, $id)
		{
			return $new_data;
		}

		public function afterUpdate($new_data, $old_data, $id)
		{
			// do something	
		}
		
		public function onUpdateError($new_data, $old_data, $id)
		{
			// do something		
		}		
		
			
	/*	
		// optional - a custom page.  
		public function customPage()
		{
			$text = 'Hello World!';
			$otherField  = $this->getController()->getFieldVar('other_field_name');
			return $text;
			
		}
	*/
			
}
				


class player_role_form_ui extends e_admin_form_ui
{

}	
		
		
new players_adminArea();

require_once(e_ADMIN."auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN."footer.php");
exit;

?>
