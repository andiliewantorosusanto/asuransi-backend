<?php


namespace App\Repositories;


use App\Models\ParamCarCondition;
use App\Traits\baseRepositoryTrait;

class ParamCarConditionRepository
{
    use baseRepositoryTrait;

    protected $model;

    public function __construct(ParamCarCondition $model)
    {
        $this->model = $model;
    }

    public function init()
    {
        return $this->model;
    }

    public function filterCode($query, $code)
    {
        return $query->where('code',$code);
    }
}
