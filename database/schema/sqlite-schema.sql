/* default schema */
CREATE TABLE IF NOT EXISTS "migrations" ("id" integer primary key autoincrement not null, "migration" varchar not null, "batch" integer not null);
CREATE TABLE IF NOT EXISTS "users" ("id" integer primary key autoincrement not null, "name" varchar not null, "email" varchar not null, "email_verified_at" datetime, "password" varchar not null, "remember_token" varchar, "created_at" datetime, "updated_at" datetime);
CREATE UNIQUE INDEX "users_email_unique" on "users" ("email");
CREATE TABLE IF NOT EXISTS "password_reset_tokens" ("email" varchar not null, "token" varchar not null, "created_at" datetime, primary key ("email"));
CREATE TABLE IF NOT EXISTS "sessions" ("id" varchar not null, "user_id" integer, "ip_address" varchar, "user_agent" text, "payload" text not null, "last_activity" integer not null, primary key ("id"));
CREATE INDEX "sessions_user_id_index" on "sessions" ("user_id");
CREATE INDEX "sessions_last_activity_index" on "sessions" ("last_activity");
CREATE TABLE IF NOT EXISTS "cache" ("key" varchar not null, "value" text not null, "expiration" integer not null, primary key ("key"));
CREATE TABLE IF NOT EXISTS "cache_locks" ("key" varchar not null, "owner" varchar not null, "expiration" integer not null, primary key ("key"));
CREATE TABLE IF NOT EXISTS "jobs" ("id" integer primary key autoincrement not null, "queue" varchar not null, "payload" text not null, "attempts" integer not null, "reserved_at" integer, "available_at" integer not null, "created_at" integer not null);
CREATE INDEX "jobs_queue_index" on "jobs" ("queue");
CREATE TABLE IF NOT EXISTS "job_batches" ("id" varchar not null, "name" varchar not null, "total_jobs" integer not null, "pending_jobs" integer not null, "failed_jobs" integer not null, "failed_job_ids" text not null, "options" text, "cancelled_at" integer, "created_at" integer not null, "finished_at" integer, primary key ("id"));
CREATE TABLE IF NOT EXISTS "failed_jobs" ("id" integer primary key autoincrement not null, "uuid" varchar not null, "connection" text not null, "queue" text not null, "payload" text not null, "exception" text not null, "failed_at" datetime not null default CURRENT_TIMESTAMP);
CREATE UNIQUE INDEX "failed_jobs_uuid_unique" on "failed_jobs" ("uuid");
INSERT INTO migrations VALUES(1,'0001_01_01_000000_create_users_table',1);
INSERT INTO migrations VALUES(2,'0001_01_01_000001_create_cache_table',1);
INSERT INTO migrations VALUES(3,'0001_01_01_000002_create_jobs_table',1);
/* custom schema */
CREATE TABLE IF NOT EXISTS reviews (
    id INTEGER PRIMARY KEY autoincrement NOT NULL,
    pseudo VARCHAR(255) NOT NULL,
    comment TEXT NOT NULL,
    rating INT NOT NULL,
    created_at DATETIME,
    updated_at DATETIME,
    approved TINYINT(1) DEFAULT 0
);
CREATE TABLE IF NOT EXISTS timetables (
    id INTEGER PRIMARY KEY autoincrement NOT NULL,
    day_of_week TINYINT NOT NULL,
    opening_time CHAR(5),
    closing_time CHAR(5)
);
INSERT INTO timetables VALUES(1, 1, NULL,NULL);
INSERT INTO timetables VALUES(2, 2, '09:00','21:00');
INSERT INTO timetables VALUES(3, 3, '09:00','21:00');
INSERT INTO timetables VALUES(4, 4, '09:00','21:00');
INSERT INTO timetables VALUES(5, 5, '09:00','21:00');
INSERT INTO timetables VALUES(6, 6, '09:00','21:00');
INSERT INTO timetables VALUES(7, 7, '09:00','21:00');
CREATE TABLE activities (
    id INTEGER PRIMARY KEY autoincrement,
    image VARCHAR(255),
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    created_at DATETIME,
    updated_at DATETIME
);
INSERT INTO activities (id, image, name, description, created_at, updated_at) VALUES
(1, NULL, 'Activities', 'Arcadia Zoo offers a range of exciting services: enjoy delicious dining options, take free guided tours of the exhibits, and explore the zoo on a charming small train. These features ensure a fun and memorable experience for every visitor.', NULL, NULL);

