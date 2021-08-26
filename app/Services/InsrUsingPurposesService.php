<?php


namespace App\Services;


use App\Repositories\InsrUsingPurposesRepository;
use App\Traits\paginatorTrait;

class InsrUsingPurposesService
{
    use paginatorTrait;

    protected $repository;

    public function __construct(InsrUsingPurposesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getByNomorKontrak($purposeName)
    {
        $query = $this->repository->init();
        $query = $this->repository->filterPurposeName($query,$purposeName);
        $result = $query->first();

        return $result;
    }
}
