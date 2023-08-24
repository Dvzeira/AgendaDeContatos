<?php
session_start();
include_once("conection.php");
include_once("url.php");
$id;
$contacts = [];
if(!empty($_GET)){
    $id = $_GET['id'];
}


if(!empty($id)){
 $query = "SELECT * FROM contacts WHERE id = :id";
  $stm = $conection -> prepare($query);
  $stm -> bindParam(":id", $id);
  $stm -> execute();
 $contact =  $stm -> fetch();
}else{
   
    $querySelect = "SELECT * FROM contacts";
    $stmt = $conection->prepare($querySelect);
    $stmt->execute();
    $contacts = $stmt->fetchAll();
}



if(!empty($_POST)){
    $type = $_POST['type'];
if($type == "create"){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $observations = $_POST['observations'];
  $stm = $conection -> prepare("INSERT INTO contacts (name, phone, observations) VALUES 
  (:name,:phone,:observations)");
  $stm -> bindParam(":name",$name);
  $stm -> bindParam(":phone",$phone);
  $stm -> bindParam(":observations",$observations);
  $stm -> execute();
  header("Location: " . $BASE_URL . "../index.php");
exit();
} else if($type == "edit") {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $observations = $_POST['observations'];
    $id = $_POST["id"];

    $query = "UPDATE contacts 
              SET name = :name, phone = :phone, observations = :observations 
              WHERE id = :id";

    $stmt = $conection->prepare($query);

    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":observations", $observations);
    $stmt->bindParam(":id", $id);
    try {
       $stmt -> execute();
       $_SESSION['msg'] = "Editado com sucesso";
    } catch (\Throwable $e) {
      echo $e->getMessage();
    }
    
    
    header("Location: " . $BASE_URL . "../index.php");
  } 
else if($type == "delete"){
    $id = $_POST['id'];
    $smt = $conection -> prepare("DELETE FROM contacts WHERE ID = :id");
    $smt -> bindParam(':id',$id);
    $smt-> execute();
    $_SESSION['msg'] = "contato removido com sucesso";
        
    header("Location: " . $BASE_URL . "../index.php");
}
}



