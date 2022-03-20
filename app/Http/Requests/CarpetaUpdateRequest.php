<?php

namespace App\Http\Requests;

use App\Models\Carpeta;
use App\Models\TipoCarpeta;
use Illuminate\Foundation\Http\FormRequest;

class CarpetaUpdateRequest extends FormRequest
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

        return $tipo_carpeta->juzgado
            ? Carpeta::popRules('fecha_inicio', 'cuenta_id')
            : Carpeta::popRules('numero', 'fecha_inicio', 'cuenta_id');
    }
}
