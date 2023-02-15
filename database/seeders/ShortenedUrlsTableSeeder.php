<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Models\ShortenedUrls;

class ShortenedUrlsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #if you want to truncate the table; Open the below line
//        DB::table('shortened_urls')->delete();

        ShortenedUrls::create([
            'original_url' => 'https://laravel.com/docs/10.x/installation#getting-started-on-macos',
            'short_url' => self::make_tiny_url('https://laravel.com/docs/10.x/installation#getting-started-on-macos')
        ]);
        ShortenedUrls::create([
            'original_url' => 'https://www.global-tickets.com/de/Sportveranstaltungen/Motorsport/MotoGP/MotoGP-Portimao/MotoGP-Wochenend-Tickets-3-Tage-Portimao.html',
            'short_url' => self::make_tiny_url('https://www.global-tickets.com/de/Sportveranstaltungen/Motorsport/MotoGP/MotoGP-Portimao/MotoGP-Wochenend-Tickets-3-Tage-Portimao.html')
        ]);
        ShortenedUrls::create([
            'original_url' => 'https://www.hanze.nl/eng/education/engineering/institute-for-life-science--technology/programmes/master/data-science-for-life-sciences',
            'short_url' => self::make_tiny_url('https://www.hanze.nl/eng/education/engineering/institute-for-life-science--technology/programmes/master/data-science-for-life-sciences')
        ]);
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
