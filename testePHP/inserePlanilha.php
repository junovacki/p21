<?php

require('library\src\SimpleXLSX.php');
session_start();
$nome_temporario=$_FILES["Arquivo"]["tmp_name"];
$nome_real=$_FILES["Arquivo"]["name"];
$new = simplexml_load_string($_SESSION["json"]);
//Precisei setar manualmente o caminho para o arquivo xlsx indicado no teste, pois nao consegui recuperar o input arquivo no files
$_FILES['Arquivo']['tmp_name'] = "C:\Users\junov\Downloads\clientes.xlsx";
use Shuchkin\SimpleXLSX;
$_xlsx = new SimpleXLSX($_FILES['Arquivo']['tmp_name']);
$pulaPrimeiraLinha = 0;
$dadosDiferentes = false;

  
// Convert into json
$con = json_encode($new);
  
// Convert into associative array
$newArr = json_decode($con, true);
$true = true;

//var_dump($_xlsx->rows());
var_dump(sizeof($newArr['torcedor']));
var_dump(sizeof($_xlsx->rows()));

if(sizeof($newArr['torcedor']) == sizeof($_xlsx->rows())){
  foreach($_xlsx->rows() as $key1 => $dadosExcel){
    if($pulaPrimeiraLinha > 0){
      foreach($dadosExcel as $key => $dadoUsuario){
        foreach($newArr['torcedor'][$key1 - 1]['@attributes'] as $dadosExatosPlanilha){
          if($dadoUsuario != $dadosExatosPlanilha){
            $dadosDiferentes = true;
          }
        }
      }
    }
    $pulaPrimeiraLinha = $pulaPrimeiraLinha + 1;
  }
  $pulaPrimeiraLinha=0;
}elseif(sizeof($newArr['torcedor']) > sizeof($_xlsx->rows()) || sizeof($newArr['torcedor']) < sizeof($_xlsx->rows())){
  $dadosDiferentes = true;
}


if($dadosDiferentes){
  echo"<script language='javascript' type='text/javascript'>
                alert('Existem Dados diferentes do XML informado, dados diferentes serao inseridos');</script>";
}

$dbHost = "localhost";
$dbDatabase = "allblacks";
$dbPasswrod = "";
$dbUser = "root";
$mysqli = new mysqli($dbHost, $dbUser, $dbPasswrod, $dbDatabase);


foreach($_xlsx->rows() as $key1 => $dadosExcel){
    if($pulaPrimeiraLinha > 0){
      $sql = "INSERT INTO dados_torcedores (NOME, DOCUMENTO, CEP, ENDERECO, BAIRRO, CIDADE, UF, TELEFONE, EMAIL, ATIVO)
      VALUES ('".$dadosExcel[0]."', '".$dadosExcel[1]."', '".$dadosExcel[2]."', '".$dadosExcel[3]."', '".$dadosExcel[4]."', '".$dadosExcel[5]."', '".$dadosExcel[6]."', '".$dadosExcel[7]."', '".$dadosExcel[8]."', '".$dadosExcel[9]."' )";
      $mysqli->query($sql);
      
    }
    $pulaPrimeiraLinha = $pulaPrimeiraLinha + 1;
}

$mysqli->close();

?>