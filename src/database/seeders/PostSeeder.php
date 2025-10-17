<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Event;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get users and events
        $users = User::all();
        $events = Event::all();

        if ($users->isEmpty() || $events->isEmpty()) {
            return;
        }

        $posts = [
            [
                'content' => 'Just had an amazing time exploring the caves in Sagada! The cave connection adventure was absolutely thrilling. The underground rivers and rock formations were incredible. Highly recommend this experience for adventure seekers! 🏔️✨',
                'type' => 'text',
                'image_url' => null,
                'video_url' => null,
                'event_id' => $events->where('title', 'Sagada Cave Connection Adventure')->first()?->id,
                'likes_count' => 15,
                'comments_count' => 8,
                'shares_count' => 3
            ],
            [
                'content' => 'Sunrise at Mt. Pulag was absolutely breathtaking! The sea of clouds was like something out of a dream. Worth every step of the challenging trek. 🌅☁️',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => $events->where('title', 'Mt. Pulag Sunrise Trek')->first()?->id,
                'likes_count' => 28,
                'comments_count' => 12,
                'shares_count' => 7
            ],
            [
                'content' => 'Boracay never disappoints! The crystal clear waters and white sand beaches are still as beautiful as ever. Perfect for a relaxing getaway! 🏖️💙',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1544551763-46a013bb2dcc?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => $events->where('title', 'Boracay Island Hopping')->first()?->id,
                'likes_count' => 42,
                'comments_count' => 18,
                'shares_count' => 9
            ],
            [
                'content' => 'The Chocolate Hills in Bohol are truly a natural wonder! The view from the top was incredible. Also got to see the adorable tarsiers - they\'re so tiny and cute! 🍫🏔️',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => $events->where('title', 'Bohol Chocolate Hills Tour')->first()?->id,
                'likes_count' => 35,
                'comments_count' => 15,
                'shares_count' => 6
            ],
            [
                'content' => 'Manila food tour was absolutely delicious! Tried so many authentic Filipino dishes I\'ve never had before. The street food in Quiapo was amazing! 🍜🍢',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1544551763-46a013bb2dcc?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => $events->where('title', 'Manila Food Tour')->first()?->id,
                'likes_count' => 22,
                'comments_count' => 9,
                'shares_count' => 4
            ],
            [
                'content' => 'First time surfing in Siargao and I\'m hooked! The waves at Cloud 9 were perfect for beginners. Can\'t wait to come back and improve my skills! 🏄‍♀️🌊',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1544551763-46a013bb2dcc?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => $events->where('title', 'Siargao Surfing Adventure')->first()?->id,
                'likes_count' => 31,
                'comments_count' => 14,
                'shares_count' => 8
            ],
            [
                'content' => 'Vigan\'s colonial architecture is absolutely stunning! Walking through Calle Crisologo felt like stepping back in time. The kalesa ride was such a unique experience! 🏛️🐎',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => $events->where('title', 'Vigan Heritage Walk')->first()?->id,
                'likes_count' => 19,
                'comments_count' => 7,
                'shares_count' => 3
            ],
            [
                'content' => 'Batanes is truly the Scotland of the Philippines! The rolling hills and dramatic coastlines are perfect for photography. Every corner is a postcard-worthy view! 📸🏔️',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => $events->where('title', 'Batanes Photography Tour')->first()?->id,
                'likes_count' => 26,
                'comments_count' => 11,
                'shares_count' => 5
            ],
            [
                'content' => 'The Underground River in Palawan is one of the most incredible natural wonders I\'ve ever seen! The limestone formations are absolutely mind-blowing. A must-visit for everyone! 🚣‍♀️🏔️',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => $events->where('title', 'Palawan Underground River')->first()?->id,
                'likes_count' => 38,
                'comments_count' => 16,
                'shares_count' => 7
            ],
            [
                'content' => 'Baguio\'s cool climate and pine trees always make me feel refreshed! The strawberry picking was so much fun, and the local food is amazing. Perfect weekend getaway! 🍓🌲',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => $events->where('title', 'Baguio Mountain Adventure')->first()?->id,
                'likes_count' => 24,
                'comments_count' => 10,
                'shares_count' => 4
            ],
            [
                'content' => 'Just discovered this hidden gem in El Nido! The lagoons are like something out of a movie. The water is so clear you can see the fish swimming below. Absolutely magical! 🏝️✨',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1544551763-46a013bb2dcc?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 33,
                'comments_count' => 13,
                'shares_count' => 6
            ],
            [
                'content' => 'The sunset in Coron was absolutely spectacular! The view from the top of the mountain was worth every step. Philippines never fails to amaze me with its natural beauty! 🌅🏔️',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 29,
                'comments_count' => 12,
                'shares_count' => 5
            ],
            [
                'content' => 'Tried authentic Filipino cuisine for the first time and I\'m in love! The flavors are so rich and diverse. Adobo and sinigang are now my favorites! 🇵🇭🍽️',
                'type' => 'text',
                'image_url' => null,
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 17,
                'comments_count' => 6,
                'shares_count' => 2
            ],
            [
                'content' => 'The jeepney ride through Manila was such an adventure! The colorful decorations and the friendly locals made it an unforgettable experience. True Filipino culture! 🚌🎨',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1544551763-46a013bb2dcc?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 21,
                'comments_count' => 8,
                'shares_count' => 3
            ],
            [
                'content' => 'Hiking through the rice terraces in Banaue was absolutely breathtaking! The ancient engineering is incredible. These terraces have been here for over 2000 years! 🌾🏔️',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 27,
                'comments_count' => 11,
                'shares_count' => 4
            ],
            [
                'content' => 'The whale shark encounter in Donsol was absolutely incredible! Swimming alongside these gentle giants was a once-in-a-lifetime experience. They\'re so majestic! 🐋🤿',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1544551763-46a013bb2dcc?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 45,
                'comments_count' => 19,
                'shares_count' => 9
            ],
            [
                'content' => 'The firefly watching in Bohol was magical! Thousands of fireflies lighting up the mangrove trees like Christmas lights. Nature never ceases to amaze me! ✨🪲',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 32,
                'comments_count' => 14,
                'shares_count' => 6
            ],
            [
                'content' => 'The hot springs in Laguna were so relaxing! After a long day of hiking, soaking in the warm mineral water was exactly what I needed. Pure bliss! 🛁🌿',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 18,
                'comments_count' => 7,
                'shares_count' => 3
            ],
            [
                'content' => 'The cultural show in Intramuros was amazing! The traditional dances and music really brought the history to life. So proud of our rich Filipino heritage! 🇵🇭💃',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1544551763-46a013bb2dcc?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 23,
                'comments_count' => 9,
                'shares_count' => 4
            ],
            [
                'content' => 'The sunrise at Taal Volcano was absolutely stunning! The view from the crater rim was worth the challenging hike. The Philippines truly has the most beautiful landscapes! 🌅🌋',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 36,
                'comments_count' => 15,
                'shares_count' => 7
            ],
            [
                'content' => 'The sunrise at Mount Pulag was absolutely breathtaking! Waking up at 3 AM was worth it to see the sea of clouds. The hike was challenging but the view from the summit made it all worthwhile. 🌅⛰️',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => $events->where('title', 'Mount Pulag Hiking Adventure')->first()?->id,
                'likes_count' => 23,
                'comments_count' => 12,
                'shares_count' => 7
            ],
            [
                'content' => 'Island hopping in Palawan was like a dream! The crystal clear waters and hidden lagoons were absolutely stunning. Can\'t wait to go back and explore more of this paradise! 🏝️💙',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => $events->where('title', 'Palawan Island Hopping')->first()?->id,
                'likes_count' => 31,
                'comments_count' => 15,
                'shares_count' => 9
            ],
            [
                'content' => 'Baguio never fails to amaze me! The cool climate and mountain views are perfect for a weekend getaway. The strawberry farms were a highlight of our trip! 🍓🏔️',
                'type' => 'text',
                'image_url' => null,
                'video_url' => null,
                'event_id' => $events->where('title', 'Baguio Mountain Adventure')->first()?->id,
                'likes_count' => 18,
                'comments_count' => 6,
                'shares_count' => 4
            ],
            [
                'content' => 'Sunset sailing in Boracay was pure magic! The golden hour views were incredible and the sailing experience was so peaceful. Perfect way to end a day in paradise! ⛵🌅',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => $events->where('title', 'Boracay Sunset Sailing')->first()?->id,
                'likes_count' => 27,
                'comments_count' => 11,
                'shares_count' => 6
            ],
            [
                'content' => 'Batanes is truly a hidden gem! The rolling hills and traditional Ivatan houses are straight out of a postcard. The culture and hospitality of the people made this trip unforgettable! 🏘️🌾',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => $events->where('title', 'Batanes Cultural Tour')->first()?->id,
                'likes_count' => 19,
                'comments_count' => 9,
                'shares_count' => 5
            ],
            [
                'content' => 'Looking for travel buddies for my next adventure! Planning to explore more of the Philippines. Anyone interested in joining me for some epic trips? Let\'s make memories together! 🗺️✈️',
                'type' => 'text',
                'image_url' => null,
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 12,
                'comments_count' => 8,
                'shares_count' => 2
            ],
            [
                'content' => 'Just discovered this amazing hiking trail near Manila! The views were incredible and it\'s perfect for a day trip. Can\'t wait to share this hidden gem with fellow adventurers! 🥾🏔️',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1551524164-6cf2ac5313bb?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 16,
                'comments_count' => 7,
                'shares_count' => 3
            ]
        ];

        foreach ($posts as $postData) {
            Post::create(array_merge($postData, [
                'user_id' => $users->random()->id,
                'is_active' => true,
            ]));
        }

        // Add more posts for better pagination testing
        $additionalPosts = [
            [
                'content' => 'Just returned from an incredible Palawan adventure! The Underground River was absolutely breathtaking. The limestone formations and crystal clear waters were like something out of a dream. Can\'t wait to go back! 🌊✨ #Palawan #UndergroundRiver #Adventure',
                'type' => 'text',
                'image_url' => null,
                'video_url' => null,
                'event_id' => $events->where('title', 'Palawan Underground River Tour')->first()?->id,
                'likes_count' => 28,
                'comments_count' => 12,
                'shares_count' => 5
            ],
            [
                'content' => 'Boracay never disappoints! The island hopping tour was amazing. Snorkeling in those crystal clear waters was an unforgettable experience. The sunset views were absolutely magical! 🏝️🌅 #Boracay #IslandHopping #BeachLife',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => $events->where('title', 'Boracay Island Hopping')->first()?->id,
                'likes_count' => 35,
                'comments_count' => 8,
                'shares_count' => 7
            ],
            [
                'content' => 'The Chocolate Hills in Bohol are truly a natural wonder! Over 1,200 hills spread across the landscape - it\'s like nothing I\'ve ever seen before. The view from the observation deck was absolutely stunning! 🍫⛰️ #ChocolateHills #Bohol #NaturalWonder',
                'type' => 'text',
                'image_url' => null,
                'video_url' => null,
                'event_id' => $events->where('title', 'Chocolate Hills Adventure')->first()?->id,
                'likes_count' => 22,
                'comments_count' => 6,
                'shares_count' => 3
            ],
            [
                'content' => 'Mayon Volcano trek was challenging but so worth it! The perfect cone shape is even more impressive up close. The sunrise from the summit was absolutely breathtaking! 🌋🌅 #MayonVolcano #Hiking #Adventure',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => $events->where('title', 'Mayon Volcano Trekking')->first()?->id,
                'likes_count' => 31,
                'comments_count' => 9,
                'shares_count' => 4
            ],
            [
                'content' => 'Vigan Heritage Walk was like stepping back in time! The Spanish colonial architecture is so well-preserved. The calesa ride through Calle Crisologo was magical! 🏛️🐎 #Vigan #Heritage #Culture',
                'type' => 'text',
                'image_url' => null,
                'video_url' => null,
                'event_id' => $events->where('title', 'Vigan Heritage Walk')->first()?->id,
                'likes_count' => 19,
                'comments_count' => 5,
                'shares_count' => 2
            ],
            [
                'content' => 'Another amazing day in the Philippines! The diversity of landscapes here is incredible - from mountains to beaches to historical sites. Every adventure is unique and memorable! 🇵🇭✨ #Philippines #Travel #Adventure',
                'type' => 'text',
                'image_url' => null,
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 15,
                'comments_count' => 4,
                'shares_count' => 1
            ],
            [
                'content' => 'The food scene in the Philippines is absolutely amazing! From street food to fine dining, every meal is an adventure. The flavors are so rich and diverse! 🍜🍽️ #Philippines #Food #Culture',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 24,
                'comments_count' => 7,
                'shares_count' => 3
            ],
            [
                'content' => 'Sunset photography in the Philippines is next level! The colors are so vibrant and the light is perfect. Every sunset tells a different story! 📸🌅 #Photography #Sunset #Philippines',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 18,
                'comments_count' => 3,
                'shares_count' => 2
            ]
        ];

        // Create additional posts
        foreach ($additionalPosts as $postData) {
            Post::create(array_merge($postData, [
                'user_id' => $users->random()->id,
                'is_active' => true,
            ]));
        }

        // Add even more posts from different users for better feed diversity
        $morePosts = [
            [
                'content' => 'Just discovered this hidden gem in the mountains! The view was absolutely incredible and the hike was challenging but rewarding. Perfect for adventure seekers! 🏔️⛰️ #HiddenGem #MountainHiking #Adventure',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 42,
                'comments_count' => 15,
                'shares_count' => 8
            ],
            [
                'content' => 'The local food scene here is absolutely amazing! Tried some traditional dishes and they were incredible. The flavors are so rich and authentic! 🍜🍽️ #LocalFood #TraditionalCuisine #Foodie',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 38,
                'comments_count' => 12,
                'shares_count' => 6
            ],
            [
                'content' => 'Sunset photography session was absolutely magical! The colors were so vibrant and the light was perfect. Got some amazing shots! 📸🌅 #Photography #Sunset #GoldenHour',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 29,
                'comments_count' => 8,
                'shares_count' => 4
            ],
            [
                'content' => 'Island hopping adventure was incredible! Each island had its own unique charm and beauty. The crystal clear waters were perfect for swimming and snorkeling! 🏝️🌊 #IslandHopping #BeachLife #Adventure',
                'type' => 'text',
                'image_url' => null,
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 33,
                'comments_count' => 10,
                'shares_count' => 5
            ],
            [
                'content' => 'Cultural heritage tour was so educational and inspiring! Learned so much about the local history and traditions. The architecture is absolutely stunning! 🏛️📚 #Culture #Heritage #History',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 25,
                'comments_count' => 7,
                'shares_count' => 3
            ],
            [
                'content' => 'Nature walk in the forest was so peaceful and rejuvenating! The fresh air and beautiful scenery were exactly what I needed. Perfect for relaxation! 🌲🌿 #Nature #Forest #Relaxation',
                'type' => 'text',
                'image_url' => null,
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 21,
                'comments_count' => 5,
                'shares_count' => 2
            ],
            [
                'content' => 'City exploration was amazing! Found so many hidden spots and local favorites. The urban culture here is so vibrant and diverse! 🏙️🌆 #CityLife #UrbanExploration #Culture',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 27,
                'comments_count' => 9,
                'shares_count' => 4
            ],
            [
                'content' => 'Adventure sports day was absolutely thrilling! Tried some new activities and pushed my limits. The adrenaline rush was incredible! 🏄‍♂️🚴‍♀️ #AdventureSports #Thrills #Adrenaline',
                'type' => 'text',
                'image_url' => null,
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 35,
                'comments_count' => 11,
                'shares_count' => 7
            ],
            [
                'content' => 'Wildlife photography session was so rewarding! Captured some amazing shots of local animals in their natural habitat. Nature is truly beautiful! 🦋🦅 #Wildlife #Photography #Nature',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 31,
                'comments_count' => 8,
                'shares_count' => 5
            ],
            [
                'content' => 'Beach day was perfect! The sand was so soft and the water was crystal clear. Spent the whole day relaxing and enjoying the beautiful scenery! 🏖️☀️ #BeachDay #Relaxation #Paradise',
                'type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
                'video_url' => null,
                'event_id' => null,
                'likes_count' => 26,
                'comments_count' => 6,
                'shares_count' => 3
            ]
        ];

        // Create more posts from different users
        foreach ($morePosts as $postData) {
            Post::create(array_merge($postData, [
                'user_id' => $users->random()->id,
                'is_active' => true,
            ]));
        }
    }
}
