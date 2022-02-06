<?php

namespace Arquitetura\Gameficacao\Dominio\Selo;

use Arquitetura\Shared\Dominio\Cpf;

interface IRepositorioSelo
{
    public function adicionar(Selo $selo): void;

    public function buscarSelosCpf(Cpf $cpf): array;
}