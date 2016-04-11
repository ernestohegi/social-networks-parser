<?php

namespace SocialNetworks\ApiBundle\Service;

use Endroid\Twitter\Twitter;

class TwitterApiService implements SocialNetworkApiServiceInterface
{
    /**
     * @var Twitter
     */
    private $twitterService;

    /**
     * @param Twitter $twitterService
     * @param int $defaultPostsAmount
     */
    public function __construct(
        Twitter $twitterService,
        $defaultPostsAmount
    ) {
        $this->twitterService = $twitterService;
        $this->defaultPostsAmount = $defaultPostsAmount;
    }

    public function getStreamContent($user, $postsAmount)
    {
        $response = $this->twitterService->query(
            'statuses/user_timeline',
            'GET',
            'json',
            [
                'screen_name' => $user,
                'count' => (int) $postsAmount ?: $this->defaultPostsAmount
            ]
        );

        return json_decode(
            $response->getContent()
        );
    }
}
