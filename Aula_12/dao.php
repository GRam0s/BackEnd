<?php

class Dao { //Classe para a manipulação das funções do CRUD.

    private $alunos = []; //Array $alunos para armazenamento dos objetos a serem manipulados antos de serem enviados ao banco de dados.

    private $arquivo = "alunos.json";

    public function __construct() {
        if(file_exists($this->arquivo)) {
            $conteudo = file_get_contents($this->arquivo);
            $dados = json_decode($conteudo, true);

            if ($dados){
                foreach($dados as $id => $info) {
                    $this->alunos[$id] = new Aluno(
                        $info['id'],
                        $info['nome'],
                        $info['curso']
                    );
                }
            }
        }
    }

    private function salvarEmArquivo() {
        $dados = [];

        foreach($this->alunos as $id => $aluno) {
            $dados[$id]=[
                'id'=>$aluno->getId(),
                'nome'=>$aluno->getNome(),
                'curso'=>$aluno->getCurso(),
            ];
        }

    file_put_contents($this->arquivo, json_encode($dados, JSON_PRETTY_PRINT));

    }
    public function criarAlunos(Aluno $aluno) { // método para criar um objeto no array alunos.
        $this->alunos[$aluno->getId()] = $aluno;
        $this->salvarEmArquivo();
    }

    public function lerAlunos() {
        return $this->alunos;
    }

    public function atualizarAlunos($id, $novoNome, $novoCurso) {
        if(isset($this->alunos[$id])) {
            $this->alunos[$id]-> setNome($novoNome);
            $this->alunos[$id]-> setCurso($novoCurso);
            $this->salvarEmArquivo();
        }
    }

    public function excluirAlunos($id) {
        unset($this->alunos[$id]);
        $this->salvarEmArquivo();
    }

}

?>