INSERT INTO activities (id, image, name, description, created_at, updated_at) VALUES
(2, '/images/arcadia-express.png', 'All Aboard the Arcadia Express!', 'Experience Arcadia Zoo like never before with our charming small train tour, the Arcadia Express. This delightful journey takes you through the heart of the zoo, offering a unique perspective on our diverse Exhibits and incredible animals. Relax and enjoy the scenic ride as our knowledgeable guide shares fascinating facts and stories about the zoo''s residents. Perfect for families and visitors of all ages, the Arcadia Express provides a fun and convenient way to explore the zoo. Don''t miss this enchanting adventure that adds a touch of magic to your visit!', NULL, NULL);

INSERT INTO activities (id, image, name, description, created_at, updated_at) VALUES
(3, '/images/eating-estaurant-1x.jpg', 'Savor the Flavors at Arcadia', 'Indulge in the culinary delights at Arcadia Zoo with our "Savor the Flavors" dining options. Enjoy a variety of mouth-watering meals at our on-site restaurants, perfect for satisfying any craving. From gourmet sandwiches and fresh salads to kid-friendly favorites like burgers and fries, there''s something delicious for everyone. Relax in our cozy café with views of nearby animal enclosures, or grab a quick snack from one of our convenient kiosks. We also offer vegetarian, vegan, and gluten-free options to cater to all dietary needs. Make your visit to Arcadia Zoo even more enjoyable with a memorable dining experience!', NULL, NULL);

INSERT INTO activities (id, image, name, description, created_at, updated_at) VALUES
(4, '/images/feeding-giraffe-1x.jpg', 'Explore with the Arcadia Adventure Tour', 'Enhance your visit with the Arcadia Adventure Tour, our complimentary guided tour of the exhibits. Join our expert guides as they lead you through the zoo, sharing fascinating insights and behind-the-scenes stories about our incredible animals. Discover unique facts about each species, their habitats, and conservation efforts. Whether you''re a first-time visitor or a regular, the Arcadia Adventure Tour offers a fresh and enriching experience every time. Don''t miss this chance to explore and learn with us!', NULL, NULL);

CREATE TABLE IF NOT EXISTS exhibits (
    id INTEGER PRIMARY KEY autoincrement NOT NULL,
    slug VARCHAR(255),
    name VARCHAR(255),
    description TEXT,
    created_at DATETIME,
    updated_at DATETIME
);

INSERT INTO exhibits (id, slug, name, description, created_at, updated_at) VALUES
(1, 'savanna', 'Savanna', 'The Savanna habitat at Arcadia Zoo spans a vast area, meticulously designed to mimic the open grasslands of Africa. Giraffes, zebras, and antelopes roam freely, creating a dynamic and authentic savanna experience for both the animals and visitors. The habitat features native plants and waterholes, ensuring a realistic and enriching environment. Visitors can observe the natural behaviors and interactions of these majestic species from specially designed viewing platforms. This immersive habitat underscores Arcadia Zoo’s commitment to conservation and the preservation of wildlife in their natural settings.', NULL,NULL);
INSERT INTO exhibits (id, slug, name, description, created_at, updated_at) VALUES
(2, 'arctic', 'Arctic', 'At our zoo''s Arctic exhibit, immerse yourself in a world of snow and ice, home to fascinating creatures like polar bears, seals, and Arctic foxes. Witness these animals'' incredible adaptations to their harsh environment, from thick fur to agile hunting skills. Learn about the delicate balance of the Arctic ecosystem and the conservation efforts dedicated to preserving these vital habitats. Engage in interactive displays that showcase the beauty and challenges of Arctic life, inspiring a deeper understanding and commitment to wildlife conservation.', NULL,NULL);
INSERT INTO exhibits (id, slug, name, description, created_at, updated_at) VALUES
(3, 'forest', 'Forest', 'The Forest Exhibit at Arcadia Zoo invites you to explore the lush greenery and diverse wildlife where nature''s wonders come alive. Immerse yourself in the serene ambiance, home to a variety of birds, mammals, and unique plant species. Discover the captivating beauty and biodiversity of the forest ecosystem, perfect for nature enthusiasts of all ages. Witness the harmonious coexistence of flora and fauna, a tranquil retreat that highlights the zoo''s commitment to conservation.', NULL,NULL);

