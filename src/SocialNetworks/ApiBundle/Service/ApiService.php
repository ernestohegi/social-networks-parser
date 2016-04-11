<?php

namespace SocialNetworks\ApiBundle\Service;

use Buzz\Browser;

/**
 */
class ApiService implements ApiServiceInterface
{
    /**
     * HTTP requests.
     *
     * @var Browser
     */
    private $buzz;

    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @var array
     */
    private $headers;

    /**
     * @param Browser $buzz
     */
    public function __construct(Browser $buzz)
    {
        $this->buzz = $buzz;
    }

    /**
     * {@inheritdoc}
     */
    public function makeGetRequest($url)
    {
        return $this->buzz->get(
            $this->getBaseUrl().$url,
            $this->getHeaders()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function makePostRequest($url, $data, $json)
    {
        if (!empty($json) && $json) {
            $data = json_encode($data);
        }

        return $this->buzz->post(
            $this->getBaseUrl().$url,
            $this->getHeaders(),
            $data
        );
    }

    /**
     * {@inheritdoc}
     */
    public function makePutRequest($url, $data, $json)
    {
        if (!empty($json) && $json) {
            $data = json_encode($data);
        }

        return $this->buzz->put(
            $this->getBaseUrl().$url,
            $this->getHeaders(),
            $data
        );
    }

    /**
     * Sets the timeout for the Buzz request.
     */
    public function setTimeout($seconds)
    {
        $this->buzz->getClient()->setTimeout($seconds ?: 5);
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl ?: '';
    }

    /**
     * @param string $baseUrl
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return is_array($this->headers)
            ? $this->headers
            : [];
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }
}
