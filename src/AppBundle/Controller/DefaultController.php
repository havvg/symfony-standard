<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelEvents;

class DefaultController implements EventSubscriberInterface
{
    private $example;

    public function __construct(\Example $example)
    {
        $this->example = $example;
    }

    public function issueAction()
    {
        return new Response($this->example->getUuid(), Response::HTTP_OK);
    }

    public function onKernelRequest()
    {
        // This is just given to have the services created early enough.
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::REQUEST => array('onKernelRequest', -2048),
        );
    }
}
