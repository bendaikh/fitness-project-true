<?php

namespace Database\Seeders;

use App\Models\ContactPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contactPage = ContactPage::create([
            'address' => '7232 Broadway 308, Jackson Heights, 11372',
            'email' => 'fitnes@mail.com\r\nfitnes.company@mail.com',
            'phone' => '+1 (000)-123-4567\r\n+1 (000)-123-4568',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.6811392045543!2d-73.89520842481936!3d40.7470412713884!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25f01328248b3%3A0x62300784dd275f96!2s7232%20Broadway%20%23%20308%2C%20Flushing%2C%20NY%2011372%2C%20USA!5e0!3m2!1sen!2sbd!4v1717646173942!5m2!1sen!2sbd',
            'image' => 'uploads/custom-images/wsus-img-2024-06-06-03-57-00-7044.jpg',
        ]);
        $contactPage->translations()->create([
            'lang_code' => 'en',
            'title' => 'Ask your <span>QUESTION HERE</span>',
            'subtitle' => '',
        ]);
    }
}
