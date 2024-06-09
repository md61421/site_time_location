<?php

namespace Drupal\site_time_location\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\site_time_location\Service\TimeService;

/**
 * Provides a 'TimeLocation' block.
 *
 * @Block(
 *   id = "time_location_block",
 *   admin_label = @Translation("Time Location Block"),
 * )
 */
class TimeLocationBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * The time service.
   *
   * @var \Drupal\site_time_location\Service\TimeService
   */
  protected $timeService;

  /**
   * Constructs a new TimeLocationBlock.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   * @param \Drupal\site_time_location\Service\TimeService $time_service
   *   The time service.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ConfigFactoryInterface $config_factory, TimeService $time_service) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->configFactory = $config_factory;
    $this->timeService = $time_service;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('config.factory'),
      $container->get('site_time_location.time_service')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->configFactory->get('site_time_location.settings');
    $country = $config->get('country');
    $city = $config->get('city');
    $timezone = $config->get('timezone');

    // Pass the timezone to JavaScript
    $build = [
      '#theme' => 'time_location_block',
      '#country' => $country,
      '#city' => $city,
      '#timezone' => $timezone,
      '#attached' => [
        'library' => [
          'site_time_location/update_time',
        ],
        'drupalSettings' => [
          'siteTimeLocation' => [
            'timezone' => $timezone,
          ],
        ],
      ],
      '#cache' => [
        'contexts' => ['time'],
      ],
    ];

    return $build;
  }

}
