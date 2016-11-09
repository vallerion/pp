<?php

namespace App\Providers;

use App\Project;
use App\Task;
use App\Team;
use App\User;
use App\Code;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {

        $router->model('project', Project::class);
        $router->model('team', Team::class);
        $router->model('user', User::class);
        $router->model('task', Task::class);
        $router->model('code', Code::class);

        $router->pattern('user', '[0-9]+');
        $router->pattern('project', '[0-9]+');
        $router->pattern('team', '[0-9]+');
        $router->pattern('task', '[0-9]+');
        $router->pattern('code', '[a-zA-Z0-9]{64}');

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {

//        dd($router);

        $router->group([
            'namespace' => $this->namespace, 'middleware' => 'web',
        ], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
