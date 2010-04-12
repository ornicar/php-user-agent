# PHP User Agent

Browser detection in PHP5.
Uses a simple and fast algorithm to recognize major browsers.

## Overview

    $userAgent = new phpUserAgent();

    $userAgent->getBrowserName()      // lirefox
    $userAgent->getBrowserVersion()   // 3.6
    $userAgent->getOperatingSystem()  // linux

### Why you should use it

PHP provides a native function to detect user browser: [get_browser()](http://us2.php.net/manual/en/function.get-browser.php).
get_browser() requires the "browscap.ini" file which is 300KB+.
Loading and processing this file impact script performance.
And sometimes, the production server just doesn't provide it.

Although get_browser() surely provides excellent detection results, in most
cases a much simpler method can be just as effective.
php-user-agent has the advantage of being compact and easy to extend.
It is performant as well, since it doesn't do any iteration or recursion.

Tests, code and documentation in fast progress.