<?php

namespace Drupal\node_json_data\Tests;

use Drupal\simpletest\WebTestBase;
use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * Provides automated tests for the node_json_data module.
 */
class ApiKeyControllerTest extends WebTestBase {

  /**
   * Drupal\Core\Config\ConfigFactoryInterface definition.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;


  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return [
      'name' => "node_json_data ApiKeyController's controller functionality",
      'description' => 'Test Unit for module node_json_data and controller ApiKeyController.',
      'group' => 'Other',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests node_json_data functionality.
   */
  public function testApiKeyController() {
    // Check that the basic functions of module node_json_data.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via Drupal Console.');
  }

}
