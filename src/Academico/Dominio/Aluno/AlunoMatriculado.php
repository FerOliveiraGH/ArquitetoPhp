<?php

namespace Arquitetura\Academico\Dominio\Aluno;

use Arquitetura\Shared\Dominio\Cpf;
use Arquitetura\Shared\Dominio\Evento\IEvento;
use DateTimeImmutable;
use ReflectionClass;

class AlunoMatriculado implements IEvento
{
    private DateTimeImmutable $momento;
    private Cpf $cpf;

    public function __construct(Cpf $cpf)
    {
        $this->momento = new DateTimeImmutable();
        $this->cpf = $cpf;
    }

    public function cpf(): Cpf
    {
        return $this->cpf;
    }

    public function momento(): DateTimeImmutable
    {
       return $this->momento;
    }

    public function evento(): string
    {
        return (new ReflectionClass($this))->getShortName();
    }
}