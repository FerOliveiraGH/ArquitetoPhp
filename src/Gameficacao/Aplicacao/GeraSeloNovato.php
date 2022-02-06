<?php

namespace Arquitetura\Gameficacao\Aplicacao;

use Arquitetura\Gameficacao\Dominio\Selo\IRepositorioSelo;
use Arquitetura\Gameficacao\Dominio\Selo\Selo;
use Arquitetura\Shared\Dominio\Evento\IEvento;
use Arquitetura\Shared\Dominio\Evento\OuvinteEvento;

class GeraSeloNovato extends OuvinteEvento
{
    private IRepositorioSelo $repositorio;

    public function __construct(IRepositorioSelo $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function sabeProcessar(IEvento $evento): bool
    {
        return $evento->evento() == 'AlunoMatriculado';
    }

    public function reageAo(IEvento $evento): void
    {
        $selo = new Selo($evento->cpf(), 'Novato');

        $this->repositorio->adicionar($selo);

        fprintf(
            STDOUT,
            'Selo %s adicionado em %s.' . PHP_EOL,
            $selo->nome(),
            $evento->momento()->format('d/m/Y H:i:s')
        );
    }
}