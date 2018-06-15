<?php

class Request
{
    private $post;
    private $get;
    private $put;
    private $delete;
    private $file;
    public function __construct(array $post, array $get, array $put, array $delete, array $file)
    {
        $this->post = $post;
        $this->get = $get;
        $this->put = $put;
        $this->delete = $delete;
        $this->file = $file;
    }

    /**
     * @return array
     */
    public function getFile() : array
    {
        return $this->file;
    }

    /**
     * @return array
     */
    public function getPost() : array
    {
        return $this->post;
    }

    /**
     * @return array
     */
    public function getGet() : array
    {
        return $this->get;
    }

    /**
     * @return array
     */
    public function getPut() : array
    {
        return $this->put;
    }

    /**
     * @return array
     */
    public function getDelete() : array
    {
        return $this->delete;
    }
    /**
     * Undocumented function
     *
     * @param string $base64
     * @param string $url
     * @param string $name
     * @param string $ext
     * @return string
     */
    public function getUrlBase64(string $base64, string $url, string $name, string $ext) : string
    {
        $name = $url . $name . $ext;
        $base_to_php = explode(',', $base64);
        $data = base64_decode($base_to_php[1]);
        file_put_contents($name, $data);
        return $name;
    }
}