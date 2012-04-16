<?php
namespace Vresh\TwilioBundle\Twilio;

use Vresh\TwilioBundle\Twilio\Lib\Resource;
use Vresh\TwilioBundle\Twilio\Lib\TinyHttp;

use Vresh\TwilioBundle\Twilio\Lib\Rest\Accounts;
use Vresh\TwilioBundle\Twilio\Lib\RestException;

#use Vresh\TwilioBundle\Twilio\Lib\Rest\*;
/**
 * Twilio API client interface.
 *
 * @category Services
 * @package  Services_Twilio
 * @author   Neuman Vong <neuman@twilio.com>
 * @license  http://creativecommons.org/licenses/MIT/ MIT
 * @link     http://pear.php.net/package/Services_Twilio
 */
class Twilio extends Resource
{
    const USER_AGENT = 'twilio-php/3.2.2';

    protected $http;
    protected $version;

    protected $defaults = array(
        'sid'       => '',
        'authToken' => '',
        'version'   => '2010-04-01',
    );
    /**
     * Constructor.
     *
     * @param string               $sid      Account SID
     * @param string               $token    Account auth token
     * @param string               $version  API version
     * @param Http $_http    A HTTP client
     */
    public function __construct(array $options = array())
    {
        $this->defaults = array_merge($this->defaults,$options);

        $this->version = $this->defaults['version'];

        $_http = new TinyHttp(
            "https://api.twilio.com",
            array("curlopts" => array(
                CURLOPT_USERAGENT => self::USER_AGENT,
                CURLOPT_CAINFO => __DIR__.'/../Resources/cert/twilio_ssl_certificate.crt',
            ))
        );
        $_http->authenticate($this->defaults['sid'], $this->defaults['authToken']);
        $this->http = $_http;
        $this->accounts = new Accounts($this);
        $this->account = $this->accounts->get($this->defaults['sid']);
    }

    /**
     * GET the resource at the specified path.
     *
     * @param string $path   Path to the resource
     * @param array  $params Query string parameters
     *
     * @return object The object representation of the resource
     */
    public function retrieveData($path, array $params = array())
    {
		$path = str_replace('Vresh\TwilioBundle\Twilio\Lib\Rest\\','',$path);
        $path = "/$this->version/$path.json";
        return empty($params)
            ? $this->_processResponse($this->http->get($path))
            : $this->_processResponse(
                $this->http->get("$path?" . http_build_query($params, '', '&'))
            );
    }

    /**
     * DELETE the resource at the specified path.
     *
     * @param string $path   Path to the resource
     * @param array  $params Query string parameters
     *
     * @return object The object representation of the resource
     */
    public function deleteData($path, array $params = array())
    {
		$path = str_replace('Vresh\TwilioBundle\Twilio\Lib\Rest\\','',$path);
        $path = "/$this->version/$path.json";
        return empty($params)
            ? $this->_processResponse($this->http->delete($path))
            : $this->_processResponse(
                $this->http->delete("$path?" . http_build_query($params, '', '&'))
            );
    }

    /**
     * POST to the resource at the specified path.
     *
     * @param string $path   Path to the resource
     * @param array  $params Query string parameters
     *
     * @return object The object representation of the resource
     */
    public function createData($path, array $params = array())
    {
		$path = str_replace('Vresh\TwilioBundle\Twilio\Lib\Rest\\','',$path);
        $path = "/$this->version/$path.json";
        $headers = array('Content-Type' => 'application/x-www-form-urlencoded');
        return empty($params)
            ? $this->_processResponse($this->http->post($path, $headers))
            : $this->_processResponse(
                $this->http->post(
                    $path,
                    $headers,
                    http_build_query($params, '', '&')
                )
            );
    }

    /**
     * Convert the JSON encoded resource into a PHP object.
     *
     * @param array $response 3-tuple containing status, headers, and body
     *
     * @return object PHP object decoded from JSON
     */
    private function _processResponse($response)
    {
        list($status, $headers, $body) = $response;
        if ($status == 204) {
            return TRUE;
        }
        if (empty($headers['Content-Type'])) {
            throw new \DomainException('Response header is missing Content-Type');
        }
        switch ($headers['Content-Type']) {
        case 'application/json':
            return $this->_processJsonResponse($status, $headers, $body);
            break;
        case 'text/xml':
            return $this->_processXmlResponse($status, $headers, $body);
            break;
        }
        throw new \DomainException(
            'Unexpected content type: ' . $headers['Content-Type']);
    }

    private function _processJsonResponse($status, $headers, $body) {
        $decoded = json_decode($body);
        if (200 <= $status && $status < 300) {
            return $decoded;
        }
        throw new RestException(
            (int)$decoded->status,
            $decoded->message,
            isset($decoded->code) ? $decoded->code : null,
            isset($decoded->more_info) ? $decoded->more_info : null
        );
    }

    private function _processXmlResponse($status, $headers, $body) {
        $decoded = simplexml_load_string($body);
        if (200 <= $status && $status < 300) {
            return $decoded;
        }
        throw new RestException(
            (int)$decoded->Status,
            (string)$decoded->Message,
            (string)$decoded->Code,
            (string)$decoded->MoreInfo
        );
    }
}
