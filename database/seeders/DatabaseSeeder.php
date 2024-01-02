<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Card;
use App\Models\Type;
use App\Models\Subtype;
use App\Models\User;
use App\Models\Income;
use App\Models\Source;
use App\Models\Expense;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(4)->create();

        User::create([
            'name' => 'Zaky Imad',
            'email' => 'zakyimad@gmail.com',
            'password' => bcrypt('admin'),
            'username' => 'zakyimad'
        ]);

        Subtype::create([
            'name' => 'Makanan',
            'slug' => 'foods'
        ]);

        Subtype::create([
            'name' => 'Kerja',
            'slug' => 'Work'
        ]);

        Subtype::create([
            'name' => 'HP',
            'slug' => 'handphones'
        ]);

        Subtype::create([
            'name' => 'Motor',
            'slug' => 'cycle'
        ]);

        Subtype::create([
            'name' => 'Londri',
            'slug' => 'loundry'
        ]);

        Subtype::create([
            'name' => 'Kuota',
            'slug' => 'quota'
        ]);

        Type::create([
            'name' => 'Needs',
            'slug' => 'needs'
        ]);

        Type::create([
            'name' => 'Wants',
            'slug' => 'wants'
        ]);

        Type::create([
            'name' => 'Savings',
            'slug' => 'savings'
        ]);

        Card::create([
            'name' => 'Cash',
            'amount' => 60000
        ]);

        Card::create([
            'name' => 'BRI',
            'amount' => 100000
        ]);

        Card::create([
            'name' => 'BSI',
            'amount' => 20000
        ]);

        Card::create([
            'name' => 'Shopee Pay/Dana',
            'amount' => 0
        ]);

        Payment::create([
            'name' => 'Cash'
        ]);

        Payment::create([
            'name' => 'QRIS'
        ]);

        Payment::create([
            'name' => 'ATM Card'
        ]);

        Payment::create([
            'name' => 'SPay'
        ]);

        Source::create([
            'name' => 'Gaji Pokok'
        ]);

        Source::create([
            'name' => 'Tunjangan Kinerja'
        ]);

        Source::create([
            'name' => 'Uang Makan'
        ]);

        Source::create([
            'name' => 'Transfer'
        ]);

        Source::create([
            'name' => 'Lain-lain'
        ]);

        Transaction::factory(10)->create();
        Expense::factory(150)->create();
        Income::factory(150)->create();
    }
};
