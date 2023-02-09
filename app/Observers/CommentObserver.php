<?php

namespace App\Observers;

use App\Models\Comment;
use App\Models\Boat;

class CommentObserver
{
    /**
     * Handle the Comment "created" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function created(Comment $comment)
    {
        $boat = Boat::find($comment->boat->id);
        $boat->nbr_comment += 1;
        $boat->save();
    }

    /**
     * Handle the Comment "updated" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function updated(Comment $comment)
    {
        //
    }

    /**
     * Handle the Comment "deleted" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function deleted(Comment $comment)
    {
        $boat = Boat::find($comment->boat->id);
        $comments = Comment::where("comment_id",$comment->id)->get();
        if( $comments )
        {
            $boat->nbr_comment -= count($comments) - 1;
            $comments->delete();
        } else {
            $boat->nbr_comment -= 1;
        }
        $boat->save();
    }

    /**
     * Handle the Comment "restored" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function restored(Comment $comment)
    {
        //
    }

    /**
     * Handle the Comment "force deleted" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function forceDeleted(Comment $comment)
    {
        //
    }
}
