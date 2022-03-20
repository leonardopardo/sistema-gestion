<?php

namespace App\Http\Requests;

use App\Models\Carpeta;
use App\Models\TipoCarpeta;
use Illuminate\Foundation\Http\FormRequest;

class CarpetaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $tipo_carpeta = TipoCarpeta::find($this->get('tipo_carpeta_id'));

        return $tipo_carpeta != null && $tipo_carpeta->juzgado
            ? Carpeta::getRules()
            : Carpeta::popRules('numero', 'fecha_inicio', 'cuenta_id');
    }
}
