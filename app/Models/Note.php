<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Note extends Model

{

    use HasFactory;
    
    protected $fillable = [
    'title', 'content', 'image', 'kategori', 'user_id', 'status',
    'latitude', 'longitude'
];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class)->orderBy('created_at');
    }


}
