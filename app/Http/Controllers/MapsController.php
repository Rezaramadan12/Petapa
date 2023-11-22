<?php

namespace App\Http\Controllers;

use App\Models\Maps;
use App\Models\Polnep;
use App\Models\Rusunawa;
use App\Models\Siskom;
use App\Models\UMP;
use App\Models\Untan;
use Illuminate\Http\Request;

class MapsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $title = 'Maps';
    //     // $maps = Maps::all();

    //     return view('maps.maps', compact('title'));
    // }
    public function cobaindex()
    {
        $data['title'] = 'Maps';
        $data['untan'] = Untan::orderBy('id', 'DESC')->first();
        $data['polnep'] = Polnep::orderBy('id', 'DESC')->first();
        $data['ump'] = UMP::orderBy('id', 'DESC')->first();
        $data['rusunawa'] = Rusunawa::orderBy('id', 'DESC')->first();
        $data['siskom_tps1'] = Siskom::where('id_sensor', 1)
            ->orderBy('id', 'DESC')
            ->first();
        $data['siskom_tps2'] = Siskom::where('id_sensor', 2)
            ->orderBy('id', 'DESC')
            ->first();
        $data['total_siskom'] =
            ($data['siskom_tps1']->kapasitas +
                $data['siskom_tps2']->kapasitas) /
            2;

        // Inisialisasi array volumes dan tambahkan model ke dalamnya
        $volumes = [
            'polnep' => [
                'model' => 'polnep',
                'volume' => $data['polnep']->volumetotaledge,
                'jarak' => 4,
            ],
            'untan' => [
                'model' => 'untan',
                'volume' => $data['untan']->volumetotaledge,
                'jarak' => 3,
            ],
            'siskom' => [
                'model' => 'siskom',
                'volume' => $data['total_siskom'],
                'jarak' => 2,
            ],
            'rusunawa' => [
                'model' => 'rusunawa',
                'volume' => $data['rusunawa']->volumetotaledge,
                'jarak' => 1,
            ],
        ];

        // Buat fungsi kustom untuk pengurutan
        usort($volumes, function ($a, $b) {
            if ($a['volume'] > 66 && $b['volume'] > 66) {
                // Kedua nilai volume di atas 66, urutkan berdasarkan jarak terdekat
                return $a['jarak'] - $b['jarak'];
            } elseif (
                $a['volume'] >= 34 &&
                $a['volume'] <= 65 &&
                $b['volume'] >= 34 &&
                $b['volume'] <= 65
            ) {
                // Kedua nilai volume antara 34 dan 65, urutkan berdasarkan jarak terdekat
                return $a['jarak'] - $b['jarak'];
            } elseif (
                $a['volume'] >= 0 &&
                $a['volume'] <= 33 &&
                $b['volume'] >= 0 &&
                $b['volume'] <= 33
            ) {
                // Kedua nilai volume antara 0 dan 33, urutkan berdasarkan jarak terdekat
                return $a['jarak'] - $b['jarak'];
            } elseif ($a['volume'] > 66) {
                // Hanya $a yang di atas 66, letakkan $a di atas $b
                return -1;
            } elseif ($b['volume'] > 66) {
                // Hanya $b yang di atas 66, letakkan $b di atas $a
                return 1;
            } else {
                // Kedua nilai volume di bawah 34, urutkan berdasarkan volume secara descending
                return $b['volume'] - $a['volume'];
            }
        });

        // usort($volumes, function ($a, $b) {
        //     if ($a['volume'] > 66 && $b['volume'] > 66) {
        //         // Kedua nilai volume di atas 66, urutkan berdasarkan jarak terdekat
        //         return $a['jarak'] - $b['jarak'];
        //     } elseif ($a['volume'] > 66) {
        //         // Hanya $a yang di atas 66, letakkan $a di atas $b
        //         return -1;
        //     } elseif ($b['volume'] > 66) {
        //         // Hanya $b yang di atas 66, letakkan $b di atas $a
        //         return 1;
        //     } else {
        //         // Kedua nilai volume di bawah 66, urutkan berdasarkan volume secara descending
        //         return $b['volume'] - $a['volume'];
        //     }
        // });

        // Lakukan perengkingan dengan memberikan nomor peringkat
        $rankedData = [];
        $ranking = 1;
        foreach ($volumes as $volumeData) {
            $rankedData[] = [
                'model' => $volumeData['model'],
                'volume' => $volumeData['volume'],
                'ranking' => $ranking,
            ];
            $ranking++;
        }

        // Sekarang, $rankedData berisi data yang diurutkan berdasarkan kedua kriteria yang Anda inginkan

        // Mengelompokkan data kembali jika diperlukan
        $groupData = [];
        foreach ($rankedData as $item) {
            $model = $item['model'];

            if (!isset($groupData[$model])) {
                $groupData[$model] = [];
            }

            $groupData[$model] = $item;
        }

        $data['rankSiskom'] = $groupData['siskom'];
        $data['rankUntan'] = $groupData['untan'];
        $data['rankRusunawa'] = $groupData['rusunawa'];
        $data['rankPolnep'] = $groupData['polnep'];

        // $maps = Maps::all();

        return view('maps.maps', $data);

        // Gabungkan nilai-nilai volume dalam satu array
        // $volumes = [
        //     'polnep' => $data['polnep']->volumetotaledge,
        //     'untan' => $data['untan']->volumetotaledge,
        //     'siskom' => $data['total_siskom'],
        //     'rusunawa' => $data['rusunawa']->volumetotaledge,
        // ];

        // // Lakukan pengurutan array secara descending berdasarkan nilai volume
        // arsort($volumes);

        // // Lakukan perengkingan dengan memberikan nomor peringkat
        // $rankedData = [];
        // $ranking = 1;
        // foreach ($volumes as $model => $volume) {
        //     $rankedData[] = [
        //         'model' => $model,
        //         'volume' => $volume,
        //         'ranking' => $ranking,
        //     ];
        //     $ranking++;
        // }

        // $groupData = [];
        // foreach ($rankedData as $item) {
        //     $model = $item['model'];

        //     if (!isset($groupData[$model])) {
        //         $groupData[$model] = [];
        //     }

        //     $groupData[$model] = $item;
        // }

        // $data['rankSiskom'] = $groupData['siskom'];
        // $data['rankUntan'] = $groupData['untan'];
        // $data['rankRusunawa'] = $groupData['rusunawa'];
        // $data['rankPolnep'] = $groupData['polnep'];
        // $maps = Maps::all();
    }
    // public function data()
    // {
    //     $data['untan'] = Untan::orderBy('id', 'DESC')->first();
    //     $data['polnep'] = Polnep::orderBy('id', 'DESC')->first();
    //     $data['ump'] = UMP::orderBy('id', 'DESC')->first();
    //     $data['rusunawa'] = Rusunawa::orderBy('id', 'DESC')->first();

    //     // Gabungkan nilai-nilai volume dalam satu array
    //     $volumes = [
    //         'untan' => $data['untan']->volumetotaledge,
    //         'ump' => $data['ump']->volumetotaledge,
    //         'rusunawa' => $data['rusunawa']->volumetotaledge,
    //         'polnep' => $data['polnep']->volumetotaledge,
    //     ];

    //     // Lakukan pengurutan array secara descending berdasarkan nilai volume
    //     arsort($volumes);

    //     // Lakukan perengkingan dengan memberikan nomor peringkat
    //     $rankedData = [];
    //     $ranking = 1;
    //     foreach ($volumes as $model => $volume) {
    //         $rankedData[] = [
    //             'model' => $model,
    //             'volume' => $volume,
    //             'ranking' => $ranking,
    //         ];
    //         $ranking++;
    //     }

    //     $groupData = [];
    //     foreach ($rankedData as $item) {
    //         $model = $item['model'];

    //         if (!isset($groupData[$model])) {
    //             $groupData[$model] = [];
    //         }

    //         $groupData[$model] = $item;
    //     }

    //     $data['rankUmp'] = $groupData['ump'];
    //     $data['rankUntan'] = $groupData['untan'];
    //     $data['rankRusunawa'] = $groupData['rusunawa'];
    //     $data['rankPolnep'] = $groupData['polnep'];

    //     return $data;
    // }
}
