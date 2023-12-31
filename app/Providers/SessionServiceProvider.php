<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use App\Session\DatabaseSessionHandler;
use Illuminate\Session\DatabaseSessionHandler;

class SessionServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->session->extend('app.database', function ($app) {
            $connectionName     = $this->app->config->get('session.connection');
            $databaseConnection = $app->app->db->connection($connectionName);

            $table = $databaseConnection->getTablePrefix() . $app['config']['session.table'];

            return new DatabaseSessionHandler($databaseConnection, $table,0,null);
        });
    }
}