CREATE TABLE IF NOT EXISTS exhibit_images (
    id INTEGER PRIMARY KEY autoincrement NOT NULL,
    exhibit_id INTEGER NOT NULL,
    image_path VARCHAR(255),
    created_at DATETIME,
    updated_at DATETIME
);

INSERT INTO exhibit_images (id, exhibit_id, image_path, created_at, updated_at) VALUES
(1, 1, '/images/desert-fox-1x.jpg', NULL,NULL);
INSERT INTO exhibit_images (id, exhibit_id, image_path, created_at, updated_at) VALUES
(2, 2, '/images/polar-bear-1x.jpg', NULL,NULL);
INSERT INTO exhibit_images (id, exhibit_id, image_path, created_at, updated_at) VALUES
(3, 3, '/images/wolf-x1.jpg', NULL,NULL);
INSERT INTO exhibit_images (id, exhibit_id, image_path, created_at, updated_at) VALUES
(4, 1, '/images/wo-giraffes-x1.jpg', NULL,NULL);
INSERT INTO exhibit_images (id, exhibit_id, image_path, created_at, updated_at) VALUES
(5, 2, '/images/penguin-x1.jpg', NULL,NULL);
INSERT INTO exhibit_images (id, exhibit_id, image_path, created_at, updated_at) VALUES
(6, 3, '/images/amur-tiger-1x.jpg', NULL,NULL);
INSERT INTO exhibit_images (id, exhibit_id, image_path, created_at, updated_at) VALUES
(7, 1, '/images/zebras-x1.jpg', NULL,NULL);
INSERT INTO exhibit_images (id, exhibit_id, image_path, created_at, updated_at) VALUES
(8, 2, '/images/seals-x1.jpg', NULL,NULL);
INSERT INTO exhibit_images (id, exhibit_id, image_path, created_at, updated_at) VALUES
(9, 3, '/images/red-deer-1x.jpg', NULL,NULL);

CREATE TABLE IF NOT EXISTS animals (
    id INTEGER PRIMARY KEY autoincrement NOT NULL,
    exhibit_id INTEGER NOT NULL,
    slug VARCHAR(255),
    name VARCHAR(255),
    avatar_image_path VARCHAR(255),
    title VARCHAR(255),
    title_description TEXT,
    description TEXT,
    race VARCHAR(255),
    age VARCHAR(255),
    diet VARCHAR(255),
    consumption VARCHAR(255),
    created_at DATETIME,
    updated_at DATETIME
);

INSERT INTO animals (id, exhibit_id, slug, name, avatar_image_path, title, title_description, description, race, age, diet, consumption, created_at, updated_at) VALUES
(1, 1, 'zebra-blue', 'Zebra Blue', '/images/Zebra_400x400px.jpg', 'Zebra Blue - striking beauty', 'Zebras are iconic members of the animal kingdom, known for their distinctive black and white stripes which are unique to each individual. They have excellent eyesight and hearing, which help them detect predators. Zebras are highly social animals and often form strong bonds with each other, living in large herds for protection.</br></br>Arcadia Zoo is home to one stunning zebra, a female named Blue, living in our expansive Grasslands exhibit.', 'Blue, the female zebra, is a striking sight with her vivid black and white stripes. She comes from the grasslands of Tanzania and is 5 years old. Blue thrives on a varied diet of grasses and herbs, consuming around 20 pounds of vegetation daily. Her playful and social nature makes her a delight for visitors, especially children.', 'Plains zebra', '5 years', 'Grasses and herbs', '20 pounds', NULL, NULL);

