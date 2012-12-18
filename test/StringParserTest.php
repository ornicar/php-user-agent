<?php

require_once dirname(__FILE__).'/vendor/lime.php';
require_once dirname(__FILE__).'/../lib/phpUserAgentStringParser.php';

$tests = array(
  // Namoroka Ubuntu
  'Mozilla/5.0 (X11; U; Linux x86_64; en-US; rv:1.9.2pre) Gecko/20100116 Ubuntu/9.10 (karmic) Namoroka/3.6pre'
  => array('firefox', '3.6', 'linux', 'gecko'),

  // Namoroka Mac
  'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.6; en-US; rv:1.9.2) Gecko/20100105 Firefox/3.6'
  => array('firefox', '3.6', 'macintosh', 'gecko'),

  // Chrome Mac
  'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_2; fr-fr) AppleWebKit/531.21.8 (KHTML, like Gecko) Version/4.0.4 Safari/531.21.10'
  => array('chrome', '4.0', 'macintosh', 'webkit'),

  //Safari Mac
  'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_2; fr-fr) AppleWebKit/531.21.8 (KHTML, like Gecko) Version/4.0.4 Safari/531.21.10'
  => array('safari', '4.0', 'macintosh', 'webkit'),

  // Opera 9 Windows
  'Opera/9.61 (Windows NT 6.0; U; en) Presto/2.1.1'
  => array('opera', '9.61', 'windows', 'presto'),

  // Opera 10 Windows
  'Opera/9.80 (Windows NT 5.1; U; en) Presto/2.2.15 Version/10.10'
  => array('opera', '10.10', 'windows', 'presto'),

  // Firefox Linux
  'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.0.17) Gecko/2010010604 Linux Mint/7 (Gloria) Firefox/3.0.17'
  => array('firefox', '3.0', 'linux', 'gecko'),

  // Firefox Windows
  'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-GB; rv:1.9.1.7) Gecko/20091221 Firefox/3.5.7 GTB6 (.NET CLR 3.5.30729)'
  => array('firefox', '3.5', 'windows', 'gecko'),

  // Firefox OSX
  'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.6; en-US; rv:1.9.1.8) Gecko/20100202 Firefox/3.5.8'
  => array('firefox', '3.5', 'macintosh', 'gecko'),

  // Chrome Linux
  'Mozilla/5.0 (X11; U; Linux i686; en-US) AppleWebKit/532.5 (KHTML, like Gecko) Chrome/4.0.249.43 Safari/532.5'
  => array('chrome', '4.0', 'linux', 'webkit'),

  // Speedy Spider
  'Speedy Spider (http://www.entireweb.com/about/search_tech/speedy_spider/)'
  => array(null, null, null, null),

  // Minefield Mac
  'Gecko 20100113Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.3a1pre) Gecko/20100113 Minefield/3.7a1pre'
  => array('firefox', '3.7', 'macintosh', 'gecko'),

  // IE7 Windows
  'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; Trident/4.0; GTB6; SLCC1; .NET CLR 2.0.50727; OfficeLiveConnector.1.3; OfficeLivePatch.0.0; .NET CLR 3.5.30729; InfoPath.2; .NET CLR 3.0.30729; MSOffice 12)'
  => array('msie', '7.0', 'windows', 'trident'),

  // IE6 Windows
  'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; DigExt)'
  => array('msie', '6.0', 'windows', 'trident'),

  // Feedfetcher Google
  'Feedfetcher-Google; (+http://www.google.com/feedfetcher.html; 2 subscribers; feed-id=6924676383167400434)'
  => array(null, null, null, null),

  // Google Bot
  'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'
  => array('googlebot', '2.1', null, null),

  // MSN Bot
  'msnbot/2.0b (+http://search.msn.com/msnbot.htm)'
  => array('msnbot', '2.0', null, null),

  // Yahoo Bot
  'Mozilla/5.0 (compatible; Yahoo! Slurp; http://help.yahoo.com/help/us/ysearch/slurp)'
  => array('yahoobot', null, null, null),

  // Iphone
  'Mozilla/5.0 (iPhone; U; CPU iPhone OS 3_1_2 like Mac OS X; de-de) AppleWebKit/528.18 (KHTML, like Gecko) Mobile/7D11'
  => array('applewebkit', '528.18', 'iphone', 'webkit'),

    // Motorola Xoom
    'Mozilla/5.0 (Linux; U; Android 3.0; en-us; Xoom Build/HRI39) AppleWebKit/534.13 (KHTML, like Gecko) Version/4.0 Safari/534.13'                                 =>
    array('android', '3.0', 'android', 'webkit'),

    // Samsung Galaxy Tab
    'Mozilla/5.0 (Linux U Android 2.2 es-es GT-P1000 Build/FROYO) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1'                            =>
    array('android', '2.2', 'android', 'webkit'),

    // Google Nexus
    'Mozilla/5.0 (Linux; U; Android 2.2; en-us; Nexus One Build/FRF91) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1'                       =>
    array('android', '2.2', 'android', 'webkit'),

    // HTC Desire

    'Mozilla/5.0 (Linux; U; Android 2.1-update1; de-de; HTC Desire 1.19.161.5 Build/ERE27) AppleWebKit/530.17 (KHTML, like Gecko) Version/4.0 Mobile Safari/530.17' =>
    array('android', '2.1', 'android', 'webkit'),

    'Mozilla/5.0 (Linux; U; Android 2.3.6; ru-ru; GT-B5512 Build/GINGERBREAD) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1' =>
    array('android', '2.3.6', 'android', 'webkit'),

    // Nexus 7
    'Mozilla/5.0 (Linux; Android 4.1.1; Nexus 7 Build/JRO03D) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.166  Safari/535.19' =>
    array('android', '4.1.1', 'android', 'webkit'),
);

$t = new lime_test(count($tests));

$parser = new phpUserAgentStringParser();

foreach($tests as $userAgentString => $userAgentArray)
{
  $expected = array(
    'string'            => $parser->cleanUserAgentString($userAgentString),
    'browser_name'      => $userAgentArray[0],
    'browser_version'   => $userAgentArray[1],
    'operating_system'  => $userAgentArray[2],
    'engine'            => $userAgentArray[3]
  );

  $result = $parser->parse($userAgentString);
  
  $t->is_deeply($result, $expected, $userAgentString.' -> '.implode(', ', $result));
}
