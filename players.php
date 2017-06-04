<?php 
if (!defined('e107_INIT'))
{
	require_once("../../class2.php");
}


if(!e107::isInstalled('players'))
{
	e107::redirect();
	exit;
}

e107::lan('players', false, true); 					// load language file ie. e107_plugins/players/languages/English.php
//e107::lan('players',true);

require_once(HEADERF); 					// render the header (everything before the main content area)

e107::getParser()->setThumbSize(200,0);

class players_front
{
	
  public $player_role;
  
  function __construct()
	{
		e107::js('players','js/grayscale.js','jquery');	// Load Plugin javascript and include jQuery framework
		//e107::css('players','css/my.css');		// load css file
		e107::meta('keywords', $pageTitle);	// add meta data to <HEAD>

		// place JS in here.
		e107::js('footer-inline', "
		");

    /* to save database query */
    /* TODO:  move this to shortcodes */
    $players = e107::getDB()->retrieve('player_role', 'role_id,role_name', true, true);
    foreach ($players AS $player) {
        $this->player_role[$player['role_id']] = $player['role_name'];
    }           
	}


	public function run()
	{

		$sql = e107::getDB(); 					// mysql class object
		$tp = e107::getParser(); 				// parser for converting to HTML and parsing templates etc.
		$frm = e107::getForm(); 				// Form element class.
		$ns = e107::getRender();				// render in theme box.
		$myprefs = e107::pref('players'); // returns an array.
    //		$tp->setThumbSize(0,250);

		$text = $this->renderFilter();

		$text .= $this->renderList();

//		$ns->tablerender("IL TEAM", $text); //insert  caption title
		$ns->tablerender(PLAYERS_TITLELAN_01, $text);
	}

	/**
	 * @todo use form handler
	 * @return string
	 */
	private function renderFilter()
	{
		// $frm = e107::getForm();

		// $frm->select('name',$opts,$value);

		$text = "
		<div class='row bordotabella'>
		<div class='col-xs-12 right'>
		<label>Scegli</label>
		<input type='text' value='' placeholder='Nome o cognome' id='name' name='name' />
		<select id='filter' name='filtro_1'>
		<option value='' selected='selected'>Mostra tutti</option>
		<option value='Serie C'>Serie C</option>
		<option value='Staff Tecnico - Dirigenza'>Staff Tecnico - Dirigenza</option>
		<option value='1° Divisione'>1° Divisione</option>
		<option value='Giovanile'>Giovanile</option>
		</select>
		<input id='submit' name='submit' value='Filtra' type='button' />

		<script>
		$('#submit').on('click', function(){
			if ($('#filter').val() == '' && $('#name').val() == '' ){
				$('[data-role]').show();
				return;
			}

			$('[data-role]').each(function(){
				var show = true;

				// se il nome non matcha
				if ($(this).data('name').match(new RegExp($('#name').val(), 'i')) === null){
					show = false;
				}

				// se il ruolo non matcha
				if ($('#filter').val() != '' && $(this).data('role') !== $('#filter').val()){
					show = false;
				}

				if (show) {
					$(this).show();
				} else {
					$(this).hide();
				}
			});
		});
		</script>
		</div></div>";



		return $text;

	}

	private function renderList()
	{
		$sql = e107::getDb();
		$tp = e107::getParser();

		$sql->select('player', 'nomecognome,  foto, datanascita, squadra, incarico, ruolo, nick, numeromaglia, note,  urlinstagram, urlfacebook, urltwitter', 'active=1 ORDER BY squadra DESC, numeromaglia ASC');

		$text = '';

		while($row = $sql->fetch())
		{
			$imageUrl = $row['foto'];   // could just be $url
			$image = $tp->toImage($imageUrl, array('class'=>'img-responsive img-rounded shadow', 'alt'=>$row['nomecognome'], 'title'=>$row['nomecognome']));

				//  $iconUrl = $row['icon'];   // could just be $url
		      //  $icon = $tp->thumbUrl($iconUrl);

			if ($row['numeromaglia'] == 0)
			{
				$row['numeromaglia'] = '';
			}

			$birthdate = '';
			if ($row['datanascita'] != 0)
			{
				$birthdate = PLAYERSLAN_03.$tp->toDate($row['datanascita'], "yyyy");
			}

		$text .= "
		<div class='row bordotabella' data-role='".$row['squadra']."' data-name='".$row['nomecognome']."'>

			<div class='col-xs-12 col-sm-4 shadowfoto3 center'><a class='gallery-thumb img-responsive' href='".$tp->thumbUrl($row['foto'])."' data-gal='prettyPhoto[pp_gal]'>".$image."</a><br><h3>".$row['numeromaglia']."<br>".$row['nick']."<br>".$row['nomecognome']."<br>".$this->player_role[$row['ruolo']]."</h3></div>

			<div class='col-xs-12 col-sm-8'><h3>".$row['squadra']."
<!-- <br><div class='padtop1'>".$row['ruolo']."<br>".$row['nomecognome']." -->
</h3>
			<!-- //<div class='col-xs-12 col-sm-4'>".PLAYERSLAN_04.$row['altezza']."</div>  -->
			<br><div class='left'><h3>".$birthdate."</h3></div>
			<br><div class='col-xs-12'>".$tp->toHtml($row['note'],true)."</div>
			<div class='col-xs-12 right fa-3x'>
			".$row['incarico']."
			<a href='".$row['urlfacebook']."'><i class='fa fa-facebook-square' aria-hidden='true'></i></a>
			<a href='".$row['urltwitter']."'><i class='fa fa-twitter-square' aria-hidden='true'></i></a>
			<a href='".$row['urlinstagram']."'><i class='fa fa-instagram' aria-hidden='true'></i></a>
			</div>
			</div>
		</div>
		";
		}

		return $text;

	}
   


}


/*
</div>
<div class='col-xs-12'>

</div>
</div>
";*/




$playersFront = new players_front;
require_once(HEADERF); 					// render the header (everything before the main content area)
$playersFront->run();
require_once(FOOTERF);					// render the footer (everything after the main content area)

exit;



?>
