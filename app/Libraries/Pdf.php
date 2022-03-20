<?php

namespace App\Libraries;

use Spipu\Html2Pdf\Html2Pdf;

class Pdf
{
    /**
     * @var array
     */
    protected $settings = [
        'orientation' => 'L',
        'paper' => 'A4',
        'lang' => 'es',
        'encoding' => 'UTF-8',
        'margins' => [5, 5, 5, 5],
        'output' => 'I',
    ];

    /**
     * @param $view
     * @param array $attributes
     * @param array $models
     * @return string
     * @throws \Spipu\Html2Pdf\Exception\Html2PdfException
     */
    function print($view, array $attributes = [], $models = []) {
        try {
            $content = view($view, $models);

            $html2pdf = new HTML2PDF(
                $this->settings['orientation'],
                $this->settings['paper'],
                $this->settings['lang'],
                true,
                'UTF-8',
                $this->settings['margins']
            );

            $html2pdf->pdf->SetTitle($attributes['title']);

            $html2pdf->WriteHTML($content);

            return $html2pdf->Output($attributes['file_name'] ?? 'file_name' . '.pdf', $this->settings['output']);
        } catch (HTML2PDF_exception $e) {

            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->settings[$name];
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->settings[$name] = $value;
    }
}
