<?php

namespace sistema\Modelo;

use sistema\Nucleo\Modelo;
use sistema\Nucleo\Sessao;

/**
 * Description of UsuarioModelo
 *
 * @author conryr
 */
class UsuarioModelo extends Modelo {

    public function __construct() {
        parent::__construct('usuarios');
    }

    public function buscaPorEmail(string $email): ?UsuarioModelo {
        $busca = $this->busca("email = :e", "e={$email}");
        return $busca->resultado();
    }

    public function login(array $dados, int $level = 1) {
        $usuario = $this->buscaPorEmail($dados['email']);

        if (!$usuario || $dados['senha'] !== $usuario->senha) {
            $this->mensagem->alerta("Informações incorretas")->flash();
            return false;
        }

        if ($usuario->status !== 1) {
            $this->mensagem->alerta("Para fazer login, primeiro ative sua conta")->flash();
            return false;
        }
        
        if ($usuario->level < $level) {
            $this->mensagem->alerta("Usuário sem permissão")->flash();
            return false;
        }
        
        $ultimoLoginAnterior = $usuario->ultimo_login;

        $usuario->ultimo_login = date('Y-m-d H:i:s');
        $usuario->salvar();

        (new Sessao())->criar('usuarioId', $usuario->id);
        (new Sessao())->criar('ultimoLoginAnterior', $ultimoLoginAnterior);

        $this->mensagem->sucesso("{$usuario->nome}, seja bem vindo ao painel administrativo")->flash();
        return true;
    }

}
