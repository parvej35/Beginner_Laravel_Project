<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\ShortenedUrls;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ShortenedUrlsController extends Controller
{
    private $USERS_ID = '';

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!$request->session()->has('users_id')) {
                return redirect('/login');
            }
            $this->USERS_ID = $request->session()->get('users_id');
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {

        $total_users = Users::all()->count();

//        $total_urls = ShortenedUrls::all()->count();
        $total_urls = ShortenedUrls::where('users_id', $this->USERS_ID)->count();
        return view('welcome', ['total_users' => $total_users, 'total_urls' => $total_urls]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortenedUrl = ShortenedUrls::where('users_id', $this->USERS_ID)->orderBy('id','desc')->paginate(10);
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
        $request["users_id"] = $request->session()->get('users_id');

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

    public function export_url_list(Request $request)
    {
        $shortenedUrlList = ShortenedUrls::where('users_id', $this->USERS_ID)->orderBy('id','desc')->get();
        $data = [
            'shortenedUrlList' => $shortenedUrlList,
        ];

        $pdf = PDF::loadView('export_url_list', $data);

        return $pdf->download('export_url_list.pdf');
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
