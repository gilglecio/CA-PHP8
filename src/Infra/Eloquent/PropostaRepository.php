<?php

namespace App\Infra\Eloquent;

use App\Domain\AditamentoPlano\Protocol\PropostaRepositoryInterface;

class PropostaRepository implements PropostaRepositoryInterface
{
    public function salvar()
    {
        echo 'repo';
    }
}