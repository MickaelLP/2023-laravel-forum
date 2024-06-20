<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ["subject_id", "user_id", "content"];

    public function user()
    {
        return $this->belongsTo(User::class);// belongsTo : appartient à 
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);// belongsTo : appartient à 
    }

}
