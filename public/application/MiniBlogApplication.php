<?php

class MiniBlogApplication extends Application
{
    protected $login_action = array('account', 'signin');

    public function getRootDir()
    {
        return dirname(__FILE__);
    }

    protected function registerRoutes()
    {
        return [
            '/'                           => ['controller' => 'status', 'action' => 'index'],
            '/status/post'                => ['controller' => 'status', 'action' => 'post'],
            '/account'                    => ['controller' => 'account', 'action' => 'index'],
            '/account/:action'            => ['controller' => 'account'],
            '/user/:user_name'            => ['controller' => 'status', 'action' => 'user'],
            '/user/:user_name/status/:id' => ['controller' => 'status', 'action' => 'show'],
            '/follow'                     => ['controller' => 'account', 'action' => 'follow'],
        ];
    }

    protected function configure()
    {
        date_default_timezone_set('Asia/Tokyo');

        $this->db_manager->connect('master', [
            'dsn'      => 'mysql:host=localhost;dbname=mini_blog',
            'user'     => 'root',
            'password' => '',
        ]);
    }
}
