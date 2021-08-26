<?php


namespace App\Repositories;


use App\Models\PolisTahunan;
use App\Traits\baseRepositoryTrait;

class PolisTahunanRepository
{
    use baseRepositoryTrait;

    protected $model;

    public function __construct(PolisTahunan $model)
    {
        $this->model = $model;
    }

    public function init()
    {
        return $this->model;
    }

    public function getByPengajuanUpgradeAsuransiId($id)
    {
        return $this->model->where('pengajuanUpgradeAsuransiId','=',$id)->get();
    }
}
