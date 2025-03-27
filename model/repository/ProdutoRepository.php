<?php

/**
 * Description of noteRepository
 *
 * @author maria
 */


class ProdutoRepository implements IProdutoRepository {

    const RUTA_FICHERO = "config" . DIRECTORY_SEPARATOR . "produtos.json";

    private $filePath;
    private $productosArray = [];

    public function __construct() {
        $this->filePath = dirname(__FILE__, 3) . DIRECTORY_SEPARATOR . self::RUTA_FICHERO;
        $this->productosArray = $this->getProductos();
    }

    public function getProductos(): array {

        //Leemos el fichoro JSON y se devuelve array con índices numéricos con tantos índices como notas haya.
        // El valor del array es a su vez un array asociativo con claves "id", "titulo", "contenido"
        $arrayFromJSON = json_decode(file_get_contents($this->filePath), true);
        $arrayProductos = [];
        if ($arrayFromJSON != null) {
            foreach ($arrayFromJSON as $index => $notaArrayAsoc) {

                $nota = Util::json_decode_array_to_class($notaArrayAsoc, "model\\entity\\Produto");
                array_push($arrayProductos, $nota);
            }
        }

        return $arrayProductos;
    }



}
