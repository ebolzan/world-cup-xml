<?php




function prepareKeys($vector)
{
   rsort($vector);
      
   //remove duplicate values points 
   for($i = 0; $i < count($vector); $i++)
   {
       echo "<br>valor do i ".$i."<br>";
       echo "<br>valor do count ".(count($vector))."<br>";
       if($i == (count($vector)-1))
            $extern[] = $vector[$i];
       else 
       {
           if($vector[$i] != $vector[$i+1])
           $extern[] = $vector[$i];
       }       
   }
   
   return $extern;
}

function sortTable()
{
$vet[] = array("dinamarca", 9, 4);
$vet[] = array("Brasil", 9, 6);
$vet[] = array("argentina", 9, 2);
$vet[] = array("holanda", 9, 8);

//save values array[points][goalsDiferrence] = country
foreach ($vet as $key => $value) {
    $indexPoint[$value[1]][$value[2]] = $value[0];
    
    $extern1[] = $value[1];
    $intern1[] = $value[2];
}

    //sort reverse keys
    $extern = prepareKeys($extern1);
    $intern = prepareKeys($intern1);
    
    
foreach ($extern as $value) {    
    foreach ($intern as $team) {
        if(isset($indexPoint[$value][$team]))
        echo $indexPoint[$value][$team]."<br>";
    }    
}

}

sortTable();
?>
