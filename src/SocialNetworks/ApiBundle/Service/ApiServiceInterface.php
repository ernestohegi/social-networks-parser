<?php

namespace SocialNetworks\ApiBundle\Service;

interface ApiServiceInterface
{
    /**
     * @param string $url
     *
     * @return Buzz\Message\Response
     */
    public function makeGetRequest($url);

    /**
     * @param string $url
     * @param array $data
     * @param bool $json
     *
     * @return Buzz\Message\Response
     */
    public function makePostRequest($url, $data, $json);

    /**
     * @param string $url
     * @param array $data
     * @param bool $json
     *
     * @return Buzz\Message\Response
     */
    public function makePutRequest($url, $data, $json);
}
