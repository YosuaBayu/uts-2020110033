<?php

namespace Database\Seeders;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{

    public function run(): void
    {
        $types = ['income', 'expense'];
        $incomeCategories = ['wage', 'bonus', 'gift'];
        $expenseCategories = ['food & drinks', 'shopping', 'charity', 'housing', 'insurance', 'taxes', 'transportation'];

        for ($i = 1; $i <= 100; $i++) {
            $type = $types[rand(0, 1)];
            $category = $type === 'income' ? $incomeCategories[rand(0, 2)] : $expenseCategories[rand(0, 6)];

            Transaction::create([
                'amount' => rand(10, 1000),
                'type' => $type,
                'category' => $category,
                'notes' => 'Transaction ' . $i,
            ]);
        }
    }
}
