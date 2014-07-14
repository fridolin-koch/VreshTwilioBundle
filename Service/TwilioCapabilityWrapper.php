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
class TwilioCapabilityWrapper extends \Services_Twilio_Capability
{
    /**
     * @param string $sid
     * @param string $token
     */
    public function __construct($sid, $token)
    {
        parent::__construct($sid, $token);
    }

    /**
     * Returns a new \Services_Twilio_Capability instance from the given parameters
     *
     * @param      $sid
     * @param      $token
     *
     * @return \Services_Twilio_Capability
     */
    public function createInstance($sid ,$token)
    {
        return new \Services_Twilio_Capability($sid, $token);
    }

}
