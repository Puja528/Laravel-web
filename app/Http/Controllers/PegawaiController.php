<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;  // Pastikan untuk mengimport class DateTime

class PegawaiController extends Controller
{
    public function index()
    {
        // Fungsi untuk menghitung umur
        function calculate_age($birth_date) {
            $birth_date = new DateTime($birth_date);
            $today = new DateTime();
            $interval = $today->diff($birth_date);
            return $interval->y;
        }

        // Fungsi untuk menghitung sisa waktu hingga wisuda
        function time_to_graduation($tgl_harus_wisuda) {
            $graduation_date = new DateTime($tgl_harus_wisuda);
            $today = new DateTime();
            $interval = $today->diff($graduation_date);
            return $interval->days;
        }

        // Data yang diberikan
        $birth_date = '2005-11-05';  // Tanggal lahir
        $tgl_harus_wisuda = '2028-08-28'; // Tanggal wisuda
        $current_semester = 3;

        // Menghitung umur dan sisa waktu wisuda
        $my_age = calculate_age($birth_date);
        $time_to_study_left = time_to_graduation($tgl_harus_wisuda);

        // Logika untuk semester
        if ($current_semester < 3) {
            $semester_message = "Masih Awal, Kejar TAK!";
        } else {
            $semester_message = "Jangan main-main, kurangi-kurangi main game!";
        }

        // Menyiapkan data untuk dikirim ke view
        $data = [
            'nama'               => 'Puja Erista',
            'my_age'             => $my_age,
            'hobbies'            => ['Baca','Nulis','Nyanyi','Ngoding','Design'],
            'time_to_study_left' => $time_to_study_left,
            'current_semester'   => $current_semester,
            'future_goal'        => 'Lulus dengan baik',
            'semester_message'   => $semester_message
        ];

        // Mengirim data ke view
        return view('home-pegawai', $data);
    }
}
