<?php
session_start();
// Convert xml string into an object
$new = simplexml_load_string($_POST['xml']);
  
// Convert into json
$con = json_encode($new);
  
// Convert into associative array
$newArr = json_decode($con, true);
$_SESSION["json"] = $_POST['xml'];



header ("Content-type: application/x-msexcel");
header("Content-type: application/force-download");
header("Content-Disposition: attachment; filename=clienteFormatado.xlsx");
header("Pragma: no-cache");
?>
<meta charset='utf-8'>
<table>
    <tr>
        <th>NOME</th>
        <th>DOCUMENTO</th>
        <th>CEP</th>
        <th>ENDEREÇO</th>
        <th>BAIRRO</th>
        <th>CIDADE</th>
        <th>UF</th>
        <th>TELEFONE</th>
        <th>E-MAIL</th>
        <th>ATIVO</th>
    </tr>
    <?php
       foreach($newArr as $torcedor){
        foreach($torcedor as $posArray){
        
    ?>
    <tr>
        <td><?= $posArray['@attributes']['nome']; ?></td>
        <td><?= $posArray['@attributes']['documento']; ?></td>
        <td><?= $posArray['@attributes']['cep']; ?></td>
        <td><?= $posArray['@attributes']['endereco']; ?></td>
        <td><?= $posArray['@attributes']['bairro']; ?></td>
        <td><?= $posArray['@attributes']['cidade']; ?></td>
        <td><?= $posArray['@attributes']['uf']; ?></td>
        <td><?= $posArray['@attributes']['telefone']; ?></td>
        <td><?= $posArray['@attributes']['email']; ?></td>
        <td><?= $posArray['@attributes']['ativo']; ?></td>
    </tr>

    <?php
            }
        } 
    ?>
</table>