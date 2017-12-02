<?php
if ($_POST['group','date'])
{
    exec("java -jar pdfMaker/pdfmaker.jar group date", $output);   
}
?>