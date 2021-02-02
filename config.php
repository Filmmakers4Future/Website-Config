<?php

  // prevent script from getting called directly
  if (!defined("URLAUBE")) { die(""); }

  include 'secrets/secrets.php';
  
  include 'language/en/videos.php';
  include 'language/en/theme.php';
  include 'language/en/calendar.php';
  
  // !!! COMMENT THIS OUT FOR PRODUCTION
  //Main::set(DEBUGMODE, true);
  //Main::set(LOGLEVEL,  Logging::INFO);

  // main configuration
  Main::set(CACHE,     true); // !!! SET THIS TO TRUE FOR PRODUCTION
  Main::set(HOSTNAME,  "filmmakersforfuture.org");
  Main::set(LANGUAGE,  "en_US");
  Main::set(PORT,      "443");
  Main::set(PROTOCOL,  "https://");
  Main::set(ROOTURI,   "/");
  Main::set(THEMENAME, FM4FTheme::class);

  // Podlove plugin configuration
  Plugins::set("PODLOVE_FEED_URL", "https://podcast.fm4f.org/feed.xml");
  Plugins::set("PODLOVE_SPOTIFY_ID", "3JUfnybPrKH0AJ7aN39Slc");
  Plugins::set("PODLOVE_APPLE_PODCAST_ID", "id1516179139");
  Plugins::set("PODLOVE_GOOGLE_PODCAST", True);
  Plugins::set("PODLOVE_POCKET_CASTS", True);
  Plugins::set("PODLOVE_YOUTUBE_ID", "UC-SNT4gGFgRiFb2iBccJDkw");
  Plugins::set("PODLOVE_THEME_COLORS", [
          "brand" => "#1DA64AFF",
          "brandDark" => "#512F9BFF",
          "brandDarkest" => "#1A3A4A",
          "brandLightest" => "#F0F5F1FF",
          "shadeDark" => "#807E7C",
          "shadeBase" => "#807E7C",
          "contrast" => "#000",
          "alt" => "#fff"
        ]);
  
  // FM4F plugin configuration
  Plugins::set("ADMIN_MAIL",               "verification@filmmakersforfuture.org");
  Plugins::set("MAILGUN_AUTH",             $MAILGUN_AUTH);
  Plugins::set("MAILGUN_ENDPOINT",         "https://api.eu.mailgun.net/v3/mg.filmmakersforfuture.org/messages");
  Plugins::set("MAILGUN_FROM",             "Filmmakers for Future <message@mg.filmmakersforfuture.org>");
  Plugins::set("NEWSLETTER_SEND_PASSWORD", $NEWSLETTER_SEND_PASSWORD);
  Plugins::set("DB_HOST",                  "localhost");
  Plugins::set("DB_PORT",                  3306);
  Plugins::set("DB_NAME",                  $DB_NAME);
  Plugins::set("DB_USER",                  $DB_USER);
  Plugins::set("DB_PASS",                  $DB_PASS);
  Plugins::set("CONTACT_SUBJECTS",         [["{%MAIL}"    => "contact@filmmakersforfuture.org",
                                             "{%SUBJECT}" => "General"],
                                            ["{%MAIL}"    => "press@filmmakersforfuture.org",
                                             "{%SUBJECT}" => "Press related inquiries"],
                                            ["{%MAIL}"    => "podcast@filmmakersforfuture.org",
                                             "{%SUBJECT}" => "Podcast"],
                                            ["{%MAIL}"    => "signatures@filmmakersforfuture.org",
                                             "{%SUBJECT}" => "Update signature data"],
                                            ["{%MAIL}"    => "videos@filmmakersforfuture.org",
                                             "{%SUBJECT}" => "Submit video"],
                                            ["{%MAIL}"    => "collaboration@filmmakersforfuture.org",
                                             "{%SUBJECT}" => "Collaboration"],
                                            ["{%MAIL}"    => "privacy@filmmakersforfuture.org",
                                             "{%SUBJECT}" => "Privacy related"]]);