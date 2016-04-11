<?php

namespace SocialNetworks\ApiBundle\Service;

interface SocialNetworkApiServiceInterface
{
    /**
     * @param string $user
     */
    public function getStreamContent($user, $postsAmount);
}
