<?php

namespace Arquitetura\Gameficacao\Aplicacao\BuscarSelos;

use Arquitetura\Gameficacao\Dominio\Selo\IRepositorioSelo;
use Arquitetura\Shared\Dominio\Cpf;

class BuscaSelosCpf
{
    private IRepositorioSelo $repositorioSelo;

    public function __construct(IRepositorioSelo $repositorioSelo)
    {
        $this->repositorioSelo = $repositorioSelo;
    }

    public function buscarSelosCpf(Cpf $cpf): array
    {
        return $this->repositorioSelo->buscarSelosCpf($cpf);
    }
}