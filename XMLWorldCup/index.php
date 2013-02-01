        <?php
                include 'Group.php';
                include 'Finals.php';
                include 'Champion.php';                
                
                //object group
                $ob = new Group("<h2>", "</h2>");                                                
                $ob->outputGroup();    
                
                //check if some team loser is somewhere wrong
                $ob->checkLoserGroup();
                $ob->checkLoser8();
                $ob->checkLoser4();
                $ob->checkLoserSemi();
                                  
                //object final
                $final = new Finals("<h3>", "</h3>");
                $final->outputFinal();
                
                //object champion
                $winner = new Champion("<h3>", "</h3>");                                
                $winner->outputChampion();                            
        ?>
   
