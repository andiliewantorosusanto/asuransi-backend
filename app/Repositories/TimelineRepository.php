<?php


namespace App\Repositories;


use App\Models\Timeline;
use App\Traits\baseRepositoryTrait;
use Illuminate\Support\Facades\DB;

class TimelineRepository
{
    use baseRepositoryTrait;

    protected $model;

    public function __construct(Timeline $model)
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
