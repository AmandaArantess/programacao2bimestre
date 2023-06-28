<?php
    class receitaDAO
    {
        public function inserir(Receita $obj) {
            require_once 'conexao_bd.php';
            require_once '../models/funcionario.php';
            require_once '../Helpers/funcoes.php';
    
            $stmt = $conn->prepare('INSERT INTO  ambrosias_receitas (codReceitas,nomeReceitas,ingredientes,preparo,comentarios) 
            values 
            (:codReceitas,:nomeReceitas,:ingredientes,:preparo,:comentarios)');

            $stmt->bindValue(':codReceitas', $obj->codReceitas);
            $stmt->bindValue(':nomeReceitas', $obj->nomeReceitas);
            $stmt->bindValue(':ingredientes', $obj->ingredientes);
            $stmt->bindValue(':preparo', $obj->preparo);
            $stmt->bindValue(':comentarios', $obj->comentarios);
            
            $stmt->execute();
        }

        public function alterar(Receita $obj) {
            require_once 'conexao_bd.php';
            require_once '../models/funcionario.php';
    
            $stmt = $conn->prepare('UPDATE ambrosias_receitas SET
                nomeReceitas =:nomeReceitas,
                ingredientes = :ingredientes, 
                preparo = :preparo,
                comentarios = :comentarios
                 WHERE codReceitas = :codReceitas');
            
            $stmt->bindValue(':codReceitas', $obj->codReceitas);
            $stmt->bindValue(':nomeReceitas', $obj->nomeReceitas);
            $stmt->bindValue(':ingredientes', $obj->ingredientes);
            $stmt->bindValue(':preparo', $obj->preparo);
            $stmt->bindValue(':comentarios', $obj->comentarios);
            
            $stmt->execute();
        }

        public function excluir($codReceitas) {
            require_once 'conexao_bd.php';
            
            $stmt = $conn->prepare('DELETE FROM ambrosias_receitas WHERE codReceitas = :codReceitas');
            
            $stmt->bindValue(':codReceitas', $codReceitas);
            
            $stmt->execute();
        }

        public function retornarPorcodReceitas(string $codReceitas) {
            require_once 'conexao_bd.php';
            require_once '../Models/funcionario.php';
            
            $sql = "SELECT * FROM ambrosias_receitas where codReceitas=? LIMIT 1";
    
            $stmt = $conn->prepare($sql); 
            $stmt->execute([$codReceitas]); 
            $row = $stmt->fetch();
            
            //O objeto a ser retornado recebe NULL
            $obj = NULL;
            
            //Se a consulta por codReceitas retornou algum registro
            if ($row) {
                //Instancia uma nova receita e preenche as propriedades da mesma com os valores dos campos retornados
                $obj = new receita();

                $obj->codReceitas = $row['codReceitas'];
                $obj->nomeReceitas = $row['nomeReceitas'];
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

                $obj->codReceitas = $row['codReceitas'];
                $obj->nomeReceitas = $row['nomeReceitas'];
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