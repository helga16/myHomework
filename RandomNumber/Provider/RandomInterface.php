<?php


namespace Alevel\RandomNumber\Provider;


use phpDocumentor\Reflection\Types\Integer;

interface RandomInterface
{
public function getNumber() : int;

}
