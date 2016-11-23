<?php 
require_once("../../class2.php");


require_once(HEADERF); 					// render the header (everything before the main content area) 


if(!e107::isInstalled('players'))
{
	e107::redirect();
	exit;
}

e107::lan('players', false, true); 					// load language file ie. e107_plugins/players/languages/English.php

$tp->setThumbSize(200,0);

class players_front
{
	function __construct()
	{
		e107::js('players','js/grayscale.js','jquery');	// Load Plugin javascript and include jQuery framework
		//e107::css('players','css/my.css');		// load css file
		e107::meta('keywords', $pageTitle);	// add meta data to <HEAD>

	}


	public function run()
	{

		$sql = e107::getDB(); 					// mysql class object
		$tp = e107::getParser(); 				// parser for converting to HTML and parsing templates etc.
		$frm = e107::getForm(); 				// Form element class.
		$ns = e107::getRender();				// render in theme box.
		$myprefs = e107::pref('players'); // returns an array.
    		$tp->setThumbSize(0,250);

		$text = '';

	}


}

echo "
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

</div>
<div class='col-xs-12'>

</div>
</div>
";

	$sql = e107::getDb();
	$sql->select('player', 'nomecognome,  foto, datanascita, squadra, incarico, ruolo, nick, numeromaglia,  urlinstagram, urlfacebook, urltwitter', 'active=1 ORDER BY squadra DESC');

while($row = $sql->fetch())
{
	$imageUrl = $row['foto'];   // could just be $url
	$image = $tp->thumbUrl($imageUrl);
      //  $iconUrl = $row['icon'];   // could just be $url
      //  $icon = $tp->thumbUrl($iconUrl);

	if ($row['numeromaglia'] == 0) {
		$row['numeromaglia'] = '';
	}

	$birthdate = '';
	if ($row['datanascita'] != 0) {
		$birthdate = PLAYERSLAN_03.$tp->toDate($row['datanascita'], "yyyy");
	}
 
 echo "
<div class='row bordotabella' data-role='".$row['squadra']."' data-name='".$row['nomecognome']."'>

<div class='col-xs-12 col-sm-4 shadowfoto3 center'><a class='gallery-thumb img-responsive' href='".$tp->thumbUrl($row['foto'])."' data-gal='prettyPhoto[pp_gal]'><img class='img-responsive img-rounded shadow' src='".$image."' alt='". $row['nomecognome']."' title='" . $row['nomecognome']."'/></a><br><h3>".$row['numeromaglia']."<br>".$row['nick']."</h3></div>

<div class='col-xs-12 col-sm-8 center'><h3>".$row['squadra']."<br><div class='padtop1'>".$row['ruolo']."<br>".$row['nomecognome']."</h3>
<!-- //<div class='col-xs-12 col-sm-4'>".PLAYERSLAN_04.$row['altezza']."</div>  -->
<br><div class='left'><h3>".$birthdate."</h3></div>
<div class='col-xs-12 right fa-3x'>
".$row['incarico']."
<i class='fa fa-facebook-square' aria-hidden='true'>".$row['urlfacebook']."</i>
<i class='fa fa-twitter-square' aria-hidden='true'>".$row['urltwitter']."</i>
<i class='fa fa-instagram' aria-hidden='true'>".$row['urlinstagram']."</i></div>
</div></div>
";
}


$playersFront = new players_front;
require_once(HEADERF); 					// render the header (everything before the main content area)
$playersFront->run();
require_once(FOOTERF);					// render the footer (everything after the main content area)

exit; 
?>
