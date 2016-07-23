    <?php 
    require_once("../../class2.php");
  //  require_once(HEADERF);
     

//    $ns->tablerender("PLAYERS", "");


/*  $sql = e107::getDb();
    if($allRows = $sql->retrieve('player', 'player_nomecognome', 'player_nick', 'player_numeromaglia', 'player_active=1' ORDER BY player_numeromaglia ASC' true);

 {
    	foreach($allRows as $row)

    	{
    		echo $row["player_nick"]." - ".$row["player_numeromaglia"]." - ".$row["player_nomecognome"]."

";  
 }
    }
*/

    $sql = e107::getDb();
    if($allRows = $sql->retrieve('player', 'player_nomecognome, player_nick', '', true))
    {
    	foreach($allRows as $row)
    	{
    		echo $row["player_nomecognome"]." - ".$row["player_nick"]."<br/>";  
    	}
    }


 require_once(FOOTERF);
    exit;
    ?>
