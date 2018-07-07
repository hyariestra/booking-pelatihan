<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 	//GetDatabaseMatchWords

	if ( ! function_exists('GetDatabaseMatchWords') )

	{

		function GetDatabaseMatchWords()

		{			

			
			//for online

			$baseURL = base_url();


			//for development
			$baseURL = 'blud_pelatihan_mpku_kunci_rs00';


			$baseURL = strtolower($baseURL);


			$baseURL = str_replace('http://', '', $baseURL);

			$baseURL = str_replace('https://', '', $baseURL);

			$baseURL = str_replace('www.', '', $baseURL);		


      $arrURL = explode('.', $baseURL);

      $matchWord =  $arrURL[0];



      return $matchWord;



		}													

	}	



   //SetDatabaseActive

	if ( ! function_exists('SetDatabaseActive') )

	{

		function SetDatabaseActive($database = '')

		{

			

			$CI=& get_instance();

			$CI->load->helper('inflector');
     
      //$dbDefault = 'syncore_rsud_demo'; //DB DEFAULT MINI PC

      //$dbDefault = 'blud_demo_rsud'; //DB DEFAULT SERVER

      $dbDefault = 'mysql'; //DB DEFAULT LOCAL



			$database = ($database == 'default') ? $dbDefault : $database;



			$database = underscore(strtolower($database));



      ($database <> '') ? $CI->session->set_userdata('DatabaseActive', $database) : '';



			$databaseActive = $CI->session->userdata('DatabaseActive');

			
			
			//for online

	/*		$config['hostname'] = "blud.co.id";

			$config['username'] = "blud_db";

			$config['password'] = "4W?&m2@hv~xU";*/


      //server pc mini
   /*   $config['hostname'] = "syncore";

      $config['username'] = "syncore";

      $config['password'] = "@superpass@";*/

			//for offline/local 

			$config['hostname'] = "localhost";

			$config['username'] = "root";

			$config['password'] = "";

			$config['database'] = $databaseActive;

			$config['dbdriver'] = "mysql";

			$config['dbprefix'] = "";

			$config['pconnect'] = FALSE;

			$config['db_debug'] = TRUE;

			$config['cache_on'] = FALSE;

			$config['cachedir'] = "";

			$config['char_set'] = "utf8";

			$config['dbcollat'] = "utf8_general_ci";
      
      ($config['database'] <> '') ? $_SESSION['settingDBConnection'] = $config : '';

			($config['database'] <> '') ? $CI->load->database($config) : header('Location:'.base_url());

		}

	}

  //SetAPIDatabaseConnection

  if ( ! function_exists('SetAPIDatabaseConnection') )

  {

    function SetAPIDatabaseConnection($ObjReference, $database = '')
    {   

      $dbDefault = 'dinkes_madiun_blud_2016'; // 

      $database = ($database == '') ? $dbDefault : $database;

       //for online

      /* $config['hostname'] = "syncore.co.id";

      $config['username'] = "syncore1_rsud";

      $config['password'] = "3l%vfi0pGc0)";*/


      //for offline/local 
      $config['hostname'] = "localhost";

      $config['username'] = "root";

      $config['password'] = "";

      $config['database'] = $database;

      $config['dbdriver'] = "mysql";

      $config['dbprefix'] = "";

      $config['pconnect'] = FALSE;

      $config['db_debug'] = TRUE;

      $config['cache_on'] = FALSE;

      $config['cachedir'] = "";

      $config['char_set'] = "utf8";

      $config['dbcollat'] = "utf8_general_ci";

  
      $ObjReference->load->database($config) ;

    }
  }

	//GetWsdlCachePath

	if ( ! function_exists('GetWsdlCachePath') )

	{

		function GetWsdlCachePath($argument)

		{			

			return APPPATH.'cache/wsdl/'.$argument;

		}													

	}	




	//GetCredentialData

	if ( ! function_exists('GetCredentialData') )

	{

		function GetCredentialData(){

			

			$CI =& get_instance();

			$CI->load->helper('url');

		

			$APIURL 		= GetSettingValue('api_url'); 

			$APISecretKey 	= GetSettingValue('api_secret_key'); 	

			$APISecretPass 	= GetSettingValue('api_secret_pass');



			$credential['apiServerURL']  = $APIURL;

			$credential['apiSecretKey']  = $APISecretKey;

			$credential['apiSecretPass'] = $APISecretPass;			



			return $credential;

		}	

	}	


	//ConstructMessageResponse

	if ( ! function_exists('ConstructMessageResponse') )

	{

		function ConstructMessageResponse($messageResponseText = 'Unsuccesfully Retrieved Data', $alertType, $isNeedRefresh = false, $refreshURL = '', $glyphicon = '')

		{



			$messageResponseText = ($glyphicon <> '') ?  "<span class='glyphicon glyphicon-".$glyphicon."'>&nbsp;</span>".$messageResponseText : $messageResponseText;



			$messageResponseText = "<div class='alert alert-".$alertType."' id='alertMessage' alert-dismissible' role='alert'>".$messageResponseText."<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> </div>";	



			return $messageResponseText;

		}

	}	


	//GenerateNewCRSFHash

	if ( ! function_exists('GenerateNewCRSFHash') )

	{

		function GenerateNewCRSFHash()

		{

			$CI=& get_instance();

			

			$ipAddressHash = $CI->input->ip_address();			

			$_SESSION[config_item('csrf_token_name')] = md5(uniqid().microtime().rand().$ipAddressHash);			 

			return $_SESSION[config_item('csrf_token_name')];			

		}

	}

  //GetDefaultSoapResponseError
  if ( ! function_exists('GetDefaultSoapResponseError') )
  {
    function GetDefaultSoapResponseError($responseCode = 'E01', $responseString = 'Komunikasi data ke server tidak berhasil, proses transfer data dibatalkan', $responseData = '')
    {
      $resultArr = array();

      $resultArr['responseCode']   = $responseCode;
      $resultArr['responseString'] = $responseString;
      $resultArr['responseData']   = $responseData;
      
      return $resultArr;

    }
  } 

  //GetDefaultSoapError
  if ( ! function_exists('GetDefaultCredentialSoapError') )
  {
    function GetDefaultCredentialSoapError()
    {
      $resultArr['responseCode']   = 'E01';
      $resultArr['responseString'] = 'Invalid Credential Access ';
      $resultArr['responseData']   = 'Anda tidak mempunyai ijin untuk mengakses API Server di sistem ini';
      
      return $resultArr;

    }
  } 

  //GetDefaultSoapResponseSuccess
  if ( ! function_exists('GetDefaultSoapResponseSuccess') )
  {
    function GetDefaultSoapResponseSuccess($responseCode = 'S00', $responseString = 'transfer data telah berhasil', $responseData = '')
    {
      $resultArr = array();

      $resultArr['responseCode']   = $responseCode;
      $resultArr['responseString'] = $responseString;
      $resultArr['responseData']   = $responseData;
      
      return $resultArr;

    }
  } 
    
  //ConstructMessageResponseAPI
  if ( ! function_exists('ConstructMessageResponseAPI') )
  {
    function ConstructMessageResponseAPI($messageResponseCode = 'E01', $messageResponseText = 'Unsuccesfully Retrieved Data', $alertType, $isNeedRefresh = false, $refreshURL = '', $glyphicon = '')
    {

      $messageResponseText = ($glyphicon <> '') ?  "<span class='glyphicon glyphicon-".$glyphicon."'>&nbsp;</span>".$messageResponseText : $messageResponseText;

      $resultArr = array('responseCode'     => $messageResponseCode,
                 'responseString'   => $messageResponseText,
                 'responseAlertType'  => $alertType);

      if ($isNeedRefresh)
      {
        $resultArr['isNeedRefresh'] = true;

        $resultArr['refreshURL'] = ($refreshURL <> '') ? $refreshURL : base_url();
        
      }             
          
      return $resultArr;
    }
  } 

  //ConstructMessageResponse
  if ( ! function_exists('ConstructMessageResponse') )
  {
    function ConstructMessageResponse($messageResponseText = 'Unsuccesfully Retrieved Data', $alertType, $isNeedRefresh = false, $refreshURL = '', $glyphicon = '')
    {

      $messageResponseText = ($glyphicon <> '') ?  "<span class='glyphicon glyphicon-".$glyphicon."'>&nbsp;</span>".$messageResponseText : $messageResponseText;

      $messageResponseText = "<div class='alert alert-".$alertType."' id='alertMessage' alert-dismissible' role='alert'>".$messageResponseText."<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> </div>"; 

      return $messageResponseText;
    }
  } 


	//isCRSFVerify

	if ( ! function_exists('isCRSFVerify') )

	{

		function isCRSFVerify()

		{	

			

			$CI=& get_instance();						

			$crsfPostValue 		= $CI->input->post(config_item('csrf_token_name'), true);			
  
			$crsfSessionValue	= isset($_SESSION[config_item('csrf_token_name')]) ? $_SESSION[config_item('csrf_token_name')] : '';

			return $crsfPostValue == $crsfSessionValue;

			

		}

	}


	 ///////////////////////////////////////

  // sanitize.inc.php

  // Sanitization functions for PHP

  // by: Gavin Zuchlinski, Jamie Pratt, Hokkaido

  // webpage: http://libox.net

  // Last modified: September 27, 2003

  //

  // Many thanks to those on the webappsec list for helping me improve these functions

  ///////////////////////////////////////

  // Function list:

  // sanitize_paranoid_string($string) -- input string, returns string stripped of all non 

  //           alphanumeric

  // sanitize_system_string($string) -- input string, returns string stripped of special

  //           characters

  // sanitize_sql_string($string) -- input string, returns string with slashed out quotes

  // sanitize_html_string($string) -- input string, returns string with html replacements

  //           for special characters

  // sanitize_int($integer) -- input integer, returns ONLY the integer (no extraneous 

  //           characters

  // sanitize_float($float) -- input float, returns ONLY the float (no extraneous 

  //           characters)

  // sanitize($input, $flags) -- input any variable, performs sanitization 

  //           functions specified in flags. flags can be bitwise 

  //           combination of PARANOID, SQL, SYSTEM, HTML, INT, FLOAT, LDAP, 

  //           UTF8

  ///////////////////////////////////////

  define("PARANOID", 1);

  define("SQL", 2);

  define("SYSTEM", 4);

  define("HTML", 8);

  define("INT", 16);

  define("FLOAT", 32);

  define("LDAP", 64);

  define("UTF8", 128);



  // internal function for utf8 decoding

  // thanks to Jamie Pratt for noticing that PHP's function is a little 

  // screwy



  if ( ! function_exists('my_utf8_decode') )

  {

    function my_utf8_decode($string)

    {

    return strtr($string, 

      "???????Â¥ÂµÃ€ÃÃ‚ÃƒÃ„Ã…Ã†Ã‡ÃˆÃ‰ÃŠÃ‹ÃŒÃÃŽÃÃÃ‘Ã’Ã“Ã”Ã•Ã–Ã˜Ã™ÃšÃ›ÃœÃÃŸÃ Ã¡Ã¢Ã£Ã¤Ã¥Ã¦Ã§Ã¨Ã©ÃªÃ«Ã¬Ã­Ã®Ã¯Ã°Ã±Ã²Ã³Ã´ÃµÃ¶Ã¸Ã¹ÃºÃ»Ã¼Ã½Ã¿", 

      "SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy");

    }

  }

    

  // paranoid sanitization -- only let the alphanumeric set through

  if ( ! function_exists('sanitize_paranoid_string') )

  {

    function sanitize_paranoid_string($string, $min='', $max='')

    {

      $string = preg_replace("/[^a-zA-Z0-9]/", "", $string);

      $len = strlen($string);

      if((($min != '') && ($len < $min)) || (($max != '') && ($len > $max)))

        return FALSE;

      return $string;

    }

  }

    

  // sanitize a string in prep for passing a single argument to system() (or similar)

  if ( ! function_exists('sanitize_system_string') )

  {

    function sanitize_system_string($string, $min='', $max='')

    {

      $pattern = '/(;|\||`|>|<|&|^|"|'."\n|\r|'".'|{|}|[|]|\)|\()/i'; // no piping, passing possible environment variables ($),

                               // seperate commands, nested execution, file redirection, 

                               // background processing, special commands (backspace, etc.), quotes

                               // newlines, or some other special characters

      $string = preg_replace($pattern, '', $string);

      $string = '"'.preg_replace('/\$/', '\\\$', $string).'"'; //make sure this is only interpretted as ONE argument

      $len = strlen($string);

      if((($min != '') && ($len < $min)) || (($max != '') && ($len > $max)))

        return FALSE;

      return $string;

    }

  }

    

  // sanitize a string for SQL input (simple slash out quotes and slashes)

  if ( ! function_exists('sanitize_sql_string') )

  {

    function sanitize_sql_string($string, $min='', $max='')

    {

      $pattern[0] = '/(\\\\)/';

      $pattern[1] = "/\"/";

      $pattern[2] = "/'/";

      $replacement[0] = '\\\\\\';

      $replacement[1] = '\"';

      $replacement[2] = "\\'";

      $len = strlen($string);

      if((($min != '') && ($len < $min)) || (($max != '') && ($len > $max)))

        return FALSE;

      return preg_replace($pattern, $replacement, $string);

    }

   }

  

  // sanitize a string for SQL input (simple slash out quotes and slashes)

  if ( ! function_exists('sanitize_ldap_string') )

  {

    function sanitize_ldap_string($string, $min='', $max='')

    {

      $pattern = '/(\)|\(|\||&)/';

      $len = strlen($string);

      if((($min != '') && ($len < $min)) || (($max != '') && ($len > $max)))

        return FALSE;

      return preg_replace($pattern, '', $string);

    }

  }

    

  // sanitize a string for HTML (make sure nothing gets interpretted!)

  if ( ! function_exists('sanitize_html_string') )

  {

    function sanitize_html_string($string)

    {

      $pattern[0] = '/\&/';

      $pattern[1] = '/</';

      $pattern[2] = "/>/";

      $pattern[3] = '/\n/';

      $pattern[4] = '/"/';

      $pattern[5] = "/'/";

      $pattern[6] = "/%/";

      $pattern[7] = '/\(/';

      $pattern[8] = '/\)/';

      $pattern[9] = '/\+/';

      $pattern[10] = '/-/';

      $replacement[0] = '&amp;';

      $replacement[1] = '&lt;';

      $replacement[2] = '&gt;';

      $replacement[3] = '<br>';

      $replacement[4] = '&quot;';

      $replacement[5] = '&#39;';

      $replacement[6] = '&#37;';

      $replacement[7] = '&#40;';

      $replacement[8] = '&#41;';

      $replacement[9] = '&#43;';

      $replacement[10] = '&#45;';

      return preg_replace($pattern, $replacement, $string);

    }

  }



  // make int int!

  if ( ! function_exists('sanitize_int') )

  {

    function sanitize_int($integer, $min='', $max='')

    {

      $int = intval($integer);

      if((($min != '') && ($int < $min)) || (($max != '') && ($int > $max)))

        return FALSE;

      return $int;

    }

  }

    

  // make float float!

  if ( ! function_exists('sanitize_float') )

  {

    function sanitize_float($float, $min='', $max='')

    {

      $float = floatval($float);

      if((($min != '') && ($float < $min)) || (($max != '') && ($float > $max)))

        return FALSE;

      return $float;

    }

  }

    

  // glue together all the other functions

  if ( ! function_exists('sanitize') )

  {

    function sanitize($input, $flags, $min='', $max='')

    {

      if($flags & UTF8) $input = my_utf8_decode($input);

      if($flags & PARANOID) $input = sanitize_paranoid_string($input, $min, $max);

      if($flags & INT) $input = sanitize_int($input, $min, $max);

      if($flags & FLOAT) $input = sanitize_float($input, $min, $max);

      if($flags & HTML) $input = sanitize_html_string($input, $min, $max);

      if($flags & SQL) $input = sanitize_sql_string($input, $min, $max);

      if($flags & LDAP) $input = sanitize_ldap_string($input, $min, $max);

      if($flags & SYSTEM) $input = sanitize_system_string($input, $min, $max);

      return $input;

    }

   } 
/* End of file server_helper.php */	
