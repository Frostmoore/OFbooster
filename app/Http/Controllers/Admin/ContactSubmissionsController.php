<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactSubmissionsController extends Controller
{
    public function login()
    {
        return view('admin.contact_submissions.login');
    }

    public function doLogin(Request $request)
    {
        $request->validate(['password' => ['required', 'string']]);

        $expected = (string) env('CONTACT_SUBMISSIONS_PASSWORD', '');
        if ($expected === '') {
            abort(500, 'CONTACT_SUBMISSIONS_PASSWORD non è impostata nel .env');
        }

        if (!hash_equals($expected, (string) $request->input('password'))) {
            return back()->withErrors(['password' => 'Password sbagliata.']);
        }

        $request->session()->put('contact_submissions_authed', true);

        return redirect()->route('admin.contatti.index');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('contact_submissions_authed');
        return redirect()->route('admin.contatti.login');
    }

    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        $items = ContactSubmission::query()
            ->when($q !== '', function ($query) use ($q) {
                $query->where(function ($qq) use ($q) {
                    $qq->where('name', 'like', "%{$q}%")
                       ->orWhere('email', 'like', "%{$q}%")
                       ->orWhere('instagram', 'like', "%{$q}%")
                       ->orWhere('message', 'like', "%{$q}%");
                });
            })
            ->orderByDesc('id')
            ->paginate(25)
            ->withQueryString();

        return view('admin.contact_submissions.index', compact('items', 'q'));
    }
}
