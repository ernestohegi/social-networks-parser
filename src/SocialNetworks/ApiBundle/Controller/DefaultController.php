<?php

namespace SocialNetworks\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SocialNetworksApiBundle:Default:index.html.twig', array('name' => $name));
    }
}
