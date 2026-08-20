<?php

namespace sistema\Controlador;

use sistema\Nucleo\Controlador;
use sistema\Modelo\PostModelo;
use sistema\Nucleo\Helpers;
use sistema\Modelo\CategoriaModelo;

class SiteControlador extends Controlador
{

    public function __construct()
    {
        parent::__construct('templates/site/views');
    }

    public function index(): void
    {
        $posts = (new PostModelo())->busca(null, 'titulo ASC');

        echo $this->template->renderizar('index.html', [
            'posts' => $posts,
            'categorias' => $this->categorias(),
        ]);
    }

    public function buscar(): void
    {
        $busca = filter_input(INPUT_POST, 'busca', FILTER_DEFAULT);
        if (isset($busca)) {
            $posts = (new PostModelo())->pesquisa($busca);

            if (empty($posts)) {
                echo "<div class='w-100 p-3 rounded' style='background-color:#fff3cd; color:#000;'>Nenhum Resultado encontrado</div>";
                return;
            }

            echo "<div class='w-100 p-3 rounded' style='background-color:#fff; color:#000;'>";
            foreach ($posts as $post) {
                // echo "<li class='list-group-item fw-bold'><a href='" . Helpers::url('post/') . $post->id . "'>$post->titulo</a></li>";

                echo "<a href='".Helpers::url('post/').$post->id."' class='d-block py-2 text-decoration-none' style='color:#000; border-bottom:1px solid #ddd;'>".htmlspecialchars($post->titulo)."</a>";
            }
            echo "</div>";
        }
    }

    public function post(int $id): void
    {
        $post = (new PostModelo())->buscaPorId($id);
        if (!$post) {
            Helpers::redirecionar('404');
        }

        echo $this->template->renderizar('post.html', [
            'post' => $post,
            'categorias' => $this->categorias(),
        ]);
    }

    public function categorias()
    {
        return (new CategoriaModelo())->buscaAtivas();
    }

    public function sobre(): void
    {
        echo $this->template->renderizar('sobre.html', [
            'titulo' => 'Sobre',
            'subtitulo' => 'Sobre nós',
            'categorias' => $this->categorias(),
        ]);
    }

    public function erro404(): void
    {
        echo $this->template->renderizar('404.html', [
            'titulo' => 'Página não encontrada',
            'categorias' => $this->categorias(),
        ]);
    }
}
