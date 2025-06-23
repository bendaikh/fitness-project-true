<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Faq\app\Models\Faq;
use Modules\Faq\app\Models\FaqTranslation;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FaqTranslation::truncate();
        Faq::truncate();

        $faqs = [
            [
                'question' => 'How often should I exercise each week?',
                'answer' => 'The ideal frequency of exercise depends on your fitness goals and current fitness level. For general health, the American Heart Association recommends at least 150 minutes of moderate-intensity aerobic exercise per week or 75 minutes of vigorous-intensity exercise, combined with muscle-strengthening activities on two or more days a week. ',
                'lang_code' => 'en',
            ],
            [
                'question' => 'What is the best type of exercise for weight loss?',
                'answer' => 'The most effective exercise for weight loss often combines both cardiovascular (cardio) and strength training. Cardio exercises like running, cycling, or swimming help burn calories and improve cardiovascular health. Strength training, such as weight lifting or bodyweight exercises, builds muscle, which in turn boosts your resting metabolic rate.',
                'lang_code' => 'en',
            ],
            [
                'question' => 'How do I know if I’m drinking enough water?',
                'answer' => "A common guideline is to drink about 8 cups (64 ounces) of water a day, but individual needs can vary. To gauge if you’re well-hydrated, check the color of your urine—it should be light yellow. Darker urine can indicate dehydration. Other signs include feeling thirsty, dry mouth, or dizziness. If you're active or live in a hot climate, you may need to drink more. ",
                'lang_code' => 'en',
            ],
            [
                'question' => 'What should I eat before and after a workout?',
                'answer' => 'Before a Workout: Eat a balanced meal 1-3 hours before exercising. Focus on carbohydrates for energy and some protein for muscle support. Examples include oatmeal with fruit, a banana with peanut butter, or a yogurt parfait. Avoid heavy or greasy foods that might cause discomfort.Consume a meal or snack within 30-60 minutes post-exercise to aid recovery.',
                'lang_code' => 'en',
            ],
            [
                'question' => 'How can I avoid injury while working out?',
                'answer' => 'To avoid injury, prioritize proper form and technique in all exercises. Start with lighter weights or lower intensity to master the movements before progressing. Incorporate a warm-up before starting your workout and cool down afterward to prepare your muscles and help in recovery. Listen to your body—don’t push through pain. ',
                'lang_code' => 'en',
            ],
            [
                'question' => 'How important is sleep for fitness?',
                'answer' => 'Sleep is crucial for overall fitness and recovery. During sleep, the body repairs muscles, synthesizes proteins, and releases growth hormones. Inadequate sleep can impair your performance, hinder muscle growth, and increase the risk of injury. Aim for 7-9 hours of quality sleep per night to support optimal health and fitness. ',
                'lang_code' => 'en',
            ],
            [
                'question' => 'Can I build muscle and lose fat at the same time?',
                'answer' => 'Yes, it’s possible to build muscle and lose fat simultaneously, especially for beginners or those returning after a break. This process, known as body recomposition, involves a combination of resistance training and a carefully managed diet. To achieve this, focus on strength training to build muscle, maintain a slight caloric deficit .',
                'lang_code' => 'en',
            ],
        ];

        foreach ($faqs as $faq) {
            $faqModel = Faq::create(['status' => 1]);
            $faqModel->translations()->create($faq);
        }
    }
}
