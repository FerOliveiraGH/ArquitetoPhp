<?php

namespace Arquitetura\Shared\Dominio\Evento;

class PublicadorEvento
{
    private array $ouvintes = [];

    public function adicionarOuvinte(OuvinteEvento $ouvinte): void
    {
        $this->ouvintes[] = $ouvinte;
    }

    public function publicar(IEvento $evento)
    {
        foreach ($this->ouvintes as $ouvinte) {
            $ouvinte->processar($evento);
        }
    }

}