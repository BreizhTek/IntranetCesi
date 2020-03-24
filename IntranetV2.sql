#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Class
#------------------------------------------------------------

CREATE TABLE Class(
        Id           Int  Auto_increment  NOT NULL ,
        Name         Varchar (100) NOT NULL ,
        Year_begin   Date NOT NULL ,
        Year_end     Date NOT NULL ,
        etablishment Varchar (100)
	,CONSTRAINT Class_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Users
#------------------------------------------------------------

CREATE TABLE Users(
        Id         Int  Auto_increment  NOT NULL ,
        Level      Int NOT NULL ,
        Last_name  Varchar (100) NOT NULL ,
        First_name Varchar (100) NOT NULL ,
        Birth      Date ,
        Post       Varchar (50) ,
        Picture    Text ,
        Phone      Int ,
        Address    Text ,
        Tutor      Varchar (100) ,
        Tutor_mail Varchar (150) ,
        Mail       Varchar (150) NOT NULL ,
        Password   Varchar (255) NOT NULL ,
        Id_Class   Int
	,CONSTRAINT Users_PK PRIMARY KEY (Id)

	,CONSTRAINT Users_Class_FK FOREIGN KEY (Id_Class) REFERENCES Class(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Cars
#------------------------------------------------------------

CREATE TABLE Cars(
        Id       Int  Auto_increment  NOT NULL ,
        Plate    Varchar (20) NOT NULL ,
        Brand    Varchar (100) ,
        Color    Varchar (20) ,
        Model    Varchar (100) ,
        Id_Users Int NOT NULL
	,CONSTRAINT Cars_PK PRIMARY KEY (Id)

	,CONSTRAINT Cars_Users_FK FOREIGN KEY (Id_Users) REFERENCES Users(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Channels
#------------------------------------------------------------

CREATE TABLE Channels(
        Id       Int  Auto_increment  NOT NULL ,
        Name     Varchar (100) NOT NULL ,
        Id_Users Int NOT NULL
	,CONSTRAINT Channels_PK PRIMARY KEY (Id)

	,CONSTRAINT Channels_Users_FK FOREIGN KEY (Id_Users) REFERENCES Users(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Messages
#------------------------------------------------------------

CREATE TABLE Messages(
        Id      Int  Auto_increment  NOT NULL ,
        Content Varchar (500) ,
        Date    Datetime NOT NULL
	,CONSTRAINT Messages_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Classes
#------------------------------------------------------------

CREATE TABLE Classes(
        Id       Int  Auto_increment  NOT NULL ,
        Name     Varchar (100) NOT NULL ,
        Matter   Varchar (100) NOT NULL ,
        Begin    Datetime NOT NULL ,
        End      Datetime NOT NULL ,
        Id_Users Int NOT NULL
	,CONSTRAINT Classes_PK PRIMARY KEY (Id)

	,CONSTRAINT Classes_Users_FK FOREIGN KEY (Id_Users) REFERENCES Users(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Notes
#------------------------------------------------------------

CREATE TABLE Notes(
        Id   Int  Auto_increment  NOT NULL ,
        Note Int NOT NULL ,
        Date Date NOT NULL
	,CONSTRAINT Notes_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Deposit
#------------------------------------------------------------

CREATE TABLE Deposit(
        Id   Int  Auto_increment  NOT NULL ,
        Name Int NOT NULL ,
        Date Date NOT NULL
	,CONSTRAINT Deposit_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Socket
#------------------------------------------------------------

CREATE TABLE Socket(
        Id          Int  Auto_increment  NOT NULL ,
        Token       Text NOT NULL ,
        Expire      Datetime NOT NULL ,
        Id_Channels Int NOT NULL ,
        Id_Users    Int NOT NULL
	,CONSTRAINT Socket_PK PRIMARY KEY (Id)

	,CONSTRAINT Socket_Channels_FK FOREIGN KEY (Id_Channels) REFERENCES Channels(Id)
	,CONSTRAINT Socket_Users0_FK FOREIGN KEY (Id_Users) REFERENCES Users(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Discussion
#------------------------------------------------------------

CREATE TABLE Discussion(
        Id          Int NOT NULL ,
        Id_Channels Int NOT NULL ,
        Id_Messages Int NOT NULL
	,CONSTRAINT Discussion_PK PRIMARY KEY (Id,Id_Channels,Id_Messages)

	,CONSTRAINT Discussion_Users_FK FOREIGN KEY (Id) REFERENCES Users(Id)
	,CONSTRAINT Discussion_Channels0_FK FOREIGN KEY (Id_Channels) REFERENCES Channels(Id)
	,CONSTRAINT Discussion_Messages1_FK FOREIGN KEY (Id_Messages) REFERENCES Messages(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Channels_class
#------------------------------------------------------------

CREATE TABLE Channels_class(
        Id          Int NOT NULL ,
        Id_Channels Int NOT NULL
	,CONSTRAINT Channels_class_PK PRIMARY KEY (Id,Id_Channels)

	,CONSTRAINT Channels_class_Class_FK FOREIGN KEY (Id) REFERENCES Class(Id)
	,CONSTRAINT Channels_class_Channels0_FK FOREIGN KEY (Id_Channels) REFERENCES Channels(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Timetable
#------------------------------------------------------------

CREATE TABLE Timetable(
        Id       Int NOT NULL ,
        Id_Class Int NOT NULL
	,CONSTRAINT Timetable_PK PRIMARY KEY (Id,Id_Class)

	,CONSTRAINT Timetable_Classes_FK FOREIGN KEY (Id) REFERENCES Classes(Id)
	,CONSTRAINT Timetable_Class0_FK FOREIGN KEY (Id_Class) REFERENCES Class(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Channel_users
#------------------------------------------------------------

CREATE TABLE Channel_users(
        Id       Int NOT NULL ,
        Id_Users Int NOT NULL
	,CONSTRAINT Channel_users_PK PRIMARY KEY (Id,Id_Users)

	,CONSTRAINT Channel_users_Channels_FK FOREIGN KEY (Id) REFERENCES Channels(Id)
	,CONSTRAINT Channel_users_Users0_FK FOREIGN KEY (Id_Users) REFERENCES Users(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Note
#------------------------------------------------------------

CREATE TABLE Note(
        Id         Int NOT NULL ,
        Id_Classes Int NOT NULL ,
        Id_Notes   Int NOT NULL
	,CONSTRAINT Note_PK PRIMARY KEY (Id,Id_Classes,Id_Notes)

	,CONSTRAINT Note_Users_FK FOREIGN KEY (Id) REFERENCES Users(Id)
	,CONSTRAINT Note_Classes0_FK FOREIGN KEY (Id_Classes) REFERENCES Classes(Id)
	,CONSTRAINT Note_Notes1_FK FOREIGN KEY (Id_Notes) REFERENCES Notes(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Depo
#------------------------------------------------------------

CREATE TABLE Depo(
        Id         Int NOT NULL ,
        Id_Class   Int NOT NULL ,
        Id_Deposit Int NOT NULL ,
        File       Longtext NOT NULL ,
        Date       Datetime NOT NULL
	,CONSTRAINT Depo_PK PRIMARY KEY (Id,Id_Class,Id_Deposit)

	,CONSTRAINT Depo_Users_FK FOREIGN KEY (Id) REFERENCES Users(Id)
	,CONSTRAINT Depo_Class0_FK FOREIGN KEY (Id_Class) REFERENCES Class(Id)
	,CONSTRAINT Depo_Deposit1_FK FOREIGN KEY (Id_Deposit) REFERENCES Deposit(Id)
)ENGINE=InnoDB;

