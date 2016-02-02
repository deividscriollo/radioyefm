<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/simple_dom_html/simple_dom_html.php";

class Servicio_sri {

    public $mensaje;
    public $existe = false;
    public $razonSocial;
    public $nombreComercial;
    public $ruc;
    var $user_agent = array();
    var $url;
    var $url_1;
    var $proxy;

    function __construct() {
        $this->url = "https://declaraciones.sri.gob.ec/facturacion-internet/consultas/publico/ruc-datos2.jspa";
        $this->url_1 = "https://declaraciones.sri.gob.ec/facturacion-internet/consultas/publico/ruc-establec.jspa";
        $user_agent[] = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322; FDM)";
        $user_agent[] = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; Avant Browser [avantbrowser.com]; Hotbar 4.4.5.0)";
        $user_agent[] = "Mozilla/5.0 (Macintosh; U; Intel Mac OS X; en; rv:1.8.1.14) Gecko/20080409 Camino/1.6 (like Firefox/2.0.0.14)";
        $user_agent[] = "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Version/3.1 Safari/525.13";
        $user_agent[] = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; NeosBrowser; .NET CLR 1.1.4322; .NET CLR 2.0.50727)";
        $user_agent[] = "Mozilla/5.0 (Windows; U; Windows NT 5.1; es-ES; rv:1.8.1) Gecko/20061010 Firefox/2.0";
        $this->user_agent = $user_agent;
    }

    protected function encontrado($razon, $nombre) {
        $this->razonSocial = $razon;
        $this->nombreComercial = $nombre;
        $this->existe = true;

        return $this;
    }

    protected function noEncontrado($mensaje) {
        $this->mensaje = $mensaje;
        $this->existe = false;

        return $this;
    }

    /**
     * Servicio web remoto que consulta al SRI por datos sobre un ruc utilizando
     * "screen scrapping", simulando ser un navegador. Depende de CURL
     */
    protected function getTable($ruc) {
        $randomico = rand(0, count($this->user_agent) - 1);
        $agent = $this->user_agent[$randomico];
        $post = 'accion=siguiente&ruc=' . $ruc;
        $respuesta = $this->curl_for_table($post, $agent);

        return $respuesta;
    }

    protected function curl_for_table($post, $agent) {
        $curl = curl_init($this->url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        curl_setopt($curl, CURLOPT_USERAGENT, $agent);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        /// PROXY
        //Si tiene salida a Internet por Proxy, debe poner ip y puerto
        if ($this->proxy) {
            curl_setopt($curl, CURLOPT_HTTPPROXYTUNNEL, 1);
            curl_setopt($curl, CURLOPT_PROXY, $this->proxy['url']);  // '172.20.18.6:8080'
            if (isset($this->proxy['user']) && isset($this->proxy['password'])) {
                $cred = $this->proxy['user'] . ':' . $this->proxy['password'];
                curl_setopt($curl, CURLOPT_PROXYUSERPWD, $cred);
            }
        }
        $respuesta = curl_exec($curl);
        curl_close($curl);

        return $respuesta;
    }

    protected function datosRUC($ruc) {
        $html = $this->getTable($ruc);
        if (stripos($html, 'El RUC no se encuentra registrado en nuestra base de datos') !== false)
            return $this->noEncontrado('No se encuentra');
        if (stripos($html, 'Error en el Sistema') !== false)
            return $this->noEncontrado('Error en el sistema remoto');
        $razon = $this->prepare_razon_social($html);

        return $razon;
    }

    protected function prepare_razon_social($html) {
        $startString = '<table class="formulario">';
        $endString = '</table>';
        $startColumn = stripos($html, $startString) + strlen($startString);
        $endColumn = stripos($html, $endString, $startColumn);
        $razon = substr($html, $startColumn, $endColumn - $startColumn);
        $razon = str_replace('<tr><td colspan="2">&nbsp;</td></tr>', "", $razon);
        $razon = str_replace('<tr><td colspan="2" class="lineaSep" /></tr>', "", $razon);
        $razon = str_replace(',', "", $razon);
        $razon = str_replace('<th>', "<td>", $razon);
        $razon = str_replace('</th>', "</td>", $razon);
        $razon = '<table>' . $razon . '</table>';

        return $razon;
    }

    function establecimientoSRI($d_ruc) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0');
        curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '\cookie.txt');
        curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '\cookie.txt');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $post = 'accion=siguiente&ruc=' . $d_ruc;
        $post_1 = 'pagina=regresar&ruc=' . $d_ruc;

        curl_setopt($curl, CURLOPT_URL, 'https://declaraciones.sri.gob.ec/facturacion-internet/consultas/publico/ruc-datos2.jspa');
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        curl_exec($curl);

        curl_setopt($curl, CURLOPT_URL, 'https://declaraciones.sri.gob.ec/facturacion-internet/consultas/publico/ruc-datos3.jspa');
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_1);
        $repre = curl_exec($curl);

        $startString = '<div id="contenido">';
        $endString = '</div>';
        $startColumn = stripos($repre, $startString) + strlen($startString);
        $endColumn = stripos($repre, $endString, $startColumn);
        $dat = substr($repre, $startColumn, $endColumn - $startColumn);
        $startString = '<table width="100%" class="formulario">';
        $endString = '</table>';
        $startColumn = 50; //stripos($dat, $startString) + strlen($startString);
        $endColumn = stripos($dat, $endString, $startColumn);
        $dat = substr($dat, $startColumn, $endColumn - $startColumn);

        curl_setopt($curl, CURLOPT_POST, 0);
        curl_setopt($curl, CURLOPT_URL, 'https://declaraciones.sri.gob.ec/facturacion-internet/consultas/publico/ruc-establec.jspa');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($curl);
        curl_close($curl);

        $startString = ' <div align="center"><b>Establecimiento Matriz</b></div>';
        $endString = '</table><br/>';
        $startColumn = stripos($res, $startString) + strlen($startString);
        $endColumn = stripos($res, $endString, $startColumn);

        $establecimientos = substr($res, $startColumn, $endColumn - $startColumn);

        $startString_1 = ' <div align="center"><b>Establecimientos Adicionales</b></div>';
        $endString_1 = '</table><br/>';
        $startColumn_1 = stripos($res, $startString_1) + strlen($startString_1);
        $endColumn_1 = stripos($res, $endString_1, $startColumn_1);

        $establecimientos_1 = substr($res, $startColumn_1, $endColumn_1 - $startColumn_1);

        $establecimientos = $establecimientos . " " . $establecimientos_1 . " " . $dat;
        $establecimientos = str_replace('<table class="reporte" cellspacing="0">', "", $establecimientos);
        $establecimientos = str_replace('</table>', "", $establecimientos);

        $establecimientos = '<table>' . $establecimientos . '</table>';

        return $establecimientos;
    }

    public function obtener_datos($ruc) {
        $datos = $this->datosRUC($ruc); ////accedemos a la funcion datosSRI		
        $total = array(); ///creamos un array para almacenar la informacion

        $estab = $this->establecimientoSRI($ruc);
        if (property_exists($datos, 'mensaje')) {//verificacios si existe el ruc ingresado
            $total = json_encode($datos->mensaje); //respuesta de error
            $acu[] = 0;
        } else {
            $html = str_get_html($datos);
            foreach ($html->find('table tr td') as $e) {
                $arr[] = utf8_encode(trim($e->innertext));
            }
            $html = str_get_html($estab);
            foreach ($html->find('table tr td') as $e) {
                if (utf8_encode(trim($e->innertext)) == '' || utf8_encode(trim($e->innertext)) == '&nbsp;') {
                    //$arr_1[] = utf8_encode(trim($e->innertext));
                } else {
                    $arr_1[] = utf8_encode(trim($e->innertext));
                }
            }
        }
        return array($arr, $arr_1);
    }

}
