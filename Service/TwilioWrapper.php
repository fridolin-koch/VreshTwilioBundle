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
class TwilioWrapper extends \Services_Twilio
{
    /**
     * @param string $sid
     * @param string $token
     * @param null   $version
     * @param int    $retryAttempts
     */
    public function __construct($sid, $token, $version = null, $retryAttempts = 1)
    {
        parent::__construct($sid, $token, $version, null, $retryAttempts);
    }

    /**
     * Returns a new \Services_Twilio instance from the given parameters
     *
     * @param      $sid
     * @param      $token
     * @param null $version
     * @param int  $retryAttempts
     *
     * @return \Services_Twilio
     */
    public function createInstance($sid ,$token, $version = null, $retryAttempts = 1)
    {
        return new \Services_Twilio($sid, $token, $version, null, $retryAttempts);
    }

}
