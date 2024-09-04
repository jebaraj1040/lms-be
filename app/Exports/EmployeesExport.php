<?php

namespace App\Exports;

use App\Models\Employee\Employees_Documents;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $user_id = Auth::id();
        $jsonData = Employees_Documents::select('*')
            ->where('user_id', '=', $user_id)
            ->first();

        if (! $jsonData) {
            return collect(); // Return an empty collection if no data found
        }

        $jsonDecode = json_decode($jsonData->json_data, true);

        $filteredData = array_filter($jsonDecode, function ($item) {
            return $item['Status'] !== 'Offer Dropped';
        });

        $formattedData = array_map(function ($item) use ($jsonData) {
            return [
                'User Id' => $jsonData->user_id,
                'Team Lead' => $item['Team'],
                'Tech' => $item['Tech'],
                'Candidate' => $item['Candidate'],
                'Status' => $item['Status'],
                'Rating' => $item['Rating'],
                'DOJ' => $item['DOJ'],
                'Created At' => $jsonData->created_at,
                'Updated At' => $jsonData->updated_at,
            ];
        }, $filteredData);

        return collect($formattedData);
    }

    public function headings(): array
    {
        return [
            'User Id',
            'Team Lead',
            'Tech',
            'Candidate',
            'Status',
            'Rating',
            'DOJ',
            'Created At',
            'Updated At',
        ];
    }
}
