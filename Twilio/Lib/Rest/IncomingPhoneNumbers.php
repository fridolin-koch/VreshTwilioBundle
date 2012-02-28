<?php
namespace Vresh\TwilioBundle\Twilio\Lib\Rest;

use Vresh\TwilioBundle\Twilio\Lib\ListResource;

class IncomingPhoneNumbers extends ListResource
{
    function create(array $params = array())
    {
        return parent::_create($params);
    }
}
