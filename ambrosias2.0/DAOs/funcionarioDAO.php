<?php
    class funcionarioDAO
    {
        public function login($email, $senha) {
            require 'conexao_bd.php';
            require_once '../models/funcionario.php';
            require_once '../Helpers/funcoes.php';

            $sql = "SELECT * FROM tb_funcionario where  email=? LIMIT 1";
    
            $stmt = $conn->prepare($sql); 
            $stmt->execute([$email]); 
            $row = $stmt->fetch();
            
            //O objeto a ser retornado recebe NULL
            $funcionario = NULL;
            
            //Se a consulta por id retornou algum registro
            if ($row) {
                //Instancia uma nova receita e preenche as propriedades da mesma com os valores dos campos retornados
                $funcionario = new funcionario();

                $funcionario->id = $row['id'];
                $funcionario->email = $row['email'];
                $funcionario->nome = $row['nome'];
                $funcionario->hash_senha = $row['hash_senha'];

                if (Bcrypt($senha, $funcionario->nome) == $funcionario->hash_senha) {
                    $funcionario->nome = "";
                    $funcionario->hash_senha = "";

                    return $funcionario;
                } else {
                    return NULL;
                }
            } else {
                return NULL;
            }
        }

        public function inserir($email, $senha) {
            require_once 'conexao_bd.php';
            require_once '../models/funcionario.php';
            require_once '../Helpers/funcoes.php';
    
            $stmt = $conn->prepare('INSERT INTO  tb_funcionario (id,email,nome,hash_senha) 
            values 
            (:id,:email,:nome,:hash_senha)');
            
            $obj = new funcionario();

            if (!$obj->id)
                $obj->id = GUID();

            $obj->nome = GUID();

            $obj->email = $email;
            $obj->hash_senha = Bcrypt($senha, $obj->nome);

            $stmt->bindValue(':id', $obj->id);
            $stmt->bindValue(':email', $obj->email);
            $stmt->bindValue(':nome', $obj->nome);
            $stmt->bindValue(':hash_senha', $obj->hash_senha);
            
            $stmt->execute();
        }

        public function alterar(funcionario $obj) {
            require_once 'conexao_bd.php';
            require_once '../models/funcionario.php';
    
            $stmt = $conn->prepare('UPDATE tb_funcionario SET
                email =:email,
                nome = :nome, 
                hash_senha = :hash_senha 
                 WHERE id = :id');
            
            $stmt->bindValue(':id', $obj->id);
            $stmt->bindValue(':email', $obj->email);
            $stmt->bindValue(':nome', $obj->nome);
            $stmt->bindValue(':hash_senha', $obj->hash_senha);
            
            $stmt->execute();
        }

        public function excluir($id) {
            require_once 'conexao_bd.php';
            
            $stmt = $conn->prepare('DELETE FROM  tb_funcionario WHERE id = :id');
            
            $stmt->bindValue(':id', $id);
            
            $stmt->execute();
        }

        public function retornarPorId(string $id) {
            require_once 'conexao_bd.php';
            require_once '../Models/funcionario.php';
            
            $sql = "SELECT * FROM tb_funcionario where  id=? LIMIT 1";
    
            $stmt = $conn->prepare($sql); 
            $stmt->execute([$id]); 
            $row = $stmt->fetch();
            
            //O objeto a ser retornado recebe NULL
            $obj = NULL;
            
            //Se a consulta por id retornou algum registro
            if ($row) {
                //Instancia uma nova receita e preenche as propriedades da mesma com os valores dos campos retornados
                $obj = new funcionario();

                $obj->id = $row['id'];
                $obj->email = $row['email'];
                //$obj->nome = $row['nome'];
                //$obj->hash_senha = $row['hash_senha'];
            }
            
            return $obj;
        }

        public function retornarPorEmail(string $email) {
            require_once 'conexao_bd.php';
            require_once '../Models/funcionario.php';
            
            $sql = "SELECT * FROM tb_funcionario where  email=? LIMIT 1";
    
            $stmt = $conn->prepare($sql); 
            $stmt->execute([$email]); 
            $row = $stmt->fetch();
            
            //O objeto a ser retornado recebe NULL
            $obj = NULL;
            
            //Se a consulta por id retornou algum registro
            if ($row) {
                //Instancia uma nova receita e preenche as propriedades da mesma com os valores dos campos retornados
                $obj = new funcionario();

                $obj->id = $row['id'];
                $obj->email = $row['email'];
                $obj->nome = $row['nome'];
                $obj->hash_senha = $row['hash_senha'];
            }
            
            return $obj;
        }
    }
?>