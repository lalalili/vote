<?php

namespace App\Listeners;

use App\Events\CleaningEvent;
use App\Models\Photo;
use DB;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CleaningListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CleaningEvent  $event
     * @return void
     */
    public function handle(CleaningEvent $event)
    {
        //$photo_id = $event->photo->get()->pluck('id')->all();
        //dd($photo_id);
        //dd(DB::table('signups')->whereNotIn('photo_id', $photo_id)->get());
        $photo = $event->photo;
        $photo_id = $this->getVaildId($photo);
        //dd($photo_id);
        DB::table('signups')->whereNotIn('photo_id', $photo_id)->delete();
        DB::table('employees')->whereNotIn('photo_id', $photo_id)->delete();

    }

    public function getVaildId($photo)
    {
        return $photo->get()->pluck('id')->all();
    }
}
