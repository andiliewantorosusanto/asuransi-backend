<?php


namespace App\Repositories;


use App\Models\CorAccount;
use App\Traits\baseRepositoryTrait;

class CorAccountRepository
{
    use baseRepositoryTrait;

    protected $model;

    public function __construct(CorAccount $model)
    {
        $this->model = $model;
    }

    public function init()
    {
        return $this->model;
    }

    public function filterNomorRekening($query, $nomorRekening)
    {
        return $query->where('NoRek',$nomorRekening);
    }

    public function filterNomorPin($query,$nomorPin)
    {
        return $query->where('NoPin',$nomorPin);
    }
}
