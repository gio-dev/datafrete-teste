<?php
/*
 * Controlador da area de administração do site
 */
class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('funcoes');
        $this->load->helper('form');

	}
	public function index() {


        $data['titulo'] = 'Home';
        $data['breadcrumbs'] = [
            'Home' => base_url()
        ];
        $data['botao'] = 'add';
	    $data['arrCalculos'] = CalculoDistanciasQuery::create()->find();

		$this->template->load('template', 'home', $data);
	}

	public function cadastro($num){

        $num = trim($num);

        if(!empty($num) && !is_null($num) && is_numeric($num)) {
            $calculo = CalculoDistanciasPeer::retrieveByPK($num);
            if (!$calculo instanceof CalculoDistancias) {
                $this->session->set_flashdata('error', "Opção não encontrada");
                redirect('', 'refresh');
            }
        } elseif(!empty($num) && !is_null($num) && !is_numeric($num)){

            $this->session->set_flashdata('error', "Opção não encontrada");
            redirect('', 'refresh');

        } else {
            $calculo = new CalculoDistancias();
        }

        if($this->input->method() == 'post'){

            $calculo->setByArray($this->input->post());
            $calculo->setDistanciaCalculada(ConverteRealCad($this->input->post('DISTANCIA_CALCULADA')));

            $calculo->myValidate($erros);


            if(count($erros) == 0){
                $message = 'Registro alterado com sucesso!';

                if($calculo->isNew())
                    $message = 'Registro inserido com sucesso!';

                $calculo->save();

                $this->session->set_flashdata('success', $message);
                redirect('', 'refresh');
            } else {
                $this->session->set_flashdata('error', $erros);
            }

        }

        $data = [
            'objCalculo' => $calculo
        ];

        $tituloPage =  $calculo->isNew() ? 'Cadastrar' : 'Alterar';
        $data['titulo'] = $tituloPage;
        $data['breadcrumbs'] = [
            'Home' => base_url(),
            $tituloPage => ''
        ];
        $data['botao'] = 'back';


        $this->template->load('template', 'cadastro', $data);
    }

    public function cepvalid(){

        $cep = $this->input->get('cep');

        $retorno = [
            'status'        => 'error',
            'lat'           => '0',
            'long'          => '0',
        ];

        if(!is_null($cep) && !empty($cep) && is_numeric($cep) && strlen($cep) == 8){
            $url = "https://www.cepaberto.com/api/v3/cep?cep=".$cep;

            $headr[] = 'Authorization: Token token=807069e165360c081129bce881bac305';

            $crl = curl_init();

            curl_setopt($crl, CURLOPT_URL, $url);

            curl_setopt($crl, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($crl, CURLOPT_TIMEOUT, 10);

            $jsonresponse = curl_exec($crl);
            curl_close($crl);

            $response = json_decode($jsonresponse, true);

            if(is_array($response) && count($response) > 0){

                if(is_null($response['longitude']) || $response['latitude']){
                    $apiKeyTomtom = 'Htt0XI10gwCeviS10fCwZfd1GPofvJTr';
                    $urlBase = "https://api.tomtom.com/search/2/geocode/".urlencode($cep);
                    $urlFinal = ".json?countrySet=BR&language=pt-BR&key=".$apiKeyTomtom;

                    $crl = curl_init();

                    curl_setopt($crl, CURLOPT_URL, $urlBase.$urlFinal);

                    curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($crl, CURLOPT_TIMEOUT, 10);

                    $jsonresponse = curl_exec($crl);
                    curl_close($crl);

                    $response = json_decode($jsonresponse, true);

                    if(is_array($response) && count($response) > 0 && isset($response['results'])
                        && isset($response['results'][0]) && isset($response['results'][0]['position'])
                    ){
                        $retorno = [
                            'status'    => 'success',
                            'long'          => $response['results'][0]['position']['lon'],
                            'lat'          => $response['results'][0]['position']['lat'],
                        ];
                    }
                } else {
                    $retorno = [
                        'status'    => 'success',
                        'long'          => $response['longitude'],
                        'lat'          => $response['latitude'],
                    ];
                }


            }



        }

        echo json_encode($retorno);
    }

    public function checkdistance(){

	    $apiKeyTomtom = 'Htt0XI10gwCeviS10fCwZfd1GPofvJTr';

	    $latitudeOrigem = $this->input->get('latO');
	    $longitudeOrigem = $this->input->get('longO');
	    $latitudeDestino = $this->input->get('latD');
	    $longitudeDestino = $this->input->get('longD');

        $retorno = [
            'status'                => 'error',
            'distance_mt'           => '0',
            'distance_km'           => '0',
        ];

	    if(
	        !is_null($latitudeOrigem) && !empty($latitudeOrigem)
            && !is_null($longitudeOrigem) && !empty($longitudeOrigem)
            && !is_null($latitudeDestino) && !empty($latitudeDestino)
            && !is_null($longitudeDestino) && !empty($longitudeDestino)
        ){


            $urlBase = "https://api.tomtom.com/routing/1/calculateRoute/".urlencode($latitudeOrigem.','.$longitudeOrigem.':'.$latitudeDestino.','.$longitudeDestino);
            $urlFinal = "/json?language=pt-BR&routeRepresentation=summaryOnly&avoid=unpavedRoads&key=".$apiKeyTomtom;

            $crl = curl_init();

            curl_setopt($crl, CURLOPT_URL, $urlBase.$urlFinal);

            curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($crl, CURLOPT_TIMEOUT, 10);

            $jsonresponse = curl_exec($crl);
            curl_close($crl);

            $response = json_decode($jsonresponse, true);

            if(is_array($response) && count($response) > 0 && isset($response['routes']) && isset($response['routes'][0])
                && isset($response['routes'][0]['summary']) && isset($response['routes'][0]['summary']['lengthInMeters'])
            ){
                $retorno = [
                    'status'                => 'success',
                    'distance_mt'           => number_format( $response['routes'][0]['summary']['lengthInMeters'], 2,',', '.'),
                    'distance_km'           => number_format(($response['routes'][0]['summary']['lengthInMeters'] /1000), 2,',', '.'),
                ];
            }

        }

	    echo json_encode($retorno);

    }

    public function excluir($num){
        $objCalculo = CalculoDistanciasPeer::retrieveByPK($num);

        if(!$objCalculo instanceof CalculoDistancias){
            $this->session->set_flashdata('error', 'Não foi possível excluir o Calculo');
            redirect('');
        }
        $objCalculo->delete();
        $this->session->set_flashdata('success', 'Calculo excluído com sucesso!');
        redirect('');
    }

}