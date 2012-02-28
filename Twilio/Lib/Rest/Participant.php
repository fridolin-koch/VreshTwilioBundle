<?php
namespace Vresh\TwilioBundle\Twilio\Lib\Rest;

use Vresh\TwilioBundle\Twilio\Lib\InstanceResource;

class Participant extends InstanceResource
{
    public function mute()
    {
        $this->update('Muted', 'true');
    }
}
