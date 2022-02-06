<?php

use Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use Arquitetura\Academico\Dominio\Aluno\LogAlunoMatriculado;
use Arquitetura\Academico\Infra\Aluno\RepositorioDeAlunoEmMemoria;
use Arquitetura\Gameficacao\Aplicacao\GeraSeloNovato;
use Arquitetura\Gameficacao\Infra\Selo\RepositorioSeloEmMemoria;
use Arquitetura\Shared\Dominio\Evento\PublicadorEvento;

require 'vendor/autoload.php';

$cpf = $argv[1];
$nome = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$numero = $argv[5];

$repositorioDeAluno = new RepositorioDeAlunoEmMemoria();

$dadosAluno = new MatricularAlunoDto(
    $cpf,
    $nome,
    $email,
    $ddd,
    $numero
);

$publicador = new PublicadorEvento();
$publicador->adicionarOuvinte(new LogAlunoMatriculado());
$publicador->adicionarOuvinte(new GeraSeloNovato(new RepositorioSeloEmMemoria()));

$useCase = new MatricularAluno($repositorioDeAluno, $publicador);
$useCase->executa($dadosAluno);