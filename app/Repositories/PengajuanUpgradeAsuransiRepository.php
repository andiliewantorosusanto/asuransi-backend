<?php


namespace App\Repositories;


use App\Models\PengajuanUpgradeAsuransi;
use App\Traits\baseRepositoryTrait;
use Illuminate\Support\Facades\DB;

class PengajuanUpgradeAsuransiRepository
{
    use baseRepositoryTrait;

    protected $model;

    public function __construct(PengajuanUpgradeAsuransi $model)
    {
        $this->model = $model;
    }

    public function init()
    {
        return $this->model;
    }

    public function getCount()
    {
        return $this->model
            ->rightJoin('statusAsuransi','statusUpgradeId','=','statusAsuransi.id')
            ->select('statusAsuransi.name','statusAsuransi.id',DB::raw('count(pengajuanupgradeasuransi.id) as count'))
            ->groupBy('statusAsuransi.name','statusAsuransi.id')
            ->get();
    }

    public function maskapaiOnly()
    {
        return $this->model->where('statusUpgradeId','>=','4')->get();
    }
}
