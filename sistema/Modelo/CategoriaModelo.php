<?php

namespace sistema\Modelo;

use sistema\Nucleo\Conexao;

/**
 * Description of CategoriaModelo
 *
 * @author conryr
 */
class CategoriaModelo {

    public function busca(): array {
        $query = "SELECT * FROM categorias ORDER BY titulo ASC ";
        $stmt = Conexao::getInstancia()->query($query);
        $resultado = $stmt->fetchAll();
        return $resultado;
    }

    public function buscaAtivas(): array {
        $query = "SELECT * FROM categorias WHERE status = 1 ORDER BY titulo ASC ";
        $stmt = Conexao::getInstancia()->query($query);
        $resultado = $stmt->fetchAll();
        return $resultado;
    }

    public function buscaRecentes(int $limite = 5): array {
        $query = "SELECT * FROM categorias ORDER BY id DESC LIMIT {$limite}";
        $stmt = Conexao::getInstancia()->query($query);
        $resultado = $stmt->fetchAll();
        return $resultado;
    }

    public function buscaPorId(int $id): bool|object {
        $query = "SELECT * FROM categorias WHERE id = {$id} ";
        $stmt = Conexao::getInstancia()->query($query);
        $resultado = $stmt->fetch();
        return $resultado;
    }

    public function post(int $id): array {
        $query = "SELECT * FROM posts WHERE categoria_id = {$id} AND status = 1 ORDER BY id DESC";
        $stmt = Conexao::getInstancia()->query($query);
        $resultado = $stmt->fetchAll();
        return $resultado;
    }

    public function cadastrar(array $dados): bool {
        $query = "INSERT INTO categorias (titulo, texto, status) VALUES (:titulo, :texto, :status)";
        $stmt = Conexao::getInstancia()->prepare($query);
        $stmt->bindValue(':titulo', $dados['titulo']);
        $stmt->bindValue(':texto', $dados['texto']);
        $stmt->bindValue(':status', $dados['status']);
        return $stmt->execute();
    }

    public function armazenar(array $dados): void {
        $query = "INSERT INTO `categorias` (`titulo`, `texto`, `status`) VALUES (?, ?, ?)";
        $stmt = Conexao::getInstancia()->prepare($query);
        $stmt->execute(['titulo'], $dados['texto'], $dados['status']);
    }

    public function atualizar(array $dados, int $id): void {
        $query = "UPDATE categorias SET titulo = ?, texto = ?, status = ? WHERE id = {$id} ";
        $stmt = Conexao::getInstancia()->prepare($query);
        $stmt->execute([$dados['titulo'], $dados['texto'], $dados['status']]);
    }

    public function deletar(int $id): void
    {
        $query = "DELETE FROM categorias WHERE id = {$id} ";
        $stmt = Conexao::getInstancia()->prepare($query);
        $stmt->execute();
    }

}
