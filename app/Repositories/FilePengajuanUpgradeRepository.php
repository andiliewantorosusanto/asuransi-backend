<?php


namespace App\Repositories;


use App\Models\FilePengajuanUpgrade;
use App\Traits\baseRepositoryTrait;
use Illuminate\Support\Facades\DB;

class FilePengajuanUpgradeRepository
{
    use baseRepositoryTrait;

    protected $model;

    public function __construct(FilePengajuanUpgrade $model)
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
