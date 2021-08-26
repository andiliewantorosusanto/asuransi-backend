<?php


namespace App\Repositories;


use App\Models\GenMerk;
use App\Traits\baseRepositoryTrait;

class GenMerkRepository
{
    use baseRepositoryTrait;

    protected $model;

    public function __construct(GenMerk $model)
    {
        $this->model = $model;
    }

    public function init()
    {
        return $this->model;
    }

    public function filterMerkId($query, $merkId)
    {
        return $query->where('merkId',$merkId);
    }
}
