<?php

class myFrontendHelper 
{

  public static function getRoutingLinks($sf_user)
  {
        /*
		// PARFAIT POUR RENFORCER LA SECURITÉ :: verifier que l'utilisateur en question est authentifié
		if(  ! ($sf_user->isAuthenticated()) )
		{
			// rediriger à la racine du site et stopper l'exec du script
			#header("Location: /"); 
             header("Location: ".sfConfig::get('app_webapp_rootdir_url')."/"); 
      
			exit ();
		}

		// PARFAIT POUR RENFORCER LA SECURITÉ :: verifier que l'utilisateur en question n'est un administrateur
		if( $sf_user->isAuthenticated() && ($sf_user->hasCredential('administrateur')) )
		{
			// rediriger à la racine du site et stopper l'exec du script
			#header("Location: /admin.php"); 
			header("Location: ".sfConfig::get('app_webapp_rootdir_url')."/admin.php"); 
			exit ();
		}
        */

    myAppHelper::doApplicationCredentialRedirection($sf_user);

		//
    $array = sfYaml::load(sfConfig::get('sf_app_config_dir').'/routing.yml');
    $links = array();
    foreach ($array as $k => $v)
    {
      // On n'affiche pas les infos présentes par défaut dans le routing
      if ($k != 'homepage' && $k != 'default' && $k != 'default_index'
		&& substr ($k,0, 9) != 'sf_guard_')
      {
        $links[] = $k;
      }
    }
    // sort($links,SORT_STRING); // On trie par ordre alphabétique
 
    return $links;
  }

	public static function getLiteHelper($s_value)
	{
		$arr = preg_split ( '/_/', $s_value );
		return ucfirst (array_pop ($arr));
	}

	public static function getDisplayDateHelper($p_value)
	{
    # ini variable locale
    $s_value='';

    #
    $s_value=substr (trim ($p_value), 0, 10);    
    
    #
		return substr($s_value, 8, 2).'/'.substr($s_value, 5, 2).'/'.substr($s_value, 0, 4);
	}

	public static function getDisplayBooleanHelper($s_value)
	{
		if ($s_value)
		{
			return 'Oui';
		}
		return 'Non';
	}

    // @desc: formatter un nombre en mettant un separateur pour les milliers et une decimal au besoin
	public static function getDisplayAmount($n_value)
	{

        // $myNumber = 123456.784321;    
        // echo number_format( $myNumber, 2, '.', ' ' ); // Displays "123 456.78"
        // echo number_format( $myNumber, 2, '.', '' ); // Displays "123456.78"
        // echo number_format( $myNumber, 1, ',', ' ' ); // Displays "123 456,8"
        // round ($n_value);
		return number_format( $n_value, 0, '.', ' ' )." FCFA"; 
	}

    // @desc: formatter un nombre pour le spool dans un fichier d'exportation
	public static function getFileExportDisplayAmount($n_value)
	{

        // $myNumber = 123456.784321;    
        // echo number_format( $myNumber, 2, '.', ' ' ); // Displays "123 456.78"
        // echo number_format( $myNumber, 2, '.', '' ); // Displays "123456.78"
        // echo number_format( $myNumber, 1, ',', ' ' ); // Displays "123 456,8"
        // round ($n_value);
		return number_format( $n_value, 0, '.', '' ); 
	}

	public static function getDisplayNoUnderscoreHelper($s_value)
	{
		return ucfirst (preg_replace('/_/', ' ', $s_value));
	}

	public static function getDisplayNoMinusHelper($s_value)
	{
		return ucfirst (preg_replace('/-/', ' ', $s_value));
	}

	public static function getDisplayLineBreakHelper($s_value)
	{
		return ucfirst (preg_replace('/\\n/', '<br>', $s_value));
	}

	public static function getDisplayLiteAndNoMinusHelper($s_value)
	{
		return myFrontendHelper::getDisplayNoMinusHelper(myFrontendHelper::getLiteHelper($s_value));
	}

