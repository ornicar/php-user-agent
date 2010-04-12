<?php

/**
 * Simple PHP User agent
 *
 * @link      http://github.com/ornicar/php-user-agent
 * @version   1.0
 * @author    Thibault Duplessis <thibault.duplessis at gmail dot com>
 * @license   MIT License
 *
 * Documentation: http://github.com/ornicar/php-user-agent/blob/master/README.markdown
 * Tickets:       http://github.com/ornicar/php-user-agent/issues
 */

require_once(dirname(__FILE__).'/phpUserAgentStringParser.php');

class phpUserAgent
{
  protected $browserName;
  protected $browserVersion;
  protected $operatingSystem;

  public function __construct($userAgentString = null, phpUserAgentStringParser $userAgentStringParser = null)
  {
    if(null === $userAgentStringParser)
    {
      $userAgentStringParser = new phpUserAgentStringParser();
    }

    $this->fromArray($userAgentStringParser->parse($userAgentString));
  }

  /**
   * Get the browser name
   *
   * @return string the browser name
   */
  public function getBrowserName()
  {
    return $this->browserName;
  }

  /**
   * Get the browser version
   *
   * @return string the browser version
   */
  public function getBrowserVersion()
  {
    return $this->browserVersion;
  }

  /**
   * Get the operating system name
   *
   * @return string the operating system name
   */
  public function getOperatingSystem()
  {
    return $this->operatingSystem;
  }

  /**
   * Tell whether this user agent is unknown or not
   *
   * @return boolean  true if this user agent is unknown, false otherwise
   */
  public function isUnknown()
  {
    return empty($this->browserName);
  }

  public function fromArray(array $data)
  {
    $this->browserName      = $data['browser_name'];
    $this->browserVersion   = $data['browser_version'];
    $this->operatingSystem  = $data['operating_system'];
  }
}