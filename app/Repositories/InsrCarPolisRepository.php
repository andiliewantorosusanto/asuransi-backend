<?php


namespace App\Repositories;


use App\Models\InsrCarPolis;
use App\Traits\baseRepositoryTrait;

class InsrCarPolisRepository
{
    use baseRepositoryTrait;

    protected $model;

    public function __construct(InsrCarPolis $model)
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

    // public function pagination($query, $limit)
    // {
    //     return $query->paginate($limit);
    // }

    // public function filterName($query, $name)
    // {
    //     return $query->where('name', 'like' ,'%'.$name.'%');
    // }
}
