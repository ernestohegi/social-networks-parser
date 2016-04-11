<?php

namespace SocialNetworks\ApiBundle\Service;

use Endroid\Twitter\Twitter;

class TwitterApiService implements SocialNetworkApiServiceInterface
{
    const STATUSES_KEY = 'statuses/user_timeline';
    const GET_KEY = 'GET';
    const DATA_TYPE = 'json';

    /**
     * @var Twitter
     */
    private $twitterService;

    /**
     * @param Twitter $twitterService
     * @param int     $defaultPostsAmount
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
            self::STATUSES_KEY,
            self::GET_KEY,
            self::DATA_TYPE,
            [
                'screen_name' => $user,
                'count' => (int) $postsAmount ?: $this->defaultPostsAmount,
            ]
        );

        return json_decode(
            $response->getContent()
        );
    }
}
