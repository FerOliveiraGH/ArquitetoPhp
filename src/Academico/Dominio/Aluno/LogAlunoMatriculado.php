<?php

namespace Arquitetura\Academico\Dominio\Aluno;

use Arquitetura\Shared\Dominio\Evento\IEvento;
use Arquitetura\Shared\Dominio\Evento\OuvinteEvento;

class LogAlunoMatriculado extends OuvinteEvento
{
    public function sabeProcessar(IEvento $evento): bool
    {
        return $evento->evento() == 'AlunoMatriculado';
    }

    /** @param AlunoMatriculado $evento */
    public function reageAo(IEvento $evento): void
    {
        fprintf(
            STDOUT,
            'Aluno com CPF %s foi matriculado na data %s.' . PHP_EOL,
            $evento->cpf(),
            $evento->momento()->format('d/m/Y H:i:s')
        );
    }
}