<?php

class myAppHelper 
{
 
    /*
    +----------------------------------------------------------------------+
    |	@create 20120609_221043 by atchapi, achilleromuald@gmail.com
    |	@modified 20120609_221044 by atchapi, achilleromuald@gmail.com
    |	@descr validation des critere des securité
    |	@sample_call:  $s_value = myAppHelper::doApplicationCredentialRedirection($sf_user); 
    +----------------------------------------------------------------------+
    */
    public static function doApplicationCredentialRedirection($sf_user)
    {
        //
        // if (!($sf_user instanceof ?? )) // sfUser //  sfGuardSecurityUser
        // {
        //    return array();
        // }

        //
        if( ! ($sf_user->isAuthenticated()))
        {
            // rediriger à la racine du site et stopper l'exec du script
            # header("Location: /"); 
            header("Location: ".sfConfig::get('app_webapp_rootdir_url')."/"); 
            exit ();
        }
        
        // si backend
        if (sfConfig::get('app_webapp_name') == 'simuce-backend' )
        {
            // PARFAIT POUR RENFORCER LA SECURITÉ :: verifier que l'utilisateur en question est un administrateur
            if( $sf_user->isAuthenticated() && ! ($sf_user->hasCredential(  sfConfig::get('app_webapp_admin_credential')  )) )
            {
                // rediriger à la racine du site et stopper l'exec du script
                # header("Location: /"); 
                header("Location: ".sfConfig::get('app_webapp_rootdir_url')."/"); 
                exit ();
            }
        } elseif (sfConfig::get('app_webapp_name') == 'simuce-frontend')
        {
            // PARFAIT POUR RENFORCER LA SECURITÉ :: verifier que l'utilisateur en question n'est un administrateur
            if( $sf_user->isAuthenticated() && ($sf_user->hasCredential( sfConfig::get('app_webapp_admin_credential') )) )
            {
                // rediriger à la racine du site et stopper l'exec du script
                #header("Location: /admin.php"); 
                header("Location: ".sfConfig::get('app_webapp_rootdir_url')."/admin.php"); 
                exit ();
            }
        } else 
        {
            // rediriger à la racine du site et stopper l'exec du script
            # header("Location: /"); 
            header("Location: ".sfConfig::get('app_webapp_rootdir_url')."/"); 
            exit ();
        }
    }


    /*
    +----------------------------------------------------------------------+
    |	@create 20120609_204513 by atchapi, achilleromuald@gmail.com
    |	@modified 20120609_204515 by atchapi, achilleromuald@gmail.com
    |	@descr lecture du fichier de route
    |	@sample_call:  $s_value = myAppHelper::getRoutingLinks($sf_user); 
    +----------------------------------------------------------------------+
    */
    public static function getRoutingLinks($sf_user)
    {
        // PARFAIT POUR RENFORCER LA SECURITÉ :: verifier que l'utilisateur en question est authentifié        
        myAppHelper::doApplicationCredentialRedirection($sf_user);

        // 
        $array = sfYaml::load(sfConfig::get('sf_app_config_dir').'/routing.yml');
        $links = array();
        foreach ($array as $k => $v)
        {
            // On n'affiche pas les infos présentes par défaut dans le routing
            // if ($k != 'homepage' && $k != 'default' && $k != 'default_index' && substr ($k,0, 9) != 'sf_guard_')
            $links[] = $k;
        }
        // sort($links,SORT_STRING); // On trie par ordre alphabétique

        return $links;
    }

