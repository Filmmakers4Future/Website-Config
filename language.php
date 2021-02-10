<?php
  
  // Check browser language and redirect
  $supportedLanguages = [
    "en" => ["English", "en_US"]
  ];
  
  $URI = explode("/", $_SERVER['REQUEST_URI']);
  
  if (in_array($URI[1], array_keys($supportedLanguages))) {
    $lang = $URI[1];
  } else {
    $lang = prefered_language($supportedLanguages, $_SERVER["HTTP_ACCEPT_LANGUAGE"]);
    $lang = isset($lang) ? $lang : 'en'; 
  }

  Main::set(LANGUAGE,  $supportedLanguages[$lang][1]);
  
  if ($_SERVER['REQUEST_URI'] == "/") {
    header("Location: /".$lang."/");
    exit;
  } else {
    if (!in_array($URI[1], array_keys($supportedLanguages))) {
      if (stripos($URI[1], "=") === false and $URI[1] != "sitemap.xml") {
        array_splice( $URI, 1, 0, $lang );
        header("Location: ".implode("/", $URI));
        exit;
      }
    }
    
  }
  
  // Check choosen language and choose correct config files
  switch ($lang) {
    default:
      include 'language/en/videos.php';
      include 'language/en/theme.php';
      include 'language/en/calendar.php';
      break;
  }
  
  // prefered_language source: https://gist.github.com/Xeoncross/dc2ebf017676ae946082
  function prefered_language($available_languages, $http_accept_language) {
    
    $available_languages = array_keys($available_languages);
    $available_languages = array_flip($available_languages);
    
    $langs = array();
    preg_match_all('~([\w-]+)(?:[^,\d]+([\d.]+))?~', strtolower($http_accept_language), $matches, PREG_SET_ORDER);
    foreach($matches as $match) {
      
      list($a, $b) = explode('-', $match[1]) + array('', '');
      $value = isset($match[2]) ? (float) $match[2] : 1.0;
      
      if(isset($available_languages[$match[1]])) {
        $langs[$match[1]] = $value;
        continue;
      }
      
      if(isset($available_languages[$a])) {
        $langs[$a] = $value - 0.1;
      }
      
    }
    if($langs) {
      arsort($langs);
      return key($langs); // We don't need the whole array of choices since we have a match
    }
  }
  
  function getLanguagePicker($languages) {
    $currentURI = explode("/", $_SERVER['REQUEST_URI']);
    unset($currentURI[1]);
    $currentURI = implode("/", $currentURI);
    $html = "";
    foreach ($languages as $short => $name) {
      $html .= "<a href=\"/".$short.$currentURI."\">".$name[0]."</a> · ";
    }
    return rtrim($html, " · ");
  }
  