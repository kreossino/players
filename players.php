 <?php 
require_once("../../class2.php");


require_once(HEADERF); 					// render the header (everything before the main content area) 


$ns->tablerender("MOSTRE","<div class='col-xs-12'><h2>MOSTRE</h2></div>

<div class='row hidden-xs lead'>
		<div class='col-sm-2'>
                <h4>Titolo della Mostra</h4>
                </div>
                <div class='col-sm-2'>
                <h4>Data evento</h4>
                </div>
                <div class='col-sm-2'>
                <h4>Citta&grave; e Sede</h4>
                </div>
                <div class='col-sm-2'>
                <h4>Ente Patrocinante</h4>
                </div>
                <div class='col-sm-2'>
                <h4> Sponsor </h4>
                </div>
                <div class='col-sm-2'>
                <h4>Link Evento</h4>
                </div>
                
</div><hr>
");

    $sql = e107::getDb();
//$sql->gen("SELECT * FROM #mostre WHERE #mostre_active LIKE '%1%' ORDER BY #mostre_order ");
// $books = $sql->retrieve("SELECT * FROM #page_chapters WHERE ".$filter." ORDER BY chapter_order ASC" , true);
$sql->gen("SELECT * FROM #player ORDER BY #player_numeromaglia");
echo "$row["player_numeromaglia"]";

    require_once(FOOTERF);

    exit; 

?>

