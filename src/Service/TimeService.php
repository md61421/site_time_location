<?php

namespace Drupal\site_time_location\Service;

use DateTime;
use DateTimeZone;

class TimeService {

  /**
   * Get the current time based on the timezone.
   *
   * @param string|null $timezone
   *   (Optional) The timezone to use for the current time.
   *
   * @return string
   *   The current time formatted as 'H:i d-m-Y'.
   */
  public function getCurrentTime($timezone = NULL) {
    if ($timezone === NULL) {
      // If no timezone is provided, use the default timezone.
      $timezone = date_default_timezone_get();
    }
    
    $date = new DateTime('now', new DateTimeZone($timezone));
    return $date->format('H:i:s d-m-Y');
  }

}
