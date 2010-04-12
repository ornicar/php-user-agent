<?php

require_once dirname(__FILE__).'/vendor/lime.php';
require_once dirname(__FILE__).'/../lib/phpUserAgent.php';

$t = new lime_test(8);

$userAgentString = 'Mozilla/5.0 (X11; U; Linux x86_64; en-US; rv:1.9.2pre) Gecko/20100116 Ubuntu/9.10 (karmic) Namoroka/3.6pre';
$userAgent = new phpUserAgent($userAgentString);

$t->is($userAgent->getBrowserName(), 'firefox', '$userAgent->getBrowserName() works');

$t->is($userAgent->getBrowserVersion(), '3.6', '$userAgent->getBrowserVersion() works');

$t->is($userAgent->getOperatingSystem(), 'linux', '$userAgent->getOperatingSystem() works');

$t->is($userAgent->isUnknown(), false, 'User agent is not unknown');

$userAgent = new phpUserAgent('hmm...');

$t->is($userAgent->getBrowserName(), null, '$userAgent->getBrowserName() works');

$t->is($userAgent->getBrowserVersion(), null, '$userAgent->getBrowserVersion() works');

$t->is($userAgent->getOperatingSystem(), null, '$userAgent->getOperatingSystem() works');

$t->is($userAgent->isUnknown(), true, 'User agent is unknown');