<?php

namespace CNSEE\UtilsBundle\String;

/***
 * @author Alain Bangoula
 * class containing strings utilities method
 * FeedBack appreciated :-)
 */
class String{


	static public function prepareLink($string){
	
		$link = str_replace(' ', '-', $string);
		$link = self::stripAccents($link);
		if(substr($link, 0, 7)!='http://') $link = 'http://'.$link;
		return $link;
	}
	
	static public function getaLink($string){
		$link = strtolower($string);
		$link = str_replace(' ', '-', $link);
                $link = str_replace('---', '-', $link);
                 $link = str_replace('--', '-', $link);
		$link = self::stripAccents($link);
		$link = self::stripspecialChars($link);
		
	return $link;
	}

	static public function stripAccents($str){
		$str = htmlentities($str, ENT_NOQUOTES, 'utf-8');
		$str = preg_replace('#\&([A-za-z])(?:uml|circ|tilde|acute|grave|cedil|ring)\;#', '\1', $str);
		$str = preg_replace('#\&([A-za-z]{2})(?:lig)\;#', '\1', $str);
		$str = preg_replace('#\&[^;]+\;#', '', $str);

		return $str;
	}
	
	static public function stripspecialChars($string){
		$string = str_replace(',', '', $string);
		//$string = str_replace('.', '', $string);
		$string = str_replace(':', '', $string);
		$string = str_replace(';', '', $string);
		$string = str_replace('?', '', $string);
		$string = str_replace('!', '', $string);
		$string = str_replace('+', '', $string);
		$string = str_replace('%', '', $string);
		$string = str_replace('*', '', $string);
		$string = str_replace('\'', '', $string);
		$string = str_replace('`', '', $string);
		//$string = str_replace('&', '', $string);
		$string = str_replace('(', '', $string);
		$string = str_replace('{', '', $string);
		$string = str_replace('[', '', $string);
		$string = str_replace(')', '', $string);
		$string = str_replace('}', '', $string);
		$string = str_replace(']', '', $string);
		$string = str_replace('=', '', $string);
		$string = str_replace('@', '', $string);
                $string = str_replace('"', '', $string);
                $string = str_replace('\'', '', $string);
                $string = str_replace('  ', ' ', $string);
		return $string;
	}
	
	static public function getPassword($count = 8){

	$abc= array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
 	$pass = '';
        foreach(range(1, $count) as $range):
            $pass .= $abc[rand(0,35)];
        endforeach;
	return $pass;
	}
	
	static public function stripSpace($data){
			$data = utf8_encode($data);
	
			$data = str_replace(" ", "_", $data);
			return $data;
	}
	
	static public function cutChars($texte, $number){
        if(strlen($texte) > $number){
            $texte = substr($texte, 0, $number).'...';
	}
	
	return $texte;
	}

        static public function getChars($texte, $base, $number){
	if(strlen($texte) > $number){
            if($base <= 1):
                $texte = substr($texte, 0 , $number).'...';
            elseif($base > 1):
                $texte = '...'.substr($texte, $number * $base , $number).'...';
            endif;
        }
	
	return $texte;
	}

        static public function GenerateKey(){
            return md5(rand(uniqid()));
        }
	
	static function twit($texte){

	$texte = str_replace(" ", "+", $texte);
	return $texte;
	}
	
        static function br2nl($text){
            return preg_replace("/\<br\s*\/?\>/i", "\r\r", $text);
        }

 

}
