<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('delTree'))
{
	function delTree($dir) { 
      $files = array_diff(scandir($dir), array('.','..')); 
      foreach ($files as $file) { 
        (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
      } 
      return rmdir($dir); 
    }
}

if ( ! function_exists('days_week'))
{
		function days_week($date = NULL,$datafinal = NULL){

		    $date = ($date == NULL) ? date('d/m/Y') : $date;

		    $date = explode("/", $date);
		    $dia = $date[0];
		    $mes = $date[1];
		    $ano = $date[2];
		    $data = $dia."-".$mes."-".$ano;


		    $dia_da_semana_array = array('Domingo', 'Segunda', 'Terca', 'Quarta', 'Quinta', 'Sexta', 'Sabado'); // lista
		    $meses_array = array('', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'); // lista
		    $dia_da_semana_inicial = date('w', strtotime($data)); // pega o dia da semana em inteiro
		    $dia_da_semana_inicial_string = $dia_da_semana_array[$dia_da_semana_inicial];  // pega o dia da semana  em string

		    $arraySemanas = array(); // lista das semanas

		    $x = $dia_da_semana_inicial;
		    $y = 0;

		    $semana = 1;
		    while(true){

		        // insere no array
		        if(ConverteData(str_replace("-","/",$data))<=$datafinal){
			        $indexMes = (int)$mes;
			        $arraySemanas[$semana][$y]['day_week'] = str_replace("-","/",$data); 
			        $arraySemanas[$semana][$y]['day_name'] = $dia_da_semana_array[$x];
			        $arraySemanas[$semana][$y]['month_name'] = $meses_array[$indexMes];
			    }
		        // verifica se mudou o mês
		        $data = date('d-m-Y', strtotime("+1 day", strtotime($data)));
		        $dataVerifi = explode("-", $data);
		        if($dataVerifi[1] != $mes){
		            // se mudou o mes para o loop
		            break;
		        }

		        if($x == 6){
		            $x = 0;
		            $y = 0;
		            $semana++;
		        } else {
		            $x++;
		            $y++;
		        }

		    }
		    return $arraySemanas;
		}
}

if ( ! function_exists('converteData'))
{
	function converteData($data, $sep="/"){

		//Trada a data se for timestamp
		$data = explode(" ", $data);

		if(strpos($data[0], '-')){
			$d = explode("-", $data[0]);
			return $d[2].$sep.$d[1].$sep.$d[0];
		} else if(strpos($data[0], '/')) {
			$d = explode("/", $data[0]);
			return $d[2].'-'.$d[1].'-'.$d[0];
		}
	}
}

if ( ! function_exists('converteDataHora'))
{
	function converteDataHora($data, $hora=true){
		// Aqui pegamos a data, e dividimos ela em duas, usando a métodoExplode()
		$data = explode(" ", $data);
		 
		// AQUI TEMOS AS DUAS PARTES
		$data1 = $data[0]; // DATA (xxxx-xx-xx)
		$data2 = $data[1]; // HORA (xx:xx:xx)
		 
		// Agora dividimos a data em três partes, também usando o método Explode()
		$data1 = explode("-", $data1);
		 
		$dia = $data1[2]; // Retorna o dia
		$mes = $data1[1]; // Retorna o mês
		$ano = $data1[0]; // Retorna o ano
		 
		/* Como deve ter notado, dentro das variáveis existem o número de array, o 0(zero) trás o ano, 1 o mês e o 2 o dia para saber mais recomendo pesquisar sobre a função
		 
		Agora vamos formatar a data, trazemos as strings, e a hora
		Aonde dia traz a string $data1[2]
		Aonde mês traz a string $data1[1]
		Aonde ano traz a string $data1[0]
		 
		Como não precisamos "explodir" a hora trazemos ela normalmente através da string $data2
		 
		*/
		
		$data = $dia . "/" . $mes . "/" . $ano;
		
		if($hora==true)
			$data .=  " &agrave;s " . $data2;
		 
		// Retornamos o valor
		return $data;
	}
}

if ( ! function_exists('selectUf'))
{
	function selectUf($ufSel=null){
		$uf = array();
		$uf["AC"] = "AC";
		$uf["AL"] = "AL";
		$uf["AM"] = "AM";
		$uf["AP"] = "AP";
		$uf["BA"] = "BA";
		$uf["CE"] = "CE";
		$uf["DF"] = "DF";
		$uf["ES"] = "ES";
		$uf["GO"] = "GO";
		$uf["MA"] = "MA";
		$uf["MG"] = "MG";
		$uf["MS"] = "MS";
		$uf["MT"] = "MT";
		$uf["PA"] = "PA";
		$uf["PB"] = "PB";
		$uf["PE"] = "PE";
		$uf["PI"] = "PI";
		$uf["PR"] = "PR";
		$uf["RJ"] = "RJ";
		$uf["RN"] = "RN";
		$uf["RO"] = "RO";
		$uf["RR"] = "RR";
		$uf["RS"] = "RS";
		$uf["SC"] = "SC";
		$uf["SE"] = "SE";
		$uf["SP"] = "SP";
		$uf["TO"] = "TO";

		$str = "";
		foreach($uf as $v){
			$str .= "<option value=\"$v\" ".($v==$ufSel ? "selected=\"selected\"" : '').">".$v."</option>";
		}

		return $str;
	}
}

if ( ! function_exists('retornaStatus'))
{
	function retornaStatus($str){
		switch ($str){
			case 0 : $str = "Inativo"; break;
			case 1 : $str = "Ativo"; break;
			case 2 : $str = "Excluido"; break;
			default : $str = "-"; break;

		}
		return $str;
	}
}

if ( ! function_exists('retornaSimNao'))
{
	function retornaSimNao($str){
		switch ($str){
			case 's' : $str = "Sim"; break;
			case 'n' : $str = "Não"; break;
		}

		return $str;
	}
}

if ( ! function_exists('retornaSexo'))
{
	function retornaSexo($str){
		switch ($str){
			case 'f' : $str = "Feminino"; break;
			case 'm' : $str = "Masculino"; break;
		}

		return $str;
	}
}


if ( ! function_exists('getSituacao'))
{
	function getSituacao($str){
		switch ($str){
			case 'aberto' 		: $str = "Em Aberto"; break;
			case 'produção' 	: $str = "Em Produção"; break;
			case 'transporte' 	: $str = "Em Transporte"; break;
			case 'entregue' 	: $str = "Entregue"; break;
			case 'cancelado' 	: $str = "Cancelado"; break;
		}

		return $str;
	}
}


if (!function_exists('abreviaString')) 
{
    function abreviaString($string, $pos, $palavraInteira=true) 
    {
    	$string = html_entity_decode($string, ENT_QUOTES, "UTF-8");
    	
       if(strlen($string) > $pos) {

			if($palavraInteira==true){
				$texto = substr(strip_tags($string), 0, $pos); 
				$arrayTexto = explode(" ", $texto);	
				array_pop($arrayTexto);
				$ret = implode(" ", $arrayTexto)."...";
			}else{
				$ret = substr(strip_tags($string), 0, $pos)."..."; 
			}
		}else {
			$ret = strip_tags($string);
		}

		return $ret;
    }
}

if ( ! function_exists('getMes'))
{
	function getMes($mes){
		$mes_extenso = array(
	        1 => 'Janeiro',
	        2 => 'Feveiro',
	        3 => 'Março',
	        4 => 'Abril',
	        5 => 'Maio',
	        6 => 'Junho',
	        7 => 'Julho',
	        8 => 'Agosto',
	        9 => 'Setembro',
	        10 => 'Outubro',
	        11 => 'Novembro',
	        12 => 'Dezembro'
	    );
		return $mes_extenso[intval($mes)];
	}
}

if (!function_exists('youtubeId')) 
{
    function youtubeId($url) 
    {
    	if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
		    return $match[1];
		}else{
			return false;
		}
    }
}

if (!function_exists('ConverteRealCad')) 
{
        
        /**
         * Converte a string para o formato do banco. (0,00 => 0.00)
         * @param string $valor
         */
        function ConverteRealCad($valor){
            $preco = explode(".",$valor);
            $preco = implode($preco);
            $preco = preg_replace("/,/",".","$preco");
            return $preco;
        }

}

if (!function_exists('ConverteReal')) 
{
        
        /**
         * Converte o formato do banco para string . (0.00 => 0,00)
         * @param float $valor
         */
        function ConverteReal($valor) {
        $preco = number_format($valor, 2, ',', '.');
        return $preco;
        }
        
}

if ( ! function_exists('retornaPagina'))
{
	function retornaPagina($status){
		switch ($status){
			case 'start' : $str = "Gôndola Start"; break;
			case 'corp' : $str = "Gôndola Corp"; break;
			case 'contato' : $str = "Contato"; break;
			case 'revendedor' : $str = "Seja uma revenda"; break;
		}
		return $str;
	}
}

if (!function_exists('onlyNumbers')) 
{
    function onlyNumbers($string) 
    {
    return intval(preg_replace ('/\D+/', '', $string));
    }
}

if (!function_exists('removerParametro')) 
{
    function removerParametro($get, $arrParam=array()) 
    {

    	foreach ($arrParam as $param) {
    		unset($get[$param]);
    	}
    	
    	return $get;
    }
}

if (!function_exists('tempoExtenso')) 
{
    function tempoExtenso($tempo) 
    {
    	$diaHora = explode('.', $tempo);
		$dias  = $diaHora[0];
		$horas = $diaHora[1];

    	
    	$arr = explode(':', $horas);

    	if ($dias <= 0) {
    		return $arr[0] > 0 ? $arr[0].' hora(s) '.$arr[1].' minuto(s)' : $arr[1].' minuto(s)';
    	}else {
    		return $dias.' dia(s)';
    	}
    }
}

if (!function_exists('unsetArrayByKey')) 
{
    function unsetArrayByKey($array, $key) 
    {
   		unset($array[$key]);

    	return $array;
    }
}

if (!function_exists('calculaBv')) 
{
    function calculaBv($valor_anuncio, $porcento_entrada, $num_parcelas, $valor_taxa) 
    {
    	if ($porcento_entrada > 0) {
   			$vlr_entrada = $valor_anuncio - ($valor_anuncio * ($porcento_entrada / 100));
    	}else{
    		$vlr_entrada = 0;
    	}
    	
   		$parcelamento = ($vlr_entrada + 2000) * $valor_taxa;

   		return array(
   			'entrada' => $vlr_entrada,
   			'parcelamento' => $parcelamento,
   			'num_parcelas' => $num_parcelas
   		);
    }
}

if(!function_exists('enviar_emails')){
    function enviar_emails($lib, $from, $to, $message, $subject = null, $replyTo = null)
    {

        require_once('application/libs/phpmailer/class.phpmailer.php');
        require_once('application/libs/phpmailer/class.smtp.php');

        $mail = new PHPMailer();

        //$mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USER;
        $mail->Password = SMTP_PASS;
        $mail->SMTPSecure = SMTP_CRYP;
        $mail->Port = SMTP_PORT;

        //Recipients
        $mail->setFrom($from, EMAIL_NAME);
        if($_SERVER['HTTP_HOST']=="localhost"||$_SERVER['HTTP_HOST']=="192.168.1.254"||$_SERVER['HTTP_HOST']=="192.168.0.254"||$_SERVER['HTTP_HOST']=="192.168.0.103"){
            $mail->addAddress('giovan@wtek.com.br');
        } else {
            $mail->addAddress($to);
        }

        if(!is_null($replyTo)){
            $mail->addReplyTo($replyTo);
        } else {
            $mail->addReplyTo('contato@futimoveis.com.br');
        }
        $mail->Subject = utf8_decode($subject);

        $mail->MsgHTML( utf8_decode($message) );
        return $mail->Send();
//        $subject = (is_null($subject)) ? 'POST IMÓVEIS' : $subject;
//
//        $config['charset']     = 'iso-8859-1';
//        $config['wordwrap']    = TRUE;
//        $config['mailtype']    = 'html';
//        $config['protocol']    = 'smtp';
//        $config['smtp_host']   = SMTP_HOST;
//        $config['smtp_user']   = SMTP_USER;
//        $config['smtp_pass']   = SMTP_PASS;
//        $config['smtp_port']   = SMTP_PORT;
//        $config['smtp_crypto'] = SMTP_CRYP;
//
//        $lib->initialize($config);
//        $lib->from($from);
//        $lib->to($to);
//
//        $lib->subject($subject);
//        $lib->message($message);
//        $lib->send();
//
//        var_dump($lib->print_debugger(array('headers')));die;
//        return $lib->send();

    }
}

if (!function_exists('baseUrlSite')) {
    function baseUrlSite($atRoot = FALSE, $atCore = FALSE, $parse = FALSE)
    {
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

            $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
            $core = $core[0];

            $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
            $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
            $base_url = sprintf($tmplt, $http, $hostname, $end);
        } else $base_url = 'http://localhost/';

        if ($parse) {
            $base_url = parse_url($base_url);
            if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
        }

        return $base_url;
    }
}

