<?php
function selectAllTypes($pdo)
{
    try{
        $query = "select * from type";
        $selectAllTypes = $pdo->prepare($query);
        $selectAllTypes->execute();
        $types = $selectAllTypes->fetchAll();
        return $types;
    }
    catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}
function ajouterTypesGemmes($pdo, $gemmesID, $typeID){
    try{
        $query = "insert into gemmes_typeID (gemmesID, typeID) values (:gemmesID, :typeID)";
        $selectAllTypes = $pdo->prepare($query);
        $selectAllTypes->execute([
            'gemmesID' => $gemmesID,
            'typeID' => $typeID
        ]);
    }
    catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}