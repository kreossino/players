<?php

// Generated e107 Plugin Admin Area 

require_once('../../class2.php');
if (!getperms('P')) 
{
	e107::redirect('admin');
	exit;
}

// e107::lan('players',true);


class players_adminArea extends e_admin_dispatcher
{

	protected $modes = array(	
	
		'main'	=> array(
			'controller' 	=> 'player_ui',
			'path' 			=> null,
			'ui' 			=> 'player_form_ui',
			'uipath' 		=> null
		),
		

	);	
	
	
	protected $adminMenu = array(

		'main/list'			=> array('caption'=> LAN_MANAGE, 'perm' => 'P'),
		'main/create'		=> array('caption'=> LAN_CREATE, 'perm' => 'P'),

		 'main/custom'		=> array('caption'=> 'Custom Page', 'perm' => 'P')
	);

	protected $adminMenuAliases = array(
		'main/edit'	=> 'main/list'				
	);	
	
	protected $menuTitle = 'Volleyball Team';
}




				
class player_ui extends e_admin_ui
{
			
		protected $pluginTitle		= 'Volleyball Team';
		protected $pluginName		= 'players';
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
		  'foto' =>   array ( 'title' => 'Foto', 'type' => 'image', 'data' => 'str', 'width' => 'auto', 'inline' => true, 'help' => '', 'readParms' => 'thumb=80x80', 'writeParms' => 'media=players_image', 'class' => 'left', 'thclass' => 'left',  ),
		  'nomecognome' =>   array ( 'title' => 'Nome Cognome', 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'datanascita' =>   array ( 'title' => 'Datanascita', 'type' => 'datestamp', 'data' => 'int', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'altezza' =>   array ( 'title' => 'Altezza', 'type' => 'number', 'data' => 'int', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'telefono' =>   array ( 'title' => 'telefono', 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'filter' => true,'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'email' =>   array ( 'title' => 'email', 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'filter' => true,'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'nick' =>   array ( 'title' => 'Nick', 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'help' => '', 'inline' => true, 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'squadra' =>   array ( 'title' => 'squadra', 'type' => 'dropdown', 'data' => 'str', 'width' => 'auto', 'filter' => true, 'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'ruolo' =>   array ( 'title' => 'Ruolo', 'type' => 'dropdown', 'data' => 'str', 'width' => 'auto', 'filter' => true, 'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'numeromaglia' =>   array ( 'title' => 'Numeromaglia', 'type' => 'number', 'data' => 'int', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'urlinstagram' =>   array ( 'title' => 'Urlinstagram', 'type' => 'url', 'data' => 'str', 'width' => 'auto', 'batch' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'urlfacebook' =>   array ( 'title' => 'Urlfacebook', 'type' => 'url', 'data' => 'str', 'width' => 'auto', 'batch' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'urltwitter' =>   array ( 'title' => 'Urltwitter', 'type' => 'url', 'data' => 'str', 'width' => 'auto', 'batch' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'societa' =>   array ( 'title' => 'Societa', 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'filter' => true, 'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'nazionalita' =>   array ( 'title' => 'Nazionalita', 'type' => 'country', 'data' => 'str', 'width' => 'auto', 'filter' => true,'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'annoingresso' =>   array ( 'title' => 'Annoingresso', 'type' => 'number', 'data' => 'int', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'scadenzacertificato' =>   array ( 'title' => 'ScadenzaCertificato', 'type' => 'datestamp', 'data' => 'int', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'note' =>   array ( 'title' => 'Note', 'type' => 'bbarea', 'data' => 'str', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'active' =>   array ( 'title' => 'Active', 'type' => 'boolean', 'data' => 'int', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'incarico' =>   array ( 'title' => 'Incarico', 'type' => 'dropdown', 'data' => 'str', 'width' => 'auto', 'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'visibile' =>   array ( 'title' => 'Visibile', 'type' => 'userclass', 'data' => 'str', 'width' => 'auto', 'inline' => true, 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'options' =>   array ( 'title' => LAN_OPTIONS, 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => '1',  ),
		);		


		protected $fieldpref = array('id',  'foto', 'nomecognome', 'datanascita', 'altezza', 'nazionalita', 'nick', 'squadra', 'ruolo', 'numeromaglia',  'societa', 'annoingresso', 'scadenzacertificato', 'active', 'incarico', 'visibile');
		

	//	protected $preftabs        = array('General', 'Other' );
		protected $prefs = array(
		); 

	
		public function init()
		{
			// Set drop-down values (if any). 
			$this->fields['squadra']['writeParms']['optArray'] = array('' => '', 'Serie C' => 'Serie C', '1° Division' => '1° Divisione', 'Giovanile' => 'Giovanile', 'Staff Tecnico - Dirigenza' => 'Staff Tecnico - Dirigenza',  ''); // Example Drop-down array. 		

			$this->fields['ruolo']['writeParms']['optArray'] = array('' => '' , 'Palleggiatore' => 'Palleggiatore','Schiacciatore' => 'Schiacciatore', 'Opposto' => 'Opposto', 'Centrale' => 'Centrale', 'Libero' => 'Libero',  'Allenatore' => 'Allenatore', '2* Allenatore' => '2* Allenatore', 'Direttore Sportivo' => 'Direttore Sportivo', 'Direttore Tecnico' => 'Direttore Tecnico', 'Presidente' => 'Presidente', 'Vice Presidente' => 'Vice Presidente', 'Preparatore Atletico' => 'Preparatore Atletico', 'Massaggiatore' => 'Massaggiatore', 'Medico' =>  'Medico', 'Massaggiatore' => 'Massaggiatore',  'Dirigente' => 'Dirigente', ''); // Example Drop-down array. 
		
			$this->fields['incarico']['writeParms']['optArray'] = array('' => '', 'Capitano' => 'Capitano','Vice Capitano'=> 'Vice Capitano', 'Player' => 'Player'); // Example Drop-down array. 

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
		
		
new players_adminArea();

require_once(e_ADMIN."auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN."footer.php");
exit;

?>
