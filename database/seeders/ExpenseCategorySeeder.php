<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            'GIDA/MARKET GİDERİ',
            'AIDAT GİDERİ',
            'SAĞLIK GİDERİ',
            'EĞİTİM GİDERİ',
            'ISINMA GİDERİ',
            'ARAÇ BAKIM GİDERİ',
            'TAMİR/TADİLAT',
            'SU GİDERİ',
            'TELEFON GİDERİ',
            'ELEKTRİK GİDERİ',
            'İNTERNET GİDERİ',
            'DOĞALGAZ GİDERİ',
            'ARAÇ YAKIT GİDERİ',
            'HEDİYE GİDERİ',
            'YEMEK GİDERİ(DIŞARDAN)',
            'HAYIR/BAĞIŞ GİDERİ',
            'ZUCCACİYE/BUJİTERİ GİDERLERİ',
            'GIYIM GİDERİ',
            'KUAFÖR GİDERİ',
            'MİSAFİR AĞIRLAMA',
            'SOSYAL GİDERLER(KONSER,SİNEMA,MAÇ)',
            'EĞLENCE GİDERİ',
            'EV EŞYASI ALIM GİDERİ',
            'TEMİZLİK GİDERİ',
            'SERVİS GİDERİ',
            'DIŞARDAN ALINAN HİZMETLER',
            'VERGİ, CEZA VE RESMİ KURUMLAR',
            'EVCİL HAYVAN GİDERLERİ',
            'YAZILIM, PROGRAM, UYGULAMA GİDERLERİ',
            'SİGORTA GİDERLERİ',
            'HARÇLIK, BURS GİDERLERİ',
            'ULAŞIM GİDERİ',
            'ÜYELİK VE ABONELİK GİDERLERİ',
            'BANKA KREDİ, KART ÖDEMELERİ',
            'DİĞER GİDERLER',
        ];

        foreach ($categories as $category) {
            \App\Models\ExpenseCategory::create(['name' => $category]);
        }
    }

}
