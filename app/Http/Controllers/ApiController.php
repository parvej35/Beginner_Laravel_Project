<?php

namespace App\Http\Controllers;

use App\Models\ShortenedUrls;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ApiController extends Controller
{
    public function all_user()
    {
        return Users::all();
    }

    public function show_user($id)
    {
        return Users::find($id);
    }

    public function store_user(Request $request)
    {
        return Users::create($request->all());
    }

    public function update_user(Request $request, $id)
    {
        $users = Users::findOrFail($id);
        $users->update($request->all());

        return $users;
    }

    public function delete_user(Request $request, $id)
    {
        $users = Users::findOrFail($id);
        $users->delete();

        return 204;
    }

    public function all_short_url()
    {
        return ShortenedUrls::all();
    }

    public function show_short_url($id)
    {
        return ShortenedUrls::find($id);
    }

    public function store_short_url(Request $request)
    {
        return ShortenedUrls::create($request->all());
    }

    public function update_short_url(Request $request, $id)
    {
        $shortenedUrls = ShortenedUrls::findOrFail($id);
        $shortenedUrls->update($request->all());

        return $shortenedUrls;
    }

    public function delete_short_url(Request $request, $id)
    {
        $shortenedUrls = ShortenedUrls::findOrFail($id);
        $shortenedUrls->delete();

        return 204;
    }
}
