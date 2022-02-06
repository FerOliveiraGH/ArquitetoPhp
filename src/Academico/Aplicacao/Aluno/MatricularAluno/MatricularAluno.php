<?php

namespace Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno;

use Arquitetura\Academico\Dominio\Aluno\Aluno;
use Arquitetura\Academico\Dominio\Aluno\AlunoMatriculado;
use Arquitetura\Academico\Dominio\Aluno\RepositorioDeAluno;
use Arquitetura\Shared\Dominio\Evento\PublicadorEvento;

class MatricularAluno
{
    private RepositorioDeAluno $repositorioDeAluno;
    private PublicadorEvento $publicador;

    public function __construct(RepositorioDeAluno $repositorioDeAluno, PublicadorEvento $publicador)
    {
        $this->repositorioDeAluno = $repositorioDeAluno;
        $this->publicador = $publicador;
    }

    public function executa(MatricularAlunoDto $dados): void
    {
        $aluno = Aluno::comCpfNomeEEmail($dados->cpfAluno, $dados->nomeAluno, $dados->emailAluno);
        $aluno->adicionarTelefone($dados->ddd, $dados->numero);
        $this->repositorioDeAluno->adicionar($aluno);

        $this->publicador->publicar(new AlunoMatriculado($aluno->cpf()));
    }
}
