<?php

namespace App\Exports;

use App\Models\Employee\EmployeeDetails;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Employees_Details_Export implements FromCollection, WithHeadings
{
    public function collection()
    {
        $user_id = Auth::id();
        $jsonData = EmployeeDetails::select('*')
            ->where('user_id', '=', $user_id)
            ->first();

        if (! $jsonData) {
            return collect(); // Return an empty collection if no data found
        }

        $jsonDecode = json_decode($jsonData->Emp_Details, true);
        $filteredData = array_filter($jsonDecode);

        $formattedData = array_map(function ($item) use ($jsonData) {
            return [
                'User Id' => $jsonData->user_id,
                'Emp Id' => $item['Emp Id'],
                'Emp Name' => $item['Emp Name'],
                'DOB' => $item['DOB'],
                'Qualification' => $item['Qualification'],
                'Additional Skills' => $item['Additional Skills'],
                'Experience' => $item['Experience'],
                'Employee Email' => $item['Employee Email'],
                'Employee Mobile' => $item['Employee Mobile'],
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
            'Emp Id',
            'Emp Name',
            'DOB',
            'Qualification',
            'Additional Skills',
            'Experience',
            'Employee Email',
            'Employee Mobile',
            'Created At',
            'Updated At',
        ];
    }
}
