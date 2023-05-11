<?php

namespace App\Http\Controllers;

use App\Models\ShortenedUrls;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

    public function user_list()
    {
        return Users::all();
    }

    public function get_user($id)
    {
        return Users::find($id);
    }

    public function save_user(Request $request)
    {
        //Check the existence of the same email
        $existing_user = Users::where('email', $request['email']) -> first();
        if($existing_user){
            return "User with same email already exists.";
        } else {
            $request['password'] = Crypt::encryptString($request['password']);
            return Users::create($request->all());
        }
    }

    public function update_user(Request $request)
    {
//        $users = Users::findOrFail($request['id']);
//        $users->update($request->all());
//        return $users;

        //Check the existence of the object
        $existing_user = Users::where('id', $request['id']) -> first();
        if(!$existing_user){
            return "User does not exist.";
        }

        //Check the existence of the same email
        $existing_user = DB::table('users')
            ->where('email', $request['email'])
            ->where('id', '<>', $request['id'])
            ->first();
        if($existing_user){
            return "User with same email already exists.";
        }
        $request['password'] = Crypt::encryptString($request['password']);

        //Return 1 if update is succeeded; 0 otherwise
        return DB::table('users')->where('id', $request['id'])->update($request->all());

    }

    public function delete_user($id)
    {
//        $users = Users::findOrFail($id);
//        $users->delete();

        //Check the existence of the object
        $user = Users::where('id', $id) -> first();
        if(!$user){
            return "User does not exist.";
        } else {
            $user->delete();
            return "User has been deleted.";
        }
    }

    public function url_list()
    {
        return ShortenedUrls::all();
    }

    public function get_url($id)
    {
        return ShortenedUrls::find($id);
    }

    public function save_url(Request $request)
    {
        //Check the existence of the object
        $existing_user = Users::where('id', $request['users_id']) -> first();
        if(!$existing_user){
            return "Associated user does not exist.";
        } else {
            $request['short_url'] = self::make_tiny_url($request["original_url"]);
            return ShortenedUrls::create($request->all());
        }
    }

    public function update_url(Request $request)
    {
//        $shortenedUrls = ShortenedUrls::findOrFail($id);
//        $shortenedUrls->update($request->all());
//        return $shortenedUrls;

        //Check the existence of the Associated user
        $existing_user = Users::where('id', $request['users_id']) -> first();
        if(!$existing_user){
            return "Associated user does not exist.";
        }

        //Check the existence of the object
        $shortenedUrls = ShortenedUrls::where('id', $request['id']) -> first();
        if(!$shortenedUrls){
            return "URL does not exist.";
        }

        $request['short_url'] = self::make_tiny_url($request["original_url"]);

        //Return 1 if update is succeeded; 0 otherwise
        return DB::table('shortened_urls')->where('id', $request['id'])->update($request->all());
    }

    public function delete_url($id)
    {
//        $shortenedUrls = ShortenedUrls::findOrFail($id);
//        $shortenedUrls->delete();

        //Check the existence of the object
        $shortenedUrls = ShortenedUrls::where('id', $id) -> first();
        if(!$shortenedUrls){
            return "URL does not exist.";
        } else {
            $shortenedUrls->delete();
            return "URL has been deleted.";
        }
    }

    private function make_tiny_url($original_url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://tinyurl.com/api-create.php?url=" . $original_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $tinyurl = curl_exec($ch);
        curl_close($ch);

        return $tinyurl;
    }
}
