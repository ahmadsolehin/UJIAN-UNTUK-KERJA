<?php

namespace App\Exports;

use App\order as OrderModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Symfony\Component\HttpFoundation\BinaryFileResponse;


class OrderExport implements FromCollection,WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	$data = OrderModel::selectRaw('agent , extract(month from created_at) as MONTH, extract(year from created_at) as YEAR, product, sum(total_award_point) as SUM')
        ->where('status','delivered')
        ->where('subtotal','>' ,'200')
        ->groupBy( 'agent')
        ->get();

        return $data;
    }

    public function headings(): array
    {
        return [
            'AGENT',
            'MONTH',
            'YEAR',
            'PRODUCT',
            'TOTAL AWARD POINT'
        ];
    }
}
