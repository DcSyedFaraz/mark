<?php

namespace App\Imports;

use App\Models\User;
use App\Models\YourTableName;
use Hash;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);

        $waterSystem = ($row['water_system'] == "X") ? 'voting' : 'non-voting';
        $access = 'approved';

        $user = new User([
            'name' => $row['name'],
            'street' => $row['street'],
            'address' => $row['citystatezip'],
            'status' => $waterSystem,
            'email' => $row['email'],
            'access' => $access,
            'password' => Hash::make('12345678'),
            'phone' => $row['phone_1'],
            'phone_1' => $row['phone'],
            'mailing_address' => $row['mailing_address'],
        ]);

        // Check if the 'role' column exists in the CSV and if the role exists in the database
        $user->assignRole('member'); // Assign the role to the user


        return $user;
        // return new YourTableName([
        //     'Name' => $row['name'],
        //     'Street' => $row['street'],
        //     'CityStateZip' => $row['citystatezip'],
        //     'WaterSystem' => $waterSystem,
        //     'Email1' => $row['email'],
        //     'Email2' => $row['email_2'],
        //     'Phone1' => $row['phone_1'],
        //     'Phone2' => $row['phone_2'],
        //     'Phone' => $row['phone'],
        //     'Animal' => $row['animal'],
        //     'MailingAddress' => $row['mailing_address'],
        // ]);


    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['unique:users,email', 'required'],
        ];
    }

    // public function customValidationMessages()
    // {
    //     return [
    //         'Email1.required' => 'Abe Email to daaaal.',
    //         'Name.required' => 'Yelo Naam nh dela wah.',
    //     ];
    // }
}



