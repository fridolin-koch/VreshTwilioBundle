<?php
namespace Vresh\TwilioBundle\Twilio\Lib\Rest;

use Vresh\TwilioBundle\Twilio\Lib\InstanceResource;
use Vresh\TwilioBundle\Twilio\Lib\CachingDataProxy;

class Account extends InstanceResource
{
    protected function init()
    {
        $this->setupSubresources(
            'applications',
            'available_phone_numbers',
            'outgoing_caller_ids',
            'calls',
            'conferences',
            'incoming_phone_numbers',
            'notifications',
            'outgoing_callerids',
            'recordings',
            'sms_messages',
            'transcriptions',
            'connect_apps',
            'authorized_connect_apps'
        );

        $this->sandbox = new Sandbox(
            new CachingDataProxy('Sandbox', $this)
        );
    }
}
