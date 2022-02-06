<?php

namespace Arquitetura\Academico\Aplicacao\Indicacao;

use Arquitetura\Academico\Dominio\Aluno\Aluno;

interface EnviaEmailIndicacao
{
    public function enviaPara(Aluno $alunoIndicado): void;
}
