<?php

/*
  Uploadify
  Copyright (c) 2012 Reactive Apps, Ronnie Garcia
  Released under the MIT License <http://www.opensource.org/licenses/mit-license.php>
 */

$targetFolder = '../../arquivos/'; // Relative to the root
$folderName = $_POST['folder'];

if ($folderName != 'nova') {
    $tipoArquivo = pathinfo($_FILES['Filedata']['name']);
    $tipoArquivo = '.' . $tipoArquivo['extension'];
    $nomeArquivo = str_replace(' ', '', $_FILES['Filedata']['name']);
    $nomeArquivo = preg_replace('/\.[^.]*$/', '', $nomeArquivo);
    $nomeArquivo .=  '-' . date("Y-m-dH:i:s") . $tipoArquivo;
    $tempFile = $_FILES['Filedata']['tmp_name'];

    $targetPath = $targetFolder . $folderName . '/';
    $targetFile = $targetPath . $nomeArquivo;


    move_uploaded_file($tempFile, $targetFile);
}
?>