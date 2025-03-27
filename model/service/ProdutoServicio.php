<?php

class ProdutoServicio {

    

    private IProdutoRepository $repository;

    public function __construct() {
        $this->repository = new ProdutoRepository();
    }

    /* Get all products */

    public function getProductos(): array {

        $notas = $this->repository->getProductos();

        return $notas;
    }

}

?>