<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users
        $users = User::all();
        if ($users->isEmpty()) {
            $this->command->error('No users found. Please run UserSeeder first.');
            return;
        }

        $events = [
            [
                'title' => 'Baguio Mountain Adventure',
                'description' => 'Experience the cool climate and stunning mountain views of Baguio City. We\'ll visit Mines View Park, Burnham Park, and the famous strawberry farms. Perfect for nature lovers and photography enthusiasts.',
                'location' => 'Baguio City, Benguet',
                'latitude' => 16.4023,
                'longitude' => 120.5960,
                'start_date' => Carbon::now()->addDays(7)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addDays(8)->format('Y-m-d H:i:s'),
                'start_time' => '06:00:00',
                'end_time' => '18:00:00',
                'category' => 'Adventure',
                'image_url' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&h=600&fit=crop',
                'max_attendees' => 15,
                'price' => 2500.00,
                'itinerary' => [
                    '6:00 AM - Meet at Victory Liner Terminal',
                    '7:00 AM - Depart for Baguio',
                    '12:00 PM - Arrive in Baguio, lunch at local restaurant',
                    '2:00 PM - Visit Mines View Park',
                    '4:00 PM - Explore Burnham Park',
                    '6:00 PM - Check-in at hotel',
                    '8:00 PM - Dinner and city tour'
                ],
                'requirements' => [
                    'Valid ID',
                    'Comfortable walking shoes',
                    'Warm clothing',
                    'Camera (optional)',
                    'Personal medications'
                ]
            ],
            [
                'title' => 'Sagada Cave Connection Adventure',
                'description' => 'Explore the mystical caves of Sagada! This thrilling adventure takes you through Sumaguing Cave and Lumiang Cave, featuring stunning rock formations, underground rivers, and ancient coffins. A must-do for adventure seekers!',
                'location' => 'Sagada, Mountain Province',
                'latitude' => 17.0833,
                'longitude' => 120.9000,
                'start_date' => Carbon::now()->addDays(14)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addDays(16)->format('Y-m-d H:i:s'),
                'start_time' => '08:00:00',
                'end_time' => '17:00:00',
                'category' => 'Adventure',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
                'max_attendees' => 12,
                'price' => 3500.00,
                'itinerary' => [
                    '8:00 AM - Meet at Sagada Tourism Office',
                    '9:00 AM - Safety briefing and equipment check',
                    '10:00 AM - Start cave exploration',
                    '12:00 PM - Lunch inside the cave',
                    '2:00 PM - Continue to Lumiang Cave',
                    '4:00 PM - Return to surface',
                    '5:00 PM - Debrief and photo session'
                ],
                'requirements' => [
                    'Valid ID',
                    'Swimming attire',
                    'Water shoes',
                    'Headlamp or flashlight',
                    'Extra clothes',
                    'Waterproof bag'
                ]
            ],
            [
                'title' => 'Boracay Island Hopping',
                'description' => 'Discover the pristine beauty of Boracay and nearby islands! Enjoy crystal clear waters, white sand beaches, and amazing snorkeling spots. Perfect for beach lovers and water sports enthusiasts.',
                'location' => 'Boracay Island, Aklan',
                'latitude' => 11.9674,
                'longitude' => 121.9248,
                'start_date' => Carbon::now()->addDays(21)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addDays(24)->format('Y-m-d H:i:s'),
                'start_time' => '09:00:00',
                'end_time' => '18:00:00',
                'category' => 'Beach',
                'image_url' => 'https://images.unsplash.com/photo-1544551763-46a013bb2dcc?w=800&h=600&fit=crop',
                'max_attendees' => 20,
                'price' => 4500.00,
                'itinerary' => [
                    '9:00 AM - Meet at Station 1',
                    '10:00 AM - Boat departure for island hopping',
                    '11:00 AM - Snorkeling at Crocodile Island',
                    '12:30 PM - Lunch at Puka Beach',
                    '2:00 PM - Visit Magic Island',
                    '3:30 PM - Swimming at Crystal Cove',
                    '5:00 PM - Return to Boracay',
                    '6:00 PM - Sunset viewing at White Beach'
                ],
                'requirements' => [
                    'Valid ID',
                    'Swimwear',
                    'Sunscreen',
                    'Snorkeling gear (optional)',
                    'Waterproof camera',
                    'Beach towel'
                ]
            ],
            [
                'title' => 'Mt. Pulag Sunrise Trek',
                'description' => 'Conquer the highest peak in Luzon and witness the famous "sea of clouds" at sunrise! This challenging trek rewards you with breathtaking views and an unforgettable experience.',
                'location' => 'Mt. Pulag, Benguet',
                'latitude' => 16.5833,
                'longitude' => 120.9000,
                'start_date' => Carbon::now()->addDays(28)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addDays(30)->format('Y-m-d H:i:s'),
                'start_time' => '22:00:00',
                'end_time' => '12:00:00',
                'category' => 'Hiking',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
                'max_attendees' => 8,
                'price' => 2800.00,
                'itinerary' => [
                    '10:00 PM - Meet at Baguio City',
                    '11:00 PM - Travel to Mt. Pulag base camp',
                    '2:00 AM - Start trek to summit',
                    '5:00 AM - Arrive at summit for sunrise',
                    '7:00 AM - Breakfast at summit',
                    '8:00 AM - Descend to base camp',
                    '12:00 PM - Return to Baguio'
                ],
                'requirements' => [
                    'Valid ID',
                    'Hiking boots',
                    'Warm clothing',
                    'Headlamp',
                    'Trekking poles',
                    'Sleeping bag',
                    'Medical certificate'
                ]
            ],
            [
                'title' => 'Bohol Chocolate Hills Tour',
                'description' => 'Explore the unique geological wonder of Bohol! Visit the famous Chocolate Hills, meet the adorable tarsiers, and enjoy a relaxing river cruise. Perfect for families and nature lovers.',
                'location' => 'Bohol Island, Bohol',
                'latitude' => 9.8333,
                'longitude' => 124.1667,
                'start_date' => Carbon::now()->addDays(35)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addDays(37)->format('Y-m-d H:i:s'),
                'start_time' => '08:00:00',
                'end_time' => '17:00:00',
                'category' => 'Sightseeing',
                'image_url' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&h=600&fit=crop',
                'max_attendees' => 25,
                'price' => 3200.00,
                'itinerary' => [
                    '8:00 AM - Meet at Tagbilaran City',
                    '9:00 AM - Visit Chocolate Hills',
                    '11:00 AM - Tarsier Sanctuary tour',
                    '12:30 PM - Lunch at Loboc River',
                    '2:00 PM - River cruise with live music',
                    '4:00 PM - Visit Baclayon Church',
                    '5:30 PM - Return to Tagbilaran'
                ],
                'requirements' => [
                    'Valid ID',
                    'Comfortable walking shoes',
                    'Camera',
                    'Hat and sunglasses',
                    'Water bottle'
                ]
            ],
            [
                'title' => 'Palawan Underground River',
                'description' => 'Discover one of the New 7 Wonders of Nature! Cruise through the spectacular underground river in Puerto Princesa, featuring amazing limestone formations and diverse wildlife.',
                'location' => 'Puerto Princesa, Palawan',
                'latitude' => 10.1667,
                'longitude' => 118.8333,
                'start_date' => Carbon::now()->addDays(42)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addDays(45)->format('Y-m-d H:i:s'),
                'start_time' => '08:00:00',
                'end_time' => '16:00:00',
                'category' => 'Sightseeing',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
                'max_attendees' => 18,
                'price' => 3800.00,
                'itinerary' => [
                    '8:00 AM - Meet at Puerto Princesa',
                    '9:00 AM - Travel to Sabang',
                    '10:30 AM - Underground river tour',
                    '12:00 PM - Lunch at Sabang Beach',
                    '2:00 PM - Mangrove paddle boat tour',
                    '4:00 PM - Return to Puerto Princesa'
                ],
                'requirements' => [
                    'Valid ID',
                    'Comfortable clothes',
                    'Camera',
                    'Waterproof bag',
                    'Insect repellent'
                ]
            ],
            [
                'title' => 'Manila Food Tour',
                'description' => 'Embark on a culinary journey through Manila\'s best food spots! Taste authentic Filipino dishes, visit local markets, and learn about the rich food culture of the Philippines.',
                'location' => 'Manila, Metro Manila',
                'latitude' => 14.5995,
                'longitude' => 120.9842,
                'start_date' => Carbon::now()->addDays(3)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addDays(3)->format('Y-m-d H:i:s'),
                'start_time' => '18:00:00',
                'end_time' => '22:00:00',
                'category' => 'Food',
                'image_url' => 'https://images.unsplash.com/photo-1544551763-46a013bb2dcc?w=800&h=600&fit=crop',
                'max_attendees' => 15,
                'price' => 1200.00,
                'itinerary' => [
                    '6:00 PM - Meet at Binondo',
                    '6:30 PM - Chinese-Filipino food tasting',
                    '7:30 PM - Visit Quiapo market',
                    '8:00 PM - Street food adventure',
                    '9:00 PM - Traditional Filipino dinner',
                    '10:00 PM - Dessert and coffee'
                ],
                'requirements' => [
                    'Valid ID',
                    'Comfortable walking shoes',
                    'Empty stomach!',
                    'Camera for food photos'
                ]
            ],
            [
                'title' => 'Siargao Surfing Adventure',
                'description' => 'Ride the waves in the surfing capital of the Philippines! Learn to surf or improve your skills with professional instructors. Perfect for beginners and experienced surfers alike.',
                'location' => 'Siargao Island, Surigao del Norte',
                'latitude' => 9.8333,
                'longitude' => 126.0500,
                'start_date' => Carbon::now()->addDays(49)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addDays(52)->format('Y-m-d H:i:s'),
                'start_time' => '07:00:00',
                'end_time' => '18:00:00',
                'category' => 'Sports',
                'image_url' => 'https://images.unsplash.com/photo-1544551763-46a013bb2dcc?w=800&h=600&fit=crop',
                'max_attendees' => 12,
                'price' => 4200.00,
                'itinerary' => [
                    '7:00 AM - Meet at General Luna',
                    '8:00 AM - Surfing lesson at Cloud 9',
                    '10:00 AM - Island hopping to Naked Island',
                    '12:00 PM - Lunch at Daku Island',
                    '2:00 PM - Swimming at Guyam Island',
                    '4:00 PM - Return to General Luna',
                    '6:00 PM - Sunset at Cloud 9'
                ],
                'requirements' => [
                    'Valid ID',
                    'Swimwear',
                    'Sunscreen',
                    'Surfboard (rental available)',
                    'Waterproof camera'
                ]
            ],
            [
                'title' => 'Vigan Heritage Walk',
                'description' => 'Step back in time and explore the well-preserved Spanish colonial architecture of Vigan! This UNESCO World Heritage site offers a glimpse into the Philippines\' colonial past.',
                'location' => 'Vigan City, Ilocos Sur',
                'latitude' => 17.5748,
                'longitude' => 120.3869,
                'start_date' => Carbon::now()->addDays(56)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addDays(58)->format('Y-m-d H:i:s'),
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'category' => 'Culture',
                'image_url' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&h=600&fit=crop',
                'max_attendees' => 20,
                'price' => 2200.00,
                'itinerary' => [
                    '9:00 AM - Meet at Vigan Plaza',
                    '9:30 AM - Walking tour of Calle Crisologo',
                    '11:00 AM - Visit Vigan Cathedral',
                    '12:30 PM - Lunch at local restaurant',
                    '2:00 PM - Pottery making at Pagburnayan',
                    '3:30 PM - Visit Baluarte Zoo',
                    '5:00 PM - Kalesa ride around the city'
                ],
                'requirements' => [
                    'Valid ID',
                    'Comfortable walking shoes',
                    'Camera',
                    'Hat and sunglasses'
                ]
            ],
            [
                'title' => 'Batanes Photography Tour',
                'description' => 'Capture the stunning landscapes of Batanes! Known as the "Scotland of the Philippines," this remote province offers breathtaking views perfect for photography enthusiasts.',
                'location' => 'Batanes Province',
                'latitude' => 20.4167,
                'longitude' => 121.9500,
                'start_date' => Carbon::now()->addDays(63)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addDays(67)->format('Y-m-d H:i:s'),
                'start_time' => '06:00:00',
                'end_time' => '18:00:00',
                'category' => 'Photography',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
                'max_attendees' => 10,
                'price' => 5500.00,
                'itinerary' => [
                    '6:00 AM - Sunrise at Basco Lighthouse',
                    '8:00 AM - Breakfast at local eatery',
                    '9:00 AM - Visit Valugan Boulder Beach',
                    '11:00 AM - Photography at Marlboro Hills',
                    '1:00 PM - Lunch at Honesty Coffee Shop',
                    '3:00 PM - Visit Sabtang Island',
                    '5:00 PM - Sunset at Naidi Hills'
                ],
                'requirements' => [
                    'Valid ID',
                    'Camera equipment',
                    'Extra batteries',
                    'Memory cards',
                    'Comfortable shoes',
                    'Warm clothing'
                ]
            ],
            [
                'title' => 'Palawan Island Hopping',
                'description' => 'Discover the pristine beauty of Palawan with our island hopping adventure. Visit hidden lagoons, snorkel in crystal clear waters, and enjoy a beach picnic on a secluded island.',
                'location' => 'El Nido, Palawan',
                'latitude' => 11.2000,
                'longitude' => 119.4000,
                'start_date' => Carbon::now()->addDays(14)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addDays(16)->format('Y-m-d H:i:s'),
                'start_time' => '08:00:00',
                'end_time' => '17:00:00',
                'category' => 'Beach',
                'image_url' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800&h=600&fit=crop',
                'max_attendees' => 20,
                'price' => 3500.00,
                'itinerary' => [
                    '8:00 AM - Meet at El Nido port',
                    '9:00 AM - Boat departure for island hopping',
                    '10:30 AM - Visit Big Lagoon',
                    '12:00 PM - Lunch on Shimizu Island',
                    '2:00 PM - Snorkeling at Secret Lagoon',
                    '4:00 PM - Beach time at 7 Commandos Beach',
                    '5:30 PM - Return to El Nido'
                ],
                'requirements' => [
                    'Swimsuit and towel',
                    'Sunscreen',
                    'Waterproof bag',
                    'Snorkeling gear (provided)',
                    'Valid ID'
                ]
            ],
            [
                'title' => 'Sagada Cave Connection',
                'description' => 'Challenge yourself with the famous cave connection adventure in Sagada. Navigate through underground rivers, climb rock formations, and experience the thrill of spelunking in one of the most beautiful cave systems in the Philippines.',
                'location' => 'Sagada, Mountain Province',
                'latitude' => 17.0833,
                'longitude' => 120.9000,
                'start_date' => Carbon::now()->addDays(21)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addDays(22)->format('Y-m-d H:i:s'),
                'start_time' => '07:00:00',
                'end_time' => '16:00:00',
                'category' => 'Adventure',
                'image_url' => 'https://images.unsplash.com/photo-1551524164-6cf2ac5313bb?w=800&h=600&fit=crop',
                'max_attendees' => 12,
                'price' => 1800.00,
                'itinerary' => [
                    '7:00 AM - Meet at Sagada Tourism Office',
                    '8:00 AM - Safety briefing and equipment check',
                    '9:00 AM - Start cave connection adventure',
                    '12:00 PM - Lunch inside the cave',
                    '2:00 PM - Continue cave exploration',
                    '4:00 PM - Exit cave and return to town',
                    '5:00 PM - Debriefing and certificate'
                ],
                'requirements' => [
                    'Physical fitness required',
                    'Comfortable clothes that can get wet',
                    'Waterproof flashlight',
                    'Extra clothes',
                    'Valid ID'
                ]
            ],
            [
                'title' => 'Batanes Cultural Tour',
                'description' => 'Immerse yourself in the unique culture and breathtaking landscapes of Batanes. Visit traditional Ivatan houses, enjoy the rolling hills, and experience the peaceful way of life in this northernmost province.',
                'location' => 'Basco, Batanes',
                'latitude' => 20.4500,
                'longitude' => 121.9667,
                'start_date' => Carbon::now()->addDays(28)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addDays(30)->format('Y-m-d H:i:s'),
                'start_time' => '08:00:00',
                'end_time' => '17:00:00',
                'category' => 'Culture',
                'image_url' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&h=600&fit=crop',
                'max_attendees' => 18,
                'price' => 4500.00,
                'itinerary' => [
                    '8:00 AM - Meet at Basco Airport',
                    '9:00 AM - Visit Fundacion Pacita',
                    '11:00 AM - Explore Basco Lighthouse',
                    '12:30 PM - Lunch at local restaurant',
                    '2:00 PM - Tour of traditional Ivatan houses',
                    '4:00 PM - Visit Valugan Boulder Beach',
                    '6:00 PM - Sunset viewing at Naidi Hills'
                ],
                'requirements' => [
                    'Valid ID',
                    'Comfortable walking shoes',
                    'Camera',
                    'Light jacket',
                    'Personal medications'
                ]
            ],
            [
                'title' => 'Boracay Sunset Sailing',
                'description' => 'Sail into the sunset on the pristine waters of Boracay. Enjoy a romantic sailing experience with stunning views of the famous white sand beach and crystal clear waters.',
                'location' => 'Boracay Island, Aklan',
                'latitude' => 11.9674,
                'longitude' => 121.9248,
                'start_date' => Carbon::now()->addDays(35)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addDays(35)->format('Y-m-d H:i:s'),
                'start_time' => '16:00:00',
                'end_time' => '19:00:00',
                'category' => 'Beach',
                'image_url' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800&h=600&fit=crop',
                'max_attendees' => 25,
                'price' => 1200.00,
                'itinerary' => [
                    '4:00 PM - Meet at Station 1 beach',
                    '4:30 PM - Board sailing boat',
                    '5:00 PM - Start sailing adventure',
                    '6:00 PM - Sunset viewing with refreshments',
                    '7:00 PM - Return to shore',
                    '7:30 PM - Group photo and farewell'
                ],
                'requirements' => [
                    'Swimsuit',
                    'Sunscreen',
                    'Camera',
                    'Valid ID',
                    'Light snacks (optional)'
                ]
            ],
            [
                'title' => 'Mount Pulag Hiking Adventure',
                'description' => 'Conquer the highest peak in Luzon and witness the famous "sea of clouds" at Mount Pulag. This challenging hike rewards you with breathtaking views and an unforgettable sunrise experience.',
                'location' => 'Mount Pulag, Benguet',
                'latitude' => 16.5833,
                'longitude' => 120.9000,
                'start_date' => Carbon::now()->addDays(42)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addDays(44)->format('Y-m-d H:i:s'),
                'start_time' => '22:00:00',
                'end_time' => '12:00:00',
                'category' => 'Hiking',
                'image_url' => 'https://images.unsplash.com/photo-1551524164-6cf2ac5313bb?w=800&h=600&fit=crop',
                'max_attendees' => 10,
                'price' => 2200.00,
                'itinerary' => [
                    '10:00 PM - Meet at Baguio City',
                    '11:00 PM - Travel to Mount Pulag',
                    '2:00 AM - Arrive at ranger station',
                    '3:00 AM - Start hiking to summit',
                    '6:00 AM - Reach summit for sunrise',
                    '8:00 AM - Breakfast at summit',
                    '10:00 AM - Descend to ranger station',
                    '12:00 PM - Return to Baguio'
                ],
                'requirements' => [
                    'Physical fitness required',
                    'Warm clothing (4-5 layers)',
                    'Hiking boots',
                    'Headlamp',
                    'Valid ID and medical certificate'
                ]
            ]
        ];

        foreach ($events as $eventData) {
            Event::create(array_merge($eventData, [
                'user_id' => $users->random()->id,
                'is_live' => false,
                'is_active' => true,
            ]));
        }

        // Add more events for better pagination testing
        $additionalEvents = [
            [
                'title' => 'Palawan Underground River Tour',
                'description' => 'Explore one of the New 7 Wonders of Nature. Discover the stunning underground river with its magnificent limestone formations and diverse wildlife.',
                'location' => 'Puerto Princesa, Palawan',
                'latitude' => 10.3157,
                'longitude' => 118.9559,
                'start_date' => Carbon::now()->addDays(10)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addDays(12)->format('Y-m-d H:i:s'),
                'start_time' => '08:00:00',
                'end_time' => '17:00:00',
                'category' => 'Sightseeing',
                'image_url' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800&h=600&fit=crop',
                'max_attendees' => 20,
                'price' => 3500.00,
                'itinerary' => [
                    '8:00 AM - Hotel pickup',
                    '9:00 AM - Arrive at Sabang Wharf',
                    '10:00 AM - Underground River tour',
                    '12:00 PM - Lunch at local restaurant',
                    '2:00 PM - Beach time at Sabang',
                    '4:00 PM - Return to Puerto Princesa',
                    '6:00 PM - Hotel drop-off'
                ],
                'requirements' => ['Valid ID', 'Comfortable clothes', 'Camera', 'Sunscreen']
            ],
            [
                'title' => 'Boracay Island Hopping',
                'description' => 'Experience the crystal clear waters of Boracay with island hopping to nearby beautiful islands. Perfect for beach lovers and water sports enthusiasts.',
                'location' => 'Boracay Island, Aklan',
                'latitude' => 11.9674,
                'longitude' => 121.9248,
                'start_date' => Carbon::now()->addDays(14)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addDays(16)->format('Y-m-d H:i:s'),
                'start_time' => '09:00:00',
                'end_time' => '18:00:00',
                'category' => 'Beach',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
                'max_attendees' => 25,
                'price' => 2800.00,
                'itinerary' => [
                    '9:00 AM - Meet at Station 1',
                    '10:00 AM - Island hopping begins',
                    '11:00 AM - Snorkeling at Puka Beach',
                    '12:00 PM - Lunch on the boat',
                    '2:00 PM - Visit Crocodile Island',
                    '4:00 PM - Swimming at Magic Island',
                    '6:00 PM - Return to Boracay'
                ],
                'requirements' => ['Swimsuit', 'Towel', 'Sunscreen', 'Waterproof camera']
            ],
            [
                'title' => 'Chocolate Hills Adventure',
                'description' => 'Witness the unique geological formation of over 1,200 hills in Bohol. A must-see natural wonder that will leave you in awe.',
                'location' => 'Carmen, Bohol',
                'latitude' => 9.9129,
                'longitude' => 124.2034,
                'start_date' => Carbon::now()->addDays(18)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addDays(20)->format('Y-m-d H:i:s'),
                'start_time' => '07:00:00',
                'end_time' => '19:00:00',
                'category' => 'Sightseeing',
                'image_url' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&h=600&fit=crop',
                'max_attendees' => 18,
                'price' => 2200.00,
                'itinerary' => [
                    '7:00 AM - Hotel pickup',
                    '8:30 AM - Arrive at Chocolate Hills',
                    '9:00 AM - Viewing deck and photos',
                    '11:00 AM - Visit Tarsier Sanctuary',
                    '1:00 PM - Lunch at Loboc River',
                    '3:00 PM - Loboc River cruise',
                    '5:00 PM - Visit Baclayon Church',
                    '7:00 PM - Return to hotel'
                ],
                'requirements' => ['Valid ID', 'Comfortable shoes', 'Camera', 'Hat']
            ],
            [
                'title' => 'Mayon Volcano Trekking',
                'description' => 'Challenge yourself with a trek to the majestic Mayon Volcano. Experience the beauty of this perfect cone-shaped volcano up close.',
                'location' => 'Legazpi City, Albay',
                'latitude' => 13.2567,
                'longitude' => 123.6857,
                'start_date' => Carbon::now()->addDays(22)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addDays(24)->format('Y-m-d H:i:s'),
                'start_time' => '05:00:00',
                'end_time' => '17:00:00',
                'category' => 'Hiking',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
                'max_attendees' => 12,
                'price' => 3200.00,
                'itinerary' => [
                    '5:00 AM - Early breakfast',
                    '6:00 AM - Start trekking',
                    '8:00 AM - First rest point',
                    '10:00 AM - Summit approach',
                    '12:00 PM - Lunch at summit',
                    '2:00 PM - Descent begins',
                    '5:00 PM - Return to base camp'
                ],
                'requirements' => ['Hiking boots', 'Backpack', 'Water', 'First aid kit', 'Valid ID']
            ],
            [
                'title' => 'Vigan Heritage Walk',
                'description' => 'Step back in time as you explore the well-preserved Spanish colonial architecture of Vigan. A UNESCO World Heritage Site.',
                'location' => 'Vigan City, Ilocos Sur',
                'latitude' => 17.5748,
                'longitude' => 120.3869,
                'start_date' => Carbon::now()->addDays(26)->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->addDays(28)->format('Y-m-d H:i:s'),
                'start_time' => '08:00:00',
                'end_time' => '18:00:00',
                'category' => 'Culture',
                'image_url' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&h=600&fit=crop',
                'max_attendees' => 15,
                'price' => 1800.00,
                'itinerary' => [
                    '8:00 AM - Hotel pickup',
                    '9:00 AM - Calle Crisologo walking tour',
                    '11:00 AM - Visit Vigan Cathedral',
                    '1:00 PM - Lunch at local restaurant',
                    '3:00 PM - Pottery making workshop',
                    '5:00 PM - Sunset at Bantay Bell Tower',
                    '7:00 PM - Return to hotel'
                ],
                'requirements' => ['Comfortable walking shoes', 'Camera', 'Valid ID']
            ]
        ];

        // Create additional events
        foreach ($additionalEvents as $eventData) {
            Event::create(array_merge($eventData, [
                'user_id' => $users->random()->id,
                'is_live' => false,
                'is_active' => true,
            ]));
        }
    }
}
