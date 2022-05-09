<?php

declare(strict_types=1);

/*
 * https://devdojo.com/devdojo/simple-laravel-route-testing
 */

namespace Modules\LU\Tests\Feature;

use Tests\TestCase;

/**
 * Undocumented class.
 */
class RouteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRoutes()
    {
        $appURL = env('APP_URL');

        $urls = [
            '/it/login',
            //       '/it/profile/create',
        ];

        echo PHP_EOL;

        foreach ($urls as $url) {
            $response = $this->get($url);
            if (200 !== (int) $response->status()) {
                echo $appURL.$url.' (FAILED) did not return a 200.';
                $this->assertTrue(false);
            } else {
                echo $appURL.$url.' (success ?)';
                $this->assertTrue(true);
            }
            echo PHP_EOL;
        }
    }
}
