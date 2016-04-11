<?php

namespace SocialNetworks\ApiBundle\Tests\Service;

require_once dirname(__DIR__).'/../../../../app/AppKernel.php';

use Symfony\Bundle\FrameworkBundle\Test;
use Symfony\Component\HttpKernel\Kernel;

class TwitterApiServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Symfony\Component\HttpKernel\AppKernel
     */
    private $kernel;

    /**
     * @var TwitterApiService
     */
    private $twitterApiService;

    public function setUp()
    {
        $this->kernel = new \AppKernel('test', true);
        $this->kernel->boot();

        $this->twitterApiService = $this->kernel->getContainer()->get('social_networks.twitter_service');
    }

    public function testParseSocialNetworkApi()
    {
        $response = $this->twitterApiService->getStreamContent('twitterapi', 10);

        $this->assertNotNull($response);
        $this->assertEquals(
            10,
            count($response)
        );
    }
}
