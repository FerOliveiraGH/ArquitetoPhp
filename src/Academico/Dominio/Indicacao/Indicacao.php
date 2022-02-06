<?php

namespace Arquitetura\Academico\Dominio\Indicacao;

use Arquitetura\Shared\Dominio\Cpf;

class Indicacao
{
    private Cpf $indicante;
    private Cpf $indicado;
    private \DateTimeImmutable $data;

    public function __construct(Cpf $indicante, Cpf $indicado)
    {
        $this->indicante = $indicante;
        $this->indicado = $indicado;

        $this->data = new \DateTimeImmutable();
    }
}
