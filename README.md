Symfony2 Twilio Bundle - by Vresh.net
=====================================


About
-----

TBD

Installation
------------

Add this to your debs file

	[VreshTwilioBundle]
		git=http://github.com/Vreshware/VreshTwilioBundle.git
		target=/bundles/Vresh/VreshTwilioBundle
		version=origin/master

Register the namespace in your *app/autoload.php*

	$loader->registerNamespaces(array(
		//Other namespaces
		'Vresh'            => __DIR__.'/../vendor/bundles',
	));


Add the bundle to *app/AppKernel.php*

	$bundles = array(
		// ... other bundles
		new Vresh\TwilioBundle\VreshTwilioBundle(),
	);


Configuration
-------------

TBD

Usage
-----

TBD


Copyright
---------

TBD