	/*
	+----------------------------------------------------------------------+
	|	@create 2006-04-14_11!28 by atchapi, achilleromuald@yahoo.fr
	|	@modified 2006-04-14_11!28 by atchapi, achilleromuald@yahoo.fr
	|	@modified 20110302_064118 by atchapi, achilleromuald@yahoo.fr
	|	@descr obtenir le datetime courant au le format date timecode (interne) yyyymmddh24miss
	|	@sample_call: $s_datetime = myFrontendHelper::getNowDateTimeCode(); 
	+----------------------------------------------------------------------+
	*/
	public static function getNowDateTimeCode()
	{
		# PI: date("Y-m-d H:i:s");
		return date("YmdHis");
	}
	public static function getNowDateCode()
	{
		# PI: date("Y-m-d H:i:s");
		return date("Ymd");
	}	
	public static function getYearCode()
	{
		# PI: date("Y-m-d H:i:s");
		return date("Y");
	}
  	/*
	+----------------------------------------------------------------------+
	|	@create 20110513_231929 by atchapi, achilleromuald@yahoo.fr
	|	@modified 20110513_231934 by atchapi, achilleromuald@yahoo.fr: creation
	|	@descr convertir une chaine utf8 contenant des caracteres francais en iso-8859-1
	|	@sample_call: $s_datetime = myFrontendHelper::convertUTF8_to_8859($str); 
	+----------------------------------------------------------------------+
	*/
	public static function convertUTF8_to_8859($str)
  {
    // fonction qui test si la chaine est encodé en UTF8
    if(myFrontendHelper::is_utf8($str) == 1)
    {
        // fonction qui test si la chaine encodé en UTF8 contient des caractère français: Cette fonction ne traite que des chaines en UTF8
        if(myFrontendHelper::content8859_in_UTF8($str)==TRUE)
        {
            // On convertit la chaine de UTF8 en ISO8859-1
            $str = utf8_decode($str);
            // retourner la chaine converti
            return($str);
        }else
        { 
            // cas ou la chaine en UTF-8 mais ne contient pas des accents français (é,é,à,ù,û......) : exemple les caractères chinois encodé en UTF8
            // retourner la chaine non convertit
            return($str);
        }
    }else
    {
        // cas ou la chaine n'est pas encodé en UTF8
        return($str);
    }
  }
  

  /*
  // Verifie qu'un document est en utf-8 valide
  // http://us2.php.net/manual/fr/function.mb-detect-encoding.php#50087
  // http://w3.org/International/questions/qa-forms-utf-8.html
  // note: preg_replace permet de contourner un "stack overflow" sur PCRE
  // http://doc.spip.org/@is_utf8
  public static function is_utf8($string) {
    return !strlen(
    preg_replace(
      ',[\x09\x0A\x0D\x20-\x7E]'            # ASCII
    . '|[\xC2-\xDF][\x80-\xBF]'             # non-overlong 2-byte
    . '|\xE0[\xA0-\xBF][\x80-\xBF]'         # excluding overlongs
    . '|[\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}'  # straight 3-byte
    . '|\xED[\x80-\x9F][\x80-\xBF]'         # excluding surrogates
    . '|\xF0[\x90-\xBF][\x80-\xBF]{2}'      # planes 1-3
    . '|[\xF1-\xF3][\x80-\xBF]{3}'          # planes 4-15
    . '|\xF4[\x80-\x8F][\x80-\xBF]{2}'      # plane 16
    . ',sS',
    '', $string));
  }*/

  // @desc : formater un texte pour un contenu de fichier csv avec separateur ; (point virgule)
  public static function formatCsvFileContent($texte) 
  {    
     $texte = htmlspecialchars_decode($texte);
     $texte = str_replace("&#039;", "'", $texte);
     return  str_replace(";", " ", $texte);
  }


  // http://doc.spip.org/@unicode_to_utf_8
  public static function unicode_to_utf_8($texte) 
  {

    // 1. Entites &#128; et suivantes
    $vu = array();
    if (preg_match_all(',&#0*([1-9][0-9][0-9]+);,S',
    $texte, $regs, PREG_SET_ORDER))
    foreach ($regs as $reg) {
      if ($reg[1]>127 AND !isset($vu[$reg[0]]))
        $vu[$reg[0]] = caractere_utf_8($reg[1]);
    }
    //$texte = str_replace(array_keys($vu), array_values($vu), $texte);

    // 2. Entites > &#xFF;
    //$vu = array();
    if (preg_match_all(',&#x0*([1-9a-f][0-9a-f][0-9a-f]+);,iS',
    $texte, $regs, PREG_SET_ORDER))
    foreach ($regs as $reg) {
      if (!isset($vu[$reg[0]]))
        $vu[$reg[0]] = caractere_utf_8(hexdec($reg[1]));
    }
    return str_replace(array_keys($vu), array_values($vu), $texte);

  }

