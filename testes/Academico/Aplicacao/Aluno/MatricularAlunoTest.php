<?php

namespace Testes\Academico\Aplicacao\Aluno;

use Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use Arquitetura\Academico\Dominio\Aluno\LogAlunoMatriculado;
use Arquitetura\Academico\Infra\Aluno\RepositorioDeAlunoEmMemoria;
use Arquitetura\Shared\Dominio\Cpf;
use Arquitetura\Shared\Dominio\Evento\PublicadorEvento;
use PHPUnit\Framework\TestCase;

class MatricularAlunoTest extends TestCase
{
    public function testAlunoDeveSerAdicionadoAoRepositorio()
    {
        $dadosAluno = new MatricularAlunoDto(
            '123.456.789-10',
            'Teste',
            'email@example.com',
            41,
            998877665
        );

        $repositorioDeAluno = new RepositorioDeAlunoEmMemoria();

        $publicador = new PublicadorEvento();
        $publicador->adicionarOuvinte(new LogAlunoMatriculado());

        $useCase = new MatricularAluno($repositorioDeAluno, $publicador);

        $useCase->executa($dadosAluno);

        $this->hasOutput();

        $aluno = $repositorioDeAluno->buscarPorCpf(new Cpf('123.456.789-10'));
        $this->assertSame('Teste', $aluno->nome());
        $this->assertSame('email@example.com', $aluno->email());
        $this->assertCount(1, $aluno->telefones());
    }
}
