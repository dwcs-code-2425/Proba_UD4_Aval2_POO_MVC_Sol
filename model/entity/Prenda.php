<?php 
namespace model\entity;
class Prenda extends Produto{
    private ?string $cor;

    public function __construct(?int $id=null, string $nombre="", float $precio=0, string $imagePath="", string $cor = null)
    {
       parent::__construct($id, $nombre, $precio, $imagePath);
  
        $this->cor = $cor;
    }


    

    /**
     * Get the value of cor
     *
     * @return ?string
     */
    public function getCor(): ?string
    {
        return $this->cor;
    }

    /**
     * Set the value of cor
     *
     * @param ?string $cor
     *
     * @return self
     */
    public function setCor(?string $cor): self
    {
        $this->cor = $cor;

        return $this;
    }



    public function __toString(): string {
        $cadena = parent::__toString();
        $cadena .= "Cor: " . $this->cor ." <br/>";
      
        return $cadena;
    }
}