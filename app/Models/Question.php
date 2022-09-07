<?php

namespace App\Models;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use BroadcastsEvents, HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'question_text'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function types()
    {
        return $this->hasMany(Type::class);
    }

    public function broadcastOn($event)

    {
        return [$this, $this->user];
    }

}
