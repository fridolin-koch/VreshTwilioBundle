<?php

namespace Vresh\TwilioBundle\Twilio\Lib\Rest;

use Vresh\TwilioBundle\Twilio\Lib\ListResource;

class ConnectApps extends ListResource
{
    public function create($name, array $params = array())
    {
        throw new \BadMethodCallException('Not allowed');
    }
}
