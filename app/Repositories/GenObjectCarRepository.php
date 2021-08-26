<?php


namespace App\Repositories;


use App\Models\GenObjectCar;
use App\Traits\baseRepositoryTrait;

class GenObjectCarRepository
{
    use baseRepositoryTrait;

    protected $model;

    public function __construct(GenObjectCar $model)
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
