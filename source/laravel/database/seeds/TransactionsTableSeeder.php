<?php

use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactions = [
            [
                'from_user_id' => 1,
                'to_user_id' => 2,
                'amount' => 10000,
                'created_at' => '2020-01-20 20:05:06',
                'updated_at' => '2020-01-20 20:05:06',
                'transfer_time' => '2020-01-20 20:05:06',
                'status' => '2',
            ],
            [
                'from_user_id' => 2,
                'to_user_id' => 3,
                'amount' => 25000,
                'created_at' => '2020-01-21 16:00:10',
                'updated_at' => '2020-01-21 16:00:10',
                'transfer_time' => '2020-01-21 16:00:10',
                'status' => '2',
            ],
            [
                'from_user_id' => 3,
                'to_user_id' => 1,
                'amount' => 50000,
                'created_at' => '2020-01-21 17:00:00',
                'updated_at' => '2020-01-21 17:00:00',
                'transfer_time' => '2020-01-21 17:00:00',
                'status' => '2',
            ],
            [
                'from_user_id' => 1,
                'to_user_id' => 2,
                'amount' => 70000,
                'created_at' => '2020-01-21 17:00:00',
                'updated_at' => '2020-01-21 17:00:00',
                'transfer_time' => '2020-01-21 17:00:00',
                'status' => '2',
            ],
        ];

        foreach ($transactions as $transaction) {

            DB::table('transactions')->insert([
                'from_user_id' => $transaction['from_user_id'],
                'to_user_id' => $transaction['to_user_id'],
                'status' => $transaction['status'],
                'amount' => $transaction['amount'],
                'created_at' => $transaction['created_at'],
                'updated_at' => $transaction['updated_at'],
                'transfer_time' => $transaction['transfer_time'],
            ]);

        }


    }
}
