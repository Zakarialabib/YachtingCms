<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        if ( $user ) {
             foreach ($user->boats as $boat)
                 if ( $user->images )
                      $boat->images->delete();

             foreach ($user->boats as $boat)
                 if ( $user->comments )
                      $boat->comments->delete();

             if ( $user->boats )
                  $user->boats->delete();

             if ( $user->comments )
                  $user->comments->delete();

             if ( $user->booking )
                  $user->booking->delete();

             if ( $user->socialMedia )
                  $user->socialMedia->delete();
        }
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