if(!function_exists('resumo')) {
    function resumo($texto, $qtdChars, $sufix = '...')
    {
        $texto = strip_tags($texto);

        if (strlen($texto) > $qtdChars) {
            $texto = substr($texto, 0, $qtdChars);

            $lastSpace = strripos($texto, ' ');

            return substr($texto, 0, $lastSpace) . $sufix;
        } else {
            return $texto;
        }
    }
}

if(!function_exists('get_dia_semana')){
    function get_dia_semana($day)
    {
        $days = array(
            'Domingo',
            'Segunda-feira',
            'Terça-feira',
            'Quarta-feira',
            'Quinta-feira',
            'Sexta-feira',
            'Sábado',
        );

        if (isset($days[$day])) {
            return $days[$day];
        }

        return '';

    }
}

if(!function_exists('get_mes_extenso')){
    function get_mes_extenso($mes)
    {
        switch ($mes)
        {
            case 1: $mes = 'Janeiro';
                break;
            case 2: $mes = 'Fevereiro';
                break;
            case 3: $mes = 'Março';
                break;
            case 4: $mes = 'Abril';
                break;
            case 5: $mes = 'Maio';
                break;
            case 6: $mes = 'Junho';
                break;
            case 7: $mes = 'Julho';
                break;
            case 8: $mes = 'Agosto';
                break;
            case 9: $mes = 'Setembro';
                break;
            case 10: $mes = 'Outubro';
                break;
            case 11: $mes = 'Novembro';
                break;
            case 12: $mes = 'Dezembro';
                break;
            default : $mes = '';
                break;
        }

        return $mes;
    }
}

if(!function_exists('getClienteLogged')) {
    function getClienteLogged($session)
    {
        $logged = $session->userdata('clienteLogado');

        return unserialize($logged);
    }
}

if(!function_exists('sessionTimeUpdate')) {
    function sessionTimeUpdate($session, $destroy = false)
    {
        $session->set_userdata('__ci_last_regenerate', time());
    }
}

if(!function_exists('hasClienteLogged')) {
    function hasClienteLogged($session, $redirect = false)
    {
        $logged = $session->userdata('clienteLogado');

        if (!isset($logged) || is_null($logged)) {
            if($redirect){
                redirect(base_url()."cadastro");
                die();
            }
            return false;

        } else {
            sessionTimeUpdate($session);
        }

        return true;
    }
}
if(!function_exists('hasClienteLoggedHome')) {
    function hasClienteLoggedHome($session)
    {
        $logged = $session->userdata('clienteLogado');

        if (!isset($logged) || is_null($logged)) {

            redirect(base_url()."cadastro");
            die();
        } else {
            redirect(base_url()."passos");
            die();
        }
    }
}

if(!function_exists('doLogout')) {
    function doLogout($session)
    {
        $session->unset_userdata('clienteLogado');
    }
}

if(!function_exists('validarCPF')) {
    function validarCPF($cpf)
    {
        // Extrair somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
    }
}

