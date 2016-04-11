<?php

namespace SocialNetworks\ApiBundle\Service;

class InstagramApiService implements SocialNetworkApiServiceInterface
{
    /**
     * @var Instagram
     */
    private $instagramService;

    /**
     * @param Instagram $instagramService
     */
    public function __construct(

    ) {

    }

    public function getStreamContent($user, $postsAmount)
    {

    }
}
