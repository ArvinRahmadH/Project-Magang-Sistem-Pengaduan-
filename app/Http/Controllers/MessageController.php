<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class MessageController extends Controller
{
    public function byNote($id)
    {
        $messages = Message::where('note_id', $id)
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($messages);
    }
}
