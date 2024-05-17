--create the table settings with the attributes key and value
CREATE TABLE IF NOT EXISTS SETTINGS
(
    key   TEXT PRIMARY KEY,
    value TEXT
);

--create the table channels with the attributes name and id
CREATE TABLE IF NOT EXISTS CHANNELS
(
    id   TEXT PRIMARY KEY UNIQUE,
    name TEXT
);

--create the table to store what videos have been seen
CREATE TABLE IF NOT EXISTS VIDEOS
(
    id   TEXT PRIMARY KEY,
    channel TEXT
);

--pay attention to caps
--insert default settings
INSERT INTO SETTINGS (key, value) VALUES ('discord_webhook', 'https://discord.com/api/webhooks/1190840001999687881/iHDcgair5LUXgt5hgNuA2caWdcWD-WMUoUDVU9zIXMfJV7ZQltamoo_v7PfRdjctX7Zy');

--insert a few default channels
INSERT INTO CHANNELS (name, id) VALUES ('Beau of the Fifth Column', '@BeauoftheFifthColumn');
INSERT INTO CHANNELS (name, id) VALUES ('Ginny Di', '@GinnyDi');
INSERT INTO CHANNELS (name, id) VALUES ('Extra History', '@ExtraHistory');