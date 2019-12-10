PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS House;
DROP TABLE IF EXISTS Rent;

CREATE TABLE User (
    email TEXT PRIMARY KEY,
    firstname TEXT NOT NULL,
    lastname TEXT NOT NULL,
    phone INTEGER DEFAULT NULL,
    hash TEXT NOT NULL UNIQUE
);

CREATE TABLE House (
    houseID INTEGER PRIMARY KEY AUTOINCREMENT,
    owner TEXT NOT NULL,
    availability_start DATETIME NOT NULL,
    availability_end DATETIME NOT NULL,

    city TEXT NOT NULL,
    region TEXT NOT NULL,
    country TEXT NOT NULL,
    street TEXT NOT NULL,
    door TEXT NOT NULL,
    floor TEXT NOT NULL,
    postal_code TEXT NOT NULL,

    title VARCHAR(64) NOT NULL,
    daily_price FLOAT NOT NULL,
    n_beds INTEGER NOT NULL,
    kitchen BOOLEAN NOT NULL,
    internet BOOLEAN NOT NULL,
    air_con BOOLEAN NOT NULL,
    low_mobility BOOLEAN NOT NULL,
    animals BOOLEAN NOT NULL DEFAULT FALSE,
    img_count INTEGER NOT NULL,
    house_description TEXT,

    FOREIGN KEY(owner) REFERENCES User(email),
    CHECK(availability_end > availability_start)
);

CREATE TABLE Rent (
    user TEXT NOT NULL,
    house INTEGER NOT NULL,
    rent_start DATETIME NOT NULL,
    rent_end DATETIME NOT NULL,
    rating INTEGER DEFAULT NULL,
    comments TEXT DEFAULT NULL,
    PRIMARY KEY(house, rent_start),
    FOREIGN KEY(user) REFERENCES User(email),
    FOREIGN KEY(house) REFERENCES House(houseID),
    CHECK(rent_end > rent_start),
    CHECK(rating BETWEEN 1 AND 5)
);