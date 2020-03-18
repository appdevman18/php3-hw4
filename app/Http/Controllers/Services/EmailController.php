<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\SendLogsToAdmin;

class EmailController extends Controller
{
    protected $mailRecipient;
    protected $user;

    public function sendEmail()
    {
        $users = User::with('roles')->get();

        foreach ($users as $user) {
            foreach ($user->roles as $role) {
                if ($role->name == 'admin') {
                    $this->user = $user;
                    $this->mailRecipient = $user->email;
                }
            }
        }

        Mail::to($this->mailRecipient)->send(new SendLogsToAdmin($this->user));

        return redirect()->route('home')->with('message', 'Сообщение успешно отправлено.');;
    }
}
