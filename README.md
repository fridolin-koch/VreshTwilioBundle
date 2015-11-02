#Symfony2 Twilio Bundle - by [Fridolin Koch](http://fkse.io)

[![Build Status](https://travis-ci.org/fridolin-koch/VreshTwilioBundle.png?branch=master)](https://travis-ci.org/fridolin-koch/VreshTwilioBundle)

[![Coverage Status](https://coveralls.io/repos/fridolin-koch/VreshTwilioBundle/badge.svg?branch=master&service=github)](https://coveralls.io/github/fridolin-koch/VreshTwilioBundle?branch=master)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/fridolin-koch/VreshTwilioBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/fridolin-koch/VreshTwilioBundle/?branch=master)

About
-----

This is just a wrapper for the [official SDK](https://github.com/twilio/twilio-php) provided by [Twilio](http://www.twilio.com/).

Installation
------------

Add this to your `composer.json` file:

```json
"require": {
	"vresh/twilio-bundle": "dev-master",
}
```


Add the bundle to `app/AppKernel.php`

```php
$bundles = array(
	// ... other bundles
	new Vresh\TwilioBundle\VreshTwilioBundle(),
);
```

Configuration
-------------

Add this to your `config.yml`:

```yaml
vresh_twilio:
    #(Required) Your Account SID from www.twilio.com/user/account
    sid: 'XXXXXXXX'
    #(Required) Your Auth Token from www.twilio.com/user/account
    authToken: 'YYYYYYYY'
    #(Optional, default: '2010-04-01') Twilio API version
    version: '2010-04-01'
    #(Optional, default: 1) Number of times to retry failed requests
    retryAttempts: 3
```


Usage
-----

Provided services:

| Service             | Class                         |
|---------------------|-------------------------------|
| `twilio.api`        | `\Services_Twilio`            |
| `twilio.capability` | `\Services_Twilio_Capability` |
| `twilio.lookups`    | `\Lookups_Services_Twilio`    |


Inside a controller:

```php
class TelephoneController extends Controller
{
    public function callAction($me, $maybee)
    {
        //returns an instance of Vresh\TwilioBundle\Service\TwilioWrapper
    	$twilio = $this->get('twilio.api');

        $message = $twilio->account->messages->sendMessage(
	  '+14085551234', // From a Twilio number in your account
	  '+12125551234', // Text any number
	  "Hello monkey!"
	);

        //get an instance of \Service_Twilio
        $otherInstance = $twilio->createInstance('BBBB', 'CCCCC');

        return new Response($message->sid);
    }
}
```

Inside a console command:

```php
class SomeCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('some:comand')
            ->setDescription('A command')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //returns an instance of Vresh\TwilioBundle\Service\TwilioWrapper
        $twilio = $this->getContainer()->get('twilio.api');

        $message = $twilio->account->messages->sendMessage(
	  '+14085551234', // From a Twilio number in your account
	  '+12125551234', // Text any number
	  "Hello monkey!"
	);

        //get an instance of \Service_Twilio
        $otherInstance = $twilio->createInstance('BBBB', 'CCCCC');

        print $message->sid;

    }
}
```

Copyright / License
-------------------

See [LICENSE](https://github.com/fridolin-koch/VreshTwilioBundle/blob/master/LICENSE)
