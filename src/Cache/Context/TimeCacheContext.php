<?php

namespace Drupal\site_time_location\Cache\Context;

use Drupal\Core\Cache\Context\CacheContextInterface;
use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Datetime\DrupalDateTime;

/**
 * Defines the TimeCacheContext service, for "per second" caching.
 *
 * Cache context ID: 'time'.
 */
class TimeCacheContext implements CacheContextInterface {

  /**
   * {@inheritdoc}
   */
  public static function getLabel() {
    return t('Time cache context');
  }

  /**
   * {@inheritdoc}
   */
  public function getContext() {
    // Return the current time formatted to second precision.
    return (new DrupalDateTime())->format('Y-m-d H:i:s');
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheableMetadata() {
    // Attach no cacheable metadata.
    return new CacheableMetadata();
  }

}
