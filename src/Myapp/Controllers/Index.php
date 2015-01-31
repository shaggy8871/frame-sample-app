<?php

namespace Myapp\Controllers;

use Frame\Core\Project;
use Frame\Core\Url;
use Frame\Core\Controller;
use Frame\Request\Post;
use Frame\Request\Get;
use Frame\Response\Html;
use Frame\Response\Json;
use Frame\Response\Twig;
use Myapp\Models\Index as Model;

class Index extends Controller
{

    protected $model;

    public function __construct(Project $project)
    {

        // Hook up to the model
        $this->model = new Model($project);

        // Carry on...
        parent::__construct($project);

    }

    /**
     * Add your controller-specific route lookups here if required
     */
    public function routeResolver(Url $url)
    {

    }

    /**
     * @canonical /
     */
    public function routeDefault(Get $request, Twig $response)
    {

        return [
            'title' => 'Welcome to Frame',
            'content' => 'You\'re on the home page. You can customize this view in <Yourapp>/Views/Index/default.html.twig and <Yourapp>/Views/base.html.twig.'
        ];

    }

    /**
     * @canonical /about
     * @description This is an example about us page
     */
    public function routeAbout(Get $request, Twig $response)
    {

        $response->setViewFilename('Index/default.html.twig');

        return [
            'title' => 'About Us',
            'content' => 'You can customize this page in <Yourapp>/Views/Index/about.html.twig.'
        ];

    }

    /**
     * @canonical /contact
     * @description This is an example contact us page
     */
    public function routeContact(Get $request, Twig $response)
    {

        $response->setViewFilename('Index/default.html.twig');

        return [
            'title' => 'Contact Us',
            'content' => 'You can customize this page in <Yourapp>/Views/Index/contact.html.twig.'
        ];

    }

    /**
     * @canonical /json
     * @description Demonstration of JSON response type
     */
    public function routeJson(Get $request, Json $response)
    {

        return [
            'json' => [
                'works' => 'ok!'
            ]
        ];

    }

}
