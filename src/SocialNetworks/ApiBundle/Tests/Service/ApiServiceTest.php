<?php

namespace SocialNetworks\ApiBundle\Tests\Service;

require_once dirname(__DIR__).'/../../../../app/AppKernel.php';

use SocialNetworks\ApiBundle\Service\ApiService;
use Symfony\Bundle\FrameworkBundle\Test;
use Symfony\Component\HttpKernel\Kernel;

class ApiServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Symfony\Component\HttpKernel\AppKernel
     */
    private $kernel;

    public function setUp()
    {
        $this->kernel = new \AppKernel('test', true);
        $this->kernel->boot();

        $this->apiService = new ApiService(
            $this->kernel->getContainer()->get('buzz')
        );
    }

    public function testMakeGetRequest()
    {
        $response = $this->apiService->makeGetRequest('http://www.google.com');

        $this->assertNotNull($response);
        $this->assertTrue(count($response->getHeaders()) > 0);
    }
}
