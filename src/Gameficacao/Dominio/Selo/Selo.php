<?php

namespace Arquitetura\Gameficacao\Dominio\Selo;

use Arquitetura\Shared\Dominio\Cpf;

class Selo
{
    private Cpf $cpf;
    private string $nome;

    public function __construct(Cpf $cpf, string $nome)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
    }

    public function cpf(): Cpf
    {
        return $this->cpf;
    }

    public function nome(): string
    {
        return $this->nome;
    }
}