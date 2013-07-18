<?php

namespace DaveDevelopment;

use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class StackRickrollRoulette implements HttpKernelInterface
{
    private $options = [
        'url' => 'http://www.youtube.com/watch?v=dQw4w9WgXcQ',
    ];

    public function __construct(HttpKernelInterface $app, array $options = [])
    {
        $this->app = $app;
        $this->options = array_merge($this->options, $options);
    }

    public function handle(Request $request, $type = HttpKernelInterface::MASTER_REQUEST, $catch = true)
    {
        if (rand(1, 6) === 3) {
            return new RedirectResponse($this->options['url']);
        }

        return $this->app->handle($request, $type, $catch);
    }
}


