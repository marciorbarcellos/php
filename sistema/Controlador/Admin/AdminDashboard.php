<?php

namespace sistema\Controlador\Admin;

use sistema\Nucleo\Sessao;
use sistema\Nucleo\Helpers;
use sistema\Modelo\PostModelo;
use sistema\Modelo\CategoriaModelo;
use sistema\Modelo\UsuarioModelo;

/**
 *
 */
class AdminDashboard extends AdminControlador {

    public function dashboard(): void {
        $posts = new PostModelo();
        $categorias = new CategoriaModelo();
        $usuarios = new UsuarioModelo();

        $totalCategorias = count($categorias->busca());
        $ativasCategorias = count($categorias->buscaAtivas());

        echo $this->template->renderizar('dashboard.html', [
            'posts' => [
                'total' => $posts->busca()->total(),
                'ativo' => $posts->busca('status = 1')->total(),
                'inativo' => $posts->busca('status = 0')->total(),
            ],
            'categorias' => [
                'total' => $totalCategorias,
                'ativo' => $ativasCategorias,
                'inativo' => $totalCategorias - $ativasCategorias,
            ],
            'usuarios' => [
                'total' => $usuarios->busca()->total(),
                'ativo' => $usuarios->busca('status = 1')->total(),
                'inativo' => $usuarios->busca('status = 0')->total(),
            ],
            'admin' => [
                'total' => $usuarios->busca('level = 3')->total(),
                'ativo' => $usuarios->busca('level = 3 AND status = 1')->total(),
                'inativo' => $usuarios->busca('level = 3 AND status = 0')->total(),
            ],
            'ultimosPosts' => (new PostModelo())->busca()->ordem('id DESC')->limite('5')->resultado(true),
            'ultimasCategorias' => $categorias->buscaRecentes(5),
            'ultimoLoginAnterior' => (new Sessao())->ultimoLoginAnterior,
        ]);
    }

    public function sair(): void {
        $sessao = new Sessao();
        $sessao->limpar('usuarioId');

        $this->mensagem->informa('Você saiu do painel administrativo!')->flash();
        Helpers::redirecionar('admin/login');
    }

}
