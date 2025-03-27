<?php

namespace model\entity;
use model\interfaces\IComparar;
use model\exceptions\NotSuitableClassException;


class Produto implements IComparar  {
    use \ViewData;

    private const DEFAULT_IVA = 0.21;
    
    private ?int $id;  
    private string $nome;
    private float $prezo;
    private string $imagePath;

    private static int $unidades;
    
    public function __construct(?int $id=null, string $nome="", float $prezo=0, string $imagePath="") {
        $this->id = $id;
        $this->nome = $nome;
        $this->prezo = $prezo;
        $this->imagePath = $imagePath;
    }
    
    public function getId(): ?int {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getPrezo(): float {
        return $this->prezo;
    }

    public function getImagePath(): string {
        return $this->imagePath;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setPrezo(float $prezo): void {
        $this->prezo = $prezo;
    }

    public function setImagePath(string $imagePath): void {
        $this->imagePath = $imagePath;
    }


    public function comparar(object $prod): int{
        if(! $prod instanceof Produto){
            throw new NotSuitableClassException(get_class($prod));
        }
        else{
            return $this->prezo <=> $prod->getprezo();
        }
    }

    public function __toString(){
        $cadea = "<p>------------------</p>";
        $cadea .= "Id:" . $this->getId() . "<br/>";
        $cadea .= "Nome:" . $this->getnome() . "<br/>";
        $cadea .= "Prezo:" . $this->getprezo() . "<br/>";
     
        return $cadea;
    }
    

    /**
     * Get the value of unidades
     *
     * @return int
     */
    public static function getUnidades(): int
    {
        return self::$unidades;
    }

    /**
     * Set the value of unidades
     *
     * @param int $unidades
     */
    public static function setUnidades(int $unidades)
    {
        self::$unidades = $unidades;
    }

 
}
