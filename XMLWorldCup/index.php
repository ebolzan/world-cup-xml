
        <?php
                include 'Group.php';
                include 'Finals.php';
                include 'Champion.php';
                
                $ob = new Group("<h2>", "</h2>");                
                
                //$ob->sumGols("Brasil", "a");
                
                $ob->checkLoser8("teste");
                $ob->outputGroup();
                
                
                echo "teste<br>";
                $ob->checkLoser8("qualqer");
                echo "<br>teste<br>";
                
                
                $final = new Finals("<h3>", "</h3>");
                $final->outputFinal();
                
                $winner = new Champion("<h3>", "</h3>");
                                
                $winner->outputChampion();
                            
        ?>
   
