<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->to('destinatario@exemplo.com')
                    ->subject('Nova Mensagem de Contato')
                    ->replyTo($data['email']);
        });

        return redirect()->back()->with('success', 'Mensagem enviada com sucesso!');
    }
}