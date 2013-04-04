Symfony2 Twilio Bundle - by Vresh.net
=====================================


About
-----

This is just a wrapper for the [official SDK](https://github.com/twilio/twilio-php) provided by [Twilio](http://www.twilio.com/).

Installation
------------

Add this to your `composer.json` file:

    "require": {
	    "vresh/twilio-bundle": "dev-master",
    }




Add the bundle to *app/AppKernel.php*

	$bundles = array(
		// ... other bundles
		new Vresh\TwilioBundle\VreshTwilioBundle(),
	);


Configuration
-------------

Add this to your `config.yml`:


    vresh_twilio:
    	#Your Account SID from www.twilio.com/user/account
        sid: %twilio_sid%
        #Your Auth Token from www.twilio.com/user/account
        authToken: %twilio_auth_token%
        

And this to your `parameters.yml`:

    twilio_auth_token: 'XXXXX'
    twilio_sid: 'YYYYY'

Usage
-----

TBD


Copyright
---------

See LICENSE