INSERT INTO animals (id, exhibit_id, slug, name, avatar_image_path, title, title_description, description, race, age, diet, consumption, created_at, updated_at) VALUES
(2, 1, 'giraffe-max', 'Giraffe Max', '/images/giraffe-max_400x400px.jpg', 'Giraffe Max - majestic giant', 'Giraffes are true marvels of the animal kingdom. They have hearts the size of basketballs. Special one-way valves and elastic blood vessels allow giraffes to bend over for a drink without having their enormous blood pressure negatively affect their brains. Giraffes are constantly on alert, and only sleep about 20 minutes per night.</br></br>Arcadia Zoo is home to one magnificent giraffe, a male named Max, living in our spacious Savanna exhibit.', 'Max, the male giraffe, hails from the savannas of Kenya. At 8 years old, he enjoys a diet rich in acacia leaves, consuming around 75 pounds of foliage daily. Max is known for his gentle nature and impressive height, making him a favorite among visitors.', 'Nubian giraffe', '8 years', 'Acacia leaves', '75 pounds', NULL, NULL);

INSERT INTO animals (id, exhibit_id, slug, name, avatar_image_path, title, title_description, description, race, age, diet, consumption, created_at, updated_at) VALUES
(3, 1, 'desert-fox-sandy', 'Desert Fox Sandy', '/images/sand-fox_400x400px.jpg', 'Desert Fox Sandy - swift survivor', 'Desert foxes, or fennec foxes, are the smallest of all canids and are perfectly adapted to desert life with their large ears that dissipate heat. They have a keen sense of hearing to locate prey underground and are primarily nocturnal, hunting during the cool nights. Fennec foxes are social animals that live in burrows and have a varied diet including insects, small mammals, and fruits.</br></br>Arcadia Zoo is home to one charming desert fox, a female named Sandy, living in our Desert Dunes exhibit.', 'Sandy, the female desert fox, originates from the arid deserts of North Africa. At 3 years old, she is a small but agile hunter, thriving on a diet of insects, small mammals, and fruits, consuming around 2 pounds daily. Sandy is known for her large ears and swift movements, making her a fascinating and endearing sight for visitors.', 'Fennec fox', '3 years', 'Insects, small mammals, and fruits', '2 pounds', NULL, NULL);

INSERT INTO animals (id, exhibit_id, slug, name, avatar_image_path, title, title_description, description, race, age, diet, consumption, created_at, updated_at) VALUES
(4, 1, 'lion-nala', 'Lion Nala', '/images/female-lion_400x400px.jpg', 'Lion Nala - regal huntress', 'Lions are known as the kings of the jungle, with their powerful build and social structure centered around pride dynamics. Female lions, like Nala, are the primary hunters and work together to bring down large prey. Lions are unique among big cats for their social behavior and live in groups called prides, which consist of related females and their offspring, and a few males.</br></br>Arcadia Zoo is home to one majestic lioness, named Nala, reigning over our Savanna Pride exhibit.', 'Nala, the female lion, comes from the savannas of Africa. At 5 years old, she is a powerful and graceful predator, enjoying a diet of meat, primarily consisting of wildebeest and zebras, consuming around 12 pounds daily. Nala is known for her fierce yet nurturing nature, and her regal presence makes her a favorite among zoo visitors.', 'African lion', '5 years', 'Meat (wildebeest and zebras)', '12 pounds', NULL, NULL);

INSERT INTO animals (id, exhibit_id, slug, name, avatar_image_path, title, title_description, description, race, age, diet, consumption, created_at, updated_at) VALUES
(5, 2, 'polar-bear-mishka', 'Polar Bear Mishka', '/images/polar-bear_400x400px.jpg', 'Polar Bear Mishka - powerful swimmer', 'Polar bears are the largest land carnivores and are superbly adapted to life in the Arctic. They have a thick layer of blubber and dense fur that keep them warm in the freezing temperatures. Polar bears are excellent swimmers and can cover long distances in search of food. They primarily hunt seals, using their sharp sense of smell to detect them from miles away.</br></br>Arcadia Zoo is home to one impressive polar bear, a female named Mishka, enjoying our icy Polar Bear Cove exhibit.', 'Mishka, the female polar bear, originates from the Arctic regions of Canada. At 9 years old, she is a magnificent and powerful swimmer, enjoying a diet of seals and fish, consuming around 30 pounds daily. Mishka is known for her thick, white fur and her playful yet dominant personality, making her a standout attraction at the zoo.', 'Polar bear', '9 years', 'Seals and fish', '30 pounds', NULL, NULL);

