<?php


namespace App\Services;


use App\Repositories\GenCategoryRepository;
use App\Traits\paginatorTrait;

class GenCategoryService
{
    use paginatorTrait;

    protected $repository;

    public function __construct(GenCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getByCategoryId($categoryId)
    {
        $query = $this->repository->init();
        $query = $this->repository->filterCategoryId($query,$categoryId);
        $result = $query->first();

        return $result;
    }
}
