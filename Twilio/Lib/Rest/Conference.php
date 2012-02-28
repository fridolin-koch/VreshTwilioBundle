<?php
namespace Vresh\TwilioBundle\Twilio\Lib\Rest;

use Vresh\TwilioBundle\Twilio\Lib\InstanceResource;

class Conference extends InstanceResource
{
    protected function init()
    {
        $this->setupSubresources(
            'participants'
        );
    }
}