if(!function_exists('validarCNPJ')) {
    function validarCNPJ($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;
        // Verifica se todos os digitos são iguais
        if (preg_match('/(\d)\1{13}/', $cnpj))
            return false;
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
        {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
            return false;
        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
        {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;

        return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }
}

if(!function_exists('stripslashes_gpc')){
    function stripslashes_gpc(&$value)
    {
        $value = stripslashes($value);
    }
}

if(!function_exists('get_telefone_ddd')){
    function get_telefone_ddd($tel, $formatar = false){

        if ($tel) {
            $arr = explode(' ', $tel);
            if (count($arr) > 0) {
                if($formatar) {
                    return preg_replace('/[^\d]/', '', $arr[0]);
                } else {
                    return $arr[0];
                }
            }
        }
        return '';

    }
}

if(!function_exists('get_telefone_sem_ddd')){
    function get_telefone_sem_ddd($tel, $formatar = false){

        if ($tel) {
            $arr = explode(' ', $tel);
            if (count($arr) > 1) {
                if($formatar) {
                    return preg_replace('/[^\d]/', '', $arr[1]);
                } else {
                    return $arr[1];
                }
            }
        }
        return '';

    }
}





if(!function_exists('format_data')){
    function format_data($data, $type)
    {
        switch ($type)
        {
            case 'ING' :
                {
                    $partes = explode('/', $data);
                    $retorno = $partes[2] . '-' . $partes[1] . '-' . $partes[0];
                } break;

            case 'POR' :
                {
                    $partes = explode('-', $data);
                    $retorno = $partes[0] . '-' . $partes[1] . '-' . $partes[2];
                } break;
        }

        return $retorno;
    }
}

if(!function_exists('data_mysql')){
    function data_mysql($strData, $boolValidar = true)
    {
        $strRet = '';
        $arrPartes = preg_split('![/-]!', $strData);
        if (count($arrPartes) == 3)
        {
            if (!$boolValidar || checkdate($arrPartes[1], $arrPartes[0], $arrPartes[2]))
            {
                $strRet = sprintf('%s-%s-%s', $arrPartes[2], $arrPartes[1], $arrPartes[0]);
            }
        }
        return $strRet;
    }
}

if(!function_exists('get_hours_range')) {
    function get_hours_range($start = 0, $end = 86400, $step = 3600, $format = 'g:i a')
    {
        $times = array();
        foreach (range($start, $end, $step) as $timestamp) {
            $hour_mins = gmdate('H:i', $timestamp);
            if (!empty($format))
                $times[] = gmdate($format, $timestamp);
            else $times[] = $hour_mins;
        }
        return $times;
    }
}
if(!function_exists('timeToSeconds')) {
    function timeToSeconds($dateTime) {

        $seconds = 0;
        $seconds += $dateTime->format('H') * 3600;
        $seconds += $dateTime->format('i') * 60;
        $seconds += $dateTime->format('s');

        return $seconds;

    }
}

if(!function_exists('nextStepRedirect')) {
    function nextStepRedirect($cliente, $pedido) {

        $passo = 'pagamento';

        $reagendamento = false;

        $objConfig = ConfiguracaoPeer::retrieveByPK(1);

        if(PedidoPeer::hasPedidoFinalizado($cliente) > 0){
            $arrStatus['hasPedidoFinalizado'] = true;
        }

        $arrStatus['isFinalizado'] = ($pedido->getStatus() == PedidoFormaPagamentoPeer::STATUS_PEDIDO_CANCELADO ||
            $pedido->getStatus() == PedidoFormaPagamentoPeer::STATUS_PEDIDO_FINALIZADO);

        if($pedido->getStatus() == PedidoFormaPagamentoPeer::STATUS_PEDIDO_FINALIZADO){
            $primeiroAgendamento = AgendaHorarioPedidoQuery::create()->filterByPedidoId($pedido->getId())->orderById(Criteria::ASC)->findOne();
            $qtdAgendamento = AgendaHorarioPedidoQuery::create()->filterByPedidoId($pedido->getId())->count();

            $dataLimite = new DateTime('now');

            $dataUltimoAgendamento = DateTime::createFromFormat('Y-m-d H:i:s', $primeiroAgendamento->getAgendaHorario()->getDataAgendamento('Y-m-d').' 23:59:59');
            if($objConfig->getModeloLimiteReagendamento() == 1){
                if(is_numeric($objConfig->getDiasLimiteReagendamento()) && $objConfig->getDiasLimiteReagendamento() > 0){
                    $dataUltimoAgendamento->add(new DateInterval('P'.$objConfig->getDiasLimiteReagendamento().'D'));
                }
            } elseif ($objConfig->getModeloLimiteReagendamento() == 0){
                if(is_numeric($objConfig->getDiasLimiteReagendamento()) && $objConfig->getDiasLimiteReagendamento() > 0){
                    $dataUltimoAgendamento->sub(new DateInterval('P'.$objConfig->getDiasLimiteReagendamento().'D'));
                }
            }
            $reagendamento = true;
            if($dataLimite->getTimestamp() >= $dataUltimoAgendamento->getTimestamp() ||  $qtdAgendamento > $objConfig->getQuantidadeReagendamento() ){
                $reagendamento = false;
            }
        }

        if($arrStatus['isFinalizado']){

            if($reagendamento){
                $passo = 'comprovante/'.$pedido->getId();
            } else {
                $passo = 'pagamento';
            }

        } else {
            if($pedido->getStatus() == PedidoFormaPagamentoPeer::STATUS_PEDIDO_COMPROVANTE){
                $passo = 'comprovante/'.$pedido->getId();
            } elseif ($pedido->getStatus() == PedidoFormaPagamentoPeer::STATUS_PEDIDO_CONFIRMACAO){
                $passo = 'confirmacao/'.$pedido->getId();
            } elseif ($pedido->getStatus() == PedidoFormaPagamentoPeer::STATUS_PEDIDO_AGENDA){
                $passo = 'agenda/'.$pedido->getId();
            } elseif ($pedido->getStatus() == PedidoFormaPagamentoPeer::STATUS_PEDIDO_PAGAMENTO){
                $passo = 'pagamento';
            }
        }

        return $passo;
    }
}


if (!function_exists('gerarPdfAgendamento'))
{
    /**
     * Função que cria e retorna o PDF do agendamento, seja ele para usar no e-mail ou para mostrar no CMS.
     *
     * Parametro agendamento deve conter Objetos AgendaHorarioPedido e Configuracao e seus respectivos valores.
     *
     * @param $objAgendaHorarioPedido AgendaHorarioPedido
     * @param $objConfiguracao Configuracao
     *
     * @return string
     * @throws PropelException
     */
    function gerarPdfAgendamento(AgendaHorarioPedido $objAgendaHorarioPedido, Configuracao $objConfiguracao )
    {


        $header = '

        <table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td align="center">
						    <img width="185" height="86" src="'.str_replace("index.php/", "",base_url()).'assets/images/logo.png">
						</td>
					</tr>
				</table>
				<br>';

        $html = '
			<style>
				table{
					font-family:sans-serif !important;
					font-size:12px;
					page-break-inside: avoid;
					page-break-before: always;
				}	
			</style>
			';
        $html .= $header;



        $html .= '
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td align="center">
						    <span style="font-size:24px;">Lisboa Medicina do Tráfego</span>
						</td>
					</tr>
				</table>
				<br>';

/*
 *

//                            <ol type="i" style="list-style-type: lower-roman;">
//                                <li >
//                                    <table border="0" cellspacing="0" cellpadding="0">
//                                        <tr>
//                                            <td style="color:#191313; padding:0px 0px 4px;" >
//                                                Imprima este comprovante e leve no dia da consulta.
//                                            </td>
//                                        </tr>
//                                    </table>
//                                </li>
//                                <li style="padding-bottom: 3px;">Imprimia 1 cópia do questionário e leve preenchida no dia da consulta.</li>
//                                <li style="padding-bottom: 3px;">Leve a CNH original no dia da consulta (caso não possua, leve um documento original com foto).</li>
//                                <li style="padding-bottom: 3px;">Em caso de desistência ou imprevisto, você poderá remarcar 1 vez a consulta diretamente pelo site até 24 horas antes da data agendada.</li>
//                                <li>Caso não seja remarcado a tempo ou não compareça na consulta, todo o processo de agendamento, <strong>inclusive o pagamento da taxa</strong>, deverá ser realizado novamente.</li>
//                            </ol>


 *
 */

        $html .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td align="left" style=" padding-bottom: 10px;">
						    <span style="font-size:20px;">- Agendamento</span>
						</td>
					</tr>
				</table>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td style="color:#191313; padding:8px; border-left:1px solid #bfbfbf;border-top:1px solid #bfbfbf;border-bottom:1px solid #bfbfbf;border-right:1px solid #bfbfbf;" >
						    Dia/Hora: '.$objAgendaHorarioPedido->getAgendaHorario()->getDataAgendamentoCompleto().'
						</td>
					</tr>
					<tr>
						<td style="color:#191313; padding:8px; border-left:1px solid #bfbfbf;border-right:1px solid #bfbfbf;border-bottom:1px solid #bfbfbf;" >
						    Local: '.$objConfiguracao->getEnderecoConsulta().'
						</td>
					</tr>
					<tr>
						<td style="color:#191313; padding:8px; border-left:1px solid #bfbfbf;border-right:1px solid #bfbfbf;border-bottom:1px solid #bfbfbf;" >
						    E-mail para Contato: '.$objConfiguracao->getEmail().'
						</td>
					</tr>
				</table>
				<br>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td align="left" style=" padding-bottom: 10px;">
						    <span style="font-size:20px;">- Observações</span>
						</td>
					</tr>
				</table>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
                        <td style="color:#191313; padding: 0px 8px 5px 8px; text-align: right;" >
                            i. 
                        </td>
                        <td style="color:#191313; padding: 0px 0px 5px 0px;;" >
                            Imprima este comprovante e leve no dia da consulta. 
                        </td>
					</tr>
					<tr>
                        <td style="color:#191313; padding: 3px 8px 5px 8px;text-align: right; " >
                            ii. 
                        </td>
                        <td style="color:#191313; padding:3px 0px 5px 0px;; " >
                            Imprimia 1 cópia do questionário e leve preenchida no dia da consulta. 
                        </td>
					</tr>
					<tr>
                        <td style="color:#191313; padding: 3px 8px 5px 8px; text-align: right;" >
                            iii. 
                        </td>
                        <td style="color:#191313; padding: 3px 0px 5px 0px;;" >
                            Leve a CNH original no dia da consulta (caso não possua, leve um documento original com foto).
                        </td>
					</tr>
					<tr>
                        <td style="color:#191313; padding: 3px 8px 5px 8px; text-align: right;" >
                            iv. 
                        </td>
                        <td style="color:#191313; padding: 3px 0px 5px 0px;;" >
                            Em caso de desistência ou imprevisto, você poderá remarcar 1 vez a consulta diretamente pelo site até 24 horas antes da data agendada.
                        </td>
					</tr>
					<tr>
                        <td style="color:#191313; padding: 3px 8px 5px 8px; text-align: right;" >
                            v. 
                        </td>
                        <td style="color:#191313; padding: 3px 0px 5px 0px;" >
                            Caso não seja remarcado a tempo ou não compareça na consulta, todo o processo de agendamento, <strong>inclusive o pagamento da taxa</strong>, deverá ser realizado novamente. 
                        </td>
					</tr>
				</table>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td align="left" style=" padding-top: 20px;padding-bottom: 10px;">
						    <span style="font-size:20px;">- Check-list de documentos para o dia da consulta</span>
						</td>
					</tr>
				</table>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
                        <td style="color:#191313; padding: 0px 0px 0px 8px;"><input type="checkbox" style="font-size: 20px;padding: 0px;" /> Comprovante de agendamento</td>
					</tr>
					<tr>
                        <td style="color:#191313; padding: 0px 0px 0px 8px;"><input type="checkbox" style="font-size: 20px;padding: 0px;" /> 1 cópia do questionário preenchido</td>
					</tr>
				</table>
				';



//        <tr>
//                        <td style="margin:3px 0px 3px 5px; padding: 0px; border: 1px solid black;" >&nbsp;</td>
//                        <td style="color:#191313; padding:3px 0px 3px 15px;" ></td>
//					</tr>
        return $html;
    }
}


if (!function_exists('gerarPdfExame'))
{
    /**
     * Função que cria e retorna o PDF do agendamento, seja ele para usar no e-mail ou para mostrar no CMS.
     *
     * Parametro agendamento deve conter Objetos AgendaHorarioPedido e Configuracao e seus respectivos valores.
     *
     * @param $objAgendaHorarioPedido AgendaHorarioPedido
     * @param $objConfiguracao Configuracao
     *
     * @return string
     * @throws PropelException
     */
    function gerarPdfExame(Pedido $pedido)
    {

        $objCliente = $pedido->getCliente();

        $objEndereco = $objCliente->getEndereco();

        $html = '<STYLE type="text/css">

body {margin-top: 0px;margin-left: 0px;}

#page_1 {position:relative; overflow: hidden;padding: 0px;border: none;width: 100%;}
#page_1 #id1_1 {border:none;margin: 0px 0px 0px 0px;padding: 0px;border:none;width: 100%;overflow: hidden;}
#page_1 #id1_2 {border:none;margin: 8px 0px 0px 0px;padding: 0px;border:none;width: 598px;overflow: hidden;}
#page_1 #id1_2 #id1_2_1 {float:left;border:none;margin: 4px 0px 0px 0px;padding: 0px;border:none;width: 513px;overflow: hidden;}
#page_1 #id1_2 #id1_2_2 {float:left;border:none;margin: 0px 0px 0px 1px;padding: 0px;border:none;width: 84px;overflow: hidden;}
#page_1 #id1_3 {border:none;margin: 12px 0px 0px 0px;padding: 0px;border:none;width: 778px;overflow: hidden;}





.ft0{font: bold 16px "Arial Narrow";line-height: 20px;}
.ft1{font: 13px "Arial Narrow";line-height: 15px;}
.ft2{font: 13px "Arial Narrow";line-height: 14px;}
.ft3{font: 1px "Arial Narrow";line-height: 1px;}
.ft4{font: 1px "Arial Narrow";line-height: 14px;}
.ft5{font: bold 12px "Arial Narrow";line-height: 16px;}
.ft6{font: 12px "Arial Narrow";line-height: 16px;}
.ft622{font: 14px "Arial Narrow";line-height: 16px;}
.ft7{font: 13px "Arial Narrow";line-height: 16px;}
.ft8{font: 12px "Arial Narrow";line-height: 15px;}
.ft9{font: 12px "Arial Narrow";line-height: 14px;}
.ft10{font: 13px "Arial Narrow";margin-left: 3px;line-height: 16px;}
.ft11{font: 12px "Arial Narrow";margin-left: 3px;line-height: 16px;}
.ft12{font: 13px "Arial Narrow";line-height: 20px;}
.ft13{font: bold 13px "Arial Narrow";line-height: 14px;}
.ft14{font: bold 13px "Arial Narrow";line-height: 16px;}
.ft15{font: italic bold 13px "Arial Narrow";line-height: 13px;}

.p0{text-align: left;padding-left: 241px;margin-top: 0px;margin-bottom: 0px;}
.p1{text-align: left;margin-top: 16px;margin-bottom: 0px;}
.p2{text-align: left;margin-top: 0px;margin-bottom: 0px;}
.p3{text-align: left;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p4{text-align: left;padding-left: 136px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p5{text-align: right;padding-right: 112px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p6{text-align: right;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p7{text-align: left;padding-left: 3px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p8{text-align: left;padding-left: 10px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p9{text-align: left;padding-left: 12px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p10{text-align: left;padding-left: 2px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p11{text-align: left;padding-left: 14px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p12{text-align: left;padding-left: 4px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p13{text-align: left;margin-top: 1px;margin-bottom: 0px;}
.p14{text-align: left;padding-right: 182px;margin-top: 13px;margin-bottom: 0px;}
.p15{text-align: left;padding-right: 183px;margin-top: 11px;margin-bottom: 0px;}
.p16{text-align: left;padding-right: 182px;margin-top: 12px;margin-bottom: 0px;}
.p17{text-align: left;margin-top: 10px;margin-bottom: 0px;}
.p18{text-align: left;margin-top: 2px;margin-bottom: 0px;}
.p19{text-align: left;padding-right: 176px;margin-top: 13px;margin-bottom: 0px;}
.p20{text-align: left;margin-top: 13px;margin-bottom: 0px;}
.p21{text-align: left;padding-right: 27px;margin-top: 13px;margin-bottom: 0px;}
.p22{text-align: justify;padding-left: 1px;margin-top: 0px;margin-bottom: 0px;text-indent: -1px;}
.p23{text-align: left;margin-top: 5px;margin-bottom: 0px;}
.p24{text-align: left;margin-top: 12px;margin-bottom: 0px;}
.p25{text-align: center; margin-top: 0px;margin-bottom: 0px;}
.p26{text-align: center;margin-top: 0px;margin-bottom: 0px;}
.p27{text-align: left;margin-top: 6px;margin-bottom: 0px;}
.p28{text-align: left;padding-left: 249px;margin-top: 26px;margin-bottom: 0px;}
.p29{text-align: left;padding-left: 281px;margin-top: 2px;margin-bottom: 0px;}

.td0{padding: 0px;margin: 0px;width: 309px;vertical-align: bottom;}
.td1{padding: 0px;margin: 0px;width: 112px;vertical-align: bottom;}
.td2{padding: 0px;margin: 0px;width: 187px;vertical-align: bottom;}
.td3{padding: 0px;margin: 0px;width: 132px;vertical-align: bottom;}
.td33{padding: 0px;margin: 0px;width: 140px;vertical-align: bottom;}
.td4{padding: 0px;margin: 0px;width: 188px;vertical-align: bottom;}
.td5{padding: 0px;margin: 0px;width: 121px;vertical-align: bottom;}
.td6{padding: 0px;margin: 0px;width: 100%;vertical-align: bottom;}
.td7{padding: 0px;margin: 0px;width: 421px;vertical-align: bottom;}
.td8{padding: 0px;margin: 0px;width: 9px;vertical-align: bottom;}
.td9{padding: 0px;margin: 0px;width: 294px;vertical-align: bottom;}
.td10{padding: 0px;margin: 0px;width: 195px;vertical-align: bottom;}
.td11{padding: 0px;margin: 0px;width: 52px;vertical-align: bottom;}
.td12{padding: 0px;margin: 0px;width: 43px;vertical-align: bottom;}
.td13{padding: 0px;margin: 0px;width: 57px;vertical-align: bottom;}
.td14{padding: 0px;margin: 0px;width: 110px;vertical-align: bottom;}
.td15{padding: 0px;margin: 0px;width: 127px;vertical-align: bottom;}
.td16{padding: 0px;margin: 0px;width: 95px;vertical-align: bottom;}
.td17{padding: 0px;margin: 0px;width: 593px;vertical-align: bottom;}
.td18{padding: 0px;margin: 0px;width: 550px;vertical-align: bottom;}
.td19{padding: 0px;margin: 0px;width: 489px;vertical-align: bottom;}

.tr0{height: 15px;}
.tr1{height: 14px;}
.tr2{height: 29px;}
.tr3{height: 17px;}
.tr4{height: 28px;}

.t0{width: 100%;font: 13px "Arial Narrow";}
.t1{width: 593px;margin-top: 11px;font: 13px "Arial Narrow";}

</STYLE>
</HEAD>

<BODY>
<DIV id="page_1">


<DIV id="id1_1">
<P class="ft0" style="line-height: 20px;text-align: center">EXAME DE SANIDADE FÍSICA E MENTAL</P>
<P class="p1 ft1" style="line-height: 20px;">Nome: '.$objCliente->getNome().'</P>
<P class="p2 ft2" style="line-height: 20px;">Idade: '.$objCliente->getIdade().' Sexo:_____ C.Identidade: _________________ CPF: '.$objCliente->getCpf().' Categoria Pretendida: '.$objCliente->getCategoriaPretendida().'</P>
<P class="p2 ft1" style="line-height: 20px;">Endereço: '.$objEndereco->getLogradouro().' '.$objEndereco->getNumero().' '.$objEndereco->getComplemento().', '.$objEndereco->getBairro().' - '.$objEndereco->getCidade()->getNome().'/'.$objEndereco->getCidade()->getEstado()->getSigla().' </P>
<P class="p2 ft1" style="line-height: 20px;">Telefones ____________________________________________________________________________ </P>
<TABLE cellpadding=0 cellspacing=0 class="t0" style="margin-top: 5px">

<TR>
	<TD style="padding-bottom: 3px" class="tr0 td1"><P class="p3 ft1">( ) 1ª Habilitação</P></TD>
	<TD style="padding-bottom: 3px" class="tr0 td1"><P class="p3 ft1">( )Renovação</P></TD>
	<TD style="padding-bottom: 3px" class="tr0 td5"><P class="p3 ft1">( ) Mudança de Cat.</P></TD>
	<TD style="padding-bottom: 3px" class="tr0 td1"><P class="p3 ft1">( ) Adição</P></TD>
	<TD style="padding-bottom: 3px" class="tr0 td1"><P class="p3 ft1">( )PCD </P></TD>
	<TD style="padding-bottom: 3px" class="tr0 td4"><P class="p3 ft1">( ) outros ____________________</P></TD>

</TR>
</TABLE>
<TABLE cellpadding=0 cellspacing=0 class="t0" style="margin-top: 3px">
<TR>
	<TD style="padding-bottom: 3px" class="tr1 td33"><P class="p3 ft2">( ) Particular</P></TD>
	<TD style="padding-bottom: 3px" class="tr1 td4" colspan=5><P class="p3 ft2">( ) Auto Escola _____________________________________________________________</P></TD>

</TR>
</TABLE>
<TABLE cellpadding=0 cellspacing=0 class="t0" style="margin-top: 3px">
<TR>
	<TD colspan=6 class="tr2 td6"><P class="p3 ft6"><SPAN class="ft5">Se possuir atendimento prioritário, </SPAN>assinale a opção correspondente ( ) maior de 60 anos, ( ) deficiente físico, ( ) Gestante, ( ) está acompanhado com menor de 02 anos, ( ) outros_________________________________________________</P></TD>
</TR>
</TABLE>
<P class="p2 ft6" style="padding: 5px 0"><NOBR>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</NOBR></P>
<TABLE cellpadding=0 cellspacing=0 class="t1" style="margin-top: 0">
<TR>
	<TD class="tr3 td8"><P class="p3 ft6">1)</P></TD>
	<TD colspan=3 class="tr3 td9"><P class="p7 ft7">Quando você procurou atendimento médico?</P></TD>
	<TD class="tr3 td10"><P class="p3 ft3">&nbsp;</P></TD>
	<TD class="tr3 td11"><P class="p3 ft3">&nbsp;</P></TD>
	<TD class="tr3 td12"><P class="p3 ft3">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr1 td8"><P class="p3 ft2">(</P></TD>
	<TD class="tr1 td13"><P class="p3 ft2">) Nunca</P></TD>
	<TD class="tr1 td14"><P class="p3 ft2">( ) Periodicamente</P></TD>
	<TD class="tr1 td3"><P class="p3 ft2">( ) Nos últimos 5 anos</P></TD>
	<TD class="tr1 td10"><P class="p3 ft2">( ) Na última renovação de CNH</P></TD>
	<TD colspan=2 class="tr1 td16"><P class="p3 ft2">( ) Não lembro</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">2)</P></TD>
	<TD colspan=4 class="tr2 td9"><P class="p7 ft7">Você toma algum remédio, faz algum tratamento de saúde?</P></TD>
	<TD class="tr2 td16"><P class="p8 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16"><P class="p3 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD colspan=7 class="tr0 td17"><P class="p3 ft8">Qual? _________________________________________________________________________________________________</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">3)</P></TD>
	<TD colspan=4 class="tr2 td9"><P class="p7 ft7">Você apresenta deficiência auditiva ou visual?</P></TD>
	<TD class="tr2 td16"><P class="p8 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16"><P class="p3 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD colspan=7 class="tr0 td17"><P class="p3 ft8">Qual? _________________________________________________________________________________________________</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">4)</P></TD>
	<TD colspan=4 class="tr2 td9"><P class="p7 ft7">Você tem alguma deficiência física?</P></TD>
	<TD class="tr2 td16"><P class="p9 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16"><P class="p10 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD colspan=7 class="tr0 td17"><P class="p3 ft8">Qual? _________________________________________________________________________________________________</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">5)</P></TD>
	<TD colspan=4 class="tr2 td19"><P class="p7 ft7">Você já sofreu de tonturas, desmaios, convulsões ou vertigens?</P></TD>
	<TD class="tr2 td16"><P class="p11 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16"><P class="p12 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD colspan=7 class="tr0 td17"><P class="p3 ft8">Qual? __________________________________________________________________________________________________</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">6)</P></TD>
	<TD colspan=4 class="tr2 td9"><P class="p7 ft7">Você já necessitou de tratamento psiquiátrico?</P></TD>
	<TD class="tr2 td16"><P class="p9 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16"><P class="p7 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD colspan=7 class="tr0 td17"><P class="p3 ft8">Quando e qual? __________________________________________________________________________________________</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">7)</P></TD>
	<TD colspan=4 class="tr2 td9"><P class="p7 ft7">Você tem diabetes, epilepsia, doença cardíaca, neurológica, pulmonar ou outras?</P></TD>
	<TD class="tr2 td16"><P class="p9 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16"><P class="p7 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD colspan=7 class="tr0 td17"><P class="p3 ft8">Qual? __________________________________________________________________________________________________</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">8)</P></TD>
	<TD colspan=4 class="tr2 td9"><P class="p7 ft7">Você já foi operado?</P></TD>
	<TD class="tr2 td16"><P class="p9 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16"><P class="p7 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD colspan=7 class="tr0 td17"><P class="p3 ft8">Quando e porquê? _______________________________________________________________________________________</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">9)</P></TD>
	<TD colspan=4 class="tr2 td9"><P class="p7 ft7">Você já fez ou faz uso de drogas ilícitas?</P></TD>
	<TD class="tr2 td16"><P class="p9 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16"><P class="p7 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD colspan=7 class="tr0 td17"><P class="p3 ft8">Quais? _________________________________________________________________________________________________</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">10)</P></TD>
	<TD colspan=4 class="tr2 td9"><P class="p7 ft7"> Você faz uso de álcool?</P></TD>
	<TD class="tr2 td33"><P class="p9 ft7">Não ( ) Socialmente ( )</P></TD>
	<TD class="tr2 td16"><P class="p7 ft7">Diariamente ( )</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">11)</P></TD>
	<TD colspan=4 class="tr2 td9"><P class="p7 ft7"> Você já sofreu acidente de trânsito?</P></TD>
	<TD class="tr2 td16"><P class="p9 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16"><P class="p7 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD colspan=7 class="tr0 td17"><P class="p3 ft8">Quando? _________________________________________________________________________________________________</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">12)</P></TD>
	<TD colspan=4 class="tr2 td9"><P class="p7 ft7"> Você exerce atividade remunerada como condutor?</P></TD>
	<TD class="tr2 td16"><P class="p9 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16"><P class="p7 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">13)</P></TD>
	<TD colspan=4 class="tr2 td9"><P class="p7 ft7"> Sofre de pressão alta?</P></TD>
	<TD class="tr2 td16"><P class="p9 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16"><P class="p7 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD class="tr2 td8" style="vertical-align: top; padding-top: 10px;"><P class="p3 ft6">14)&nbsp;</P></TD>
	<TD colspan=4 class="td9" style="vertical-align: top;padding-top: 10px;"><P class="p7 ft7" style="white-space: normal;">Você tem sono sentado, lendo, assistindo tv, dirigindo, enquanto está no carro parado ou no trânsito, sentado em lugar público, como passageiro em carro ou ônibus, sentado conversando com alguém?</P></TD>
	<TD class="tr2 td16" style="vertical-align: top;padding-top: 10px;"><P class="p9 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16" style="vertical-align: top;padding-top: 10px;"><P class="p7 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD colspan=7 class="tr0 td17"><P class="p3 ft8">Qual das situações acima? ___________________________________________________________________________</P></TD>
</TR>
</TABLE>

<DIV id="id1_3">
<P class="p23 ft13">Obs.: Constitui crime previsto no art. 299, do Código Penal Brasileiro, prestar declaração falsa com o fim de criar obrigação ou alterar a verdade sobre fato juridicamente relevante. Pena: reclusão de um a três anos e multa.</P>
<P class="p18 ft14"></P>
<P class="p24 ft1">Local e data___________________, ___/___/___</P>
<br>
<P class="p25 ft2">______________________________________</P>
<P class="p26 ft1">Assinatura do candidato sob pena de responsabilidade</P>
<P class="p13 ft15">Observações médicas</P>
<P class="p27 ft7">____________________________________________________________________________________________________________________</P>
<P class="p27 ft7">____________________________________________________________________________________________________________________</P>
<br>
<P class="p25 ft2">______________________________________</P>
<P class="p26 ft1">Assinatura e carimbo do médico perito</P>
</DIV>
</DIV>';


//echo'<pre>';
//var_dump($html);die;

        return $html;
    }
}

