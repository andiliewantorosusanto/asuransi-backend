<?php


namespace App\Services;


use App\Repositories\PolisTahunanRepository;
use App\Traits\paginatorTrait;

class PolisTahunanService
{
    use paginatorTrait;

    protected $repository;

    public function __construct(PolisTahunanRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store($request)
    {
        $req = $request->all();
        unset($req['rate']);
        return $this->repository->store($req);
    }

    public function storeMass($request)
    {
        $polises = $request->all();
        $data = [];

        foreach($polises as $p) {
            unset($p['rate']);
            $data[] = $p;
        }

        $this->repository->insert($data);

        return '';
    }

    public function getByPengajuanUpgradeAsuransiId($id)
    {
        return $this->repository->getByPengajuanUpgradeAsuransiId($id);
    }
}
