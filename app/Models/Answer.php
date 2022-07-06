<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'answer_text',
        'is_correct',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
