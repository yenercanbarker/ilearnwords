<?php
include('veritabani.php');

if ($_GET['kelime']) 
{
    try 
    {
        $query = $baglan->prepare("DELETE FROM kelimelerproje.kelimeler WHERE kelime = :kelime");
        $delete = $query->execute(array('kelime' => $_GET['kelime']));
        echo json_encode(array("statusCode"=>200));
    } 
    catch (PDOException $e) 
    {
        echo json_encode(array("statusCode"=>201));
        die($e->getMessage());
    }
    $baglan  = null;
}

?>