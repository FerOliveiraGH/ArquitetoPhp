<?php

namespace Arquitetura\Shared\Dominio\Evento;

abstract class OuvinteEvento
{
    public function processar(IEvento $evento)
    {
        if ($this->sabeProcessar($evento)) {
            $this->reageAo($evento);
        }
    }

    abstract public function sabeProcessar(IEvento $evento): bool;
    abstract public function reageAo(IEvento $evento): void;
}