<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Modules\Blog\app\Models\Blog;
use Modules\Blog\app\Models\BlogCategory;
use Modules\Blog\app\Models\BlogCategoryTranslation;
use Modules\Blog\app\Models\BlogTranslation;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // diable foreign key check
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Blog::truncate();
        BlogCategory::truncate();
        BlogCategoryTranslation::truncate();
        BlogTranslation::truncate();

        // enable foreign key check
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $categories = [
            'Workout Plans',
            'Healthy Eating',
            'Mental Toughness',
            'Weight Loss',
            'Strength Training',
            'Beginner Fitness',
            'Yoga Practice',
            'Sports Conditioning',
            'Injury Prevention',
            'Fitness Tech',
        ];

        foreach ($categories as $index => $category) {
            $blogCategory = new BlogCategory();
            $blogCategory->position = $index + 1;
            $blogCategory->slug = Str::slug($category);
            $blogCategory->save();
            $languages = allLanguages();
            foreach ($languages as $language) {
                $translationModel = new BlogCategoryTranslation();
                $translationModel->blog_category_id = $blogCategory->id;
                $translationModel->lang_code = $language->code;
                $translationModel->title = $category;
                $translationModel->save();
            }
        }

        $request = (object) [
            [
                'title' => 'Full-Body Circuit Workout',
                'description' => "A full-body circuit workout is a fantastic starting point for beginners. It’s efficient, targets all the major muscle groups, and provides a blend of strength training and cardio. The idea behind a circuit workout is to move quickly from one exercise to the next with minimal rest in between, keeping your heart rate elevated and maximizing calorie burn.

Why It’s Great for Beginners:

Efficiency: You’re working out multiple muscle groups in a short amount of time.
Simplicity: The exercises are straightforward and don’t require specialized equipment.
Adaptability: You can easily adjust the number of rounds or reps based on your fitness level.
Example Circuit:

Push-Ups: 10-15 reps
Targets chest, shoulders, and triceps while engaging the core for stability.
Bodyweight Squats: 15-20 reps
Focuses on the quads, hamstrings, and glutes, with secondary engagement of the core.
Bent-Over Rows: 12-15 reps (using dumbbells or resistance bands)
Strengthens the upper back, lats, and biceps.
Plank: Hold for 30 seconds
An excellent core stabilizer that also engages the shoulders and glutes.
Jumping Jacks: 30 seconds
A great cardio burst that works the whole body, especially the legs and shoulders.
How to Perform:
Complete the exercises in the order listed, with minimal rest between each. After completing all five exercises, rest for 1-2 minutes, then repeat the circuit 3-4 times. As you progress, you can increase the number of reps or rounds to keep challenging your body.",
                'seo_title' => 'Full-Body Circuit Workout',
                'seo_description' => 'Full-Body Circuit Workout',
            ],
            [
                'title' => 'Bodyweight Strength Training',
                'description' => "Bodyweight exercises are a staple in any beginner’s workout arsenal. They require no equipment, can be performed anywhere, and are highly effective at building foundational strength. This type of training focuses on compound movements—exercises that engage multiple muscle groups simultaneously—making it ideal for improving overall strength and coordination.

Why It’s Great for Beginners:

No Equipment Needed: You can do these exercises at home or even outdoors.
Functional Strength: Bodyweight exercises improve strength that translates into everyday activities.
Progressive Difficulty: As you get stronger, you can modify these exercises to increase difficulty.
Example Routine:

Squats: 3 sets of 12 reps
Strengthens the lower body and core, promoting balance and stability.
Push-Ups: 3 sets of 10 reps
Works the chest, shoulders, and triceps while also engaging the core.
Lunges: 3 sets of 10 reps per leg
Targets the quads, hamstrings, and glutes, while also challenging balance.
Glute Bridges: 3 sets of 15 reps
Focuses on the glutes and hamstrings, also engaging the lower back.
Superman: 3 sets of 12 reps
Strengthens the lower back, glutes, and shoulders, promoting spinal health.
How to Perform:
This routine is best performed 2-3 times a week, with a day of rest in between to allow your muscles to recover. Focus on maintaining proper form throughout each exercise, and as you build strength, consider adding more reps or sets, or even combining the exercises into a circuit for added intensity.",
                'seo_title' => 'Bodyweight Strength Training',
                'seo_description' => 'Bodyweight Strength Training',
            ],
            [
                'title' => 'Beginner’s Cardio Routine',
                'description' => "Cardiovascular exercise is crucial for heart health, improving lung capacity, and aiding in weight loss. For beginners, starting with low-impact cardio helps to build endurance without placing too much strain on the joints. This routine is designed to get your heart pumping while being gentle on your body.

Why It’s Great for Beginners:

Low-Impact Options: Reduces the risk of injury and is gentle on the joints.
Improves Endurance: Gradually builds cardiovascular strength, making more intense workouts possible later on.
Variety: Combines different movements to keep the workout interesting and engaging.
Example Routine:

Brisk Walking: 5 minutes warm-up
An effective way to prepare your body for more intense activity.
Jogging in Place: 2 minutes
Boosts heart rate and warms up the leg muscles.
High Knees: 1 minute
Targets the lower abs and legs while keeping the heart rate elevated.
Butt Kicks: 1 minute
Stretches the quads and engages the hamstrings while maintaining cardio intensity.
Jump Rope: 2 minutes
An excellent full-body cardio exercise that improves coordination and burns calories.
Cool Down: 5 minutes of walking
Gradually lowers your heart rate and helps with muscle recovery.
How to Perform:
Start with this routine 2-3 times a week. As your stamina improves, you can increase the duration of each exercise or add more rounds. Always listen to your body—if something feels too intense, take it down a notch and gradually build up.",
                'seo_title' => 'Beginner’s Cardio Routine',
                'seo_description' => 'Beginner’s Cardio Routine',
            ],
            [
                'title' => 'Beginner’s Strength Training Routine',
                'description' => "Flexibility and mobility are critical aspects of fitness that often get overlooked. Incorporating stretching and mobility exercises into your routine helps to prevent injuries, improve posture, and enhance overall performance. This workout focuses on stretching major muscle groups and improving joint mobility.

Why It’s Great for Beginners:

Prevents Injuries: Regular stretching reduces the risk of muscle strains and joint issues.
Improves Posture: Helps correct imbalances and tightness, leading to better posture.
Enhances Performance: Greater flexibility and mobility allow for more efficient movement during workouts.
Example Routine:

Hamstring Stretch: Hold for 30 seconds per leg
Lengthens the hamstrings, reducing tension and improving lower body flexibility.
Hip Flexor Stretch: Hold for 30 seconds per leg
Targets the hip flexors, which are often tight due to prolonged sitting.
Shoulder Stretch: Hold for 30 seconds per arm
Relieves tension in the shoulders and improves upper body mobility.
Cat-Cow Stretch: 10 reps
Increases flexibility in the spine and promotes better spinal alignment.
Child’s Pose: Hold for 1 minute
A gentle stretch for the lower back, hips, and shoulders, promoting relaxation.
How to Perform:
This routine can be done at the end of your workout to help cool down and improve flexibility, or as a standalone session on rest days. Flexibility improvements take time, so consistency is key. Over time, you’ll notice increased range of motion and reduced muscle stiffness.
",
                'seo_title' => 'Beginner’s Strength Training Routine',
                'seo_description' => 'Beginner’s Strength Training Routine',
            ],

            [
                'title' => 'Beginner’s Strength Training with Dumbbells',
                'description' => "Dumbbells are a versatile and accessible piece of equipment for beginners looking to build muscle and strength. Strength training with dumbbells allows for a wide range of exercises that target different muscle groups, and it’s easy to progress by gradually increasing the weight as you get stronger.

Why It’s Great for Beginners:

Versatile: Dumbbells can be used for a variety of exercises targeting different muscle groups.
Scalable: Start with light weights and increase as you gain strength.
Functional Strength: Helps build strength that translates to everyday activities, like lifting and carrying.
Example Routine:

Dumbbell Squats: 3 sets of 10 reps
Targets the quads, glutes, and core while also improving balance.
Dumbbell Bench Press: 3 sets of 10 reps
Strengthens the chest, shoulders, and triceps.
Dumbbell Rows: 3 sets of 12 reps per arm
Focuses on the upper back and biceps, promoting better posture.
Dumbbell Shoulder Press: 3 sets of 10 reps
Builds shoulder strength and stability.
Dumbbell Deadlifts: 3 sets of 12 reps
Engages the hamstrings, glutes, and lower back, improving posterior chain strength.
How to Perform:
Perform this routine 2-3 times a week, with at least one day of rest between sessions. Focus on form over weight—using proper technique ensures you’re working the targeted muscles and reduces the risk of injury. As you become more comfortable, gradually increase the weight or add more reps to continue challenging your muscles.",
                'seo_title' => 'Beginner’s Strength Training with Dumbbells',
                'seo_description' => 'Beginner’s Strength Training with Dumbbells',
            ],
            [
                'title' => 'Beginner’s Strength Training with Kettlebells',
                'description' => "
                Kettlebells have become a popular choice for strength training enthusiasts due to their versatility and effectiveness. These unique weights, resembling a cannonball with a handle, offer a dynamic approach to building strength, enhancing flexibility, and improving overall fitness. Whether you’re new to strength training or looking to add variety to your routine, kettlebells are an excellent tool for beginners. This blog will guide you through the fundamentals of kettlebell training, including exercises, benefits, and tips for getting started.

                Why Choose Kettlebells?
Kettlebells are renowned for their ability to provide a full-body workout in a relatively short amount of time. Here’s why they’re ideal for beginners:

Versatility: Kettlebells can be used for a wide range of exercises, targeting multiple muscle groups simultaneously. This versatility makes them a comprehensive tool for building strength and improving endurance.

Functional Fitness: Kettlebell training focuses on functional movements that mimic everyday activities. This approach helps improve balance, coordination, and core strength, which translates to better performance in daily tasks.

Efficiency: With kettlebells, you can achieve a high-intensity workout that combines strength training and cardiovascular conditioning. This efficiency helps in burning calories and improving overall fitness.

Scalability: Kettlebells come in various weights, allowing you to start with a lighter weight and gradually increase as you build strength. This scalability makes them suitable for beginners.

Getting Started with Kettlebells
Before diving into kettlebell exercises, it’s essential to familiarize yourself with proper form and technique to prevent injury and maximize benefits. Here’s a step-by-step guide to help you get started:
                ",
                'seo_title' => 'Beginner’s Strength Training with Kettlebells',
                'seo_description' => 'Beginner’s Strength Training with Kettlebells',
            ],
            [
                'title' => 'Fuel Your Body for Optimal Health',
                'description' => "
                In the quest for a healthier lifestyle, nutrition plays a pivotal role. It's not just about eating fruits and vegetables but understanding how different nutrients affect your body and overall well-being. This guide will delve into the essentials of nutrition, exploring macronutrients, micronutrients, hydration, and practical tips for incorporating a balanced diet into your daily life.

Understanding Macronutrients
Macronutrients are the nutrients that provide us with energy and are required in large amounts. They include carbohydrates, proteins, and fats. Each plays a unique role in maintaining health and supporting bodily functions.

Carbohydrates: The Primary Energy Source

Role: Carbohydrates are the body's main source of energy. They are broken down into glucose, which is used by cells for fuel.
Types: Carbohydrates are categorized into simple (sugars) and complex (starches and fibers). Simple carbohydrates are found in foods like fruits and sweets, while complex carbohydrates are present in whole grains, legumes, and vegetables.
Recommendations: Aim for complex carbohydrates as they provide sustained energy and essential nutrients. Foods like oats, brown rice, and sweet potatoes are excellent choices.
Proteins: The Building Blocks of the Body

Role: Proteins are crucial for building and repairing tissues, making enzymes and hormones, and supporting immune function.
Sources: High-quality protein sources include lean meats, poultry, fish, eggs, dairy products, legumes, nuts, and seeds.
Recommendations: For optimal health, include a variety of protein sources in your diet. Aim for about 0.8 grams of protein per kilogram of body weight daily, adjusting based on activity levels and specific health needs.
Fats: Essential for Health

Role: Fats are vital for energy storage, hormone production, and cell membrane integrity. They also help in absorbing fat-soluble vitamins (A, D, E, and K).
Types: Fats are divided into saturated, unsaturated (monounsaturated and polyunsaturated), and trans fats. Unsaturated fats are considered beneficial and can be found in olive oil, avocados, and nuts. Saturated fats should be consumed in moderation, while trans fats should be avoided.
Recommendations: Focus on healthy fats from sources like fish, nuts, and seeds. Limit intake of saturated fats and avoid trans fats to maintain heart health.
                ",
                'seo_title' => 'Fuel Your Body for Optimal Health',
                'seo_description' => 'Fuel Your Body for Optimal Health',
            ],
            [
                'title' => 'Understanding the Role of Fiber in a Healthy Diet',
                'description' => "
                Introduction
Fiber is often touted as a key component of a healthy diet, yet many people remain unclear about its benefits and how to incorporate it into their daily meals. This essential nutrient plays a significant role in digestive health, weight management, and overall wellness. In this blog, we’ll explore the different types of fiber, their benefits, and practical tips for increasing your fiber intake.

Types of Fiber
Fiber is categorized into two main types: soluble and insoluble, each with its unique benefits.

Soluble Fiber

Characteristics: Soluble fiber dissolves in water to form a gel-like substance. It can help lower blood cholesterol levels and stabilize blood sugar.
Sources: Common sources include oats, barley, beans, lentils, apples, oranges, and carrots.
Insoluble Fiber

Characteristics: Insoluble fiber does not dissolve in water. It adds bulk to the stool and aids in moving food through the digestive tract.
Sources: Found in whole grains, wheat bran, nuts, and vegetables such as cauliflower and potatoes.
                ",
                'seo_title' => 'Understanding the Role of Fiber in a Healthy Diet',
                'seo_description' => 'Understanding the Role of Fiber in a Healthy Diet',
            ],
            [
                'title' => 'A Guide to Making Healthier Choices',
                'description' => "
                Introduction
Food labels can be a valuable tool in making informed dietary choices, but they can also be confusing with their technical jargon and numbers. Understanding how to read and interpret food labels is crucial for maintaining a healthy diet and making better food choices. This guide will break down the essential components of food labels and offer tips for navigating them effectively.

Key Components of Food Labels
Serving Size

Definition: The serving size indicates the amount of food that is considered one serving. It is crucial for understanding nutritional information.
Tip: Compare the serving size to the amount you actually consume to gauge the calories and nutrients you’re ingesting.
Calories

Definition: Calories represent the amount of energy provided by one serving of the food.
Tip: Pay attention to the number of calories per serving to manage your energy intake. Be mindful of portion sizes to avoid overconsumption.
Nutritional Breakdown

Fats:
Types: Labels typically list total fat, saturated fat, and trans fat.
Tip: Choose products with lower saturated and trans fats to promote heart health.
Cholesterol:
Definition: Cholesterol is a type of fat found in animal products.
Tip: Opt for foods lower in cholesterol to maintain healthy blood cholesterol levels.
Sodium:
Definition: Sodium is a component of salt that can impact blood pressure.
Tip: Limit sodium intake to support cardiovascular health. Aim for less than 2,300 mg of sodium per day.
Carbohydrates:
Types: Labels often list total carbohydrates, dietary fiber, and sugars.
Tip: Choose foods high in fiber and low in added sugars to support digestive health and stable blood sugar levels.
Proteins:
Definition: Proteins are essential for muscle repair and overall bodily functions.
Tip: Include a variety of protein sources, such as lean meats, dairy, legumes, and nuts.
Vitamins and Minerals

Definition: Labels list vitamins and minerals like vitamin A, vitamin C, calcium, and iron.
Tip: Ensure you’re getting adequate amounts of these essential nutrients to support overall health.
Ingredients List

Definition: The ingredients list shows all the components of the food product in descending order by weight.
Tip: Look for whole, recognizable ingredients. Avoid products with excessive added sugars, artificial additives, and preservatives.
Percent Daily Values (%DV)

Definition: %DV shows how much a nutrient in a serving of food contributes to a daily diet based on a 2,000-calorie reference.
Tip: Use %DV to determine if a food product is high or low in specific nutrients. For example, a %DV of 20% or more is considered high.
Tips for Making Healthier Choices
Focus on Whole Foods

Preference: Opt for foods with minimal processing and natural ingredients. Whole fruits, vegetables, grains, and lean proteins are healthier choices.
Beware of Health Claims

Understanding Claims: Be cautious of labels with claims such as “low fat” or “sugar-free,” as they may still contain unhealthy ingredients. Always check the full nutritional information.
Compare Products

Comparison: When shopping, compare different brands and products to find the one with the best nutritional profile.
Portion Control

Serving Size Awareness: Be aware of the serving size to avoid consuming more calories or nutrients than you intended.
Educate Yourself

Nutritional Knowledge: Take time to learn about different nutrients and their roles in your diet. This knowledge will help you make more informed food choices.
Balance and Moderation

Healthy Eating: Focus on balancing your diet with a variety of foods. Moderation is key to maintaining a healthy eating pattern without depriving yourself.",
                'seo_title' => 'A Guide to Making Healthier Choices',
                'seo_description' => 'A Guide to Making Healthier Choices',
            ],
            [
                'title' => 'Why You Should Incorporate It Into Your Routine',
                'description' => "
                    Introduction
High-Intensity Interval Training (HIIT) has gained immense popularity in recent years, and for good reason. This form of exercise alternates between short bursts of intense activity and periods of rest or low-intensity activity. HIIT is known for its efficiency, allowing you to burn calories, improve cardiovascular health, and build strength in a shorter amount of time than traditional workouts. In this blog, we’ll delve into the benefits of HIIT, how it works, and tips for getting started.

What is High-Intensity Interval Training (HIIT)?
HIIT is a type of cardiovascular exercise strategy that involves short, intense bursts of anaerobic exercise followed by recovery periods. These workouts typically last between 10 to 30 minutes, making them ideal for those with busy schedules. The intensity and variability of HIIT not only make it an effective workout but also keep it engaging.

The Science Behind HIIT
HIIT is effective due to the high demand it places on the body during short bursts of intense exercise. During these bursts, your heart rate increases significantly, and your body taps into anaerobic energy systems, which do not require oxygen but rather glycogen stored in muscles for energy. This process helps to burn a significant amount of calories, both during and after the workout, due to the excess post-exercise oxygen consumption (EPOC) effect, often referred to as the \"afterburn.\"

Benefits of HIIT
Time Efficiency

Short Workouts, Big Results: One of the most significant benefits of HIIT is its efficiency. You can achieve substantial fitness gains in as little as 20 minutes. This is especially appealing for those with tight schedules who struggle to find time for longer workouts.
Flexibility: HIIT can be done almost anywhere and with minimal equipment. Whether you’re at home, in a gym, or even outdoors, you can customize your HIIT routine to fit your environment.
Calorie and Fat Burning

High Caloric Burn: HIIT is incredibly effective for burning calories in a short amount of time. The intense bursts of activity elevate your heart rate and metabolism, leading to higher calorie expenditure during the workout.
Afterburn Effect: The EPOC effect ensures that your body continues to burn calories even after the workout has ended. This prolonged calorie burn can aid in fat loss, making HIIT a powerful tool for those looking to lose weight.
Improved Cardiovascular Health

Heart Health: HIIT has been shown to improve cardiovascular health by increasing both aerobic and anaerobic endurance. The intense nature of the intervals challenges the heart and lungs, leading to better heart function and circulation.
Lowered Blood Pressure: Regular HIIT workouts can help lower blood pressure, improving overall cardiovascular health and reducing the risk of heart disease.
Increased Metabolic Rate

Boosted Metabolism: The high intensity of HIIT workouts can increase your metabolic rate for hours after the workout. This means your body continues to burn calories even at rest, aiding in weight management and fat loss.
Improved Insulin Sensitivity: HIIT has been shown to improve insulin sensitivity, which helps the muscles better use glucose for energy and reduces the risk of developing type 2 diabetes.
Muscle Building and Retention

Preservation of Lean Muscle Mass: Unlike steady-state cardio, which can sometimes lead to muscle loss, HIIT helps preserve and even build lean muscle mass while reducing body fat. The high-intensity intervals engage multiple muscle groups, promoting strength and endurance.
Functional Fitness: HIIT often involves compound movements like squats, lunges, and push-ups, which mimic everyday activities and improve functional fitness.
Mental Health Benefits

Endorphin Boost: The intensity of HIIT workouts can lead to the release of endorphins, often referred to as the \"feel-good\" hormones. This can result in improved mood and reduced feelings of stress and anxiety.
Mental Toughness: Pushing through the intense intervals of HIIT can also help build mental resilience and discipline, which can translate to other areas of life.
                ",
                'seo_title' => 'Why You Should Incorporate It Into Your Routine',
                'seo_description' => 'Why You Should Incorporate It Into Your Routine',
            ],
            [
                'title' => 'Stretch Your Way to Better Health',
                'description' => "Flexibility training is often overlooked in fitness routines, yet it is an essential component of overall health and wellness. Stretching not only improves your range of motion but also enhances muscle coordination, reduces the risk of injury, and promotes relaxation. Whether you’re an athlete or someone looking to improve their daily function, incorporating flexibility exercises into your routine can yield significant benefits. In this blog, we’ll explore the importance of flexibility training, different types of stretching, and how to incorporate it into your fitness regimen.

What is Flexibility?
Flexibility refers to the ability of your muscles and joints to move through their full range of motion. Good flexibility allows for ease of movement, reduces muscle stiffness, and helps prevent injuries. Flexibility can vary between individuals based on factors like age, gender, and physical activity levels, but it can be improved with consistent practice.

Types of Stretching
There are several types of stretching, each with its own benefits and appropriate uses:

Static Stretching

Definition: Static stretching involves holding a stretch for an extended period, usually 15 to 60 seconds, without movement.
Benefits: This type of stretching is effective for increasing flexibility and is best performed after a workout when muscles are warm.
Examples: Forward fold, hamstring stretch, and shoulder stretch.
Dynamic Stretching

Definition: Dynamic stretching involves moving parts of your body through a full range of motion in a controlled manner, gradually increasing the reach or speed of the movement.
Benefits: Dynamic stretching is ideal for warming up before exercise as it prepares the muscles for activity and improves joint flexibility.
Examples: Leg swings, arm circles, and walking lunges.
Ballistic Stretching

Definition: Ballistic stretching involves using momentum to force a body part beyond its normal range of motion.
Caution: This type of stretching can lead to injury if not done correctly and is generally not recommended for beginners or those with limited flexibility.
Examples: Bouncing toe touches and rapid arm swings.
PNF Stretching (Proprioceptive Neuromuscular Facilitation)

Definition: PNF stretching involves a combination of passive stretching and isometric contractions. Typically, a muscle is stretched, contracted, and then stretched further.
Benefits: PNF is highly effective for increasing flexibility and is often used in rehabilitation settings.
Examples: Partner hamstring stretch where one person pushes against the other’s resistance.",
                'seo_title' => 'Stretch Your Way to Better Health',
                'seo_description' => 'Stretch Your Way to Better Health',
            ],
        ];

        // tags about gym
        $tags = ['Gym', 'Exercise', 'Workout', 'Bodybuilding', 'Fitness', 'Diet', 'Health', 'Training', 'Yoga', 'Meditation', 'Running', 'Cycling', 'Swimming'];
        foreach ($request as $key => $req) {
            $blog = new Blog();
            $blog->save();
            $languages = allLanguages();
            foreach ($languages as $language) {
                $translationModel = new BlogTranslation();
                $translationModel->blog_id = $blog->id;
                $translationModel->lang_code = $language->code;
                $translationModel->fill((array) $req);
                $translationModel->save();
            }
            $blog->image = 'website/images/blog_details_img_' . $key + 1 . ".jpg";
            $blog->status = 1;
            $blog->show_homepage = 1;
            $blog->admin_id = 1;
            $blog->is_popular = 1;
            $blog->slug = Str::slug($req['title']);
            $blog->views = rand(100, 1000);

            $randomIndexes = array_rand($tags, 2);
            $blog->tags = json_encode([['value' => $tags[$randomIndexes[0]], 'value' => $tags[$randomIndexes[1]]]]);
            $blog->blog_category_id = rand(1, 7);
            $blog->save();
        }
    }
}
