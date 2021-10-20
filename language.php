<?php

  // Check browser language and redirect
  $supportedLanguages = [
    "en" => ["English", "en_US"]
  ];

  $URI = explode("/", value(Main, URI));

  if (array_key_exists($URI[1], $supportedLanguages)) {
    $lang = $URI[1];
  } else {
    $lang = preferred_language($supportedLanguages, $_SERVER["HTTP_ACCEPT_LANGUAGE"]);
    $lang = isset($lang) ? $lang : 'en'; 
  }

  Main::set(LANGUAGE,  $supportedLanguages[$lang][1]);

  if (0 === strcmp(value(Main, URI), "/")) {
    $target = "/$lang/";
    if (isset($_SERVER["QUERY_STRING"])) {
      $target .= "?".$_SERVER["QUERY_STRING"];
    }

    relocate($target, false, true);
    exit;
  } else {
    if (!array_key_exists($URI[1], $supportedLanguages)) {
      if ((stripos($URI[1], "=") === false) && (0 !== strcmp($URI[1], "sitemap.xml"))) {
        array_splice($URI, 1, 1, $lang);

        $target = implode("/", $URI);
        if (isset($_SERVER["QUERY_STRING"])) {
          $target .= "?".$_SERVER["QUERY_STRING"];
        }

        relocate($target, false, true);
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

  // preferred_language source: https://gist.github.com/Xeoncross/dc2ebf017676ae946082
  function preferred_language($available_languages, $http_accept_language) {
    $result = null;

    $available_languages = array_keys($available_languages);
    $available_languages = array_flip($available_languages);

    $langs = [];
    if (false !== preg_match_all('~([\w-]+)(?:[^,\d]+([\d.]+))?~', strtolower($http_accept_language), $matches, PREG_SET_ORDER)) {
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

      if(0 < count($langs)) {
        arsort($langs);
        $result = key($langs); // We don't need the whole array of choices since we have a match
      }
    }

    return $result;
  }

  function getLanguagePicker($languages) {
    $currentURI = explode("/", value(Main, URI));
    unset($currentURI[1]);
    $currentURI = implode("/", $currentURI);
    $html = "";
    foreach ($languages as $short => $name) {
      $html .= "<a href=\"/".html($short.$currentURI)."\">".html($name[0])."</a> · ";
    }
    return rtrim($html, " · ");
  }

