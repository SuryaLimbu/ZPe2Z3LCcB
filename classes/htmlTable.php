<?php
class createTable
{
    private $htmlText = "",$class = "",$id = "";

    function addHeader($row)
    {
        $this->htmlText .= "<tr>";
        foreach ($row as $value) {
            $this->htmlText .= "<th>$value</th>";
        }
        $this->htmlText .= "<tr>";
    }
    function addRow($row)
    {
        $this->htmlText .= "<tr>";
        foreach ($row as $value) {
            $this->htmlText .= "<td>$value</td>";
        }
        $this->htmlText .= "<tr>";
    }
    function setClass($class){
        $this->class = $class;
    }
    function setID($id){
        $this->id = $id;
    }

    function getHTML(){
        if (isset($this->class)) {
            return "<table class = '$this->class'>$this->htmlText</table>";
        }else{
            return "<table id = '$this->id'>$this->htmlText</table>";
        }
        
    }
}
