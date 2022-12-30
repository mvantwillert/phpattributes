<?php
namespace Src\Controllers;

use Src\Attributes\Route;

class PokemonController
{
 
    public function __construct()
    {
    }
    
    #[Route(path: 'pokemon')]
    public function listAll(): void
    {
    }
}