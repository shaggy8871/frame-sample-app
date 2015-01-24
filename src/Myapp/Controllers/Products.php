<?php

namespace Myapp\Controllers;

use Frame\Core\Controller;
use Frame\Core\Url;

class Products extends Controller
{

    /*
     * Handle controller specific routing queries
     */
    public function routeResolver(Url $url)
    {

        $found = preg_match("/^\/products\/int/", $url->requestUri, $matches);
        if ($found) {
            return '\\Myapp\\Models\\Test1::getSomething';
        }
        $found = preg_match("/^\/product1/", $url->requestUri, $matches);
        if ($found) {
            return 'Index::routeProduct'; // go to controller Index, method routeProduct
        }
        $found = preg_match("/^\/product2/", $url->requestUri, $matches);
        if ($found) {
            return 'anotherMethod'; // look in this controller for method anotherMethod
        }
        $found = preg_match("/^\/product3/", $url->requestUri, $matches);
        if ($found) {
            return (function(Get $request, Html $response) {
                return 'I am inside a closure';
            });
        }
        $found = preg_match("/^\/product4/", $url->requestUri, $matches);
        if ($found) {
            return array($this, 'routeDefault');
        }

    }

    public function routeNotFound(Url $url, Project $project)
    {

        echo "In routeNotFound";

    }

    public function routeDefault(Get $request, Twig $response, \Myapp\Models\Something $else, Url $url)
    {

print_r($url);

        return $response
            ->setViewFilename("Products/test.html")
            ->setViewParams(array('this' => 'is', 'cool' => 'yeah?'));
//        return array('this' => 'is', 'cool' => 'yeah?');

    }

    public function routeSubdir(\Myapp\Models\Something $request = null)
    {

        return "You are in subdir with request param = " . print_r($request, true);

    }

    public function routeDirect(Get $request, Html $response)
    {

        $response->render(__METHOD__);

    }

    public function routeDash_Test(Get $request, Html $response)
    {

        $response = new \Frame\Response\Twig($this->project);
        $response
            ->setViewFilename("Products/test.html")
            ->setViewParams(array('this' => 'ain\'t', 'cool' => 'no!'))
            ->render();

    }

    public function anotherMethod(Get $request, Json $response)
    {

        $response->setViewParams(array('this', 'that'));
        return $response;

    }

}
