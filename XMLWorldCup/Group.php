<?php
/**
 * @author evandro, l. felipe
 * description: class have functions and atributes group team
 */
class Group {
    private static $GROUP = array('a','b','c','d', 'e', 'f', 'g', 'h'); 
    
    //array that have output format
    private $output;
    
    //string format impress
    private $start;       
    private $end;

    private $file;

    public function __construct($start, $end) {
        
        $this->start = $start;
        $this->end = $end;
        
        //load file with definitions xml world cup
        $file = simplexml_load_file("schema.xml");
        
        //colocar try cath php            
        
        $this->file = $file;
        
        //create array with all group
        foreach (self::$GROUP as $vet)        
            $this->output[] = $file->xpath("//grupo[@id='$vet']/jogo");        
    }
    
    //return groupA build
    public function getGroupA()
    {
        $string="";
        
         foreach ($this->output[0] as $key => $value) {
                    $string .= $this->start. $value->time[0]." ".$value->time[0]->gols ." X " ." ". 
                            $value->time[1]->gols." ".$value->time[1].$this->end."\n";                    
                }                                                
                      
                $string .= $this->getClassification("a");
                return $string;  
    }
    
    public function getGroupB()
    {
        $string="";
        
         foreach ($this->output[1] as $key => $value) {
                    $string .= $this->start. $value->time[0]." ".$value->time[0]->gols ." X " ." ". 
                            $value->time[1]->gols." ".$value->time[1].$this->end."\n";                    
                }
                
                    $string .= $this->getClassification("b");
                    return $string;  
    }
    
    public function getGroupC()
    {
        $string="";
        
         foreach ($this->output[2] as $key => $value) {
                    $string .= $this->start. $value->time[0]." ".$value->time[0]->gols ." X " ." ". 
                            $value->time[1]->gols." ".$value->time[1].$this->end."\n";                    
                }
                    $string .= $this->getClassification("c");
                    return $string;  
    }
    
    public function getGroupD()
    {
        $string="";
        
         foreach ($this->output[3] as $key => $value) {
                    $string .= $this->start. $value->time[0]." ".$value->time[0]->gols ." X " ." ". 
                            $value->time[1]->gols." ".$value->time[1].$this->end."\n";                    
                }
                                                       
                    $string .= $this->getClassification("d");
                    return $string;  
    }
    
    public function getGroupE()
    {
        $string="";
        
         foreach ($this->output[4] as $key => $value) {
                    $string .= $this->start. $value->time[0]." ".$value->time[0]->gols ." X " ." ". 
                            $value->time[1]->gols." ".$value->time[1].$this->end."\n";                    
                }                                                
                    $string .= $this->getClassification("e");    
                    return $string;  
    }
    
    public function getGroupF()
    {
        $string="";
        
         foreach ($this->output[5] as $key => $value) {
                    $string .= $this->start. $value->time[0]." ".$value->time[0]->gols ." X " ." ". 
                            $value->time[1]->gols." ".$value->time[1].$this->end."\n";                    
                }                                                
                    $string .= $this->getClassification("f");    
                    return $string;  
    }    
    
    public function getGroupG()
    {
        $string="";
        
         foreach ($this->output[6] as $key => $value) {
                    $string .= $this->start. $value->time[0]." ".$value->time[0]->gols ." X " ." ". 
                            $value->time[1]->gols." ".$value->time[1].$this->end."\n";                    
                }                                               
                    $string .= $this->getClassification("g");    
                    return $string;  
    }    
    
    public function getGroupH()
    {
        $string="";
        
         foreach ($this->output[7] as $key => $value) {
                    $string .= $this->start. $value->time[0]." ".$value->time[0]->gols ." X " ." ". 
                            $value->time[1]->gols." ".$value->time[1].$this->end."\n";                    
                }                                                
                    $string .= $this->getClassification("h");    
                    return $string;  
    }
    
    //sum each point of one team 
    public function sumPoints($time, $group)
    {                      
        $vet = $this->file->xpath("//grupo[@id='$group']/jogo/time[contains(.,'$time')]/gols");
        
        //get all goals team
        foreach ($vet as $key => $value) {
            $golsA[] = (int)$value;            
        }                     
        
            $queryTeamB  = $this->file->xpath("//grupo[@id='$group']/jogo/time[contains
                (.,'$time')]/../time[not(contains(.,'$time'))]/gols");                                           
            
            foreach ($queryTeamB as $key => $value)            
                 $golsB[] = (int) $value;                                                                                                                
        
         $point = 0;
                                 
         for($i = 0; $i < count($golsA); $i++)
         {                          
             if($golsA[$i] > $golsB[$i])
                 $point+=3;
             elseif($golsA[$i] == $golsB[$i])
                 $point+=1;                              
         }
              
        return $point;
    }
    
