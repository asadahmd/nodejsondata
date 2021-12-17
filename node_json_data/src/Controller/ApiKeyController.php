<?php

namespace Drupal\node_json_data\Controller;

use Drupal\Core\Controller\ControllerBase;

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
    if($key==$api && !empty($node_exist)){
      return [
        '#type' => 'markup',
        '#markup' => $this->t('api key matched and the given node is exist in the system'),
      ];

    }elseif ($key==$api && empty($node_exist)) {
      return [
        '#type' => 'markup',
        '#markup' => $this->t('api key matched but given node is not exist in the system'),
      ];
    }elseif ($key!==$api && !empty($node_exist)) {
      return [
        '#type' => 'markup',
        '#markup' => $this->t('api key does not matched but node is exist in the system'),
      ];
    }else {
      return [
        '#type' => 'markup',
        '#markup' => $this->t('api key does not matched and node is not exist in the system')
      ];
    }
  }

}
