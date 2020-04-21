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

  // handler configuration
  Handlers::set("podcast_author",      "Filmmakers for Future");
  Handlers::set("podcast_category",    "Education");
  Handlers::set("podcast_description", "This is the general podcast description of the Filmmakers for Future podcast.");
  Handlers::set("podcast_explicit",    false);
  Handlers::set("podcast_image",       "https://lexovo.de/user/uploads/lexovode_image.png");
  Handlers::set("podcast_owner_email", "contact@filmmakersforfuture.org");
  Handlers::set("podcast_owner_name",  "Filmmakers for Future");
  Handlers::set("podcast_type",        "episodic");

  // theme configuration
  Themes::set("copyright_html",  fhtml("<div class=\"small text-center text-muted\">%s</div>".NL.
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
                                       "/legal",
                                       "Legal Disclosure",
                                       "/privacy",
                                       "Privacy Policy",
                                       "/contact",
                                       "Contact",
                                       "/newsletter",
                                       "Manage Newsletter",
                                       "/verify",
                                       "Verify Signature",
                                       "https://www.instagram.com/filmmakers4future/",
                                       "Filmmakers4Future on Instagram",
                                       "https://www.youtube.com/channel/UC-SNT4gGFgRiFb2iBccJDkw/",
                                       "Filmmakers4Future on YouTube",
                                       "https://twitter.com/Filmmakers4F",
                                       "Filmmakers4Future on Twitter",
                                       "https://facebook.com/filmmakersforfuture",
                                       "Filmmakers4Future on Facebook"));
  Themes::set("header_name",     "Blog");
  Themes::set("header_sentence", "Green film production in audio form! yeay");
  Themes::set(MENU,              [[TITLE => "Statement",
                                   URI   => "/#statement"],
                                  [TITLE => "Demands",
                                   URI   => "/demands"],
                                  [TITLE => "Signatures",
                                   URI   => "/signatures"],
                                  [TITLE => "Green Filmmaking",
                                   URI   => "/greenfilmmaking"],
                                  [TITLE => "Videos",
                                   URI   => "/videos"],
                                  [TITLE => "Participate",
                                   URI   => "/participate"],
#                                  [TITLE => "Services",
#                                   URI   => "#",
#                                   MENU  => [[TITLE => "Action",
#                                              URI   => "#"],
#                                             [TITLE => "Another action",
#                                              URI   => "#"],
#                                             [TITLE => "Something else here",
#                                              URI   => "#"]]],
                                  [TITLE => "Sign the Statement",
                                   URI   => "/#sign"]]);
  Themes::set(SITENAME,          "Filmmakers for Future");
  Themes::set(SITESLOGAN,        "Blog");
  Themes::set(TIMEFORMAT,        "d F Y");

  // include the configuration for the Filmmakers for Future handler
  function configure_fm4fhandler() {
    require_once(__DIR__."/fm4fhandler.php");
  }
  Plugins::register(null, "configure_fm4fhandler", BEFORE_HANDLER);

