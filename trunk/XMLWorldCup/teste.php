<?php

 $file = simplexml_load_file("schema.xml");
 $times = $file->xpath("//fase[@id='final']/jogo");   
 
 print_r($times);

 foreach ($times as $value) {
     foreach ($value as $value2) {
         if(trim($value2) == 'Brasil')
             echo 'Brasil';
         
     }
    
}
     
     

?>
