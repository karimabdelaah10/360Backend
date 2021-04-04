<?php

namespace App\Modules\Users\Exports;

use App\Modules\Users\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class UsersExport implements   FromCollection, WithHeadings, ShouldAutoSize,WithStrictNullComparison
{
    use Exportable;
    /**
     * @return Builder
     */

    /**
     * @return Collection
     */
//    public function collection()
//    {
//        return  User::orderBy('id','desc')->get();
//    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return  ['#',
            'Name',
            'Email',
            'Mobile',
            'Is Admin',
            'Created at',
        ];
    }

    /**
     * @return Collection
     */
    public function collection()
    {
      return  User::orderBy('id','desc')->select(['id', 'first_name', 'email', 'mobile_number', 'is_admin' ,'created_at'])->get();
        }
}
