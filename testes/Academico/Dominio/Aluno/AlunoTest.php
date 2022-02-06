<?php

namespace Testes\Academico\Dominio\Aluno;

use Arquitetura\Academico\Dominio\Aluno\Aluno;
use Arquitetura\Academico\Dominio\Email;
use Arquitetura\Shared\Dominio\Cpf;
use DomainException;
use PHPUnit\Framework\TestCase;

class AlunoTest extends TestCase
{
    public function testAdicionarAteDoisTelefonesPorAluno()
    {
        $aluno = new Aluno(
            new Cpf('123.456.789-12'),
            'Aluno de Teste',
            new Email('aluno@teste.com.br')
        );

        $aluno->adicionarTelefone('41', '998877665');
        $aluno->adicionarTelefone('41', '998877667');

        $this->assertCount(2, $aluno->telefones());
    }

    public function testAdicionarMaisDeDoisTelefonesPorAluno()
    {
        $this->expectException(DomainException::class);

        $aluno = new Aluno(
            new Cpf('123.456.789-12'),
            'Aluno de Teste',
            new Email('aluno@teste.com.br')
        );

        $aluno->adicionarTelefone('41', '998877665');
        $aluno->adicionarTelefone('41', '998877667');
        $aluno->adicionarTelefone('41', '998877668');
    }
}