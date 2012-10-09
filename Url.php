<?php

namespace UtilsBundle;

/***
 * @author Alain Bangoula
 * class Allowing Basic cURL action like POST, PUT, or GET
 * FeedBack appreciated :-)
 */
class Url {
    
    protected $link_url = null;
	protected $this->ch;
    

    public function __construct($link_url){
        $this->link_url = $link_url;
		$this->ch = curl_init();
    }


    public function get($follow_location=false){
		
		$this->prepare_link();

		if($follow_location==true){
            curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 1);
        }
        return $this->get_response();
    }

    public function put($datas){
        $this->prepare_link();

        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($this->ch, CURLOPT_POSTFIELDS,http_build_query($datas));

        return $this->get_response();

    }

    public function post($datas, $auth = null, $headers=array()){
        $this->prepare_link($headers);
        
        if($auth):
            curl_setopt($this->ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC ) ; 
            curl_setopt($this->ch, CURLOPT_USERPWD, key($auth).":".$auth[key($auth)]); 
        endif;

        curl_setopt($this->ch, CURLOPT_POST, 1);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS,http_build_query($datas));
        return $this->get_response();
    }

    private function prepare_link($headers = array())
	{
		// configuration de l'URL et d'autres options
        curl_setopt($this->ch, CURLOPT_URL, $this->link_url);
        curl_setopt($this->ch, CURLOPT_HEADER, 0);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $headers);
	}

    private function get_response()
    {
        // récupération de l'URL et affichage sur le naviguateur
        $response = curl_exec($this->ch);

        // fermeture de la session curl
        curl_close($this->ch);
        return $response;
    }

}





