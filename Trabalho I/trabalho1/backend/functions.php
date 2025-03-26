<?php
function registrarAcesso($pagina)
{
    $dataHora = date('Y-m-d H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'];
    $navegador = getBrowser();
    // Usando o pipe como delimitador
    $log = "{$pagina}|{$dataHora}|{$ip}|{$navegador}\n";
    $arquivoLog = 'logs.txt';
    file_put_contents($arquivoLog, $log, FILE_APPEND);
}

function getBrowser()
{
    $userAgent = $_SERVER['HTTP_USER_AGENT']; //Pega o user agent do navegador
    $browsers = [
        'Edge' => 'Edg',
        'Chrome' => 'Chrome',
        'Firefox' => 'Firefox',
        'Safari' => 'Safari',
        'Opera' => 'OPR',
        'Internet Explorer' => 'MSIE|Trident'
    ];

    foreach ($browsers as $browser => $pattern) {
        if (preg_match("/$pattern/i", $userAgent)) {
            return $browser;
        }
    }
    return 'Desconhecido';
}