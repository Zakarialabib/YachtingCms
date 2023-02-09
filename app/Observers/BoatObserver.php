<?php

namespace App\Observers;

use App\Models\Boat;

class BoatObserver
{
    /**
     * Handle the Boat "created" event.
     *
     * @param  \App\Models\Boat  $boat
     * @return void
     */
    public function created(Boat $boat)
    {
        //
    }

    /**
     * Handle the Boat "updated" event.
     *
     * @param  \App\Models\Boat  $boat
     * @return void
     */
    public function updated(Boat $boat)
    {
        //
    }

    /**
     * Handle the Boat "deleted" event.
     *
     * @param  \App\Models\Boat  $boat
     * @return void
     */
    public function deleted(Boat $boat)
    {
        if ( $boat ) {
            foreach ($boat->images as $image)
                unlink("assets/images/boat/".$image->image);
             $boat->images->delete();
             $boat->comments->delete();
             $boat->booking->delete();
        }
    }

    /**
     * Handle the Boat "restored" event.
     *
     * @param  \App\Models\Boat  $boat
     * @return void
     */
    public function restored(Boat $boat)
    {
        //
    }

    /**
     * Handle the Boat "force deleted" event.
     *
     * @param  \App\Models\Boat  $boat
     * @return void
     */
    public function forceDeleted(Boat $boat)
    {
        //
    }
}
