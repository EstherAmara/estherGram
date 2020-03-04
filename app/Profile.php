<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    const DEFAULT_IMAGE = 'profile/YsiLLieQBew4GWF3YUUrDGMRheCCbtUjii2wF6Lu.png';

    protected $guarded = [];

    public function profileImage() {
        $path = ($this->image) ? $this->image : self::DEFAULT_IMAGE;

        return '/storage/'.$path;
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
