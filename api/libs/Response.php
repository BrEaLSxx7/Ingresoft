<?php
class Response
{
    public function responder(array $data, int $code, string $header = null)
    {
        http_response_code($code);
        header($header);
        echo json_encode($data);
    }
}