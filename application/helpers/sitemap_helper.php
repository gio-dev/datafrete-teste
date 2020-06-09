<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('limpaURL'))
{
	function limpaURL($url)
	{
	    $url      = str_replace("//carrossc.com.br", "//www.carrossc.com.br", $url);
		$parseUrl = parse_url($url);

		if ($parseUrl['host'] === 'www.carrossc.com.br' || $parseUrl['host'] == '') {
			if ($parseUrl['host'] == '') {
				return 'http://www.carrossc.com.br/'.ltrim($parseUrl['path'], '/');
			}else{
				return $url;
			}
		}else{
			return false;
		}
	}
}

if ( ! function_exists('gravaURL'))
{
	function gravaURL($url)
	{
	    $conteudo = file_get_contents(SITEMAP);
		
		if(!substr_count($conteudo, $url)){
			$fp = fopen(SITEMAP, "a");
			$escreve = fwrite($fp, $url."\r\n");
			fclose($fp);
		}
	}
}

if ( ! function_exists('gravaPonteiro'))
{
	function gravaPonteiro($pt)
	{
		$fp = fopen(PONTEIRO, "w");
		$escreve = fwrite($fp, $pt);
		fclose($fp);
	}
}

if ( ! function_exists('curl_get_file_contents'))
{
	function curl_get_file_contents($URL)
	{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $URL);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$response = curl_exec($curl);
		curl_close($curl);

		if ($response) 
			return $response; 
		else 
			return FALSE;
	}
}
