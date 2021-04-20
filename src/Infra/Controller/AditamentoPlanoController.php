<?php

namespace App\Infra\Controller;

use App\Domain\AditamentoPlano\Protocol\PropostaRepositoryInterface;

class AditamentoPlanoController
{
    public function __construct(
        private PropostaRepositoryInterface $model
    ) {}

    public function salvarProprosta()
    {
        $this->model->salvar();
    }
}