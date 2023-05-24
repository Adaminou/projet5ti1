<?php
function selectAllRarete($pdo)
{
    try{
        $query = "select * from rarete";
        $selectAllRarete = $pdo->prepare($query);
        $selectAllRarete->execute();
        $raretes = $selectAllRarete->fetchAll();
        return $raretes;
    }
    catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}