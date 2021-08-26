<?php


namespace App\Requests\SimulasiUpgrade;


use Illuminate\Foundation\Http\FormRequest;

class GetByNomorKontrakRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nomorRekening' => 'required',
            'nomorPin' => 'required'
        ];
    }
}
