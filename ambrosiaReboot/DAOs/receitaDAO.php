<?php
    class receitaDAO
    {
        public function inserir(Receita $obj) {
            require_once 'conexao_bd.php';
            require_once '../models/receita.php';
            require_once '../Helpers/funcoes.php';
    
            $stmt = $conn->prepare('INSERT INTO  tb_receita (codReceita,nomeReceita,ingredienteReceita,preparoReceita,comentarioReceita) 
            values 
            (:codReceita,:nomeReceita,:ingredienteReceita,:preparoReceita,:comentarioReceita)');
            
            if (!$obj->codReceita)
                $obj->codReceita = GUID();

            $stmt->bindValue(':codReceita', $obj->codReceita);
            $stmt->bindValue(':nomeReceita', $obj->nomeReceita);
            $stmt->bindValue(':ingredienteReceita', $obj->ingredienteReceita);
            $stmt->bindValue(':preparoReceita', $obj->preparoReceita);
            $stmt->bindValue(':comentarioReceita', $obj->comentarioReceita);
            
            $stmt->execute();
        }

        public function alterar(Receita $obj) {
            require_once 'conexao_bd.php';
            require_once '../models/receita.php';
    
            $stmt = $conn->prepare('UPDATE tb_receita SET
                nomeReceita =:nomeReceita,
                ingredienteReceita =:ingredienteReceita,
                preparoReceita =:preparoReceita,
                comentarioReceita =:comentarioReceita
                
                 WHERE codReceita = :codReceita');
            
            $stmt->bindValue(':codReceita', $obj->codReceita);
            $stmt->bindValue(':nomeReceita', $obj->nomeReceita);
            $stmt->bindValue(':ingredienteReceita', $obj->ingredienteReceita);
            $stmt->bindValue(':preparoReceita', $obj->preparoReceita);
            $stmt->bindValue(':comentarioReceita', $obj->comentarioReceita);

            
            $stmt->execute();
        }

        public function excluir($codReceita) {
            require_once 'conexao_bd.php';
            
            $stmt = $conn->prepare('DELETE FROM  tb_receita WHERE codReceita = :codReceita');
            
            $stmt->bindValue(':codReceita', $codReceita);
            
            $stmt->execute();
        }

        public function retornarPorcodReceita(string $codReceita) {
            require_once 'conexao_bd.php';
            require_once '../Models/receita.php';
            
            $sql = "SELECT * FROM tb_receita where  codReceita=? LIMIT 1";
    
            $stmt = $conn->prepare($sql); 
            $stmt->execute([$codReceita]); 
            $row = $stmt->fetch();
            
            //O objeto a ser retornado recebe NULL
            $obj = NULL;
            
            //Se a consulta por id retornou algum registro
            if ($row) {
                //Instancia uma nova receita e preenche as propriedades da mesma com os valores dos campos retornados
                $obj = new Receita();

                $obj->codReceita = $row['codReceita'];
                $obj->nomeReceita = $row['nomeReceita'];
                $obj->ingredienteReceita = $row['ingredienteReceita'];
                $obj->preparoReceita = $row['preparoReceita'];
                $obj->comentarioReceita = $row['comentarioReceita'];

            }
            
            return $obj;
        }

        public function retornarTodos() {
            require_once 'conexao_bd.php';
            require_once '../models/receita.php';
            
            $sql = "SELECT * FROM tb_receita ORDER BY nomeReceita";
            
            //Cria um novo vetor
            $objects = array();
            
            //Para cada linha ($row) retornada...
            foreach ($conn->query($sql) as $row) {
                //Instancia uma nova receita e preenche as propriedades da mesma com os valores dos campos retornados
                $obj = new Receita();

                $obj->codReceita = $row['codReceita'];
                $obj->nomeReceita = $row['nomeReceita'];
                $obj->ingredienteReceita = $row['ingredienteReceita'];
                $obj->preparoReceita = $row['preparoReceita'];
                $obj->comentarioReceita = $row['comentarioReceita'];

                //Adiciona o objeto ($obj) ao vetor de objetos
                $objects[] = $obj;
            }
            
            //Retorna o vetor de objetos
            return $objects;
        }
    }
?>