<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\User;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = User::all()->pluck('id')->all();

        $customers = [
            [
                "first_name" => "Paolo",
                "last_name" => "Blu",
                "address" => "Via Roma 1",
                "phone_number" => "3375468651",

                "user_id" => 1,
            ],
        ];

        foreach ($customers as $customer) {
            $newcustomer = new Customers();
            $newcustomer->first_name = $customer['first_name'];
            $newcustomer->last_name = $customer['last_name'];
            $newcustomer->address = $customer['address'];
            $newcustomer->phone_number = $customer['phone_number'];

            //$newcustomer->user_id = $customer['user_id'];

            $newcustomer->save();

        }
    }
}
