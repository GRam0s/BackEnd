<?php
//exercicio1
// class Carro {
//     private $marca;
//     private $modelo;
//     //construtor
    
//     public function __construct($marca, $modelo) {
//         $this->setMarca($marca);
//         $this->setModelo($modelo);
//     }
    
//     //Getter e Setter para $marca
//     public function setMarca($marca) {
//         $this->marca = ucwords(strtolower($marca));
//     }
        
//     public function getMarca(){
//         return $this->marca;
//         }

//     public function setModelo($modelo) {
//         $this->modelo = ucwords(strtolower($modelo));
//     }
    
//     public function getModelo() {
//         return $this->modelo;   
//     }
// }

// //exercicio 2
// class Pessoa {
//     private $nome;
//     private $idade;
//     private $email;
    
//     //construtor
//     public function __construct($nome, $idade, $email){
//         $this->setNome($nome);
//         $this->setIdade($idade);
//         $this->setEmail($email);
//     }

//         //Getter e Setter para $nome
//         public function setNome($nome){
//             $this->nome = ucwords(strtolower($nome));
//         }

//         public function getNome(){
//             return $this->nome;
//         }
    
//         //Setter e Getter para idade
//         public function setIdade($idade){
//             $this->idade = abs(($idade));
//         }
//         public function getIdade(){
//             return $this->idade;
//         }

//         public function setEmail($email) {
//             $this->email = strtolower($email);
//         }

//         public function getEmail() {
//             return $this->email;
//         }
        
//         public function Dados() {
//             echo"O nome é $this->nome, tem $this->idade anos e o email é $this->email";
//             return;
//         }

// }

// $pessoa = new Pessoa("GaBRiEl RaMOs", -20, "RamOs04082005@gmAil.cOm");

// $pessoa -> Dados();

//exercicio 3
// class Aluno {
//     private $nome;
//     private $nota;

//     public function __construct($nome, $nota) {
//         $this->setNome($nome);
//         $this->setNota($nota);
//     }

//     public function setNome($nome) {
//         $this->nome = ucwords(strtolower($nome));
//     }

//     public function getNome() {
//         return $this->nome;
//     }

//     public function setNota($nota) {
//         if ($nota > 10 || $nota < 0) {
//             $nota = 0;
//             $this->nota = abs($nota);
//         }
//         else {
//             $this->nota = abs($nota);
//         }
//     }
//     public function getNota() {
//         return $this->nota;
//     }
    
//     public function dadosAluno() {
//         echo "O aluno $this->nome tirou a nota $this->nota";
//     }
// }

// $aluno1 = new Aluno("Gabriel", 0);
// $aluno2 = new Aluno("Yasmin", 10);

// $aluno1 -> dadosAluno();

//exercicio 4

class Produto {
    private $nome;
    private $preco;
    private $estoque;

    public function __construct($nome, $preco, $estoque) {
        $this->setNome($nome);
        $this->setPreco($preco);
        $this->setEstoque($estoque);
    }

    public function setNome($nome){
        $this->nome = ucwords(strtolower($nome));
    }

    public function getNome() {
        return $this->nome;
    }

    public function setPreco($preco) {
        $this->preco = number_format($preco, 2);
    }

    public function getPreco(){
        return $this->preco;
    }

    public function setEstoque ($estoque) {
        $this->estoque = abs($estoque);
    }

    public function Dados() {
        echo "O $this->nome tem o preço de R$$this->preco e possui no estoque $this->estoque itens";
    }
}

$produto1 = new Produto ("Café", 22, 50);

$produto1 -> Dados();
?>

