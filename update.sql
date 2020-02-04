CREATE TABLE users (
    `id` INT (11) NOT NULL AUTO_INCRIMILAN,
    `username` VARCHAR (20) NOT NULL,
    `email` VARCHAR (20) NOT NULL,
    `first_name` VARCHAR (20) NOT NULL,
    `last_name` VARCHAR (20) NOT NULL,
    `password` VARCHAR (20) NOT NULL,
    `confirm_password` VARCHAR (20) NOT NULL,
    PRIMARY KEY('id')
)