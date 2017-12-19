<?php
/**
 * @File: AuthServiceProvider.php
 * @Author: xiongjinhai
 * @Email:562740366@qq.com
 * @Date: 2017/12/19下午3:37
 * @Version:Version:1.1 2017 by www.dsweixin.com All Rights Reserver
 */

namespace ApiAuth;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends  ServiceProvider
{
    public function register(){

        $this->setupConfig();

    }
    /**
     * api 鉴权
     */
    public function setupConfig(){

        $configSource = realpath(__DIR__ . '/config.php');

        $middlewareSource = realpath(__DIR__ . '/middleware');

        if ($this->app instanceof Application && $this->app->runningInConsole()) {
            $this->publishes([
                $middlewareSource => app_path('Http/Middleware/ApiAuth.php'),
                $configSource => config_path('api_auth.php')
            ]);
        }
        $this->mergeConfigFrom($configSource, 'api_auth');
        $this->commands([
            Command::class,
        ]);
    }
}