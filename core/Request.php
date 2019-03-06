<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 06/03/2019
 * Time: 11:10
 */
namespace Core;
class Request
{
    private $post;
    private $get;
    private $files;
    private $request;
    private $server;
    private $cookie;
    private $session;

    public function __construct($post, $get, $files, $request, $server, $cookie, $session)
    {
        $this->post = $post;
        $this->get = $get;
        $this->files = $files;
        $this->request = $request;
        $this->server = $server;
        $this->cookie = $cookie;
        $this->session = $session;
    }

    static public function createFromGlobals() {
        session_start();
         return new Request($_POST, $_GET, $_FILES, $_REQUEST, $_SERVER, $_COOKIE, $_SESSION);
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @return mixed
     */
    public function getGet()
    {
        return $this->get;
    }

    /**
     * @return mixed
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return mixed
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @return mixed
     */
    public function getCookie()
    {
        return $this->cookie;
    }

    /**
     * @return mixed
     */
    public function getSession()
    {
        return $this->session;
    }

}