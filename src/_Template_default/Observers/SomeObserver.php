<?php

namespace App\Units\%UnitName%\Observers;

use Notification;
use UserSubscription;
use Model;

class SomeObserver
{
    /**
     * Handle the auth user "created" event.
     *
     * @param  Model  $model
     * @return void
     */
    public function created(Model $model)
    {
        $notifiables = UserSubscription::notifiables("%UnitHint%.created");
        Notification::send($notifiables, new SomeNotification($model));
    }

    /**
     * Handle the auth user "updated" event.
     *
     * @param  Model  $model
     * @return void
     */
    public function updated(Model $model)
    {
        //
    }   

    /**
     * Handle the auth user "deleted" event.
     *
     * @param  Model  $model
     * @return void
     */
    public function deleted(Model $model)
    {
        //
    }

    /**
     * Handle the auth user "restored" event.
     *
     * @param  Model  $model
     * @return void
     */
    public function restored(Model $model)
    {
        //
    }

    /**
     * Handle the auth user "force deleted" event.
     *
     * @param  Model  $model
     * @return void
     */
    public function forceDeleted(Model $model)
    {
        //
    }
}
