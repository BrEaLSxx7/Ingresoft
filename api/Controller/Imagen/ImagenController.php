<?php
require_once "model/ImagenModel.php";
require_once "libs/Response.php";

class ImagenController extends ImagenModel
{
    public function main(Request $request, Security $security)
    {
        $request->getPost()['nombre'];
        $answer = $this->getTable(['id', 'nombre'], 'usuario', ['id' => 1]);
        $res = $this->addTable(['nombre' => 'sebas', 'apllido' => 'ssasa'], 'usuario');
    }

}