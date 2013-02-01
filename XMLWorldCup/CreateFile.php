<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CreateFile
 *
 * @author evandro
 */
class CreateFile {
    //put your code here
    private $text;
    private $title;
    private $name;

    public function __construct($title, $text, $name) {
        $this->title = $title;
        $this->text = $text;        
        $this->name = $name;       
        
        //make output content
        $this->process();
    }
    //header hmtl files
    public function header($title)
    {
        return "<html>
                <head>".
                "<META http-equiv='Content-Type' content='text/html; charset=ISO-8859-1' />
                <title>$title</title>
                </head>";           
            ;             
    }
    
    //footer html files
    public function footer($content="")
    {
        return $content."</html>";
    }
    
    //part main html files
    public function main($text)
    {
        return "<body>
                $text
                </body>";
        
    }
    
    //create file
    private function process()
    {
        $file = $this->header($this->title);
        $file .=$this->main($this->text);
        $file .=$this->footer("<div><a href='home.html'>HOME</a></div>");

        
        
        //create file with content
        if(file_put_contents($this->name, $file))
          {
                    echo 'deu certo';                    
          }
          else 
          {
                echo 'nao deu certo';
                return null;
          }
    }
}

?>
