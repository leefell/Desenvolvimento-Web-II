<?php
function registrarAcesso($pagina)
{
    $dataHora = date('Y-m-d H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'];
    $navegador = $_SERVER['HTTP_USER_AGENT'];
    $log = "{$pagina};{$dataHora};{$ip};{$navegador}\n";

    // Nome do arquivo de log (pode ser um arquivo .txt na mesma pasta ou em um diretório com permissões adequadas)
    $arquivoLog = 'logs.txt';

    // Abre (ou cria) o arquivo e grava o log
    file_put_contents($arquivoLog, $log, FILE_APPEND);
}
?>