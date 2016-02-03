<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi;

use GuzzleHttp\Client as GuzzleClient;
use Hussainweb\DrupalApi\Entity\Collection\EntityCollection;
use Hussainweb\DrupalApi\Entity\Entity;
use Hussainweb\DrupalApi\Request\Request;

class Client extends GuzzleClient
{

    /**
     * Send an API request and wrap it in the corresponding Entity object.
     *
     * @param \Hussainweb\DrupalApi\Request\Request $request
     *   The request to send.
     *
     * @return Entity|EntityCollection
     *   The entity or the collection for the request.
     */
    public function getEntity(Request $request)
    {
        $response = $this->send($request);
        $entity_class = $request->getEntityClass();
        return $entity_class::fromResponse($response);
    }
}
