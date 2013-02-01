<?php
/**
 * Description of Champion
 *
 * @author evandro
 */
class Champion {
    //put your code here
    private $file;
    private $winner;
    
    private $start;
    private $end;
    
    public function __construct($start, $end) {
        $this->start = $start;
        $this->end = $end;
        $this->checkWinner();
    }
    
    public function checkWinner()
    {        
        //load file xml
         $this->file = simplexml_load_file("schema.xml");         
         //query by final fase
         $vet = $this->file->xpath("//fase[@id='final']/jogo");
         
         $time1 = (int)$vet[0]->time[0]->gols;
         $time2 = (int)$vet[0]->time[1]->gols;         
         
         if($time1 > $time2)         
             $this->winner = $vet[0]->time[0];                                 
            else             
             $this->winner = $vet[0]->time[1];                                                           
    }
    
    //look for all game
    public function getGamesChampion()
    {
        //test if change brasil per this->winer to works
        $vet = $this->file->xpath("//time[contains(., 'Brasil')]/..");
        
        $string = "";
        
        foreach ($vet as $key => $value) {
            $string .= $this->start. $value->time[0]." ".$value->time[0]->gols. " X ".
                    $value->time[1]->gols ." ".$value->time[1].$this->end;
        }
        
        return $string;
    }
    
    public function outputChampion()
    {
        include_once 'CreateFile.php';
        new CreateFile("Campeão", "<h2>Campeão $this->winner"."</h2>".$this->getGamesChampion(),
                "campeao.html");
    }
}

?>
