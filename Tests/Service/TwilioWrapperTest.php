<?php

namespace Vresh\TwilioBundle\Tests\DependencyInjection;

use Vresh\TwilioBundle\Service\TwilioLookupsWrapper;
use Vresh\TwilioBundle\Service\TwilioWrapper;
use Vresh\TwilioBundle\Service\TwilioCapabilityWrapper;

/**
 * Test the TwilioWrapper.
 *
 * @author Fridolin Koch <info@fridokoch.de>
 */
class TwilioWrapperTest extends \PHPUnit_Framework_TestCase
{
    public function testTwilioWrapper()
    {
        $twilio = new TwilioWrapper('AAAA', 'XXXX');
        //check if instance
        $this->assertInstanceOf('Vresh\TwilioBundle\Service\TwilioWrapper', $twilio);
    }

    public function testCreateInstance()
    {
        $twilio = new TwilioWrapper('AAAA', 'XXXX');
        //create other instance
        $otherInstance = $twilio->createInstance('BBBB', 'CCCCC');
        //check class
        $this->assertInstanceOf('\Services_Twilio', $otherInstance);
    }

    public function testCapabilityWrapper()
    {
        $twilio = new TwilioCapabilityWrapper('AAAA', 'XXXX');
        //check class
        $this->assertInstanceOf('\Services_Twilio_Capability', $twilio);
    }

    public function testCapabilityCreateInstance()
    {
        $twilio = new TwilioCapabilityWrapper('AAAA', 'XXXX');
        //create other instance
        $otherInstance = $twilio->createInstance('BBBB', 'CCCCC');
        //check class
        $this->assertInstanceOf('\Services_Twilio_Capability', $otherInstance);
    }

    public function testLookupsWrapper()
    {
        $twilio = new TwilioLookupsWrapper('AAAA', 'XXXX');
        //check class
        $this->assertInstanceOf('\Lookups_Services_Twilio', $twilio);
    }
}
