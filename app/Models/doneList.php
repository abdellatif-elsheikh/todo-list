<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doneList extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'desc',
        'estimatedTime',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
