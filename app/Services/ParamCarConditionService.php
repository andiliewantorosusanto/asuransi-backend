<?php


namespace App\Services;


use App\Repositories\ParamCarConditionRepository;
use App\Traits\paginatorTrait;

class ParamCarConditionService
{
    use paginatorTrait;

    protected $repository;

    public function __construct(ParamCarConditionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getByCode($code)
    {
        $query = $this->repository->init();
        $query = $this->repository->filterCode($query,$code);
        $result = $query->first();

        return $result;
    }
}
