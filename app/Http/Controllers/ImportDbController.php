<?php

namespace App\Http\Controllers;

use App\Jobs\ImportDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportDbController extends Controller
{

    public function index()
    {
        DB::unprepared(file_get_contents(public_path('dump.sql')));
    }

    public function importDatabase()
    {
        // Panggil job untuk menjalankan proses impor basis data
        ImportDatabase::dispatch();

        return "Proses impor basis data telah dimulai.";
    }
}