    //get all goals other team
    public function sumGolsOthers($time, $group)
    {                            
            //get goals another team
            $queryTeamB  = $this->file->xpath("//grupo[@id='$group']/jogo/time[contains
                (.,'$time')]/../time[not(contains(.,'$time'))]/gols");                                           
            
            $goals = 0;
            
            //sum all goals 
            foreach ($queryTeamB as $key => $value)            
                 $goals += (int) $value;                                                                                                            
                                        
            return $goals;
    }

    //get all goal by team and group
    public function sumGols($time, $group)
    {
        $vet = $this->file->xpath("//grupo[@id='$group']/jogo/time[contains(.,'$time')]"); 
       
        $sum=0;
        foreach ($vet as $value) {                      
            $sum +=(int)$value->gols;
        }
        return $sum;
    }

    //remove duplicate values key and sort reverse
    private function prepareKeys($vector)
    {
       rsort($vector);

       //remove duplicate values points 
       for($i = 0; $i < count($vector); $i++)
       {
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
    
    //sort table classification by point, goal difference
    public function sortTableGroup($table)
    {        
        foreach ($table as $key => $value) {
            $points[] =  $value[1];
        }
        
        //save values array[points][goalsDiferrence] = country
        foreach ($table as $key => $value) {
            $indexPoint[$value[1]][$value[2]] = $value[0];
            $extern1[] = $value[1];
            $intern1[] = $value[2];
        }

        //sort reverse keys
        $extern = $this->prepareKeys($extern1);
        $intern = $this->prepareKeys($intern1);

        foreach ($extern as $value) {    
            foreach ($intern as $team) {
                if(isset($indexPoint[$value][$team]))
                $result ["{$indexPoint[$value][$team]}"] = array($value, $team);
            }    
        }                
        
        return $result;
    }

    //get classification by each group, if flag = 1 return only result without html
    public function getClassification($group, $flag=0)
    {
        $vet = $this->file->xpath("//grupo[@id='$group']/time/@id");
        
        //get all country by group
        foreach ($vet as $key => $value) {
            $team[] = (string)$value;
        }
                
        //create table team,point, goalDifference 
        foreach ($team as $key => $value) {
            $goalDifference = ($this->sumGols($value, $group)) - ($this->sumGolsOthers($value, $group));
            $table[] =  array($value, $this->sumPoints($value, $group), $goalDifference);                        
        }                
                  
        $result = $this->sortTableGroup($table);                  
        
        if($flag == 1)
            return $result;
        
        $string="<br><br>";
        $string.="<table>";
        $string.="<tr><td>Times</td><td>Pontos</td><td>Saldo</td></tr>";
        
        foreach ($result as $key => $value) {
            $string .= "<tr><td>".$key." </td><td>"." {$value[0]}"."</td><td>"." {$value[1]}"."</td></tr>";
        }
        
        $string.="<table>";                
        return $string;
    }
    
    //check if team lose next phase 8ª
    public function checkLoserGroup()
    {
        //for each group check, get 2 last team each group
        foreach (self::$GROUP as $value) {                   
        $teamList[] = array_slice($this->getClassification($value, 1), 2);
        }
             
        //put in array more easy
        foreach ($teamList as $key => $value) {            
            foreach ($value as $key2 => $var) 
                $teamLoser[] = trim($key2);            
        }
        
        //get all games                
        foreach ($this->file->xpath("//fase[@id='Oitavas-de-final']/jogo/time") as $value)
            $queryPhase8[] =(string) trim($value);
        
        foreach ($this->file->xpath("//fase[@id='Quartas-de-final']/jogo/time") as $value)
            $queryPhase4[] =(string) trim($value);
        
        foreach ($this->file->xpath("//fase[@id='semifinal']/jogo/time") as $value)
            $queryPhase2[] =(string) trim($value);
        
        foreach ($this->file->xpath("//fase[@id='final']/jogo/time") as $value)
            $queryPhase1[] =(string) trim($value);                              
        
        foreach ($teamLoser as $value) {
            
            // echo $value;
            if(array_search($value, $queryPhase8))                                        
            {
              echo "fase oitavas ";
              echo  $value; 
            }
            
            if(array_search($value, $queryPhase4))                                        
            {
              echo "fase quartas ";
              new TMessage("error", "Validação encontrou um erro");
              exit(1);
            }
            
            if(array_search($value, $queryPhase2))                                        
            {
              echo "fase semifinais ";
              new TMessage("error", "Validação encontrou um erro");
              exit(1);
            }                        
            
            if(array_search("China", $queryPhase1))                                        
            {
              echo "fase final ";
              new TMessage("error", "Validação encontrou um erro");
              exit(1);
            }                        
        }                           
    }
    
    //receive phase and list team loser, check if team loser
    public function checkLoserByPhase($phase, $loser)
    {        
        foreach ($this->file->xpath("//fase[@id='$phase']/jogo/time") as $value)
            $queryPhase[] =(string) trim($value);  
        
        echo "\nfase is $phase\n";
        
        if($phase == "final")
        {
            foreach ($queryPhase as $value) {                
                
                foreach ($loser as $value2) {
                    if(strcmp($value, $value2)==0)
                        echo "deu errro";
                    
                    //echo "$value2  ";
                }
                
            }
            return FALSE;
        }
        
        foreach ($loser as $value) {           
            // echo $value;
            if(array_search($value, $queryPhase))                                                    
              return TRUE;            
        }
        return FALSE;
    }

    //get all loser by phase
    public function getLoser($phase)
    {
        //get all goals team1        
        foreach ($this->file->xpath("//fase[@id='$phase']/jogo/time[1]/gols") as $value) {
            $goals1[] =(int) $value; 
        }
        //get all team1        
        foreach ($this->file->xpath("//fase[@id='$phase']/jogo/time[1]") as $value) {
            $team1[] =(string) $value;
        }
        //match team and goals
        for($i = 0; $i < count($team1); $i++)
        {
            $set1[] = array($team1[$i] ,$goals1[$i] );
        }
        
        foreach ($this->file->xpath("//fase[@id='$phase']/jogo/time[2]/gols") as $value) {
            $goals2[] =(int) $value; 
        }
                
        foreach ($this->file->xpath("//fase[@id='$phase']/jogo/time[2]") as $value) {
            $team2[] =(string) $value;
        }
        
        //match team2 and goals2
        for($i = 0; $i < count($team2); $i++)
        {
            $set2[] = array($team2[$i] ,$goals2[$i] );
        }
        
        //check what team is loser and put array
        for($i = 0; $i < count($set2); $i++)
        {
            if($set1[$i][1] > $set2[$i][1])
                $loser[] = trim($set2[$i][0]);
            else 
                $loser[] = trim($set1[$i][0]);            
        }
        
        if( $loser != null)
            return $loser;
        else 
            return null;        
    }


    //check loser 8ª 
    public function checkLoser8()
    {       
        $namePhase = "Oitavas-de-final";
        
        if($this->getLoser($namePhase) != null)
        {
            $loser = $this->getLoser($namePhase);           
        }
        
        if ($this->checkLoserByPhase("Quartas-de-final", $loser) ||
                $this->checkLoserByPhase("semifinal", $loser) || 
                $this->checkLoserByPhase("final", $loser))
        {
            echo "<br>achou erro <br>   ";
            new TMessage("error", "Validação encontrou um erro");
            exit(1);
        }                
    }
    
    //check loser 4ª 
    public function checkLoser4()
    {   
        
        
        $namePhase = "Quartas-de-final";
        
        if($this->getLoser($namePhase) != null)
        {
            $loser = $this->getLoser($namePhase);            
        }
        
        if ( $this->checkLoserByPhase("semifinal", $loser) || 
                $this->checkLoserByPhase("final", $loser))
        {
            echo "<br>achou <br>   ";
            new TMessage("error", "Validação encontrou um erro");
            exit(1);
        }                
    }
    
    //check loser semifinal 
    public function checkLoserSemi()
    {       
        $namePhase = "semifinal";
        
        if($this->getLoser($namePhase) != null)
        {
            $loser = $this->getLoser($namePhase);            
        }
        
        if ($this->checkLoserByPhase("final", $loser))
        {
            echo "<br>achou <br>   ";
            new TMessage("error", "Validação encontrou um erro");
            exit(1);
        }                
    }    
    
    public function __toString() {
        return "teste";
    }
    
    //create all files groupA.html, groupB.html ....
    public function outputGroup()
    {
        include_once 'CreateFile.php';
        
        new CreateFile("Grupo A","<h3>Grupo A</h3>". $this->getGroupA(),"grupoA.html");
        new CreateFile("Grupo B","<h3>Grupo B</h3>". $this->getGroupB(),"grupoB.html");
        new CreateFile("Grupo C","<h3>Grupo C</h3>". $this->getGroupC(),"grupoC.html");
        new CreateFile("Grupo D","<h3>Grupo D</h3>". $this->getGroupD(),"grupoD.html");
        new CreateFile("Grupo E","<h3>Grupo E</h3>". $this->getGroupE(),"grupoE.html");
        new CreateFile("Grupo F","<h3>Grupo F</h3>". $this->getGroupF(),"grupoF.html");
        new CreateFile("Grupo G","<h3>Grupo G</h3>". $this->getGroupG(),"grupoG.html");
        new CreateFile("Grupo H","<h3>Grupo H</h3>". $this->getGroupH(),"grupoH.html");        
    }    
}
?>