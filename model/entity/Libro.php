<?php 
namespace model\entity;

class Libro extends Produto{
    private array $autores = [];

    public function __construct(?int $id=null, string $nombre="", float $precio=0, string $imagePath="", array $autores = [])
     {
        parent::__construct($id, $nombre, $precio, $imagePath);
        $this->autores = $autores;
    }

    

    /**
     * Get the value of autores
     *
     * @return array
     */
    public function getAutores(): array
    {
        return $this->autores;
    }

    /**
     * Set the value of autores
     *
     * @param array $autores
     *
     * @return self
     */
    public function setAutores(array $autores): self
    {
        $this->autores = $autores;

        return $this;
    }

   

    public function __toString(): string {
        $cadea = parent::__toString();
        $cadea .= "Autores: " . implode(", ", $this->autores) . " <br/>";
        $cadea .= "------------ <br/>";
        return $cadea;
    }
}