INSERT INTO animals (id, exhibit_id, slug, name, avatar_image_path, title, title_description, description, race, age, diet, consumption, created_at, updated_at) VALUES
(6, 2, 'arctic-fox-clue', 'Arctic Fox Clue', '/images/arctic-fox_400x400px.jpg', 'Arctic Fox Clue - playful trickster', 'Arctic foxes are well-adapted to life in the Arctic tundra, with their thick fur providing excellent insulation against the cold. They are known for their ability to change the color of their fur with the seasons, from white in the winter to brown or gray in the summer. Arctic foxes are opportunistic feeders and have keen hearing to detect prey under the snow.</br></br>Arcadia Zoo is home to one delightful Arctic fox, a male named Clue, residing in our Arctic Wonderland exhibit.', 'Clue, the male Arctic fox, comes from the icy tundras of the Arctic. At 4 years old, he has a thick, white fur coat that blends perfectly with the snow. Clue thrives on a diet of small mammals and birds, consuming around 3 pounds daily. Known for his playful antics and adaptability to extreme cold, Clue is a favorite among visitors, especially during the winter months.', 'Arctic fox', '4 years', 'Small mammals and birds', '3 pounds', NULL, NULL);

INSERT INTO animals (id, exhibit_id, slug, name, avatar_image_path, title, title_description, description, race, age, diet, consumption, created_at, updated_at) VALUES
(7, 3, 'amur-tiger-rex', 'Amur Tiger Rex', '/images/tiger_400x400px.jpg', 'Amur Tiger Rex - solitary hunter', 'Amur tigers, also known as Siberian tigers, are the largest cats in the world and are known for their strength and agility. They have thick fur to withstand the harsh, cold climates of their natural habitat. Amur tigers are solitary animals and have large territories that they defend aggressively.</br></br>Arcadia Zoo is home to one magnificent Amur tiger, a male named Rex, living in our Snowy Taiga exhibit.', 'Rex, the male Amur tiger, hails from the snowy regions of Eastern Russia. At 7 years old, he is a powerful and agile hunter, enjoying a diet rich in meat, consuming around 15 pounds daily. Rex is known for his striking orange coat with black stripes and his solitary, majestic demeanor, making him a highlight of the zoo.', 'Amur tiger', '7 years', 'Meat', '15 pounds', NULL, NULL);

INSERT INTO animals (id, exhibit_id, slug, name, avatar_image_path, title, title_description, description, race, age, diet, consumption, created_at, updated_at) VALUES
(8, 3, 'wolf-bro', 'Wolf Bro', '/images/wolf_400x400px.jpg', 'Wolf Bro - commanding alpha', 'Wolves are remarkable for their intelligence, social structure, and adaptability. They communicate with each other using a range of vocalizations, body language, and scent marking. Wolves live and hunt in packs, which are typically family units. They are known for their endurance and ability to cover great distances when hunting.</br></br>Arcadia Zoo is home to one majestic wolf, a male named Bro, leading our Wolf Forest exhibit.', 'Bro, the alpha male wolf, originates from the forests of North America. At 6 years old, he is a robust and majestic predator, relying on a diet of meat, primarily deer and small mammals, consuming around 10 pounds daily. Known for his intelligence and pack-leading abilities, Bro captivates visitors with his piercing eyes and commanding presence.', 'Grey wolf', '6 years', 'Meat (deer and small mammals)', '10 pounds', NULL, NULL);

