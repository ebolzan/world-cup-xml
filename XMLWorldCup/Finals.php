<?php
/**
 * Description of Finals, make games of team champion
 *
 * @author evandro, l felipe
 */
class Finals {
    //put your code here
    private $start;
    private $end;
    private $file;

    public function __construct($start, $end) {
        
        $this->start = $start;
        $this->end = $end;
        $this->file = simplexml_load_file("schema.xml");         
    }
    
    //get primeira format html output
    public function getPrimeira()
    {
        //Oitavas-de-final
        $vet = $this->file->xpath("//fase[@id='primeira']/grupo/jogo");
        
        $string= "";
        foreach ($vet as $key => $value)
        {
            $string .= $this->start. $value->time[0]." ".$value->time[0]->gols ." X " ." ". 
                            $value->time[1]->gols." ".$value->time[1].$this->end."\n"; 
        }
        
        return $string;
    }

    //get oitavas format html output
    public function getOitavas()
    {
        //Oitavas-de-final
        $vet = $this->file->xpath("//fase[@id='Oitavas-de-final']/jogo");
        
        $string= "";
        foreach ($vet as $key => $value)
        {
            $string .= $this->start. $value->time[0]." ".$value->time[0]->gols ." X " ." ". 
                            $value->time[1]->gols." ".$value->time[1].$this->end."\n"; 
        }
        
        return $string;        
    }
    
    //get quartas format html output
    public function getQuartas()
    {
        //Quartas-de-final
        $vet = $this->file->xpath("//fase[@id='Quartas-de-final']/jogo");
        
        $string= "";
        foreach ($vet as $key => $value)
        {
            $string .= $this->start. $value->time[0]." ".$value->time[0]->gols ." X " ." ". 
                            $value->time[1]->gols." ".$value->time[1].$this->end."\n"; 
        }
        
        return $string;        
    }
    
    //get semifinais format html output
    public function getSemifinais()
    {        
        //seminifinais
        $vet = $this->file->xpath("//fase[@id='semifinal']/jogo");
        
        $string= "";
        foreach ($vet as $key => $value)
        {
            $string .= $this->start. $value->time[0]." ".$value->time[0]->gols ." X " ." ". 
                            $value->time[1]->gols." ".$value->time[1].$this->end."\n"; 
        }
        
        return $string;
    }
    
    //get game final, format hmtl
    public function getFinal()
    {
        $vet = $this->file->xpath("//fase[@id='final']/jogo");
        
        $string= "";
        foreach ($vet as $key => $value)
        {
            $string .= $this->start. $value->time[0]." ".$value->time[0]->gols ." X " ." ". 
                            $value->time[1]->gols." ".$value->time[1].$this->end."\n"; 
        }
        
        return $string;        
    }

    //print html out
    public function outputFinal()
    {    
        include_once 'CreateFile.php';                
        
        new CreateFile("Primeira fase", "<h2>Primeira fase</h2>".
                $this->getPrimeira()."<a href='oitavas.html'>next</a>","primeira.html");
        
        new CreateFile("Oitavas de Final", "<h2>Oitavas de Final</h2>".
                $this->getOitavas()."<a href='quartas.html'>next</a>","oitavas.html");
        new CreateFile("Quartas de Final", "<h2>Quartas de Final</h2>".
                $this->getQuartas()."<a href='semifinal.html'>next</a>","quartas.html");
        new CreateFile("Semifinal de Final", "<h2>Semifinal</h2>".
                $this->getSemifinais()."<a href='final.html'>next</a>","semifinal.html");                
        new CreateFile("Final", "<h2>Final</h2>".$this->getFinal(),"final.html");                
    }    
}
?>