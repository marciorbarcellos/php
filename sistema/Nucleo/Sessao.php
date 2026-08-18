<?php

namespace sistema\Nucleo;

/**
 * Description of Sessao
 *
 * @author conryr
 */
class Sessao {
    public function __construct() {
        if(session_id()){
            session_start();
        }
    }
    
    public function criar(string $chave, mixed $valor): Sessao
    {
        $_SESSION[$chave] = (is_array($valor) ? (object) $valor : $valor);
        return $this;
    }
    
    public function limpar() {
        
    }
    
    public function carregar() {
        
    }
    
    public function checar() {
        
    }
    
    public function deletar() {
        
    }    
}
