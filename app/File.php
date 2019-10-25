<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ["user_id","name","type","size","description"];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * renvoie le user ayant posté le file et ses atributs
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
