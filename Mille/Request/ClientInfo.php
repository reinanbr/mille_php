<?php


namespace Mille\Request;

/**
 * Class ClientInfo
 *
 * Esta classe captura informações completas do cliente que está fazendo uma requisição ao servidor,
 * incluindo dados de GET, POST, COOKIES, HEADERS, e FILES.
 */
class ClientInfo {
    private $client_ip;
    private $user_agent;
    private $request_method;
    private $query_string;
    private $request_uri;
    private $server_name;
    private $port;
    private $protocol;
    private $referer;
    private $languages;
    private $remote_host;
    private $get_data;
    private $post_data;
    private $cookies;
    private $files;
    private $headers;

    /**
     * Construtor da classe ClientInfo.
     * Inicializa todas as variáveis com informações obtidas das superglobais $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES e os cabeçalhos HTTP.
     */
    public function __construct() {
        $this->client_ip = $_SERVER['REMOTE_ADDR'] ?? null;
        $this->user_agent = $_SERVER['HTTP_USER_AGENT'] ?? null;
        $this->request_method = $_SERVER['REQUEST_METHOD'] ?? null;
        $this->query_string = $_SERVER['QUERY_STRING'] ?? null;
        $this->request_uri = $_SERVER['REQUEST_URI'] ?? null;
        $this->server_name = $_SERVER['SERVER_NAME'] ?? null;
        $this->port = $_SERVER['SERVER_PORT'] ?? null;
        $this->protocol = $_SERVER['SERVER_PROTOCOL'] ?? null;
        $this->referer = $_SERVER['HTTP_REFERER'] ?? null;
        $this->languages = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? null;
        $this->remote_host = $_SERVER['REMOTE_HOST'] ?? null;

        // Captura todas as variáveis GET, POST, COOKIES, FILES e HEADERS
        $this->get_data = $_GET ?? [];
        $this->post_data = $_POST ?? [];
        $this->cookies = $_COOKIE ?? [];
        $this->files = $_FILES ?? [];
        $this->headers = getallheaders() ?? [];
    }

    /**
     * Retorna o endereço IP do cliente.
     *
     * @return string|null O endereço IP do cliente.
     */
    public function getClientIP() {
        return $this->client_ip;
    }

    /**
     * Retorna o User-Agent do cliente (informações sobre o navegador e sistema).
     *
     * @return string|null O User-Agent do cliente.
     */
    public function getUserAgent() {
        return $this->user_agent;
    }

    /**
     * Retorna o método da requisição (GET, POST, etc.).
     *
     * @return string|null O método da requisição HTTP.
     */
    public function getRequestMethod() {
        return $this->request_method;
    }

    /**
     * Retorna a query string enviada na URL.
     *
     * @return string|null A query string da requisição.
     */
    public function getQueryString() {
        return $this->query_string;
    }

    /**
     * Retorna o URI da requisição.
     *
     * @return string|null O URI da requisição.
     */
    public function getRequestUri() {
        return $this->request_uri;
    }

    /**
     * Retorna o nome do servidor.
     *
     * @return string|null O nome do servidor.
     */
    public function getServerName() {
        return $this->server_name;
    }

    /**
     * Retorna a porta usada na requisição.
     *
     * @return string|null A porta usada na requisição HTTP.
     */
    public function getPort() {
        return $this->port;
    }

    /**
     * Retorna o protocolo usado na requisição (HTTP/HTTPS).
     *
     * @return string|null O protocolo da requisição (HTTP/HTTPS).
     */
    public function getProtocol() {
        return $this->protocol;
    }

    /**
     * Retorna a URL de referência (página anterior), se disponível.
     *
     * @return string|null O referer HTTP, se disponível.
     */
    public function getReferer() {
        return $this->referer;
    }

    /**
     * Retorna os idiomas aceitos pelo cliente (cabeçalho HTTP).
     *
     * @return string|null Os idiomas aceitos pelo cliente.
     */
    public function getLanguages() {
        return $this->languages;
    }

    /**
     * Retorna o nome do host remoto, se disponível.
     *
     * @return string|null O nome do host remoto.
     */
    public function getRemoteHost() {
        return $this->remote_host;
    }

    /**
     * Retorna todos os dados GET da requisição.
     *
     * @return array Os dados da requisição GET.
     */
    public function getGetData() {
        return $this->get_data;
    }

    /**
     * Retorna todos os dados POST da requisição.
     *
     * @return array Os dados da requisição POST.
     */
    public function getPostData() {
        return $this->post_data;
    }

    /**
     * Retorna todos os cookies enviados pelo cliente.
     *
     * @return array Os cookies enviados na requisição.
     */
    public function getCookies() {
        return $this->cookies;
    }

    /**
     * Retorna todos os arquivos enviados via formulário na requisição.
     *
     * @return array Os arquivos enviados na requisição.
     */
    public function getFiles() {
        return $this->files;
    }

    /**
     * Retorna todos os cabeçalhos HTTP enviados pelo cliente.
     *
     * @return array Os cabeçalhos HTTP da requisição.
     */
    public function getHeaders() {
        return $this->headers;
    }
}

