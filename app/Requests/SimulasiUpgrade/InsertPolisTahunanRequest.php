<?php


namespace App\Requests\SimulasiUpgrade;


use Illuminate\Foundation\Http\FormRequest;

class InsertPolisTahunanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tahun' => 'required',
            'jenisAsuransi' => 'required',
            'periodePolisDari' => 'required',
            'periodePolisSampai' => 'required',
            'penyusutan' => 'required',
            'nilaiPertanggungan' => 'required',
            'premiRate' => 'required',
            'totalPremiPertanggungan' => 'required',
            'RSCC' => 'required',
            'RSCCRate' => 'required',
            'bencanaAlam' => 'required',
            'bencanaAlamRate' => 'required',
            'TJH' => 'required',
            'aksesoris' => 'required',
            'aksesorisRate' => 'required',
            'totalPremiPerluasan' => 'required',
            'prorata' => 'required',
            'upgradeAllRisk' => 'required',
            'pengajuanUpgradeAsuransiId' => 'required'
        ];
    }
}
