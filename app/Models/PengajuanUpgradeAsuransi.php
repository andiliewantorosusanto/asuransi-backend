<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanUpgradeAsuransi extends Model
{
    use HasFactory;
    protected $table = 'pengajuanUpgradeAsuransi';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomorRekening',
        'nomorPin',
        'tanggalPengajuan',
        'perihalUpgrade',
        'tanggalRealisasi',
        'tahunRealisasi',
        'nama',
        'produk',
        'otr',
        'merkKendaraan',
        'kategoriKendaraan',
        'tahunKendaraan',
        'jenisPenggunaan',
        'maskapaiAsuransi',
        'kondisi',
        'noPolis',
        'noPolisi',
        'coverMundur',
        'survey',
        'RSCC',
        'bencanaAlam',
        'TJH',
        'aksesoris',
        'upgradeAllRisk',
        'periodeUpgradeDari',
        'periodeUpgradeSampai',
        'biayaLoading',
        'alamatPengiriman',
        'totalPremiPertanggungan',
        'totalPremiPerluasan',
        'totalBiaya',
        'biayaAdmin',
        'remarks',
        'dateExpired',
        'va',
        'orderId',
        'komentar',
        'statusUpgradeId'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
