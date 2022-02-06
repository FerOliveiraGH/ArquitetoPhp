<?php

namespace Testes\Gameficacao\Aplicacao\BuscarSelos;

use Arquitetura\Gameficacao\Aplicacao\BuscarSelos\BuscaSelosCpf;
use Arquitetura\Gameficacao\Dominio\Selo\Selo;
use Arquitetura\Gameficacao\Infra\Selo\RepositorioSeloEmMemoria;
use Arquitetura\Shared\Dominio\Cpf;
use PHPUnit\Framework\TestCase;

class BuscarSelosCpfTest extends TestCase
{
    public function testBuscarSeloCpf()
    {
        $cpf = new Cpf('123.456.789-12');
        $seloNovato = new Selo($cpf, 'Novato');

        $repositorio = new RepositorioSeloEmMemoria();
        $repositorio->adicionar($seloNovato);

        $buscarSelos = new BuscaSelosCpf($repositorio);
        $resposta = $buscarSelos->buscarSelosCpf($cpf);

        $this->assertIsArray($resposta);
        $this->assertCount(1, $resposta);
        $this->assertInstanceOf(Selo::class, $resposta[0]);
        $this->assertEquals('Novato', $resposta[0]->nome());
    }
}