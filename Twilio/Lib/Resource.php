<?php
namespace Vresh\TwilioBundle\Twilio\Lib;
/**
 * Abstraction of a Twilio resource.
 *
 * @category Services
 * @package  Services_Twilio
 * @author   Neuman Vong <neuman@twilio.com>
 * @license  http://creativecommons.org/licenses/MIT/ MIT
 * @link     http://pear.php.net/package/Services_Twilio
 */ 
abstract class Resource implements DataProxy
{
    protected $name;
    protected $proxy;
    protected $subresources;

    public function __construct(DataProxy $proxy)
    {
        $this->subresources = array();
        $this->proxy = $proxy;
        $this->name = get_class($this);
        $this->init();
    }

    protected function init()
    {
        // Left empty for derived classes to implement
    }

    public function retrieveData($path, array $params = array())
    {
        return $this->proxy->retrieveData($path, $params);
    }

    public function deleteData($path, array $params = array())
    {
        return $this->proxy->deleteData($path, $params);
    }

    public function createData($path, array $params = array())
    {
        return $this->proxy->createData($path, $params);
    }

    public function getSubresources($name = null)
    {
        if (isset($name)) {
            return isset($this->subresources[$name])
                ? $this->subresources[$name]
                : null;
        }
        return $this->subresources;
    }

    public function addSubresource($name, Resource $res)
    {
        $this->subresources[$name] = $res;
    }

    protected function setupSubresources()
    {
        foreach (func_get_args() as $name) {
            $constantized = ucfirst(Resource::camelize($name));
            $type = 'Vresh\TwilioBundle\Twilio\Lib\Rest\\' . $constantized;
            $this->addSubresource($name, new $type($this));
        }
    }

    public static function decamelize($word)
    {
        return preg_replace(
            '/(^|[a-z])([A-Z])/e',
            'strtolower(strlen("\\1") ? "\\1_\\2" : "\\2")',
            $word
        );
    }

    public static function camelize($word)
    {
        return preg_replace('/(^|_)([a-z])/e', 'strtoupper("\\2")', $word);
    }
}

