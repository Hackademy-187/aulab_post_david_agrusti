<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\CareerRequestRejectedMail;

class AdminController extends Controller
{
    public function dashboard()
    {
        $adminRequests = User::where('is_admin', NULL)->get();
        $revisorRequests = User::where('is_revisor', NULL)->get();
        $writerRequests = User::where('is_writer', NULL)->get();

        $activeStaff = User::where('is_admin', true)
                            ->orWhere('is_revisor', true)
                            ->orWhere('is_writer', true)->get();

        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests', 'activeStaff'));
    }

    public function setAdmin(User $user)
    {
        $user->is_admin = true;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', "Hai correttamente reso amministratore l'utente scelto");
    }

    public function setRevisor(User $user)
    {
        $user->is_revisor = true;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', "Hai correttamente reso revisore l'utente scelto");
    }

    public function setWriter(User $user)
    {
        $user->is_writer = true;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', "Hai correttamente reso redattore l'utente scelto");
    }

    public function rejectAdmin(Request $request, User $user)
    {
        $user->is_admin = false;
        $user->save();
        Mail::to($user->email)->send(new CareerRequestRejectedMail($user, 'amministratore', $request->reason));
        return redirect(route('admin.dashboard'))->with('message', "Hai rifiutato la richiesta da amministratore");
    }

    public function rejectRevisor(Request $request, User $user)
    {
        $user->is_revisor = false;
        $user->save();
        Mail::to($user->email)->send(new CareerRequestRejectedMail($user, 'revisore', $request->reason));
        return redirect(route('admin.dashboard'))->with('message', "Hai rifiutato la richiesta da revisore");
    }

    public function rejectWriter(Request $request, User $user)
    {
        $user->is_writer = false;
        $user->save();
        Mail::to($user->email)->send(new CareerRequestRejectedMail($user, 'redattore', $request->reason));
        return redirect(route('admin.dashboard'))->with('message', "Hai rifiutato la richiesta da redattore");
    }

    public function revokeAdmin(User $user)
    {
        $user->is_admin = false;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', "Ruolo amministratore revocato");
    }

    public function revokeRevisor(User $user)
    {
        $user->is_revisor = false;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', "Ruolo revisore revocato");
    }

    public function revokeWriter(User $user)
    {
        $user->is_writer = false;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', "Ruolo redattore revocato");
    }
}
