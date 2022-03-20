<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\HtmlString;

class DateHelper
{
    /**
     * Calcula la edad a partir de la fecha de nacimiento.
     *
     * @param datetime $fecha
     * @return int
     */
    public static function Edad($fecha)
    {
        try
        {
            list($Y, $m, $d) = explode("-", $fecha);
            return (date("md") < $m . $d ? date("Y") - $Y - 1 : date("Y") - $Y);
        } catch (\Exception $ex) {
            return $fecha;
        }
    }

    public static function Hoy()
    {
        return $fecha = date_format(date_create(\Carbon\Carbon::now()), 'Y/m/d');
    }

    public static function date()
    {
        $date = new \StdClass;
        $date->inicio = Carbon::now()->firstOfMonth()->format('Y-m-d');
        $date->final = Carbon::now()->endOfMonth()->format('Y-m-d');
        $date->hoy = Carbon::now()->format('Y-m-d');
        $date->anoHoy = Carbon::now()->format('Y');
        $date->mesHoy = Carbon::now()->format('m');

        return $date;
    }

    /**
     * Devuelve una fecha en formato dd/mm/yy.
     *
     * @param datetime $datetime
     * @return string
     */
    public static function PrintFecha($datetime)
    {
        $fecha = '';

        if ($datetime == null) {
            $fecha = date_format(date_create(\Carbon\Carbon::now()), 'd/m/Y');
        } else {
            $fecha = date_format(date_create($datetime), 'd/m/Y');
        }

        return $fecha;
    }
    /**
     * Devuelve una fecha en formato Ymd para google.
     *
     * @param datetime $datetime
     * @return string
     */
    public static function google($datetime)
    {
        $fecha = '';

        if ($datetime == null) {
            return $fecha;
        } else {
            $fecha = date_format(date_create($datetime), 'Ymd');
        }

        return $fecha;
    }
    /**
     * Devuelve link con acceso a calendario de google.
     *
     * @param datetime $datetime
     * @return string
     */
    public static function googleLink($datetime, $titulo, $hi, $hf, $direccion, $mensaje)
    {
        $fecha = '';
        $evento = str_replace(' ', '+', $titulo);
        $lugar = str_replace(' ', '+', $direccion);
        $propietario = env('APP_URL');
        $nombrePropiertario = str_replace(' ', '+', env('APP_DISPLAY'));
        $detalles = str_replace(' ', '+', $mensaje);
        $horaInicio = $hi;
        $horaFin = $hf;

        if ($datetime == null) {
            return $fecha;
        } else {
            $fecha = date_format(date_create($datetime), 'Ymd');
        }

        // $link = 'http://www.google.com/calendar/event?action=TEMPLATE&text='.$evento.'&dates='.$fecha.'T'.$horaInicio.'0000/'.$fecha.'T'.$horaFin.'0000&details='.$detalles.'&location=&trp=false&sprop='.$propietario.'&sprop=name:'.$nombrePropiertario;

        $link = 'https://www.google.com/calendar/render?action=TEMPLATE&text=' . $evento . '&details=' . $detalles . '&location=' . $lugar . '&dates=' . $fecha . 'T' . $horaInicio . '0000/' . $fecha . 'T' . $horaFin . '0000';

        return $link;
    }

    /**
     * Devuelve una fecha formateada de tipo datetime ISO8601
     *
     * @param string $fecha
     * @return string
     */
    public static function FormatoFecha($fecha, $inc = null)
    {
        try
        {
            $fecha = substr($fecha, 6, 4) . "-" . substr($fecha, 3, 2) . "-" . substr($fecha, 0, 2) . substr($fecha, 10, 6);
            $datetime = new \DateTime($fecha);

            if ($inc != null) {
                $datetime->add(new \DateInterval('PT' . $inc . 'M'));
            }

            return substr($datetime->format(\DateTime::ISO8601), 0, 19);
        } catch (\Exception $ex) {
            return null;
        }
    }
    /**
     * Devuelve los dias pasados desde una fecha
     *
     * @param string $fecha
     * @return boolean $negativo
     */
    public static function ContarDias($fecha, $negativo = false)
    {
        if (isset($fecha)) {
            $vencimiento = Carbon::now()->diffInDays($fecha, $negativo);
            $dias = ($vencimiento < 0) ? ' <span style="color:#ff0000">(' . $vencimiento . ' días)</span>' : ' <span>(' . $vencimiento . ' días)</span>';

            $salida = $fecha . $dias;
        } else {
            $salida = '-';
        }

        return new HtmlString($salida);
    }
}