    /*
    +----------------------------------------------------------------------+
    |	@create 20120521_202846 by atchapi, achilleromuald@gmail.com
    |	@modified 20120521_202914 by atchapi, achilleromuald@gmail.com
    |	@descr obtenir le code html du menu principal
    |	@sample_call:  $s_value = myAppHelper::getTopNavBarMenuContent($sf_user); 
    +----------------------------------------------------------------------+
    */
    public static function getTopNavBarMenuContent($sf_user)
    {
        $s_return = "";
        $o_routing = sfContext::getInstance()->getRouting();
        
        #
        $a_routing_links = myAppHelper::getRoutingLinks ($sf_user);

        $b_has_credential=true;
        foreach ($a_routing_links as $link)
        {

            // si ouverture d'un contexte de droit securitaire specifique
            if (preg_match('/__credential__begin__/', $link) )
            {
                $a_routing_credential = preg_split ('/__credential__begin__/', $link);

                if (!$sf_user->hasCredential($a_routing_credential [1]))
                {
                    $b_has_credential=false;
                }
                continue;
            }
            // si fermeture d'un contexte de droit securitaire specifique
            if (preg_match('/__credential__end__/', $link) )
            {
                $a_routing_credential = preg_split ('/__credential__end__/', $link);
                if (!$sf_user->hasCredential($a_routing_credential [1]))
                {
                    $b_has_credential=true;
                }
                continue;
            }
            if (!$b_has_credential)
            {
                continue;
            }


            // si declaration d'une ouverture de liste deroulante 
            if (preg_match('/__dropdown_begin/', $link))
            {
                $s_return .= "\n".'<li class="dropdown">'
                  ."\n".'<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.myAppHelper::getDisplayNoUnderscoreHelper(preg_replace('/__dropdown_begin/', '', $link)).'<b class="caret"></b></a>'
                  ."\n".'<ul class="dropdown-menu">';
                continue;   
            }
            // si declaration d'une ouverture de liste deroulante 
            if (preg_match('/__dropdown_end/', $link))
            {
                $s_return .= "\n".'</ul>'
                                        ."\n".'</li>';
                continue;
            }
            // si declaration d'une divider de sous section de menu
            if (preg_match('/__divider_nav_header/', $link))
            {
                $s_return .= "\n".'<li class="divider"></li>'
                  ."\n".'<li class="nav-header">'.myAppHelper::getDisplayNoUnderscoreHelper(preg_replace('/__divider_nav_header/', '', $link)).'</li>';
                continue;   
            }

            //
            $s_return .= "\n".'<li><a href="'. $o_routing->generate($link).'">'.ucfirst(myAppHelper::getDisplayNoUnderscoreHelper($link)).'</a></li>';  
        }
        
        # fin
        return "\n".'<div class="nav-collapse">'
                     ."\n".'<ul class="nav">'
                     ."\n".$s_return
                     ."\n".'</ul>'
                     ."\n".'</div><!--/.nav-collapse -->'
                     ;
    }


    /*
    +----------------------------------------------------------------------+
    |	@create 20120609_144105 by atchapi, achilleromuald@gmail.com
    |	@modified 20120609_144106 by atchapi, achilleromuald@gmail.com
    |	@descr determiner si la chaine passer contient 'freeze.' ie correspond  à un freeze applicatif
    |	@sample_call:  $s_value = myAppHelper::getIsFreezeStatus($s_username, $s_user_email); 
    +----------------------------------------------------------------------+
    */
    public static function getIsFreezeStatus($s_username, $s_user_email)
    {
        // determiner si la chaine passer contient 'freeze.'
        if (preg_match('/^freeze\./', $s_username) &&  preg_match('/^freeze\./', $s_user_email) )
        {
            return 1;
        }

        // sinon
        return 0;
    }

    /*
    +----------------------------------------------------------------------+
    |	@create 20120609_214808 by atchapi, achilleromuald@gmail.com
    |	@modified 20120609_214810 by atchapi, achilleromuald@gmail.com
    |	@descr Html tags delete using regular expression
    |	@sample_call:  $s_value = myAppHelper::removeHtmlTagsWithExceptions($html, $exceptions); 
    +----------------------------------------------------------------------+
    */
    public static function removeHtmlTagsWithExceptions($html, $exceptions = null){
        if(is_array($exceptions) && !empty($exceptions))
        {
            foreach($exceptions as $exception)
            {
                $openTagPattern  = '/<(' . $exception . ')(\s.*?)?>/msi';
                $closeTagPattern = '/<\/(' . $exception . ')>/msi';

                $html = preg_replace(
                    array($openTagPattern, $closeTagPattern),
                    array('||l|\1\2|r||', '||l|/\1|r||'),
                    $html
                );
            }
        }

        $html = preg_replace('/<.*?>/msi', '', $html);

        if(is_array($exceptions))
        {
            $html = str_replace('||l|', '<', $html);
            $html = str_replace('|r||', '>', $html);
        }

        return $html;
    } 