INSERT INTO animals (id, exhibit_id, slug, name, avatar_image_path, title, title_description, description, race, age, diet, consumption, created_at, updated_at) VALUES
(9, 3, 'red-deer-buck', 'Red Deer Buck', '/images/deer_400x400px.jpg', 'Red Deer Buck - regal presence', 'Red deer are one of the largest deer species and are known for their impressive antlers, which are shed and regrown annually. They are social animals and often form groups called hinds, led by a dominant male. Red deer are herbivores, feeding on grasses, leaves, and twigs. During the rutting season, males use their antlers in dramatic displays to compete for mates.</br></br>Arcadia Zoo is home to one majestic red deer, a male named Buck, roaming our Forest Glade exhibit.', 'Buck, the male red deer, hails from the lush forests of Europe. At 6 years old, he is a majestic presence with his impressive antlers. Buck enjoys a diet of grasses, leaves, and twigs, consuming around 10 pounds of foliage daily. Known for his gentle demeanor and striking appearance, Buck captivates visitors with his regal stance and graceful movements.', 'Red deer', '6 years', 'Grasses, leaves, and twigs', '10 pounds', NULL, NULL);


CREATE TABLE IF NOT EXISTS animal_images (
    id INTEGER PRIMARY KEY autoincrement NOT NULL,
    animal_id INTEGER NOT NULL,
    image_path VARCHAR(255),
    created_at DATETIME,
    updated_at DATETIME
);

INSERT INTO animal_images (id, animal_id, image_path, created_at, updated_at) VALUES
(1, 1, '/images/zebras-x1.jpg',  NULL,NULL);
INSERT INTO animal_images (id, animal_id, image_path, created_at, updated_at) VALUES
(2, 2, '/images/2giraffe-1x.jpg',  NULL,NULL);
INSERT INTO animal_images (id, animal_id, image_path, created_at, updated_at) VALUES
(3, 3, '/images/desert-fox-1x.jpg',  NULL,NULL);
INSERT INTO animal_images (id, animal_id, image_path, created_at, updated_at) VALUES
(4, 4, '/images/female-lion-1x.jpg',  NULL,NULL);
INSERT INTO animal_images (id, animal_id, image_path, created_at, updated_at) VALUES
(5, 5, '/images/polar-bear-1x.jpg',  NULL,NULL);
INSERT INTO animal_images (id, animal_id, image_path, created_at, updated_at) VALUES
(6, 6, '/images/arctic-fox-x1.jpg',  NULL,NULL);
INSERT INTO animal_images (id, animal_id, image_path, created_at, updated_at) VALUES
(7, 7, '/images/amur-tiger-1x.jpg',  NULL,NULL);
INSERT INTO animal_images (id, animal_id, image_path, created_at, updated_at) VALUES
(8, 8, '/images/wolf-x1.jpg',  NULL,NULL);
INSERT INTO animal_images (id, animal_id, image_path, created_at, updated_at) VALUES
(9, 9, '/images/red-deer-1x.jpg',  NULL,NULL);
INSERT INTO animal_images (id, animal_id, image_path, created_at, updated_at) VALUES
(10, 1, '/images/zebra-x1-sc.jpg',  NULL,NULL);
INSERT INTO animal_images (id, animal_id, image_path, created_at, updated_at) VALUES
(11, 2, '/images/wo-giraffes-x1.jpg',  NULL,NULL);
INSERT INTO animal_images (id, animal_id, image_path, created_at, updated_at) VALUES
(12, 3, '/images/sand-fox-x1-sc.jpg',  NULL,NULL);
INSERT INTO animal_images (id, animal_id, image_path, created_at, updated_at) VALUES
(13, 4, '/images/lion-x1-sc.jpg',  NULL,NULL);
INSERT INTO animal_images (id, animal_id, image_path, created_at, updated_at) VALUES
(14, 5, '/images/bear-x1-sc.jpg',  NULL,NULL);
INSERT INTO animal_images (id, animal_id, image_path, created_at, updated_at) VALUES
(15, 6, '/images/arctic-fox-x1-sc.jpg',  NULL,NULL);
INSERT INTO animal_images (id, animal_id, image_path, created_at, updated_at) VALUES
(16, 7, '/images/tiger-x1-sc.jpg',  NULL,NULL);
INSERT INTO animal_images (id, animal_id, image_path, created_at, updated_at) VALUES
(17, 8, '/images/wolf-x1-sc.jpg',  NULL,NULL);
INSERT INTO animal_images (id, animal_id, image_path, created_at, updated_at) VALUES
(18, 9, '/images/red-deer-x1-sc.jpg',  NULL,NULL);