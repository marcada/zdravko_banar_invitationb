<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Festival;

class FestivalSeeder extends Seeder
{
    public function run(): void
    {
        $festivals = [
            [
                'mk' => 'Традиционални песни и ора',
                'en' => 'Traditional Songs and Dances',
                'sr' => 'Tradicionalne pesme i igre',
                'start' => '2025-04-10',
                'end'   => '2025-04-14',
                'location' => 'Ohrid',
            ],
            [
                'mk' => 'Традиционални песни и ора',
                'en' => 'Traditional Songs and Dances',
                'sr' => 'Tradicionalne pesme i igre',
                'start' => '2025-04-24',
                'end'   => '2025-04-28',
                'location' => 'Ohrid',
            ],
            [
                'mk' => 'Св. Климент и Наум Охридски',
                'en' => 'St. Clement and Naum of Ohrid',
                'sr' => 'Sveti Kliment i Naum Ohridski',
                'start' => '2025-05-08',
                'end'   => '2025-05-12',
                'location' => 'Ohrid',
            ],
            [
                'mk' => 'Св. Климент и Наум Охридски',
                'en' => 'St. Clement and Naum of Ohrid',
                'sr' => 'Sveti Kliment i Naum Ohridski',
                'start' => '2025-05-22',
                'end'   => '2025-05-26',
                'location' => 'Ohrid',
            ],
            [
                'mk' => 'Езерска Разгледница',
                'en' => 'Lake Postcard',
                'sr' => 'Ezerska Razglednica',
                'start' => '2025-06-04',
                'end'   => '2025-06-09',
                'location' => 'Ohrid',
            ],
            [
                'mk' => 'Езерска Разгледница',
                'en' => 'Lake Postcard',
                'sr' => 'Ezerska Razglednica',
                'start' => '2025-06-19',
                'end'   => '2025-06-23',
                'location' => 'Ohrid',
            ],
            [
                'mk' => 'Езерска Разгледница',
                'en' => 'Lake Postcard',
                'sr' => 'Ezerska Razglednica',
                'start' => '2025-06-26',
                'end'   => '2025-06-30',
                'location' => 'Ohrid',
            ],
            [
                'mk' => 'Охридски фолклорни денови',
                'en' => 'Ohrid Folklore Days',
                'sr' => 'Ohridski dani folklora',
                'start' => '2025-07-03',
                'end'   => '2025-07-07',
                'location' => 'Ohrid',
            ],
            [
                'mk' => 'Охридски фолклорни денови',
                'en' => 'Ohrid Folklore Days',
                'sr' => 'Ohridski dani folklora',
                'start' => '2025-07-10',
                'end'   => '2025-07-14',
                'location' => 'Ohrid',
            ],
            [
                'mk' => 'Охридски фолклорни денови',
                'en' => 'Ohrid Folklore Days',
                'sr' => 'Ohridski dani folklora',
                'start' => '2025-07-17',
                'end'   => '2025-07-21',
                'location' => 'Ohrid',
            ],
            [
                'mk' => 'Охридски фолклорни денови',
                'en' => 'Ohrid Folklore Days',
                'sr' => 'Ohridski dani folklora',
                'start' => '2025-07-24',
                'end'   => '2025-07-28',
                'location' => 'Ohrid',
            ],
            [
                'mk' => 'Здравко Банар',
                'en' => 'Zdravko Banar',
                'sr' => 'Zdravko Banar',
                'start' => '2025-08-07',
                'end'   => '2025-08-11',
                'location' => 'Ohrid',
            ],
            [
                'mk' => 'Здравко Банар',
                'en' => 'Zdravko Banar',
                'sr' => 'Zdravko Banar',
                'start' => '2025-08-14',
                'end'   => '2025-08-18',
                'location' => 'Ohrid',
            ],
            [
                'mk' => 'Здравко Банар',
                'en' => 'Zdravko Banar',
                'sr' => 'Zdravko Banar',
                'start' => '2025-08-21',
                'end'   => '2025-08-25',
                'location' => 'Ohrid',
            ],
            [
                'mk' => 'Здравко Банар',
                'en' => 'Zdravko Banar',
                'sr' => 'Zdravko Banar',
                'start' => '2025-08-28',
                'end'   => '2025-09-01',
                'location' => 'Ohrid',
            ],
            [
                'mk' => 'Атанас Колароски',
                'en' => 'Atanas Kolaroski',
                'sr' => 'Atanas Kolaroski',
                'start' => '2025-09-04',
                'end'   => '2025-09-08',
                'location' => 'Struga',
            ],
            [
                'mk' => 'Атанас Колароски',
                'en' => 'Atanas Kolaroski',
                'sr' => 'Atanas Kolaroski',
                'start' => '2025-09-11',
                'end'   => '2025-09-15',
                'location' => 'Struga',
            ],
            [
                'mk' => 'Атанас Колароски',
                'en' => 'Atanas Kolaroski',
                'sr' => 'Atanas Kolaroski',
                'start' => '2025-09-25',
                'end'   => '2025-09-29',
                'location' => 'Struga',
            ],
            [
                'mk' => 'Фолклорна есен',
                'en' => 'Folklore Fall',
                'sr' => 'Jesen folklora',
                'start' => '2025-10-02',
                'end'   => '2025-10-06',
                'location' => 'Ohrid',
            ],
            [
                'mk' => 'Фолклорна есен',
                'en' => 'Folklore Fall',
                'sr' => 'Jesen folklora',
                'start' => '2025-10-16',
                'end'   => '2025-10-20',
                'location' => 'Ohrid',
            ],
            [
                'mk' => 'Ноември во Охрид',
                'en' => 'November in Ohrid',
                'sr' => 'Novembar u Ohridu',
                'start' => '2025-11-13',
                'end'   => '2025-11-17',
                'location' => 'Ohrid',
            ],
            [
                'mk' => 'Ноември во Охрид',
                'en' => 'November in Ohrid',
                'sr' => 'Novembar u Ohridu',
                'start' => '2025-11-27',
                'end'   => '2025-12-01',
                'location' => 'Ohrid',
            ],
        ];

        foreach ($festivals as $f) {
            Festival::create([
                'name_mk' => $f['mk'],
                'name_en' => $f['en'],
                'name_sr' => $f['sr'],
                'slug' => Str::slug($f['en'] . '-' . $f['start']),
                'start_date' => $f['start'],
                'end_date' => $f['end'],
                'location' => $f['location'],
                'year' => 2025,
            ]);
        }
    }
}
