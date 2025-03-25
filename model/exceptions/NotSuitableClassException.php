<?php
namespace model\exceptions;
class NotSuitableClassException extends \Exception
{

    private string $otraClase;

    const MSG = "A clase non é a axeitada: ";

    public function __construct(string $otraClase)
    {
        parent::__construct(self::MSG . $otraClase);
        $this->otraClase = $otraClase;
    }

    public function getOtraClase(): string
    {
        return $this->otraClase;
    }

}
