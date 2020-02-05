<?php

namespace App\Exports;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use App\OKR;
use Carbon\Carbon;
class okrExport implements FromCollection, WithHeadings, ShouldAutoSize, Responsable
{
    use Exportable;
    private $fileName = 'OKR_today.xlsx';
    public function collection()
    {
        return OKR::whereDate('created_at', Carbon::today())
                    ->orWhereDate('updated_at', Carbon::today())->get();
    }
    public function headings(): array
    {
        return [
            '#',
            'user_id',
            'name',
            'level',
            'weeknum',
            'objective',
            'description',
            'date_recieved',
            'date_due',
            'man_hours',
            'status',
            'remarks',
            'created_at',
            'updated_at',

        ];
    } 

}

?>