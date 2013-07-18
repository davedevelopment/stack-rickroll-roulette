<?php

namespace tests\integration;

use DaveDevelopment\StackRickrollRoulette;
use Silex\Application;
use Symfony\Component\HttpKernel\Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class StackRickrollRouletteTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function weGetRickrolledEventually()
    {
        $app = new StackRickrollRoulette($this->getApp(), ['url' => 'dave']);

        $attempts = $counter = 20;

        while ($counter--) {

            $resp = $app->handle(Request::create("/"));

            if ($resp instanceof RedirectResponse) {
                $this->assertEquals('dave', $resp->getTargetUrl());
                return;
            }
        }

        $this->fail("You didn't get rickrolled in $attempts attempts, maybe you're just lucky");
    }

    protected function getApp()
    {
        $app = new Application();
        $app->get("/", function () {
            return 'safe';
        });
        return $app;
    }
}
