CREATE TABLE users (
  userId INT AUTO_INCREMENT PRIMARY KEY
  , nom VARCHAR(255) NOT NULL
  , email VARCHAR(255) NOT NULL UNIQUE
  , password VARCHAR(255) NOT NULL
  , role ENUM ('student', 'teacher', 'admin') NOT NULL
);



CREATE TABLE category (
  categoryId int AUTO_INCREMENT PRIMARY KEY
  , categoryNom varchar(255)
) CREATE TABLE tag (
  tagId int AUTO_INCREMENT PRIMARY KEY
  , name varchar(255)
);




CREATE TABLE course (
  courseId int AUTO_INCREMENT PRIMARY KEY
  , titre varchar(255)
  , description varchar(255)
  , userId int
  , tagId int
  , categoryId int
  , FOREIGN key (userId) REFERENCES users (userID)
  , FOREIGN key (tagId) REFERENCES tag (tagId)
  , FOREIGN key (categoryId) REFERENCES category (categoryId)
  , createdat timestamp
) CREATE TABLE tagCourses (tagId int, courseId int);

CREATE TABLE userCourses (userId int, courseId int);