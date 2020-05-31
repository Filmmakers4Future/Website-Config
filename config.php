<?php

  // prevent script from getting called directly
  if (!defined("URLAUBE")) { die(""); }

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
  Plugins::set("PODLOVE_CONFIG_SPOTIFY_ID", "3JUfnybPrKH0AJ7aN39Slc");
  Plugins::set("PODLOVE_APPLE_PODCAST_ID", "id1516179139");
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
  Plugins::set("MAILGUN_AUTH",             "***REMOVED***");
  Plugins::set("MAILGUN_ENDPOINT",         "https://api.eu.mailgun.net/v3/mg.filmmakersforfuture.org/messages");
  Plugins::set("MAILGUN_FROM",             "Filmmakers for Future <message@mg.filmmakersforfuture.org>");
  Plugins::set("NEWSLETTER_SEND_PASSWORD", "***REMOVED***");
  Plugins::set("DB_HOST",                  "localhost");
  Plugins::set("DB_PORT",                  3306);
  Plugins::set("DB_NAME",                  "***REMOVED***");
  Plugins::set("DB_USER",                  "***REMOVED***");
  Plugins::set("DB_PASS",                  "***REMOVED***");
  Plugins::set("CONTACT_SUBJECTS",         [["{%MAIL}"    => "contact@filmmakersforfuture.org",
                                             "{%SUBJECT}" => "General"],
                                            ["{%MAIL}"    => "contact@filmmakersforfuture.org",
                                             "{%SUBJECT}" => "Update signature data"],
                                            ["{%MAIL}"    => "groups@filmmakersforfuture.org",
                                             "{%SUBJECT}" => "Working Group Invite"],
                                            ["{%MAIL}"    => "videos@filmmakersforfuture.org",
                                             "{%SUBJECT}" => "Submit video"],
                                            ["{%MAIL}"    => "collaboration@filmmakersforfuture.org",
                                             "{%SUBJECT}" => "Collaboration"],
                                            ["{%MAIL}"    => "privacy@filmmakersforfuture.org",
                                             "{%SUBJECT}" => "Privacy related"]]);
  Plugins::set("VIDEOS",                    ["related_videos" => [["category" => "FRIDAYS FOR FUTURE",
                                                                   "hoster"   => "YouTube",
                                                                   "language" => "English + Subtitles",
                                                                   "name"     => "Monster",
                                                                   "thumb"    => "/user/uploads/img/videos/monster.jpg",
                                                                   "url"      => "https://www.youtube-nocookie.com/embed/E73ag2Fvi3o?cc_load_policy=1&cc_lang_pref=en&modestbranding=1&rel=0",
                                                                   "class" => "col-lg-4 col-sm-6"],
                                                                  ["category" => "FRIDAYS FOR FUTURE",
                                                                   "hoster"   => "YouTube",
                                                                   "language" => "German + Subtitles",
                                                                   "name"     => "9 months of protest",
                                                                   "thumb"    => "/user/uploads/img/videos/9monthsfff.jpg",
                                                                   "url"      => "https://www.youtube-nocookie.com/embed/-rsHwf56S3s?cc_load_policy=1&cc_lang_pref=en&modestbranding=1&rel=0",
                                                                   "class" => "col-lg-4 col-sm-6"]],
                                             "statements" => [["category" => "Statements",
                                                                   "hoster"   => "YouTube",
                                                                   "language" => "German + Subtitles",
                                                                   "name"     => "Lea van Acken",
                                                                   "thumb"    => "/user/uploads/img/videos/statements/leavanacken.jpg",
                                                                   "url"      => "https://www.youtube-nocookie.com/embed?listType=playlist&list=PLe6QMNKTPPoRaOM8ELolJXxV22QtIjrbu&cc_load_policy=1&cc_lang_pref=en&modestbranding=1&rel=0",
                                                                   "class" => "col-lg-3 col-md-4 col-sm-6"]]]);

  // theme configuration
  Themes::set("copyright_html", fhtml("<div class=\"small text-center text-muted\">%s</div>".NL.
                                      "<div class=\"small text-center\">".NL.
                                      "  <p class=\"text-muted\">".NL.
                                      "    <a href=\"%s\">%s</a> · <a href=\"%s\">%s</a> · <a href=\"%s\">%s</a><br>".NL.
                                      "    <a href=\"%s\">%s</a> · <a href=\"%s\">%s</a>".NL.
                                      "  </p>".NL.
                                      "  <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"%s\" title=\"%s\"><i style=\"font-size:2.5rem\" class=\"text-secondary fa fa-instagram mx-2\" aria-hidden=\"true\"></i></a>".NL.
                                      "  <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"%s\" title=\"%s\"><i style=\"font-size:2.5rem\" class=\"text-secondary fa fa-youtube mx-2\" aria-hidden=\"true\"></i></a>".NL.
                                      "  <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"%s\" title=\"%s\"><i style=\"font-size:2.5rem\" class=\"text-secondary fa fa-twitter mx-2\" aria-hidden=\"true\"></i></a>".NL.
                                      "  <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"%s\" title=\"%s\"><i style=\"font-size:2.5rem\" class=\"text-secondary fa fa-facebook mx-2\" aria-hidden=\"true\"></i></a>".NL.
                                      "</div>",
                                      "#Filmmakers4Future",
                                      "/legal/",
                                      "Legal Disclosure",
                                      "/privacy/",
                                      "Privacy Policy",
                                      "/contact/",
                                      "Contact",
                                      "/newsletter/",
                                      "Manage Newsletter",
                                      "/verify/",
                                      "Verify Signature",
                                      "https://www.instagram.com/filmmakers4future/",
                                      "Filmmakers4Future on Instagram",
                                      "https://www.youtube.com/channel/UC-SNT4gGFgRiFb2iBccJDkw/",
                                      "Filmmakers4Future on YouTube",
                                      "https://twitter.com/Filmmakers4F",
                                      "Filmmakers4Future on Twitter",
                                      "https://facebook.com/filmmakersforfuture",
                                      "Filmmakers4Future on Facebook"));
  Themes::set(MENU,             [[TITLE => "Statement",
                                  URI   => "/#statement"],
                                 [TITLE => "Demands",
                                  URI   => "/demands/"],
                                 [TITLE => "Signatures",
                                  URI   => "/signatures/"],
                                  [TITLE => "Green Filmmaking",
                                    URI   => "#",
                                    MENU  => [[TITLE => "Getting Started",
                                               URI   => "/greenfilmmaking/"],
                                              [TITLE => "Podcast - Sustainability in Film",
                                               URI   => "/podcast/"],
                                              [TITLE => "Green Production Map",
                                               URI   => "/map/"],
                                              [TITLE => "Green Production Database",
                                               URI   => "https://wiki.fm4f.org"]]],
                                 [TITLE => "Videos",
                                  URI   => "/videos/"],
                                 [TITLE => "Participate",
                                  URI   => "/participate/"],
                                 [TITLE => "Sign the Statement",
                                  URI   => "/#sign"]]);
