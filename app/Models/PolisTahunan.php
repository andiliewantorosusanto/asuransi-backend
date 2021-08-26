<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolisTahunan extends Model
{
    use HasFactory;
    protected $table = 'polisTahunan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tahun',
        'jenisAsuransi',
        'periodePolisDari',
        'periodePolisSampai',
        'penyusutan',
        'nilaiPertanggungan',
        'rate',
        'premiRate',
        'totalPremiPertanggungan',
        'RSCC',
        'RSCCRate',
        'bencanaAlam',
        'bencanaAlamRate',
        'TJH',
        'TJHRate',
        'aksesoris',
        'aksesorisRate',
        'totalPremiPerluasan',
        'prorata',
        'upgradeAllRisk',
        'pengajuanUpgradeAsuransiId',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
