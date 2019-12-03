<?php

namespace App\Providers;

use App\Services\CaptchaVerifier;
use Braintree\Configuration;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        $this->app->singleton(CaptchaVerifier::class, function () {
            return new CaptchaVerifier(config('app.captcha')['CAPTCHA_ID'],config('app.captcha')['SECRET_ID'],config('app.captcha')['SECRET_KEY']);
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(\Braintree\Gateway::class, function () {
            $config = [
                'environment'=>config('app.brainTree')['environment'],
                'merchantId'=>config('app.brainTree')['merchantId'],
                'publicKey'=>config('app.brainTree')['publicKey'],
                'privateKey'=>config('app.brainTree')['privateKey']
            ];
            return new \Braintree\Gateway($config);
        });
    }
}
