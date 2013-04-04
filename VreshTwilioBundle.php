<?php
/*
* This file is part of the VreshTwilio package.
*
* (c) Frido Koch <frido@vresh.net
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
namespace Vresh\TwilioBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class VreshTwilioBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

    }
}