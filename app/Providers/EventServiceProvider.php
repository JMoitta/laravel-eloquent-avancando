<?php

namespace App\Providers;

use App\Events\ProductsCreated;
use App\Events\ProductsCreating;

use App\Listeners\RegisterLog;
use App\Listeners\SendNewsLetter;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ProductsCreated::class => [
            RegisterLog::class,
            SendNewsLetter::class,
        ],
        ProductsCreating::class => [
            RegisterLog::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