  // @desc: 20110513_232643. Returns true if $string is valid UTF-8 and false otherwise.
  public static function is_utf8($string)
  {
      // From http://w3.org/International/questions/qa-forms-utf-8.html
      return preg_match('%^(?:
          [\x09\x0A\x0D\x20-\x7E] # ASCII
          | [\xC2-\xDF][\x80-\xBF] # non-overlong 2-byte
          | \xE0[\xA0-\xBF][\x80-\xBF] # excluding overlongs
          | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2} # straight 3-byte
          | \xED[\x80-\x9F][\x80-\xBF] # excluding surrogates
          | \xF0[\x90-\xBF][\x80-\xBF]{2} # planes 1-3
          | [\xF1-\xF3][\x80-\xBF]{3} # planes 4-15
          | \xF4[\x80-\x8F][\x80-\xBF]{2} # plane 16
          )*$%xs', $string);
  } // function is_utf8

  // @desc: 20110513_232643.fonction qui cherche s'il ya des caractres accentus franais dans une chaine en UTF8
  public static function content8859_in_UTF8($str)
  {
      if ( strlen($str) == 0 ) { return FALSE; }
      // cette fonction ne retourne de valeur si la chaine est en UTF8
      // cette fonction retourne un tableau contenant les chaines accentuées
      preg_match_all('/.{1}|[^\x00]{1,1}$/us', $str, $ar);
      $chars = $ar[0];
      $str_fr = 0;
      foreach ( $chars as $i => $c )
      {
          $ud = 0;
          // Calcul les codes ASCII des chaines en UTF8
          if (ord($c{0})>=0 && ord($c{0})<=127) { continue; } // ASCII - next please
          if (ord($c{0})>=192 && ord($c{0})<=223) { $ord = (ord($c{0})-192)*64 + (ord($c{1})-128); }
          if (ord($c{0})>=224 && ord($c{0})<=239) { $ord = (ord($c{0})-224)*4096 + (ord($c{1})-128)*64 + (ord($c{2})-128); }
          if (ord($c{0})>=240 && ord($c{0})<=247) { $ord = (ord($c{0})-240)*262144 + (ord($c{1})-128)*4096 + (ord($c{2})-128)*64 + (ord($c{3})-128); }
          if (ord($c{0})>=248 && ord($c{0})<=251) { $ord = (ord($c{0})-248)*16777216 + (ord($c{1})-128)*262144 + (ord($c{2})-128)*4096 + (ord($c{3})-128)*64 + (ord($c{4})-128); }
          if (ord($c{0})>=252 && ord($c{0})<=253) { $ord = (ord($c{0})-252)*1073741824 + (ord($c{1})-128)*16777216 + (ord($c{2})-128)*262144 + (ord($c{3})-128)*4096 + (ord($c{4})-128)*64 + (ord($c{5})-128); }
          if (ord($c{0})>=254 && ord($c{0})<=255) { $chars{$i} = $unknown; continue; } //error
          //Test si les caractères contient les accents (à, é,è,ù,ç,ê,â,û,........)
          if(($ord == 224) || ($ord == 226) || ($ord == 235) || ($ord == 249) || ($ord == 250) ||
          ($ord == 252) || ($ord == 251) || ($ord == 233) || ($ord == 234) || ($ord == 232) ||
          ($ord == 231) || ($ord == 228) || ($ord == 256) || ($ord == 128) || ($ord == 156) ||
          ($ord == 230) || ($ord == 231) || ($ord == 244) || ($ord == 225) || ($ord == 236) ||
          ($ord == 227) || ($ord == 237) || ($ord == 238) || ($ord == 249) || ($ord == 239) ||
          ($ord == 257))
          {
              $str_fr =1;
          }
      }
      if($str_fr == 1)
      {
          return TRUE;
      }else
      {
          return FALSE;
      }
  }

}

