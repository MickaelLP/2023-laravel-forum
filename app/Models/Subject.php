<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ["title", "question"];

    public function answers(){
        return $this->hasMany(Answer::class)->orderBy('created_at','asc'); // Un subject est associé à plusieurs réponses
    }

    public function user()
    {
        return $this->belongsTo(User::class);// belongsTo : appartient à 
    }
}
