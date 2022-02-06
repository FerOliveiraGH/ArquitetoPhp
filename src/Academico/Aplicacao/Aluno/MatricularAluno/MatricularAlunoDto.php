<?php

namespace Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno;

class MatricularAlunoDto
{
    public string $cpfAluno;
    public string $nomeAluno;
    public string $emailAluno;
    public int $numero;
    public int $ddd;

    public function __construct(string $cpfAluno, string $nomeAluno, string $emailAluno, int $ddd, int $numero)
    {
        $this->cpfAluno = $cpfAluno;
        $this->nomeAluno = $nomeAluno;
        $this->emailAluno = $emailAluno;
        $this->ddd = $ddd;
        $this->numero = $numero;
    }
}