    /*
    +----------------------------------------------------------------------+
    |	@create 20120609_214853 by atchapi, achilleromuald@gmail.com
    |	@modified 20120609_214854 by atchapi, achilleromuald@gmail.com
    |	@descr Html tags delete using regular expression
    |	@sample_call:  $s_value = myAppHelper::getDisplayNoUnderscoreHelper($s_value); 
    +----------------------------------------------------------------------+
    */
    public static function getDisplayNoUnderscoreHelper($s_value)
    {
        return ucfirst (preg_replace('/_/', ' ', $s_value));
    }


    public static function getLiteHelper($s_value)
    {
        $arr = preg_split ( '/_/', $s_value );
        return ucfirst (array_pop ($arr));
    }

    public static function getDisplayDateHelper($s_value)
    {
        return substr ($s_value, 0, 10);
    }

    public static function getDisplayBooleanHelper($s_value)
    {
        if ($s_value)
        {
            return 'Oui';
        }
        return 'Non';
    }



    /*
    +----------------------------------------------------------------------+
    |	@create 2006-04-14_11!28 by atchapi, achilleromuald@gmail.com
    |	@modified 2006-04-14_11!28 by atchapi, achilleromuald@gmail.com
    |	@modified 20110302_064118 by atchapi, achilleromuald@gmail.com
    |	@descr obtenir le datetime courant au le format date timecode (interne) yyyymmddh24miss
    |	@sample_call: $s_datetime = myAppHelper::getNowDateTimeCode(); 
    +----------------------------------------------------------------------+
    */
    public static function getNowDateTimeCode()
    {
        # PI: date("Y-m-d H:i:s");
        return date("Ymd");
    }

    public static function getNowDateCode()
    {
        # PI: date("Y-m-d H:i:s");
        return date("Ymd");
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
		return myAppHelper::getDisplayNoMinusHelper(myAppHelper::getLiteHelper($s_value));
	}
 
    /*
    +----------------------------------------------------------------------+
    |	@create 20110513_231929 by atchapi, achilleromuald@yahoo.fr
    |	@modified 20110513_231934 by atchapi, achilleromuald@yahoo.fr: creation
    |	@descr convertir une chaine utf8 contenant des caracteres francais en iso-8859-1
    |	@sample_call: $s_datetime = myAppHelper::convertUTF8_to_8859($str); 
    +----------------------------------------------------------------------+
    */
    public static function convertUTF8_to_8859($str)
    {
        // fonction qui test si la chaine est encodé en UTF8
        if(myAppHelper::is_utf8($str) == 1)
        {
            // fonction qui test si la chaine encodé en UTF8 contient des caractère français: Cette fonction ne traite que des chaines en UTF8
            if(myAppHelper::content8859_in_UTF8($str)==TRUE)
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

	public static function getNumberFormatWithOneComa($n_value)
	{    
        echo number_format( $n_value, 1, '.', ' ' ); // Displays "123 456,8"
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



/*
-- 20120609_214448.php reg ex
    Regex quick reference
    [abc]     A single character: a, b or c
    [^abc]     Any single character but a, b, or c
    [a-z]     Any single character in the range a-z
    [a-zA-Z]     Any single character in the range a-z or A-Z
    ^     Start of line
    $     End of line
    \A     Start of string
    \z     End of string
    .     Any single character
    \s     Any whitespace character
    \S     Any non-whitespace character
    \d     Any digit
    \D     Any non-digit
    \w     Any word character (letter, number, underscore)
    \W     Any non-word character
    \b     Any word boundary character
    (...)     Capture everything enclosed
    (a|b)     a or b
    a?     Zero or one of a
    a*     Zero or more of a
    a+     One or more of a
    a{3}     Exactly 3 of a
    a{3,}     3 or more of a
    a{3,6}     Between 3 and 6 of a

    options: i case insensitive m make dot match newlines x ignore whitespace in regex o perform #{...} substitutions only once
*/