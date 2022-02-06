<?php

namespace Arquitetura\Shared\Dominio\Evento;

use DateTimeImmutable;

interface IEvento
{
    public function momento(): DateTimeImmutable;

    public function evento();
}