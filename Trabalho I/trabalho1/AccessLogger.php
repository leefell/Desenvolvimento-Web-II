<?php
/**
 * AccessLogger.php
 * 
 * Classe para manipulação dos logs e contadores usando arquivos TXT.
 */
class AccessLogger
{
    private $logFile = 'logs.txt';
    private $counterFile = 'counters.txt';

    public function __construct()
    {
        // Se o arquivo de contadores não existir, cria com valores zerados.
        if (!file_exists($this->counterFile)) {
            $data = [
                'index.php' => 0,
                'sobre.php' => 0,
                'contato.php' => 0,
                'total' => 0
            ];
            $this->saveCounters($data);
        }
    }

    /**
     * Registra um acesso:
     * - Adiciona uma linha no arquivo logs.txt.
     * - Atualiza o contador da página e o total no arquivo counters.txt.
     */
    public function registrarAcesso($pagina)
    {
        $dataHora = date('Y-m-d H:i:s');
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $navegador = $this->getBrowser();
        $linha = "{$pagina}|{$dataHora}|{$ip}|{$navegador}\n";
        file_put_contents($this->logFile, $linha, FILE_APPEND);

        $counters = $this->getCounters();
        if (array_key_exists($pagina, $counters)) {
            $counters[$pagina]++;
        }
        $counters['total']++;
        $this->saveCounters($counters);
    }

    /**
     * Retorna os logs como array de arrays associativos.
     * Cada log possui as chaves: 'pagina', 'dataHora', 'ip' e 'navegador'.
     */
    public function getLogs()
    {
        $logs = [];
        if (file_exists($this->logFile)) {
            $linhas = file($this->logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($linhas as $linha) {
                $parts = explode('|', $linha);
                if (count($parts) === 4) {
                    $logs[] = [
                        'pagina' => $parts[0],
                        'dataHora' => $parts[1],
                        'ip' => $parts[2],
                        'navegador' => $parts[3]
                    ];
                }
            }
        }
        return $logs;
    }

    /**
     * Retorna os acessos (contadores) ordenados por página.
     * Exclui o total.
     */
    public function getAcessosOrdenados()
    {
        $counters = $this->getCounters();
        // Remove a chave 'total' para não misturar no array de páginas
        unset($counters['total']);

        // Agora, ordena do maior para o menor valor
        arsort($counters);

        return $counters;
    }


    /**
     * Retorna o total de acessos.
     */
    public function getTotalAcessos()
    {
        $counters = $this->getCounters();
        return $counters['total'];
    }

    /**
     * Limpa todos os logs (apaga o conteúdo do arquivo logs.txt).
     */
    public function clearAllLogs()
    {
        file_put_contents($this->logFile, '');
    }

    /**
     * Limpa os acessos de uma página específica.
     * Atualiza também o total subtraindo o valor limpo.
     */
    public function clearAllAccess($page)
    {
        $counters = $this->getCounters();
        if (isset($counters[$page])) {
            $valor = $counters[$page];
            $counters[$page] = 0;
            $counters['total'] = $counters['total'] - $valor;
            $this->saveCounters($counters);
        }
    }

    /**
     * Lê os contadores do arquivo counters.txt.
     * Caso o arquivo não exista, cria com os valores padrão.
     */
    private function getCounters()
    {
        if (!file_exists($this->counterFile)) {
            $data = [
                'index.php' => 0,
                'sobre.php' => 0,
                'contato.php' => 0,
                'total' => 0
            ];
            $this->saveCounters($data);
            return $data;
        }

        $linhas = file($this->counterFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $counters = [
            'index.php' => 0,
            'sobre.php' => 0,
            'contato.php' => 0,
            'total' => 0
        ];

        foreach ($linhas as $linha) {
            // Exemplo de linha: "sobre.php=3"
            $parts = explode('=', $linha);
            if (count($parts) === 2) {
                $chave = trim($parts[0]);
                $valor = (int) trim($parts[1]);
                if (array_key_exists($chave, $counters)) {
                    $counters[$chave] = $valor;
                }
            }
        }
        return $counters;
    }

    /**
     * Salva os contadores no arquivo counters.txt.
     */
    private function saveCounters($counters)
    {
        $conteudo = "";
        foreach ($counters as $chave => $valor) {
            $conteudo .= "{$chave}={$valor}\n";
        }
        file_put_contents($this->counterFile, $conteudo);
    }

    /**
     * Identifica o navegador do usuário a partir do user agent.
     */
    private function getBrowser()
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
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
}
