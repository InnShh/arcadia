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
