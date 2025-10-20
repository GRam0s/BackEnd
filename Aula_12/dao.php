<?php

class Dao { //Classe para a manipulação das funções do CRUD.

    private $alunos = []; //Array $alunos para armazenamento dos objetos a serem manipulados antos de serem enviados ao banco de dados.


    public function criarAlunos(Aluno $aluno) { // método para criar um objeto no array alunos.
        $this->alunos[$aluno->getId()] = $aluno;
    }

    public function lerAlunos() {
        return $this->alunos;
    }

    public function atualizarAlunos($id, $novoNome, $novoCurso) {
        if(isset($this->alunos[$id])) {
            $this->alunos[$id]-> setNome($novoNome);
            $this->alunos[$id]-> setCurso($novoCurso);
        }
    }

    public function excluirAlunos($id) {
        unset($this->alunos[$id]);
    }

}

?>