if (!function_exists('gerarPdfComprovanteQuestionario'))
{
    /**
     * Função que cria e retorna o PDF do agendamento, seja ele para usar no e-mail ou para mostrar no CMS.
     *
     * Parametro agendamento deve conter Objetos AgendaHorarioPedido e Configuracao e seus respectivos valores.
     *
     * @param $objAgendaHorarioPedido AgendaHorarioPedido
     * @param $objConfiguracao Configuracao
     * @param $pedido Pedido
     *
     * @return string
     * @throws PropelException
     */
    function gerarPdfComprovanteQuestionario(AgendaHorarioPedido $objAgendaHorarioPedido, Configuracao $objConfiguracao , Pedido $pedido)
    {

        $objCliente = $pedido->getCliente();
        $objEndereco = $objCliente->getEndereco();

        $header = '

        <table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td align="center">
						    <img width="185" height="86" src="'.str_replace("index.php/", "",base_url()).'assets/images/logo.png">
						</td>
					</tr>
				</table>
				<br>';

        $htmlCima = '
			<style>
				table{
					font-family:sans-serif !important;
					font-size:12px;
					page-break-inside: avoid;
					page-break-before: always;
				}	
			</style>
			';
        $htmlCima .= $header;



        $htmlCima .= '
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td align="center">
						    <span style="font-size:24px;">Comprovante de Agendamento</span>
						</td>
					</tr>
				</table>
				<br>';

        $htmlCima .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td align="left" style=" padding-bottom: 10px;">
						    <span style="font-size:20px;">- Agendamento</span>
						</td>
					</tr>
				</table>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				    <tr>
						<td style="color:#191313; padding-bottom: 4px" >
						    <ul>
						        <li>Nome: '.$objCliente->getNomeCompleto().'</li>
                            </ul>
						</td>
                    </tr>
				
					<tr>
						<td style="color:#191313; padding-bottom: 4px" >
						    <ul>
						        <li>Dia/Hora: '.$objAgendaHorarioPedido->getAgendaHorario()->getDataAgendamentoCompleto().'</li>
                            </ul>
						</td>
                    </tr>
                    <tr>
						<td style="color:#191313; padding-bottom: 4px" >
						    <ul>
						        <li>Local: '.$objConfiguracao->getEnderecoConsulta().'</li>
                            </ul>
						</td>
                    </tr>
                    <tr>
						<td style="color:#191313;" >
						    <ul>
						        <li>E-mail para contato: '.$objConfiguracao->getEmail().'</li>
                            </ul>
						</td>
					</tr>
				</table>
				<br>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td align="left" style=" padding-bottom: 10px;">
						    <span style="font-size:20px;">- Observações</span>
						</td>
					</tr>
				</table>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					    <td style="color:#191313;padding-bottom: 4px" >
						    <ul>
						        <li>Imprima este comprovante e leve no dia da consulta</li>
                            </ul>
						</td>
					</tr>
					<tr>
					    <td style="color:#191313;padding-bottom: 4px" >
						    <ul>
						        <li>Imprima uma cópia do questionário e leve no dia da consulta</li>
                            </ul>
						</td>
					</tr>
					<tr>
					    <td style="color:#191313;padding-bottom: 4px" >
						    <ul>
						        <li>Leve a CNH original no dia da consulta (caso não possua, leve um documento original com foto)</li>
                            </ul>
						</td>
					</tr>
					<tr>
					    <td style="color:#191313;padding-bottom: 4px" >
						    <ul>
						        <li>Você poderá remarcar a consulta pelo próprio site apenas uma vez até 24 horas da data agendada</li>
                            </ul>
						</td>
					</tr>
					<tr>
					    <td style="color:#191313;" >
						    <ul>
						        <li>Caso não seja remarcado a tempo ou não compareça na consulta, todo o processo de agendamento, <strong>inclusive o pagamento da taxa</strong>, deverá ser realizado novamente</li>
                            </ul>
						</td>
					</tr>
				</table>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td align="left" style=" padding-top: 20px;padding-bottom: 10px;">
						    <span style="font-size:20px;">- Check-list de documentos para o dia da consulta</span>
						</td>
					</tr>
				</table>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
                        <td style="color:#191313; padding: 0px 0px 0px 8px;"><input type="checkbox" style="font-size: 20px;padding: 0px;" /> Comprovante de agendamento</td>
					</tr>
					<tr>
                        <td style="color:#191313; padding: 0px 0px 0px 8px;"><input type="checkbox" style="font-size: 20px;padding: 0px;" /> 1 cópia do questionário</td>
					</tr>
					<tr>
                        <td style="color:#191313; padding: 0px 0px 0px 8px;"><input type="checkbox" style="font-size: 20px;padding: 0px;" /> CNH original (caso não possua leve um documento original com foto)</td>
					</tr>
				</table>
				<div style="float:left"><p style="overflow:hidden;page-break-after:always;"></p></div>';

        $html = '<STYLE type="text/css">

body {margin-top: 0px;margin-left: 0px;}

#page_1 {position:relative; overflow: hidden;padding: 0px;border: none;width: 100%;}
#page_1 #id1_1 {border:none;margin: 0px 0px 0px 0px;padding: 0px;border:none;width: 100%;overflow: hidden;}
#page_1 #id1_2 {border:none;margin: 8px 0px 0px 0px;padding: 0px;border:none;width: 598px;overflow: hidden;}
#page_1 #id1_2 #id1_2_1 {float:left;border:none;margin: 4px 0px 0px 0px;padding: 0px;border:none;width: 513px;overflow: hidden;}
#page_1 #id1_2 #id1_2_2 {float:left;border:none;margin: 0px 0px 0px 1px;padding: 0px;border:none;width: 84px;overflow: hidden;}
#page_1 #id1_3 {border:none;margin: 12px 0px 0px 0px;padding: 0px;border:none;width: 778px;overflow: hidden;}





.ft0{font: bold 16px "Arial Narrow";line-height: 20px;}
.ft1{font: 13px "Arial Narrow";line-height: 15px;}
.ft2{font: 13px "Arial Narrow";line-height: 14px;}
.ft3{font: 1px "Arial Narrow";line-height: 1px;}
.ft4{font: 1px "Arial Narrow";line-height: 14px;}
.ft5{font: bold 12px "Arial Narrow";line-height: 16px;}
.ft6{font: 12px "Arial Narrow";line-height: 16px;}
.ft622{font: 14px "Arial Narrow";line-height: 16px;}
.ft7{font: 13px "Arial Narrow";line-height: 16px;}
.ft8{font: 12px "Arial Narrow";line-height: 15px;}
.ft9{font: 12px "Arial Narrow";line-height: 14px;}
.ft10{font: 13px "Arial Narrow";margin-left: 3px;line-height: 16px;}
.ft11{font: 12px "Arial Narrow";margin-left: 3px;line-height: 16px;}
.ft12{font: 13px "Arial Narrow";line-height: 20px;}
.ft13{font: bold 13px "Arial Narrow";line-height: 14px;}
.ft14{font: bold 13px "Arial Narrow";line-height: 16px;}
.ft15{font: italic bold 13px "Arial Narrow";line-height: 13px;}

.p0{text-align: left;padding-left: 241px;margin-top: 0px;margin-bottom: 0px;}
.p1{text-align: left;margin-top: 16px;margin-bottom: 0px;}
.p2{text-align: left;margin-top: 0px;margin-bottom: 0px;}
.p3{text-align: left;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p4{text-align: left;padding-left: 136px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p5{text-align: right;padding-right: 112px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p6{text-align: right;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p7{text-align: left;padding-left: 3px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p8{text-align: left;padding-left: 10px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p9{text-align: left;padding-left: 12px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p10{text-align: left;padding-left: 2px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p11{text-align: left;padding-left: 14px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p12{text-align: left;padding-left: 4px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p13{text-align: left;margin-top: 1px;margin-bottom: 0px;}
.p14{text-align: left;padding-right: 182px;margin-top: 13px;margin-bottom: 0px;}
.p15{text-align: left;padding-right: 183px;margin-top: 11px;margin-bottom: 0px;}
.p16{text-align: left;padding-right: 182px;margin-top: 12px;margin-bottom: 0px;}
.p17{text-align: left;margin-top: 10px;margin-bottom: 0px;}
.p18{text-align: left;margin-top: 2px;margin-bottom: 0px;}
.p19{text-align: left;padding-right: 176px;margin-top: 13px;margin-bottom: 0px;}
.p20{text-align: left;margin-top: 13px;margin-bottom: 0px;}
.p21{text-align: left;padding-right: 27px;margin-top: 13px;margin-bottom: 0px;}
.p22{text-align: justify;padding-left: 1px;margin-top: 0px;margin-bottom: 0px;text-indent: -1px;}
.p23{text-align: left;margin-top: 5px;margin-bottom: 0px;}
.p24{text-align: left;margin-top: 12px;margin-bottom: 0px;}
.p25{text-align: center; margin-top: 0px;margin-bottom: 0px;}
.p26{text-align: center;margin-top: 0px;margin-bottom: 0px;}
.p27{text-align: left;margin-top: 6px;margin-bottom: 0px;}
.p28{text-align: left;padding-left: 249px;margin-top: 26px;margin-bottom: 0px;}
.p29{text-align: left;padding-left: 281px;margin-top: 2px;margin-bottom: 0px;}

.td0{padding: 0px;margin: 0px;width: 309px;vertical-align: bottom;}
.td1{padding: 0px;margin: 0px;width: 112px;vertical-align: bottom;}
.td2{padding: 0px;margin: 0px;width: 187px;vertical-align: bottom;}
.td3{padding: 0px;margin: 0px;width: 132px;vertical-align: bottom;}
.td33{padding: 0px;margin: 0px;width: 140px;vertical-align: bottom;}
.td4{padding: 0px;margin: 0px;width: 188px;vertical-align: bottom;}
.td5{padding: 0px;margin: 0px;width: 121px;vertical-align: bottom;}
.td6{padding: 0px;margin: 0px;width: 100%;vertical-align: bottom;}
.td7{padding: 0px;margin: 0px;width: 421px;vertical-align: bottom;}
.td8{padding: 0px;margin: 0px;width: 9px;vertical-align: bottom;}
.td9{padding: 0px;margin: 0px;width: 294px;vertical-align: bottom;}
.td10{padding: 0px;margin: 0px;width: 195px;vertical-align: bottom;}
.td11{padding: 0px;margin: 0px;width: 52px;vertical-align: bottom;}
.td12{padding: 0px;margin: 0px;width: 43px;vertical-align: bottom;}
.td13{padding: 0px;margin: 0px;width: 57px;vertical-align: bottom;}
.td14{padding: 0px;margin: 0px;width: 110px;vertical-align: bottom;}
.td15{padding: 0px;margin: 0px;width: 127px;vertical-align: bottom;}
.td16{padding: 0px;margin: 0px;width: 95px;vertical-align: bottom;}
.td17{padding: 0px;margin: 0px;width: 593px;vertical-align: bottom;}
.td18{padding: 0px;margin: 0px;width: 550px;vertical-align: bottom;}
.td19{padding: 0px;margin: 0px;width: 489px;vertical-align: bottom;}

.tr0{height: 15px;}
.tr1{height: 14px;}
.tr2{height: 29px;}
.tr3{height: 17px;}
.tr4{height: 28px;}

.t0{width: 100%;font: 13px "Arial Narrow";}
.t1{width: 593px;margin-top: 11px;font: 13px "Arial Narrow";}

</STYLE>
</HEAD>

<BODY>
'.$htmlCima.'
<DIV id="page_1">


<DIV id="id1_1">
<P class="ft0" style="line-height: 20px;text-align: center">Questionário Médico</P>
<P class="p1 ft1" style="line-height: 20px;">Nome: '.$objCliente->getNome().'</P>
<P class="p2 ft2" style="line-height: 20px;">Idade: '.$objCliente->getIdade().' CPF: '.$objCliente->getCpf().' Categoria Pretendida: '.$objCliente->getCategoriaPretendida().'</P>
<P class="p2 ft1" style="line-height: 20px;">Endereço: '.$objEndereco->getLogradouro().' '.$objEndereco->getNumero().' '.$objEndereco->getComplemento().', '.$objEndereco->getBairro().' - '.$objEndereco->getCidade()->getNome().'/'.$objEndereco->getCidade()->getEstado()->getSigla().' </P>
<P class="p2 ft1" style="line-height: 20px;">Telefones ____________________________________________________________________________ </P>
<TABLE cellpadding=0 cellspacing=0 class="t0" style="margin-top: 5px">

<TR>
	<TD style="padding-bottom: 3px" class="tr0 td1"><P class="p3 ft1">( ) 1ª Habilitação</P></TD>
	<TD style="padding-bottom: 3px" class="tr0 td1"><P class="p3 ft1">( )Renovação</P></TD>
	<TD style="padding-bottom: 3px" class="tr0 td5"><P class="p3 ft1">( ) Mudança de Cat.</P></TD>
	<TD style="padding-bottom: 3px" class="tr0 td1"><P class="p3 ft1">( ) Adição</P></TD>
	<TD style="padding-bottom: 3px" class="tr0 td1"><P class="p3 ft1">( )PCD </P></TD>
	<TD style="padding-bottom: 3px" class="tr0 td4"><P class="p3 ft1">( ) outros ____________________</P></TD>

</TR>
</TABLE>
<TABLE cellpadding=0 cellspacing=0 class="t0" style="margin-top: 3px">
<TR>
	<TD style="padding-bottom: 3px" class="tr1 td33"><P class="p3 ft2">( ) Particular</P></TD>
	<TD style="padding-bottom: 3px" class="tr1 td4" colspan=5><P class="p3 ft2">( ) Auto Escola _____________________________________________________________</P></TD>

</TR>
</TABLE>
<TABLE cellpadding=0 cellspacing=0 class="t0" style="margin-top: 3px">
<TR>
	<TD colspan=6 class="tr2 td6"><P class="p3 ft6"><SPAN class="ft5">Se possuir atendimento prioritário, </SPAN>assinale a opção correspondente ( ) maior de 60 anos, ( ) deficiente físico, ( ) Gestante, ( ) está acompanhado com menor de 02 anos, ( ) outros_________________________________________________</P></TD>
</TR>
</TABLE>
<P class="p2 ft6" style="padding: 5px 0"><NOBR>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</NOBR></P>
<TABLE cellpadding=0 cellspacing=0 class="t1" style="margin-top: 0">
<TR>
	<TD class="tr3 td8"><P class="p3 ft6">1)</P></TD>
	<TD colspan=3 class="tr3 td9"><P class="p7 ft7">Quando você procurou atendimento médico?</P></TD>
	<TD class="tr3 td10"><P class="p3 ft3">&nbsp;</P></TD>
	<TD class="tr3 td11"><P class="p3 ft3">&nbsp;</P></TD>
	<TD class="tr3 td12"><P class="p3 ft3">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr1 td8"><P class="p3 ft2">(</P></TD>
	<TD class="tr1 td13"><P class="p3 ft2">) Nunca</P></TD>
	<TD class="tr1 td14"><P class="p3 ft2">( ) Periodicamente</P></TD>
	<TD class="tr1 td3"><P class="p3 ft2">( ) Nos últimos 5 anos</P></TD>
	<TD class="tr1 td10"><P class="p3 ft2">( ) Na última renovação de CNH</P></TD>
	<TD colspan=2 class="tr1 td16"><P class="p3 ft2">( ) Não lembro</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">2)</P></TD>
	<TD colspan=4 class="tr2 td9"><P class="p7 ft7">Você toma algum remédio, faz algum tratamento de saúde?</P></TD>
	<TD class="tr2 td16"><P class="p8 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16"><P class="p3 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD colspan=7 class="tr0 td17"><P class="p3 ft8">Qual? _________________________________________________________________________________________________</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">3)</P></TD>
	<TD colspan=4 class="tr2 td9"><P class="p7 ft7">Você apresenta deficiência auditiva ou visual?</P></TD>
	<TD class="tr2 td16"><P class="p8 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16"><P class="p3 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD colspan=7 class="tr0 td17"><P class="p3 ft8">Qual? _________________________________________________________________________________________________</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">4)</P></TD>
	<TD colspan=4 class="tr2 td9"><P class="p7 ft7">Você tem alguma deficiência física?</P></TD>
	<TD class="tr2 td16"><P class="p9 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16"><P class="p10 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD colspan=7 class="tr0 td17"><P class="p3 ft8">Qual? _________________________________________________________________________________________________</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">5)</P></TD>
	<TD colspan=4 class="tr2 td19"><P class="p7 ft7">Você já sofreu de tonturas, desmaios, convulsões ou vertigens?</P></TD>
	<TD class="tr2 td16"><P class="p11 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16"><P class="p12 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD colspan=7 class="tr0 td17"><P class="p3 ft8">Qual? __________________________________________________________________________________________________</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">6)</P></TD>
	<TD colspan=4 class="tr2 td9"><P class="p7 ft7">Você já necessitou de tratamento psiquiátrico?</P></TD>
	<TD class="tr2 td16"><P class="p9 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16"><P class="p7 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD colspan=7 class="tr0 td17"><P class="p3 ft8">Quando e qual? __________________________________________________________________________________________</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">7)</P></TD>
	<TD colspan=4 class="tr2 td9"><P class="p7 ft7">Você tem diabetes, epilepsia, doença cardíaca, neurológica, pulmonar ou outras?</P></TD>
	<TD class="tr2 td16"><P class="p9 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16"><P class="p7 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD colspan=7 class="tr0 td17"><P class="p3 ft8">Qual? __________________________________________________________________________________________________</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">8)</P></TD>
	<TD colspan=4 class="tr2 td9"><P class="p7 ft7">Você já foi operado?</P></TD>
	<TD class="tr2 td16"><P class="p9 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16"><P class="p7 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD colspan=7 class="tr0 td17"><P class="p3 ft8">Quando e porquê? _______________________________________________________________________________________</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">9)</P></TD>
	<TD colspan=4 class="tr2 td9"><P class="p7 ft7">Você já fez ou faz uso de drogas ilícitas?</P></TD>
	<TD class="tr2 td16"><P class="p9 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16"><P class="p7 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD colspan=7 class="tr0 td17"><P class="p3 ft8">Quais? _________________________________________________________________________________________________</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">10)</P></TD>
	<TD colspan=4 class="tr2 td9"><P class="p7 ft7"> Você faz uso de álcool?</P></TD>
	<TD class="tr2 td33"><P class="p9 ft7">Não ( ) Socialmente ( )</P></TD>
	<TD class="tr2 td16"><P class="p7 ft7">Diariamente ( )</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">11)</P></TD>
	<TD colspan=4 class="tr2 td9"><P class="p7 ft7"> Você já sofreu acidente de trânsito?</P></TD>
	<TD class="tr2 td16"><P class="p9 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16"><P class="p7 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD colspan=7 class="tr0 td17"><P class="p3 ft8">Quando? _________________________________________________________________________________________________</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">12)</P></TD>
	<TD colspan=4 class="tr2 td9"><P class="p7 ft7"> Você exerce atividade remunerada como condutor?</P></TD>
	<TD class="tr2 td16"><P class="p9 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16"><P class="p7 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD class="tr2 td8"><P class="p3 ft6">13)</P></TD>
	<TD colspan=4 class="tr2 td9"><P class="p7 ft7"> Sofre de pressão alta?</P></TD>
	<TD class="tr2 td16"><P class="p9 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16"><P class="p7 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD class="tr2 td8" style="vertical-align: top; padding-top: 10px;"><P class="p3 ft6">14)&nbsp;</P></TD>
	<TD colspan=4 class="td9" style="vertical-align: top;padding-top: 10px;"><P class="p7 ft7" style="white-space: normal;">Você tem sono sentado, lendo, assistindo tv, dirigindo, enquanto está no carro parado ou no trânsito, sentado em lugar público, como passageiro em carro ou ônibus, sentado conversando com alguém?</P></TD>
	<TD class="tr2 td16" style="vertical-align: top;padding-top: 10px;"><P class="p9 ft7">SIM ( )</P></TD>
	<TD class="tr2 td16" style="vertical-align: top;padding-top: 10px;"><P class="p7 ft7">NÃO ( )</P></TD>
</TR>
<TR>
	<TD colspan=7 class="tr0 td17"><P class="p3 ft8">Qual das situações acima? ___________________________________________________________________________</P></TD>
</TR>
</TABLE>

<DIV id="id1_3">
<P class="p23 ft13">Obs.: Constitui crime previsto no art. 299, do Código Penal Brasileiro, prestar declaração falsa com o fim de criar obrigação ou alterar a verdade sobre fato juridicamente relevante. Pena: reclusão de um a três anos e multa.</P>
<P class="p18 ft14"></P>
<P class="p24 ft1">Local e data___________________, ___/___/___</P>
<br>
<P class="p25 ft2">______________________________________</P>
<P class="p26 ft1">Assinatura do candidato sob pena de responsabilidade</P>
<P class="p13 ft15">Observações médicas</P>
<P class="p27 ft7">____________________________________________________________________________________________________________________</P>
<P class="p27 ft7">____________________________________________________________________________________________________________________</P>
<br>
<P class="p25 ft2">______________________________________</P>
<P class="p26 ft1">Assinatura e carimbo do médico perito</P>
</DIV>
</DIV>';


//echo'<pre>';
//var_dump($html);die;

        return $html;
    }
}

