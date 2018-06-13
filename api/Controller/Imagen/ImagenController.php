<?php
require_once "model/ImagenModel.php";
require_once "libs/Response.php";

class ImagenController extends ImagenModel
{
    public function main(Request $request)
    {
        $base64 = $request->getPost()['base64'];
        $name = '/home/sebascano/developer/pruebas/subir-archivos/public/img/' . $request->getPost()['name'] . '.png';
        $base_to_php = explode(',', $base64);
        $data = base64_decode($base_to_php[1]);
        var_dump($base_to_php);
        var_dump($name);
        file_put_contents($name, $data);
        // move_uploaded_file($data, $name);
    }

}