<?php

namespace Arquitetura\Gameficacao\Infra\Selo;

use Arquitetura\Shared\Dominio\Cpf;
use DomainException;

class SelosNaoEncontrado extends DomainException
{
    public function __construct(Cpf $cpf)
    {
        parent::__construct("Selos com CPF $cpf não encontrado");
    }
}