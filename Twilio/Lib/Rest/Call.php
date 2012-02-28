<?php
namespace Vresh\TwilioBundle\Twilio\Lib\Rest;

use Vresh\TwilioBundle\Twilio\Lib\InstanceResource;

class Call
    extends InstanceResource
{
    public function hangup()
    {
        $this->update('Status', 'completed');
    }

    public function route($url) {
        $this->update('Url', $url);
    }

    protected function init()
    {
        $this->setupSubresources(
            'notifications',
            'recordings'
        );
    }
}
