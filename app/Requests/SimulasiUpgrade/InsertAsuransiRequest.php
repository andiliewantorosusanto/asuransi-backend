<?php


namespace App\Requests\SimulasiUpgrade;


use Illuminate\Foundation\Http\FormRequest;

class InsertAsuransiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nomorRekening' => 'required',
            'nomorPin' => 'required',
            'tanggalPengajuan' => 'required',
            'perihalUpgrade' => 'required',
            'tanggalRealisasi' => 'required',
            'tahunRealisasi' => 'required',
            'nama' => 'required',
            'produk' => 'required',
            'otr' => 'required',
            'merkKendaraan' => 'required',
            'kategoriKendaraan' => 'required',
            'tahunKendaraan' => 'required',
            'jenisPenggunaan' => 'required',
            'maskapaiAsuransi' => 'required',
            'kondisi' => 'required',
            'noPolis' => 'required',
            'noPolisi' => 'required',
            'coverMundur' => 'required',
            'survey' => 'required',
            'RSCC' => 'required',
            'bencanaAlam' => 'required',
            'TJH' => 'required',
            'aksesoris' => 'required',
            'upgradeAllRisk' => 'required',
            'periodeUpgradeDari' => 'required',
            'periodeUpgradeSampai' => 'required',
            'biayaLoading' => 'required',
            'alamatPengiriman' => 'required',
            'totalPremiPertanggungan' => 'required',
            'totalPremiPerluasan' => 'required',
            'totalBiaya' => 'required',
            'biayaAdmin' => 'required',
            'remarks' => ''
        ];
    }
}