if(!function_exists('hasAgendamentoPdf')) {
    function hasAgendamentoPdf($session)
    {
        $logged = $session->userdata('agendamento_sucesso');

        if (!isset($logged) || is_null($logged)) {
            return false;

        } else {
            return true;
        }

    }
}

if(!function_exists('get_error_pagseguro')){
    function get_error_pagseguro($codigo, $msg){

        $listErrors = [
            10003 => 'E-mail inválido',
            10005 => 'As contas do fornecedor e do comprador não podem ser relacionadas entre si',
            10009 => 'Método de pagamento indisponível no momento',
            10020 => 'Método de pagamento inválido',
            10021 => 'Erro ao obter dados do fornecedor do sistema',
            10023 => 'Método de pagamento indisponível',
            10024 => 'Não é permitido comprador não registrado',
            10025 => 'Nome do comprador não pode ser vazio',
            10026 => 'E-mail do comprador não pode ser vazio',
            10049 => 'Nome do comprador é obrigatório',
            10050 => 'E-mail do comprador é obrigatório',
            11002 => 'E-mail do vendedor é inválido',
            11006 => 'URL de redirecionamento é inválida',
            11007 => 'URL de redirecionamento é inválida',
            11008 => 'Referência inválida',
            11013 => 'DDD do comprador é invalido',
            11014 => 'Telefone do comprador é inválido',
            11027 => 'Quantidade do produto está fora da faixa',
            11028 => 'Quantidade do produto é necessária',
            11040 => 'Idade máxima inválida',
            11041 => 'Idade máxima está fora da faixa',
            11042 => 'Quantidade máxima é inválida',
            11043 => 'Quantidade máxima está fora da faixa',
            11054 => 'URL de Cancelmaneto ou Revisão é invalida',
            11055 => 'URL de Cancelmaneto ou Revisão é invalida',
            11071 => 'Data inicial da assinatura é inválida',
            11072 => 'Data final da assinatura é inválida',
            11084 => 'O vendedor não tem a opção cartão de crédito ativo',
            11101 => 'Data de assinatura é obrigatória',
            11163 => 'Você deve configurar um URL de notificação de transações antes de usar este serviço',
            11211 => 'A assinatura não pode ser paga duas vezes no mesmo dia',
            13005 => 'Data inicial deve ser menor que o limite permitido',
            13006 => 'Data inicial não deve ter mais de 180 dias',
            13007 => 'Data inicial deve ser menor ou igual à Data final',
            13008 => 'O intervalo de pesquisa deve ser menor ou igual a 30 dias',
            13009 => 'Data final deve ser menor que o limite permitido',
            13010 => 'Data inicial no formato inválido',
            13011 => 'Data final no formato inválido',
            13013 => 'Valor da página inválido',
            13014 => 'Valor máximo de resultados inválidos da página (deve estar entre 1 e 1000)',
            13017 => 'Data inicial e Data final são necessárias na pesquisa por intervalo',
            13018 => 'Intervalo deve estar entre 1 e 30',
            13019 => 'Intervalo de notificação é necessário',
            13020 => 'Página é maior que o número total de páginas retornadas',
            13023 => 'Referência é inválida',
            13024 => 'Referência é inválida',
            17008 => 'Assinatura não encontrada',
            17022 => 'Status de pré-aprovação inválido para executar a operação solicitada. O status de pré-aprovação é 0',
            17023 => 'O vendedor não tem opção de pagamento com cartão de crédito',
            17024 => 'Assinatura não é permitida para este vendedor',
            17032 => 'Destinatário inválido para checkout. Verifique o status da conta do destinatário e se é uma conta do vendedor',
            17033 => 'O método de pagamento assinatura não  deve ser o mesmo da pré-aprovação',
            17035 => 'O formato dos dias de vencimento é inválido',
            17036 => 'O valor dos dias de vencimento é inválido. Qualquer valor de 1 a 120 é permitido',
            17037 => 'Os dias de vencimento devem ser menores que os dias de vencimento',
            17038 => 'O formato dos dias de validade é inválido',
            17039 => 'O valor da expiração é inválido. Qualquer valor de 1 a 120 é permitido',
            17061 => 'Plano de assinatura não encontrado',
            17063 => 'Hash é obrigatório',
            17065 => 'Documento federal é obrigatório',
            17066 => 'Documento federal inválido',
            17067 => 'O tipo de método de pagamento é obrigatório',
            17068 => 'O tipo de método de pagamento é inválido',
            17069 => 'Telefone é obrigatório',
            17070 => 'Endereço é obrigatório',
            17071 => 'Comprador é obrigatório',
            17072 => 'Método de pagamento é obrigatório',
            17073 => 'Cartão de Crédito é obrigatório',
            17074 => 'O titular do cartão de crédito é obrigatório',
            17075 => 'O token do cartão de crédito é inválido',
            17078 => 'Data de vencimento do cartão expirada',
            17079 => 'Limite de uso excedido',
            17080 => 'A assinatura está suspensa',
            17081 => 'Ordem de pagamento da assinatura não encontrada',
            17082 => 'Status de ordem de pagamento de pré-aprovação inválida para executar a operação solicitada',
            17083 => 'A assinatura já está pronta',
            17093 => 'É necessário o hash do comprador ou o IP',
            17094 => 'Não pode haver novas assinaturas para um plano inativo',
            19001 => 'CEP inválido',
            19002 => 'Endereço inválido',
            19003 => 'Número inválido',
            19004 => 'Complemento inválido',
            19005 => 'Bairro inválido',
            19006 => 'Cidade inválida',
            19007 => 'Estado inválido',
            19008 => 'País inválido',
            19014 => 'Telefone do comprador inválido',
            19015 => 'País inválido',
            50103 => 'CEP não pode estar vazio',
            50105 => 'Número não pode estar vazio',
            50106 => 'Bairro não pode estar vazio',
            50107 => 'País não pode estar vazio',
            50108 => 'Cidade não pode estar vazia',
            50131 => 'O endereço IP não segue um padrão válido',
            50134 => 'Endereço não pode estar vazio',
            53037 => 'Token do cartão de crédito é necessário',
            53042 => 'O nome do titular do cartão de crédito é obrigatório',
            53047 => 'Data de nascimento do titular do cartão é necessária',
            53048 => 'Data de nascimento do titular do cartão é inválida',
            53151 => 'O valor do desconto não pode ficar em branco',
            53152 => 'Valor do desconto fora da faixa. O valor do desconto deve ser maior ou igual a 0,00 e menor ou igual a 100,00',
            53153 => 'Não encontrado próximo pagamento para esta assinatura',
            53154 => 'Status não pode estar vazio',
            53155 => 'O tipo de desconto é obrigatório',
            53156 => 'Valor inválido do tipo de desconto. Os valores válidos são: Desconto Valor e Desconto Percentual',
            53157 => 'Valor do desconto fora da faixa. O valor do desconto deve ser maior ou igual a 0,00 e menor ou igual ao valor máximo do pagamento correspondente',
            53158 => 'Valor do desconto é obrigatório',
            57038 => 'Estado é obrigatório',
            61007 => 'Tipo do documento federal é obrigatório',
            61008 => 'Tipo do documento federal é inválido',
            61009 => 'Valor do documento federal é obrigatório',
            61010 => 'Valor do documento federal é inválido',
            61011 => 'CPF é inválido',
            61012 => 'CNPJ é inválido',
            53004	=>'Quantidade de itens inválida',
            53005	=> 'Moeda é obrigatório',
            53006	=> 'Moeda é inválida',
            53007	=> 'Referencia é inválida',
            53008	=> 'URL de notificação é inválida',
            53009	=> 'URL de notificação é inválida',
            53010	=> 'E-mail do comprador é obrigatório',
            53011	=> 'E-mail do comprador é inválido',
            53012	=> 'E-mail do comprador é inválido',
            53013	=> 'Nome do comprador é obrigatório',
            53014	=> 'Nome do comprador é inválido',
            53015	=> 'Nome do comprador é inválido',
            53017	=> 'CPF do comprador é inválido',
            53018	=> 'DDD do comprador é obrigatório',
            53019	=> 'DDD do comprador é inválido',
            53020	=> 'Telefone do comprador é obrigatório',
            53021	=> 'Telefone do comprador é inválido',
            53022	=> 'CEP é obrigatório',
            53023	=> 'CEP é inválido',
            53024	=> 'Endereço é obrigatório',
            53025	=> 'Endereço é inválido',
            53026	=> 'Número é obrigatório',
            53027	=> 'Número é inválido',
            53028	=> 'Complemento é inválido',
            53029	=> 'Bairro é obrigatório',
            53030	=> 'Bairro é inválido',
            53031	=> 'Cidade é obrigatória',
            53032	=> 'Cidade é inválida',
            53033	=> 'Estado é obrigatório',
            53034	=> 'Estado é inválido',
            53035	=> 'País é obrigatório',
            53036	=> 'País é inválido',
            53038	=> 'Quantidade de parcelas é obrigatório',
            53039	=> 'Quantidade de parcelas inválido',
            53040	=> 'Valor da parcela é obrigatório',
            53041	=> 'Valor da parcela é inválido',
            53043	=> 'Nome do titular do cartão de crédito é inválido',
            53044	=> 'Nome do titular do cartão de crédito é inválido',
            53045	=> 'CPF do titular do cartão de crédito é obrigatório',
            53046	=> 'CPF do titular do cartão de crédito é inválido',
            53049	=> 'DDD do titular do cartão de crédito é obrigatório',
            53050	=> 'DDD do titular do cartão de crédito é inválido',
            53051	=> 'Telefone do titular do cartão de crédito é obrigatório',
            53052	=> 'Telefone do titular do cartão de crédito é inválido',
            53053	=> 'CEP de cobrança é obrigatório',
            53054	=> 'CEP de cobrança é inválido',
            53055	=> 'Endereço de cobrança é obrigatório',
            53056	=> 'Endereço de cobrança é inválido',
            53057	=> 'Número de cobrança é obrigatório',
            53058	=> 'Número de cobrança é inválido',
            53059	=> 'Complemento de cobrança é inválido',
            53060	=> 'Bairro de cobrança é obrigatório',
            53061	=> 'Bairro de cobrança é inválido',
            53062	=> 'Cidade de cobrança é obrigatório',
            53063	=> 'Cidade de cobrança é inválido',
            53064	=> 'Estado de cobrança é obrigatório',
            53065	=> 'Estado de cobrança é inválido',
            53066	=> 'País de cobrança é obrigatório',
            53067	=> 'País de cobrança é inválido',
            53068	=> 'E-mail do vendedor é obrigatório',
            53069	=> 'E-mail do vendedor é inválido',
            53070	=> 'ID do item é obrigatório',
            53071	=> 'ID do item é inválido',
            53072	=> 'Descrição do item é obrigatório',
        ];

        $return = $msg;
        if(isset($listErrors[$codigo])){
            $return = $listErrors[$codigo];
        }

        return $return;
    }
}

















if(!function_exists('propel_init_ci')) {
    function propel_init_ci()
    {
        try{
            Propel::init(APPPATH . 'models/propel/build/conf/sitedefault-conf.php');
        } catch (Exception $e){

        }

        set_include_path(APPPATH . 'models/propel/build/classes' . PATH_SEPARATOR . get_include_path());
    }
}

propel_init_ci();
