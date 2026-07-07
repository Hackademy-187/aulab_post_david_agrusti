<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Tag;
use App\Models\Category;
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
                            
        $tags = Tag::all();
        $categories = Category::all();

        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests', 'activeStaff', 'tags', 'categories'));
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

    public function editTag(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|unique:tags',
        ]);

        $tag->update([
            'name' => strtolower($request->name),
        ]);

        return redirect()->back()->with('message', 'Tag aggiornato correttamente');
    }

    public function deleteTag(Tag $tag)
    {
        foreach($tag->articles as $article) {
            $article->tags()->detach($tag);
        }

        $tag->delete();
        return redirect()->back()->with('message', 'Tag eliminato correttamente');
    }

    public function editCategory(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);

        $category->update([
            'name' => strtolower($request->name),
        ]);

        return redirect()->back()->with('message', 'Categoria aggiornata correttamente');
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('message', 'Categoria eliminata correttamente');
    }

    public function storeCategory(Request $request)
    {
        Category::create([
            'name' => strtolower($request->name),
        ]);

        return redirect()->back()->with('message', 'Categoria inserita correttamente');
    }
}
