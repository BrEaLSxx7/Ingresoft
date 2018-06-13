<?php

class Request
{
    private $post;
    private $get;
    private $put;
    private $delete;
    private $file;
    public function __construct(array $post, array $get, array $put, array $delete,array $file)
    {
        $this->post=$post;
        $this->get=$get;
        $this->put=$put;
        $this->delete=$delete;
        $this->file=$file;
    }

    /**
     * @return array
     */
    public function getFile(): array
    {
        return $this->file;
    }

    /**
     * @return array
     */
    public function getPost(): array
    {
        return $this->post;
    }

    /**
     * @return array
     */
    public function getGet(): array
    {
        return $this->get;
    }

    /**
     * @return array
     */
    public function getPut(): array
    {
        return $this->put;
    }

    /**
     * @return array
     */
    public function getDelete(): array
    {
        return $this->delete;
    }
}