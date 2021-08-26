<?php


namespace App\Repositories;


use App\Models\InsrUsingPurposes;
use App\Traits\baseRepositoryTrait;

class InsrUsingPurposesRepository
{
    use baseRepositoryTrait;

    protected $model;

    public function __construct(InsrUsingPurposes $model)
    {
        $this->model = $model;
    }

    public function init()
    {
        return $this->model;
    }

    public function filterPurposeName($query, $purposeName)
    {
        return $query->where('PurposeName',$purposeName);
    }
}
