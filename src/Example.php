<?php

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Example
{
    private $uuid;

    public function __construct()
    {
        $this->uuid = mt_rand();
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public static function fromSession(SessionInterface $session)
    {
        $data = $session->get('example_transport', new static());
        $session->set('example_transport', $data);

        return $data;
    }
}
