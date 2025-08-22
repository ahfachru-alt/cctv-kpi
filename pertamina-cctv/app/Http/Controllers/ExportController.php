<?php

namespace App\Http\Controllers;

use App\Models\Cctv;
use App\Models\User;
use Spatie\SimpleExcel\SimpleExcelWriter;

class ExportController extends Controller
{
    public function users()
    {
        $path = storage_path('app/exports/users-'.now()->format('YmdHis').'.xlsx');
        $writer = SimpleExcelWriter::create($path);
        $writer->addHeader(['name', 'email']);
        User::select('name', 'email')->chunk(1000, function ($chunk) use ($writer) {
            foreach ($chunk as $row) {
                $writer->addRow($row->toArray());
            }
        });
        $writer->close();

        return response()->download($path)->deleteFileAfterSend(true);
    }

    public function cctvs()
    {
        $path = storage_path('app/exports/cctvs-'.now()->format('YmdHis').'.xlsx');
        $writer = SimpleExcelWriter::create($path);
        $writer->addHeader(['name', 'status', 'ip', 'building', 'room']);
        Cctv::with(['building', 'room'])->chunk(1000, function ($chunk) use ($writer) {
            foreach ($chunk as $c) {
                $writer->addRow([
                    'name' => $c->name,
                    'status' => $c->status,
                    'ip' => $c->ip_address,
                    'building' => optional($c->building)->name,
                    'room' => optional($c->room)->name,
                ]);
            }
        });
        $writer->close();

        return response()->download($path)->deleteFileAfterSend(true);
    }
}
