<?php

namespace Arquitetura\Gameficacao\Infra\Selo;

use Arquitetura\Gameficacao\Dominio\Selo\IRepositorioSelo;
use Arquitetura\Gameficacao\Dominio\Selo\Selo;
use Arquitetura\Shared\Dominio\Cpf;
use Exception;

class RepositorioSeloEmMemoria implements IRepositorioSelo
{
    private array $selos = [];

    public function adicionar(Selo $selo): void
    {
        $this->selos[] = $selo;
    }

    public function buscarTodos(): array
    {
        return $this->selos;
    }

    public function buscarSelosCpf(Cpf $cpf): array
    {
        $selosFiltrados = array_filter(
            $this->selos,
            fn (Selo $selo) => $selo->cpf() === $cpf
        );

        if (count($selosFiltrados) === 0) {
            throw new SelosNaoEncontrado($cpf);
        }

        return $selosFiltrados;
    }
}