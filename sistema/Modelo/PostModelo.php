<?php

namespace sistema\Modelo;

use sistema\Nucleo\Conexao;

/**
 * Description of PostModelo
 *
 * @author conryr
 */
class PostModelo {

    public function busca(?string $termo = null): array
    {
        $termo = ($termo ? "WHERE {$termo}" : '' );
        $query = "SELECT * FROM posts ORDER BY id DESC ";
        $stmt = Conexao::getInstancia()->query($query);
        $resultado = $stmt->fetchAll();
        return $resultado;
    }

    public function buscaPorId(int $id): bool|object {
        $query = "SELECT * FROM posts WHERE id = {$id} ";
        $stmt = Conexao::getInstancia()->query($query);
        $resultado = $stmt->fetch();
        return $resultado;
    }

    public function cadastrar(array $dados): bool {
        $query = "INSERT INTO posts (categoria_id, titulo, texto, status) VALUES (:categoria_id, :titulo, :texto, :status)";
        $stmt = Conexao::getInstancia()->prepare($query);
        $stmt->bindValue(':categoria_id', $dados['categoria_id']);
        $stmt->bindValue(':titulo', $dados['titulo']);
        $stmt->bindValue(':texto', $dados['texto']);
        $stmt->bindValue(':status', $dados['status']);
        return $stmt->execute();
    }

    public function pesquisa(string $busca): array {
        $query = "SELECT * FROM posts WHERE titulo LIKE :busca1 OR texto LIKE :busca2 ORDER BY id DESC ";
        $stmt = Conexao::getInstancia()->prepare($query);
        $termo = '%' . $busca . '%';
        $stmt->bindValue(':busca1', $termo);
        $stmt->bindValue(':busca2', $termo);
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        return $resultado;
    }

    public function armazenar(array $dados): void {
        $query = "INSERT INTO posts (categoria_id, `titulo`, `texto`, `status`) VALUES (:categoria_id, :titulo, :texto, :status)";
        $stmt = Conexao::getInstancia()->prepare($query);
        $stmt->execute($dados);
    }

    public function atualizar(array $dados, int $id): void {
        $query = "UPDATE posts SET categoria_id = :categoria_id, titulo = :titulo, texto = :texto, status = :status WHERE id = {$id} ";
        $stmt = Conexao::getInstancia()->prepare($query);
        $stmt->execute($dados);
    }

    public function deletar(int $id): void {
        $query = "DELETE FROM posts WHERE id = {$id} ";
        $stmt = Conexao::getInstancia()->prepare($query);
        $stmt->execute();
    }

    public function total(?string $termo = null):int {
        $termo = ($termo ? "WHERE {$termo}" : '' );
        
        $query = "SELECT * FROM posts {$termo}";
        $stmt = Conexao::getInstancia()->prepare($query);
        $stmt->execute();
        
        return $stmt->rowCount();
    }

}
