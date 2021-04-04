<?php

namespace App\Modules\Users\Exports;

use App\Modules\Users\Models\Role;
use App\Modules\Users\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class RoleExport implements   FromCollection, WithHeadings, ShouldAutoSize,WithStrictNullComparison
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
            'Display Name',
            'Description',
            'Type',
            'Created at',
        ];
    }

    /**
     * @return Collection
     */
    public function collection()
    {
      return  Role::orderBy('id','desc')->select(['id', 'name', 'display_name', 'description', 'type' ,'created_at'])->get();
        }
}
