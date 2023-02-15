<?php

namespace App\Http\Controllers;

use App\Models\ShortenedUrls;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ShortenedUrlsController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!$request->session()->has('user_id')) {
                return redirect('/login');
            }
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortenedUrl = ShortenedUrls::orderBy('id','desc')->paginate(10);
        return view('shortenedurl.index', compact('shortenedUrl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shortenedurl.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required',
        ]);
        $request["short_url"] = self::make_tiny_url($request["original_url"]);

        ShortenedUrls::create($request->post());

        return redirect()->route('shortenedurl.index')->with('success','New URL has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShortenedUrl  $shortenedUrl
     * @return \Illuminate\Http\Response
     */
    public function show(ShortenedUrls $shortenedUrl)
    {
        return view('shortenedurl.show',compact('shortenedUrl'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShortenedUrl  $shortenedUrl
     * @return \Illuminate\Http\Response
     */
    public function edit(ShortenedUrls $shortenedurl)
    {
        return view('shortenedurl.edit',compact('shortenedurl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShortenedUrl  $shortenedUrl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShortenedUrls $shortenedUrl)
    {
        $request->validate([
            'original_url' => 'required'
        ]);
        $_POST["short_url"] = self::make_tiny_url($request["original_url"]);

        ShortenedUrls::where('id', $_POST['id'])
            ->update([
                'short_url' => $_POST["short_url"],
                'original_url' => $_POST["original_url"]
            ]);

        return redirect()->route('shortenedurl.index')->with('success','URL has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShortenedUrl  $shortenedUrl
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ShortenedUrls::where('id', $id)->firstorfail()->delete();

        return redirect()->route('shortenedurl.index')->with('success','URL has been deleted successfully');
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
