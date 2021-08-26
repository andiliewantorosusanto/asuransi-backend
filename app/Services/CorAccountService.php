<?php


namespace App\Services;


use App\Repositories\CorAccountRepository;
use App\Traits\paginatorTrait;

class CorAccountService
{
    use paginatorTrait;

    protected $repository;

    public function __construct(CorAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getByNomorKontrak($request)
    {
        $query = $this->repository->init();
        $query = $this->repository->filterNomorRekening($query,$request->nomorRekening);
        $query = $this->repository->filterNomorPin($query,$request->nomorPin);
        $result = $query->first();

        return $result;
    }
}
