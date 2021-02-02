<?php

  // theme configuration
  Themes::set("copyright_html", fhtml("<div class=\"small text-center text-muted\">%s</div>".NL.
                                      "<div class=\"small text-center\">".NL.
                                      "  <p class=\"text-muted\">".NL.
                                      "    <a href=\"%s\">%s</a> · <a href=\"%s\">%s</a> · <a href=\"%s\">%s</a> · <a href=\"%s\">%s</a><br>".NL.
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
                                      "/pressreleases/",
                                      "Press Releases",
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
  Themes::set(MENU,             [[TITLE => "Events",
                                  URI   => "/events/"],
                                 [TITLE => "Demands",
                                  URI   => "/demands/"],
                                 [TITLE => "Signatures",
                                  URI   => "/signatures/"],
                                 [TITLE => "Green Filmmaking",
                                  URI   => "#",
                                  MENU  => [[TITLE => "Resources"],
                                            [TITLE => "Getting Started",
                                              URI   => "/greenfilmmaking/"],
                                            [TITLE => "Sustainability in Film - Podcast",
                                              URI   => "/podcast/"],
                                            [TITLE => "divider"],
                                            [TITLE => "Tools"],
                                            [TITLE => "Green Production Map",
                                              URI   => "/map/"],
                                            [TITLE => "Green Production Database",
                                              URI   => "https://wiki.fm4f.org"]]],
                                 [TITLE => "Videos",
                                  URI   => "/videos/"],
                                 [TITLE => "Participate",
                                  URI   => "#",
                                  MENU  => [[TITLE => "Groups"],
                                            [TITLE => "About the Groups",
                                             URI   => "/groups/"],
                                            [TITLE => "Login",
                                             URI   => "https://groups.fm4f.org/"],
                                            [TITLE => "divider"],
                                            [TITLE => "Tools"],
                                            [TITLE => "Invite your Colleagues",
                                             URI  => "/invite/"],
                                            [TITLE => "divider"],
                                            [TITLE => "Miscellaneous"],
                                            [TITLE => "Graphics",
                                             URI  => "/graphics/"],
                                            [TITLE => "Crew United",
                                             URI => "/crew-united/"],
                                            [TITLE => "Website",
                                             URI => "/website/"],
                                  ]],
                                 [TITLE => "Sign the Statement",
                                  URI   => "/#sign"]]);
