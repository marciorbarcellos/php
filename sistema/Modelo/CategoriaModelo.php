<?php

namespace sistema\Modelo;

use sistema\Nucleo\Conexao;

/**
 * Description of CategoriaModelo
 *
 * @author conryr
 */
class CategoriaModelo {

    public function busca(): array
    {
        $query = "SELECT * FROM categorias ORDER BY titulo ASC ";
        $stmt = Conexao::getInstancia()->query($query);
        $resultado = $stmt->fetchAll();
        return $resultado;
    }

    public function buscaPorId(int $id): bool|object
    {
        $query = "SELECT * FROM categorias WHERE id = {$id} ";
        $stmt = Conexao::getInstancia()->query($query);
        $resultado = $stmt->fetch();
        return $resultado;
    }

    public function post(int $id): array
    {
        $query = "SELECT * FROM posts WHERE categoria_id = {$id} AND status = 1 ORDER BY id DESC";
        $stmt = Conexao::getInstancia()->query($query);
        $resultado = $stmt->fetchAll();
        return $resultado;
    }
    
        public function cadastrar(array $dados): bool
    {
        $query = "INSERT INTO categorias (titulo, status) VALUES (:titulo, :status)";
        $stmt = Conexao::getInstancia()->prepare($query);
        $stmt->bindValue(':titulo', $dados['titulo']);
        $stmt->bindValue(':status', $dados['status']);
        return $stmt->execute();
    }
    
    public function armazenar(array $dados):void
    {
        $query = "INSERT INTO `categorias` (`id`, `titulo`, `texto`, `status`) VALUES (NULL, 'teste', 'teste', '0');";
    }

}
