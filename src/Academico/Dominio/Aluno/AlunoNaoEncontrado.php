<?php

namespace Arquitetura\Academico\Dominio\Aluno;

use Arquitetura\Shared\Dominio\Cpf;
use DomainException;

class AlunoNaoEncontrado extends DomainException
{
    public function __construct(Cpf $cpf)
    {
        parent::__construct("Aluno com CPF $cpf não encontrado");
    }
}
