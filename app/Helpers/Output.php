<?php

use Illuminate\Support\HtmlString;

if (!function_exists('set_id')) {
    /**
     * @param null $id
     * @param null $title
     * @return string|null
     * @throws Exception
     */
    function set_id($title, $id = null)
    {
        if ($id != null)
            return $id;

        if ($title == null)
            throw new \Exception('Debe asignar por lo menos un parámetro a la function ' . __FUNCTION__);

        $title = str_clean(str_replace(' ', '-', $title));

        return strtolower($title);
    }
}

if (!function_exists('boolToLiteral')) {

    function boolToLiteral($value, array $default = ["SI", "NO"])
    {
        return $value
        ? $default[0]
        : $default[1];
    }
}

if (!function_exists('selected')) {

    function selected($value, $input)
    {
        return $input == $value
            ? 'selected'
            : '';
    }
}

if (!function_exists('checked')) {

    function checked($value, $input)
    {

        return $input == $value
        ? 'checked'
        : '';
    }
}

if (!function_exists('setActiveUrl')) {
    /**
     * @param string $name
     * @return string
     */
    function setActiveUrl(string $name)
    {
        return request()->url() == $name
        ? 'active'
        : '';
    }
}

if (!function_exists('setActiveBaseRoute')) {
    /**
     * @param array $rule
     * @return string
     */
    function setActiveBaseRoute(array $items)
    {
        $url = request()->url();

        foreach ($items as $item) {
            if ($url == ($item['route'] ?? '')) {
                return 'active';
            }
        }

        return '';
    }
}

if (!function_exists('tooltip')) {
    function tooltip($title, $icon = "far fa-question-circle", $placement = "right")
    {
        return new HtmlString("<i class=\"{$icon}\" data-toggle=\"tooltip\"
            data-placement=\"{$placement}\" title=\"{$title}\"></i>");
    }
}

if (!function_exists('setExpandedBaseRoute')) {
    /**
     * @param array $items
     * @return string
     */
    function setExpandedBaseRoute(array $items)
    {
        $url = request()->url();

        foreach ($items as $item) {
            if ($url == ($item['route'] ?? '')) {
                return 'show';
            }
        }

        return 'collapse';
    }
}

if (!function_exists('str_clean')) {
    /**
     * @param $string
     * @return mixed
     */
    function str_clean($string)
    {
        $string = str_replace(array('á', 'à', 'â', 'ã', 'ª', 'ä'), "a", $string);
        $string = str_replace(array('Á', 'À', 'Â', 'Ã', 'Ä'), "A", $string);
        $string = str_replace(array('Í', 'Ì', 'Î', 'Ï'), "I", $string);
        $string = str_replace(array('í', 'ì', 'î', 'ï'), "i", $string);
        $string = str_replace(array('é', 'è', 'ê', 'ë'), "e", $string);
        $string = str_replace(array('É', 'È', 'Ê', 'Ë'), "E", $string);
        $string = str_replace(array('ó', 'ò', 'ô', 'õ', 'ö', 'º'), "o", $string);
        $string = str_replace(array('Ó', 'Ò', 'Ô', 'Õ', 'Ö'), "O", $string);
        $string = str_replace(array('ú', 'ù', 'û', 'ü'), "u", $string);
        $string = str_replace(array('Ú', 'Ù', 'Û', 'Ü'), "U", $string);
        $string = str_replace(array('[', '^', '´', '`', '¨', '~', ']'), "", $string);
        $string = str_replace("ç", "c", $string);
        $string = str_replace("Ç", "C", $string);
        $string = str_replace("ñ", "n", $string);
        $string = str_replace("Ñ", "N", $string);
        $string = str_replace("Ý", "Y", $string);
        $string = str_replace("ý", "y", $string);

        $string = str_replace("á", "a", $string);
        $string = str_replace("Á", "A", $string);
        $string = str_replace("é", "e", $string);
        $string = str_replace("É", "E", $string);
        $string = str_replace("í", "i", $string);
        $string = str_replace("Í", "I", $string);
        $string = str_replace("ó", "o", $string);
        $string = str_replace("Ó", "O", $string);
        $string = str_replace("ú", "u", $string);
        $string = str_replace("Ú", "U", $string);

        return $string;
    }
}

if (!function_exists('no_data')) {
    /**
     * @param string|null $message
     * @return HtmlString
     */
    function no_data(string $message = "Sin Informaci&oacute;n")
    {
        return new HtmlString("<span class=\"text-muted\"><em>-- {$message} --</em></span>");
    }
}

if (!function_exists('cuit_format')) {
    /**
     * @param string $number
     * @return string
     */
    function cuit_format(string $number = null)
    {
        if (is_null($number)) {
            return $number;
        }

        $array_number = str_split($number, 1);

        $result = '';

        foreach ($array_number as $i => $n) {

            if ($i == 1 || $i == 9) {
                $result .= $n . '-';
            } else {
                $result .= $n;
            }

        }

        return $result;
    }
}

if (!function_exists('noImage')) {
    function noImage()
    {
        return "img/no_image.png";
    }
}

if(!function_exists('avatar')){
    function avatar()
    {
        return "img/avatar_common.png";
    }
}

if(!function_exists('testEnv')){
    function testEnv($var = 'APP_NAME')
    {
        return env($var);
    }
}

if (!function_exists('limitar_cadena')){
   function limitar_cadena($cadena, $size, $sufijo = null)
   {
       $s = !is_null($sufijo)
           ? ' ' . $sufijo
           : '';

       return strlen($cadena) > $size
           ? substr($cadena, 0, $size) . $s
           : substr($cadena, 0, $size);
   }
};

if (!function_exists('color_span')){
    function color_span()
    {
        //Son 14 &nbsp; (Espacios en blanco)
        return new HtmlString(
            "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");

    }
};

if (!function_exists('random_password')){
    function random_password($length = 12, $minusculas_length = 7, $mayusculas_length = 2, $numeros_length = 2, $simbolos_length = 1)
    {
        $minusculas = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, $minusculas_length);
        $mayusculas = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $mayusculas_length);
        $numeros = substr(str_shuffle("0123456789"), 0, $numeros_length);
        $simbolos = substr(str_shuffle("-@#$%^&*()!?_=+;:,."), 0, $simbolos_length);
        $password = str_shuffle($minusculas . $mayusculas . $numeros . $simbolos);
        return $password;
    }
};


