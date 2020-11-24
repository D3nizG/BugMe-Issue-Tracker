
CREATE DATABASE bugme;


CREATE TABLE 'users'(
    'id' INT NOT NULL AUTO_INCREMENT,
    'firstname' varchar(24) NOT NULL,
    'lastname'varchar(24)NOT NULL,
    'password' varchar(255) NOT NULL,
    'email' varchar(255) NOT NULL UNIQUE,
    'date_joined' DATETIME NOT NULL,
    PRIMARY KEY ('id')
)

CREATE TABLE 'issues'(
    'id' INT NOT NULL AUTO_INCREMENT,
    'title' varchar(255) NOT NULL,
    'description' TEXT,
    'type' enum ('bug', 'proposal', 'task') NOT NULL,
    'priority' enum ('Minor', 'Major','Critical') NOT NULL UNIQUE,
    'status' varchar (25),
    'assigned_to' INT NOT NULL,
    'created_by' INT NOT NULL,
    'created' DATETIME NOT NULL,
    'updated' DATETIME,
    PRIMARY KEY ('id')
)
