<?php

class pessoa {
    private $nome;
    private $cpf;
    private $telefone;
    private $idade;
    private $email; 
    private $senha;
    
    //construtor
    public function __construct($nome, $cpf, $telefone, $idade, $email, $senha){
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        $this->idade = $idade;
        $this->email = $email;
        $this->senha = $senha;
    }

        //Getter e Setter para $nome
        public function setNome($nome){
            $this->nome = ucwords(strtolower($nome));
        }

        public function getNome(){
            return $this->nome;
        }

        //Getter e Setter para CPF
        public function setCpf($cpf){
            $this->cpf = preg_replace ('/\D/', '', $cpf);
        }

        public function getCpf(){
            return $this->cpf;
        }

        //Getter e Setter para telefone
        public function setTelefone($telefone){
            $this->telefone = preg_replace ('/\D/', '', $telefone);
        }

        public function getTelefone(){
            return $this->telefone;
        }
        
        //Setter e Getter para idade
        public function setIdade($idade){
            $this->idade = abs(($idade));
        }
        public function getIdade(){
            return $this->idade;
        }
}

$aluno1 = new pessoa("GaBRriEl RaMOs", "474.414.168.47", "(19)98440-5042", -20, "ramos04082005@gmail.com", "Teste123");

?>