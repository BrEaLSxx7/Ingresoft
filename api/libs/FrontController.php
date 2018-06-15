<?php
require_once 'libs/Request.php';
require_once 'libs/Security.php';

class FrontController
{
    private $folder = '';
    private $controller = '';

    /**
     * Undocumented function
     *
     * @return void
     */
    public function run()
    {
        $this->friendUrl();
        $request = $this->request();
        $this->LoadController();
        $controller = new $this->controller();
        $security = $this->security();
        $controller->main($request, $security);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    private function LoadController()
    {
        require_once __DIR__ . '../../Controller/' . $this->folder . '/' . $this->controller . '.php';
    }

    /**
     * @return \Security
     */
    private function security(): Security
    {
        return new Security();
    }

    /**
     * Undocumented function
     *
     * @return Request
     */
    private function request(): Request
    {
        $tmp = explode(';', $_SERVER['CONTENT_TYPE']);
        $post = array();
        $get = array();
        $put = array();
        $delete = array();
        $files = array();
        if ('multipart/form-data' === $tmp[0]) {
            $files = $_FILES;
        }
        if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
            $post = $_REQUEST;
        } else {
            if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET') {
                $get = $_REQUEST;
            } else {
                if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'PUT') {
                    $put = $_REQUEST;
                } else {
                    if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') == 'DELETE') {
                        $delete = $_REQUEST;
                    }
                }
            }
        }
        return new Request($post, $get, $put, $delete, $files);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    private function friendUrl(): void
    {
        $load = explode("/", $_SERVER['PATH_INFO']);
        $this->folder = $load[1];
        $this->controller = $load[1] . 'Controller';
    }

    protected function config()
    {
        $gestor = fopen('config/.env', 'r');
        $config = explode('
', fread($gestor, filesize("config/.env")));
        $driver = [];
        foreach ($config as $key => $value) {
            array_push($driver, explode("=", $value));
        }
        $drive = [];
        for ($i = 0; $i < count($driver); $i++) {
            array_push($drive, $driver[$i][1]);
        }
        return $drive;
    }
}