<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
//            'secret_code' => 'eyJpdiI6IjlwSEJiU3NNbHFnYTBoTWtxREoveHc9PSIsInZhbHVlIjoiak9zM0xXaUNBR1VSckR2dU50Yjlwc2RIMFVNSVJBTWlndnpSVS9RQmxjUT0iLCJtYWMiOiJhYWFkZjlkYjQ3OGY2NDkwM2E0M2YxNzgzYzk5Nzg2ZDkxY2I0MGYzYTc2YzFkZGVjOGU0Yzg0NzQzNTlhYThhIn0='
        ]);
    }
}
