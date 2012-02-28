<?php
namespace Vresh\TwilioBundle\Twilio\Lib\Rest;

use Vresh\TwilioBundle\Twilio\Lib\ListResource;

class SmsMessages extends ListResource
{
    public function getSchema()
    {
        return array(
            'class' => 'Vresh\TwilioBundle\Twilio\Lib\SmsMessages',
            'basename' => 'SMS/Messages',
            'instance' => 'Vresh\TwilioBundle\Twilio\Lib\SmsMessage',
            'list' => 'sms_messages',
        );
    }

    function create($from, $to, $body, array $params = array())
    {
        return parent::_create(array(
            'From' => $from,
            'To' => $to,
            'Body' => $body
        ) + $params);
    }
}
