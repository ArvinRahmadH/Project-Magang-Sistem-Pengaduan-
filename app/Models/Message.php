<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'note_id',
        'user_id',
        'admin_id',
        'message',
        'is_read'
    ];

    public function note()
    {
        return $this->belongsTo(Note::class);
    }
}
