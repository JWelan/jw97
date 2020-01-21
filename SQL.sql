CREATE TABLE Users(
	UserID INT(3) PRIMARY KEY,
	Username VARCHAR(20) NOT NULL,
	Password longtext NOT NULL
) ENGINE=INNODB

CREATE TABLE Cars(
	CarID INT(3) PRIMARY KEY,
	Model VARCHAR(30) NOT NULL,
	Doors INT(2) NOT NULL,
	Transmission VARCHAR(20) NOT NULL,
	AgeRequirement INT(2) NOT NULL,
	Price INT(3) NOT NULL,
	Location VARCHAR(20) NOT NULL,
	Photoname VARCHAR(40) NOT NULL,
	Rented Boolean NOT NULL,
	Seats Int(1) NOT NULL
) ENGINE=INNODB

CREATE TABLE Usersrentals(
	UserID INT(3),
	CarID INT(3),
	StartDate DATE NOT NULL,
	EndDate DATE NOT NULL,
	PRIMARY KEY (UserID,CarID),
	CONSTRAINT Fk_USERSID FOREIGN KEY (UserID) REFERENCES Users (UserID),
	CONSTRAINT Fk_CARSID FOREIGN KEY (CarID) REFERENCES Cars (CarID)
) ENGINE=INNODB

INSERT INTO Cars 
(Model, Doors, Transmission, AgeRequirement, Price,
 Location, Photoname, Rented, Seats) 
VALUES 
('Toyota Aygo', 4, 'Manual', 21, 20, 'Edinbrugh', 'Toyota aygo.png', 0, 4), 
('Ford Focus', 5, 'Manual', 21, 27, 'Edinbrugh', '2016 Ford Focus.png', 0, 5), 
('Ford Focus', 5, 'Manual', 21, 27, 'Glasgow', '2016 Ford Focus.png', 0, 5), 
('Vaxhall Insignia', 5, 'Manual', 21, 27, 'Edinbrugh', 'Vaxhall insignia.png', 0, 5), 
('Vaxhall Zafira Tourer', 7, 'Manual', 25, 78, 'Edinbrugh', 'vaxhall zafira.png', 0, 5), 
('Vaxhall Zafira Tourer', 7, 'Manual', 25, 78, 'Glasgow', 'vaxhall zafira.png', 0, 5),
('Mercedes E Class', 5, 'Manual', 25, 167, 'Edinbrugh', 'Mercedes Eclass.png', 0, 5), 
('Mercedes E Class', 5, 'Manual', 25, 167, 'Glasgow', 'Mercedes Eclass.png', 0, 5), 
('Range Rover Evoque', 5, 'Manual', 25, 188, 'Edinbrugh', 'Toyota aygo.png', 0, 4), 
('Toyota Aygo', 4, 'Manual', 21, 20, 'Edinbrugh', 'range rover evoque.png', 0, 5); 









