<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banks = [
            ['name' => 'Сбербанка', 'code' => 'sbp'],
            ['name' => 'Альфа-Банк','code' => 'alfa'],
            ['name' => 'СовкомБанк', 'code' => 'sovcombank']
        ];

        foreach ($banks as $bank) {
            $newBank = Bank::query()->whereCode($bank['code'])->first();
            if (is_null($newBank)) {
                (new Bank())
                    ->setCode($bank['code'])
                    ->setName($bank['name'])
                    ->save();
            }
        }
    }
}
