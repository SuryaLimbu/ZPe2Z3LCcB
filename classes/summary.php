<?php
// include 'htmlTable.php';

class getSummary
{
    private $table = "",$header = "",$className = "",$id = "";
    function __construct()
    {
        $this->table = new createTable();
    }    
    public function setData($title,$content){
        $this->table->addRow(array("<strong>$title</strong>",$content));
    }

    public function setHeader($header){
        $this->header = $header;
    }
    public function setClass($className){
        $this->className = $className;
    }
    public function setID($id){
        $this->id = $id;
    }
    public function getHTML(){
        $content = '';
        $content .= "<div ";
        if (isset($this->className)) {
            $content .= "class='".$this->className."'";
        }else{
            $content .= "id='".$this->id."'";
        }
        $content .= " >";
        $content .= "<h3>$this->header</h3>";
        $content .= $this->table->getHTML();
        $content .= "</div>";

        return $content;
    }
 }

?>