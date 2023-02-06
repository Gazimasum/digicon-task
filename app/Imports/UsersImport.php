<?php

namespace App\Imports;
  
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;

use Illuminate\Support\Facades\Hash;

class UsersImport implements ToCollection, WithHeadingRow, SkipsOnError,WithValidation,SkipsOnFailure

{
    use Importable, SkipsErrors, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
         
  
        foreach ($rows as $row) {
         User::create([
                        'name' => $row['name'],
                        'email' => $row['email'],
                        'phone' => $row['phone'],
                        'password' => Hash::make('password'),
                        'company' =>  $row['company'],
                         'designation' =>  $row['designation'],
                         'present_address' =>  $row['present_address'],
                         'permanent_address' =>  $row['permanent_address'],

                    ]);
    
        }
     }
      public function rules(): array
    {
        return [
             '*.name' => ['required', 'string', 'min:3'],
             '*.email' => ['required', 'string', 'email:rfc', 'max:255', 'unique:users'],
             '*.password' => ['required', 'min:6'],
             '*.phone' => ['required','min:8','max:11','unique:users'],
             '*.company' => ['required','min:3','max:200'],
             '*.designation' => ['required','min:3','max:200'],
             '*.present_address' => ['required','max:250','min:3'],
             '*.permanent_address' => ['required','max:250','min:3'],

        ];
    }


}