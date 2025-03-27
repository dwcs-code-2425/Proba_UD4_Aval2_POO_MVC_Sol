<?php

class ProdutoController {

    public $page_title;
    public $view;
    private $productoServicio;

    public function __construct() {
        $this->view = 'produto/list_products';
        $this->page_title = '';
        $this->productoServicio = new ProdutoServicio();
    }

    /* List all products */

    public function list() {
        $this->page_title = 'Listado de productos';

        return $this->productoServicio->getProductos();
    }

   

}

?>
