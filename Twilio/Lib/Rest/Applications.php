<?php
namespace Vresh\TwilioBundle\Twilio\Lib\Rest;

use Vresh\TwilioBundle\Twilio\Lib\ListResource;

class Applications extends ListResource
{
    public function create($name, array $params = array())
    {
        return parent::_create(array(
            'FriendlyName' => $name
        ) + $params);
    }
}
