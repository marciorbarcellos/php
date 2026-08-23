<?php

namespace sistema\Modelo;

use sistema\Nucleo\Conexao;
use sistema\Nucleo\Modelo;

/**
 * Description of PostModelo
 *
 * @author conryr
 */
class PostModelo extends Modelo
{

    public function __construct()
    {
        parent::__construct('posts');
    }
}
