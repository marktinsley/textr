<?php

namespace App\Providers;

use App\Lib\Texting\TextingApi;
use App\Lib\Texting\Twilio;
use Illuminate\Support\ServiceProvider;
use Twilio\Rest\Client as TwilioClient;

class TextingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TextingApi::class, function () {
            $driver = config('texting.driver');

            switch ($driver) {
                case 'twilio':
                    return app(Twilio::class);
                default:
                    throw new \RuntimeException(
                        'Unrecognized texting driver' . ($driver ? ": {$driver}" : '')
                    );
            }
        });

        $this->app->singleton(TwilioClient::class, fn() => new TwilioClient(
            config('texting.services.twilio.account_sid'),
            config('texting.services.twilio.auth_token')
        ));
    }
}
