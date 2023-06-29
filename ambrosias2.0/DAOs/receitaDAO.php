<?php
    class receitaDAO
    {
        public function inserir(Receita $obj) {
            require_once 'conexao_bd.php';
            require_once '../models/funcionario.php';
            require_once '../Helpers/funcoes.php';
    
            $stmt = $conn->prepare('INSERT INTO  ambrosias_receita (codReceita,nomeReceita,ingredientes,preparo,comentarios) 
            values 
            (:codReceita,:nomeReceita,:ingredientes,:preparo,:comentarios)');

            $stmt->bindValue(':codReceita', $obj->codReceita);
            $stmt->bindValue(':nomeReceita', $obj->nomeReceita);
            $stmt->bindValue(':ingredientes', $obj->ingredientes);
            $stmt->bindValue(':preparo', $obj->preparo);
            $stmt->bindValue(':comentarios', $obj->comentarios);
            
            $stmt->execute();
        }

        public function alterar(Receita $obj) {
            require_once 'conexao_bd.php';
            require_once '../models/funcionario.php';
    
            $stmt = $conn->prepare('UPDATE ambrosias_receita SET
                nomeReceita =:nomeReceita,
                ingredientes = :ingredientes, 
                preparo = :preparo,
                comentarios = :comentarios
                 WHERE codReceita = :codReceita');
            
            $stmt->bindValue(':codReceitas', $obj->codReceita);
            $stmt->bindValue(':nomeReceitas', $obj->nomeReceita);
            $stmt->bindValue(':ingredientes', $obj->ingredientes);
            $stmt->bindValue(':preparo', $obj->preparo);
            $stmt->bindValue(':comentarios', $obj->comentarios);
            
            $stmt->execute();
        }

        public function excluir($codReceita) {
            require_once 'conexao_bd.php';
            
            $stmt = $conn->prepare('DELETE FROM ambrosias_receita WHERE codReceita = :codReceita');
            
            $stmt->bindValue(':codReceitas', $codReceitas);
            
            $stmt->execute();
        }

        public function retornarPorId(string $codReceita) {
            require_once 'conexao_bd.php';
            require_once '../Models/funcionario.php';
            
            $sql = "SELECT * FROM ambrosias_receitas where codReceitas=? LIMIT 1";
    
            $stmt = $conn->prepare($sql); 
            $stmt->execute([$codReceita]); 
            $row = $stmt->fetch();
            
            //O objeto a ser retornado recebe NULL
            $obj = NULL;
            
            //Se a consulta por codReceitas retornou algum registro
            if ($row) {
                //Instancia uma nova receita e preenche as propriedades da mesma com os valores dos campos retornados
                $obj = new receita();

                $obj->codReceita = $row['codReceita'];
                $obj->nomeReceita = $row['nomeReceita'];
                $obj->ingredientes = $row['ingredientes'];
                $obj->preparo = $row['preparo'];
                $obj->comentarios = $row['comentarios'];
            }
            
            return $obj;
        }

        public function retornarTodos() {
            require_once 'conexao_bd.php';
            require_once '../models/funcionario.php';
            
            $sql = "SELECT * FROM ambrosias_receitas ORDER BY nomeReceitas";
            
            //Cria um novo vetor
            $objects = array();
            
            //Para cada linha ($row) retornada...
            foreach ($conn->query($sql) as $row) {
                //Instancia uma nova receita e preenche as propriedades da mesma com os valores dos campos retornados
                $obj = new receita();

                $obj->codReceita = $row['codReceita'];
                $obj->nomeReceita = $row['nomeReceita'];
                $obj->ingredientes = $row['ingredientes'];
                $obj->preparo = $row['preparo'];
                $obj->comentarios = $row['comentarios'];

                //Adiciona o objeto ($obj) ao vetor de objetos
                $objects[] = $obj;
            }
            
            //Retorna o vetor de objetos
            return $objects;
        }
    }
?>