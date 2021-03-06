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


    static public function createFromGlobals()
    {
        session_start();
        return new Request($_POST, $_GET, $_FILES, $_REQUEST, $_SERVER, $_COOKIE, $_SESSION);
    }

    /**
     * @param null|string $key
     * @return null|string|array
     */
    public function getPost($key = null)
    {
        if (is_null($key)) {
            return $this->post;
        }

        if (isset($this->post[$key])) {
            return $this->post[$key];
        }

        return null;
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
     * @param null|string $key
     * @return mixed
     */
    public function getServer($key = null)
    {
        if (is_null($key)) {
            return $this->server;
        }

        return $this->server[$key];
    }

    /**
     * @return mixed
     */
    public function getCookie()
    {
        return $this->cookie;
    }

    /**
     * @param null|string $key
     * @return mixed
     */
    public function getSession($key = null)
    {
        if (is_null($key))
            return $this->session;

        if (isset($this->session[$key])) {
            return $this->session[$key];
        }
        return null;
    }

}