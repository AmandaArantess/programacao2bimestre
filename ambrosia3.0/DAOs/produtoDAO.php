<?php
    class produtoDAO
    {
        public function inserir(Produto $obj) {
            require_once 'conexao_bd.php';
            require_once '../models/produto.php';
            require_once '../Helpers/funcoes.php';
    
            $stmt = $conn->prepare('INSERT INTO  ambrosias_produtos (codProduto,nomeProduto,precoProduto,pesoProduto,descricaoProduto) 
            values 
            (:codProduto,:nomeProduto,:precoProduto,:pesoProduto,:descricaoProduto)');
            
            if (!$obj->codProduto)
                $obj->codProduto = GUcodProduto();

            $stmt->bindValue(':codProduto', $obj->codProduto);
            $stmt->bindValue(':nomeProduto', $obj->nomeProduto);
            $stmt->bindValue(':precoProduto', $obj->precoProduto);
            $stmt->bindValue(':pesoProduto', $obj->pesoProduto);
            $stmt->bindValue(':descricaoProduto', $obj->descricaoProduto);

            
            $stmt->execute();
        }

        public function alterar(Produto $obj) {
            require_once 'conexao_bd.php';
            require_once '../models/produto.php';
    
            $stmt = $conn->prepare('UPDATE ambrosias_produtos SET
                nomeProduto =:nomeProduto,
                precoProduto = :precoProduto, 
                pesoProduto = :pesoProduto,
                descricaoProduto = :descricaoProduto
                 WHERE codProduto = :codProduto');
            
            $stmt->bindValue(':codProduto', $obj->codProduto);
            $stmt->bindValue(':nomeProduto', $obj->nomeProduto);
            $stmt->bindValue(':precoProduto', $obj->precoProduto);
            $stmt->bindValue(':pesoProduto', $obj->pesoProduto);
            $stmt->bindValue(':descricaoProduto', $obj->descricaoProduto);

            
            $stmt->execute();
        }

        public function excluir($codProduto) {
            require_once 'conexao_bd.php';
            
            $stmt = $conn->prepare('DELETE FROM  ambrosias_produtos WHERE codProduto = :codProduto');
            
            $stmt->bindValue(':codProduto', $codProduto);
            
            $stmt->execute();
        }

        public function retornarPorcodProduto(string $codProduto) {
            require_once 'conexao_bd.php';
            require_once '../Models/aluno.php';
            
            $sql = "SELECT * FROM ambrosias_produtos where  codProduto=? LIMIT 1";
    
            $stmt = $conn->prepare($sql); 
            $stmt->execute([$codProduto]); 
            $row = $stmt->fetch();
            
            //O objeto a ser retornado recebe NULL
            $obj = NULL;
            
            //Se a consulta por codProduto retornou algum registro
            if ($row) {
                //Instancia uma nova receita e preenche as propriedades da mesma com os valores dos campos retornados
                $obj = new Produto();

                $obj->codProduto = $row['codProduto'];
                $obj->nomeProduto = $row['nomeProduto'];
                $obj->precoProduto = $row['precoProduto'];
                $obj->pesoProduto = $row['pesoProduto'];
                $obj->descricaoProduto = $row['descricaoProduto'];

            }
            
            return $obj;
        }

        public function retornarTodos() {
            require_once 'conexao_bd.php';
            require_once '../models/produto.php';
            
            $sql = "SELECT * FROM ambrosias_produtos ORDER BY nomeProduto";
            
            //Cria um novo vetor
            $objects = array();
            
            //Para cada linha ($row) retornada...
            foreach ($conn->query($sql) as $row) {
                //Instancia uma nova receita e preenche as propriedades da mesma com os valores dos campos retornados
                $obj = new Produto();

                $obj->codProduto = $row['codProduto'];
                $obj->nomeProduto = $row['nomeProduto'];
                $obj->precoProduto = $row['precoProduto'];
                $obj->pesoProduto = $row['pesoProduto'];
                $obj->descricaoProduto = $row['descricaoProduto'];


                //Adiciona o objeto ($obj) ao vetor de objetos
                $objects[] = $obj;
            }
            
            //Retorna o vetor de objetos
            return $objects;
        }
    }
?>