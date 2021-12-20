<?php

namespace Drupal\node_json_data\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ApiKeyController.
 */
class ApiKeyController extends ControllerBase {

  /**
   * Getapi.
   *
   * @return string
   *   Return Hello string.
   */
  public function getApi($apikey, $node_id) {
    // Get the config object
	  $config = \Drupal::config('node_json_data.apikey');
	  // Get the key value
	  $key = $config->get('your_api_key');
    $api = $apikey;
    $node_exist = \Drupal\node\Entity\Node::load($node_id);
    $json_array = array(
      'data' => array()
    );
    $node = \Drupal::entityTypeManager()->getStorage('node')->load($node_id);
    $json_array['data'][] = array(
      'type' => $node->get('type')->target_id,
      'id' => $node->get('nid')->value,
      'attributes' => array(
        'title' => $node->get('title')->value,
        'content' => $node->get('body')->value,
      ),
    );
    if($key==$api && !empty($node_exist)){
      return new JsonResponse($json_array);
    }
  }
}
