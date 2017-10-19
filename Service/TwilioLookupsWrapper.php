<?php

namespace Vresh\TwilioBundle\Service;

/**
 * This file is part of the VreshTwilioBundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Fridolin Koch <info@fridokoch.de>
 */
class TwilioLookupsWrapper extends \Lookups_Services_Twilio
{
    /**
     * @param string $sid
     * @param string $token
     */
    public function __construct($sid, $token)
    {
        parent::__construct($sid, $token);
    }
}
