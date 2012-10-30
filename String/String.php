<?php

namespace CNSEE\UtilsBundle\String;

/***
 * @author Alain Bangoula
 * class containing strings utilities method
 * FeedBack appreciated :-)
 */
class String{


	public function prepareLink($string){
	
		$link = str_replace(' ', '-', $string);
		$link = self::stripAccents($link);
		if(substr($link, 0, 7)!='http://') $link = 'http://'.$link;
		return $link;
	}
	
	public function getaLink($string){
		$link = strtolower($string);
		$link = str_replace(' ', '-', $link);
                $link = str_replace('---', '-', $link);
                 $link = str_replace('--', '-', $link);
		$link = self::stripAccents($link);
		$link = self::stripspecialChars($link);
		
	return $link;
	}

	public function stripAccents($string){
		$string = str_replace('Ã ', 'a', $string);
		$string = str_replace('Ã¡', 'a', $string);
		$string = str_replace('Ã¢', 'a', $string);
		$string = str_replace('Ã£', 'a', $string);
		$string = str_replace('Ã¤', 'a', $string);
		$string = str_replace('Ã§', 'c', $string);
		$string = str_replace('Ã¨', 'e', $string);
		$string = str_replace('Ã©', 'e', $string);
		$string = str_replace('Ãª', 'e', $string);
		$string = str_replace('Ã«', 'e', $string);
		$string = str_replace('Ã¬', 'i', $string);
		$string = str_replace('Ã­', 'i', $string);
		$string = str_replace('Ã®', 'i', $string);
		$string = str_replace('Ã¯', 'i', $string);
		$string = str_replace('Ã±', 'n', $string);
		$string = str_replace('Ã²', 'o', $string);
		$string = str_replace('Ã³', 'o', $string);
		$string = str_replace('Ã´', 'o', $string);
		$string = str_replace('Ãµ', 'o', $string);
		$string = str_replace('Ã¶', 'o', $string);
		$string = str_replace('Ã¹', 'u', $string);
		$string = str_replace('Ãº', 'u', $string);
		$string = str_replace('Ã»', 'u', $string);
		$string = str_replace('Ã¼', 'u', $string);
		$string = str_replace('Ã½', 'y', $string);
		$string = str_replace('Ã¿', 'y', $string);
		$string = str_replace('Ã€', 'A', $string);
$string = str_replace('Ã', 'A', $string);
$string = str_replace('Ã‚', 'A', $string);
$string = str_replace('Ãƒ', 'A', $string);
$string = str_replace('Ã„', 'A', $string);
$string = str_replace('Ã‡', 'C', $string);
$string = str_replace('Ãˆ', 'E', $string);
$string = str_replace('Ã‰', 'E', $string);
$string = str_replace('ÃŠ', 'E', $string);
$string = str_replace('Ã‹', 'E', $string);
$string = str_replace('ÃŒ', 'I', $string);
$string = str_replace('Ã', 'I', $string);
$string = str_replace('ÃŽ', 'I', $string);
$string = str_replace('Ã', 'I', $string);
$string = str_replace('Ã‘', 'N', $string);
$string = str_replace('Ã’', 'O', $string);
$string = str_replace('Ã“', 'O', $string);
$string = str_replace('Ã”', 'O', $string);
$string = str_replace('Ã•', 'O', $string);
$string = str_replace('Ã–', 'O', $string);
$string = str_replace('Ã™', 'U', $string);
$string = str_replace('Ãš', 'U', $string);
$string = str_replace('Ã›', 'U', $string);
$string = str_replace('Ãœ', 'U', $string);
$string = str_replace('Ã', 'Y', $string);

		return $string;
	}
	
	public function stripspecialChars($string){
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
	
	public function getPassword($count = 8){

	$abc= array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
 	$pass = '';
        foreach(range(1, $count) as $range):
            $pass .= $abc[rand(0,35)];
        endforeach;
	return $pass;
	}
	
	public function stripSpace($data){
			$data = utf8_encode($data);
	
			$data = str_replace(" ", "_", $data);
			return $data;
	}
	
	public function cutChars($texte, $number){
        if(strlen($texte) > $number){
            $texte = substr($texte, 0, $number).'...';
	}
	
	return $texte;
	}

        public function getChars($texte, $base, $number){
	if(strlen($texte) > $number){
            if($base <= 1):
                $texte = substr($texte, 0 , $number).'...';
            elseif($base > 1):
                $texte = '...'.substr($texte, $number * $base , $number).'...';
            endif;
        }
	
	return $texte;
	}

        public function GenerateKey(){
            return md5(rand(uniqid()));
        }
	
	function twit($texte){

	$texte = str_replace(" ", "+", $texte);
	return $texte;
	}
	
        function br2nl($text){
            return preg_replace("/\<br\s*\/?\>/i", "\r\r", $text);
        }

 

}