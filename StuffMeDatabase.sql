DROP DATABASE IF EXISTS `mj-knguyen26`;
CREATE DATABASE `mj-knguyen26`;

USE `mj-knguyen26`; 

/* Kenny Nguyen, Lauren Ebia, Nathan Tran
CPSC Milestone 3 */

/* Question 1 & 2*/
/* User table */
CREATE TABLE USERS (
	USER_ID char(11) NOT NULL,
    USER_FNAME varchar(15) NOT NULL,
    USER_LNAME varchar(15) NOT NULL,
    DOB date NOT NULL,
    USER_PASSWORD varchar(15) NOT NULL,
    
    PRIMARY KEY (USER_ID)
);

INSERT INTO USERS(USER_ID, USER_FNAME, USER_LNAME, DOB, USER_PASSWORD) VALUES
('85602-85602', 'Keke', 'Grande', '1990-10-26', 'Awes0mes4uce!'),
('76888-76888', 'EJ', 'Fuerte', '1998-12-05', 'Hyper1234'),
('63513-63513', 'Lauren', 'Lee', '1975-11-03', 'Pinapple33#'),
('93243-93243', 'Katie', 'Lee', '2000-05-13', 'Aloha808@'),
('89431-89431', 'Chris', 'Kae', '1999-08-25', 'Maxie909*'),
('37421-37421', 'Adela', 'Eccli', '1965-09-24', 'Yipp33!'),
('82021-82021', 'Jaime', 'Cruz', '1981-04-09', 'H0wdyyy&&'),
('82193-82193', 'Kyle', 'Zepeda', '1991-07-23', '0re0c00ki3.'),
('92342-92342', 'Juliana', 'Casa', '1992-05-21', '#cH0c0lat3'),
('93241-93241', 'Mia', 'Pia', '1988-06-22', '12345bAiT');


/* Recipe table */
CREATE TABLE RECIPE (
	RECIPE_ID char(11) NOT NULL,
    USER_ID char(11) NOT NULL, 
    RATING_ID char(11) NOT NULL, 
    RECIPE_NAME varchar(50) NOT NULL,
    DURATION varchar(10) NOT NULL,
    RECIPE_DESCRIPTION varchar(200),
	
    PRIMARY KEY (RECIPE_ID),
    FOREIGN KEY (USER_ID) REFERENCES USERS(USER_ID)
);

INSERT INTO RECIPE(RECIPE_ID, USER_ID, RATING_ID, RECIPE_NAME, DURATION, RECIPE_DESCRIPTION) VALUES
('11111-11111', '85602-85602', '93101-93101', 'Vanilla Cupcakes', '55 min', 'Fluffy vanilla cupcakes perfect for any special occasion...'),
('22222-22222', '76888-76888', '87023-87023', 'Pepperoni Pizza', '70 min', 'This homemade pepperoni pizza is not only a showstopper but easy to make...'),
('33333-33333', '63513-63513', '90090-90090', 'Chicken and Waffle', '120 min', 'Crispy fried chicken and warm fluffy waffles all in the comfort of your own home!'),
('44444-44444', '93243-93243', '63219-63219', 'Brownies', '30 min', 'Warm, chocolately, brownies, comforting anyone who eats them...'),
('54321-54321', '89431-89431', '03212-03212', 'Shrimp Tacos', '60 min', 'A refreshing taking on tacos that everyone is bound to like!'),
('34343-34343', '37421-37421', '37234-37234', 'Strawberry Cheesecake', '70 min', 'Want cheesecake factory but you do not want to leave your house? This recipe is for you!'),
('78787-78787', '82021-82021', '21434-21434', 'Chinese Tanghulu', '25 min', 'All your favorite fruits freshly candied!'),
('80808-80808', '82193-82193', '32412-32412', 'Buldak Ramen', '25 min', 'The viral tiktok Buldak Ramen, easy and delicious!'),
('39393-39393', '92342-92342', '74132-74132', 'Chocolate Chip Pizookie', '45 min', 'Warm, gooey, chocolate chip cookie topped with ice cream and decadent chocolate syrup'),
('36363-36363', '93241-93241', '32132-32132', 'Beef Stew', '60 min', 'Saucy, comforting, combination of tender beef, vegetables, and love');


/* Rating table */
CREATE TABLE RATING (
	RATING_ID char(11) NOT NULL,
    USER_ID char(11) NOT NULL,
    RECIPE_ID char(11) NOT NULL, 
	DIFFICULTY_RATING int,
    TASTE_RATING int,
    
    PRIMARY KEY (RATING_ID),
	FOREIGN KEY (USER_ID) REFERENCES USERS(USER_ID),
    FOREIGN KEY (RECIPE_ID) REFERENCES RECIPE(RECIPE_ID)
);

INSERT INTO RATING(RATING_ID, USER_ID, RECIPE_ID, DIFFICULTY_RATING, TASTE_RATING) VALUES 
('93101-93101', '85602-85602', '11111-11111', 3, 5),
('87023-87023', '76888-76888', '22222-22222', 1, 5),
('91090-91090', '63513-63513', '33333-33333', 5, 4),
('63219-63219', '93243-93243', '44444-44444', 4, 3),
('03212-03212', '89431-89431', '54321-54321', 2, 1),
('37234-37234', '37421-37421', '34343-34343', 1, 1),
('21434-21434', '82021-82021', '78787-78787', 5, 5),
('32412-32412', '82193-82193', '80808-80808', 1, 3),
('74132-74132', '92342-92342', '39393-39393', 5, 5),
('32132-32132', '93241-93241', '36363-36363', 4, 3);

/* Comment table */
CREATE TABLE COMMENTS (
	COMMENT_ID char(11) NOT NULL UNIQUE,
    USER_ID char(11) NOT NULL, 
    RECIPE_ID char(11) NOT NULL, 
    COMMENT_DATE date NOT NULL,
    COMMENT_TEXT varchar(300),
    
    PRIMARY KEY (COMMENT_ID),
    FOREIGN KEY (USER_ID) REFERENCES USERS(USER_ID),
    FOREIGN KEY (RECIPE_ID) REFERENCES RECIPE(RECIPE_ID)
);

INSERT INTO COMMENTS(COMMENT_ID, USER_ID, RECIPE_ID, COMMENT_DATE, COMMENT_TEXT) VALUES
('24354-24354', '85602-85602', '11111-11111', '2015-09-07', 'This recipe is awesome. Must try!'),
('09832-09832', '76888-76888', '22222-22222', '2022-08-31', 'Super user friendly to new cooks like me!'),
('13253-13253', '63513-63513', '33333-33333', '2023-05-04', 'Incredibly difficult. Tastes amazing though.'),
('87564-87564', '93243-93243', '44444-44444', '2022-01-01', 'Too much work for an average tasting dish.'),
('54633-54633', '89431-89431', '54321-54321', '2022-09-10', 'How is this recipe so easy but tastes so bad.'),
('90934-90934', '37421-37421', '34343-34343', '2023-12-31', 'Never again, terrible.'),
('09545-09545', '82021-82021', '78787-78787', '2021-07-22', 'If you get the chance, PLEASE try this! So yummy'),
('67890-67890', '82193-82193', '80808-80808', '2022-03-05', 'Pretty decent for the work I had to do.'),
('84932-84932', '92342-92342', '39393-39393', '2010-06-06', 'Good dish to make for your family. You will make them happy!'),
('87823-87823', '93241-93241', '36363-36363', '2020-05-31', 'Make sure you have a lot of time to dedicate to this recipe.');

/* Photo table */
CREATE TABLE PHOTO (
	PHOTO_ID char(11) NOT NULL UNIQUE,
    RECIPE_ID char(11) NOT NULL, 
    PHOTO_CAPTION varchar(200) NOT NULL,
    
    PRIMARY KEY (PHOTO_ID),
	FOREIGN KEY (RECIPE_ID) REFERENCES RECIPE(RECIPE_ID)
);

INSERT INTO PHOTO(PHOTO_ID, RECIPE_ID, PHOTO_CAPTION) VALUES 
('99999-99999', '11111-11111', 'Cupcake Photo'),
('20202-20202', '22222-22222', 'Pepperoni Pizza Photo'),
('02020-02020', '33333-33333', 'Chicken and Waffle Photo'),
('10101-10101', '44444-44444', 'Brownie Photo'),
('01010-01010', '54321-54321', 'Shrimp Taco Photo'),
('30303-30303', '34343-34343', 'Strawberry Cheesecake Photo'),
('03030-03030', '78787-78787', 'Tanghulu Photo'),
('50505-50505', '80808-80808', 'Buldak Ramen Photo'),
('05050-05050', '39393-39393', 'Chocolate Chip Pizookie Photo'),
('80808-80808', '36363-36363', 'Beef Stew Photo'); 

/* Video table */
CREATE TABLE VIDEO (
	VIDEO_ID char(11) NOT NULL UNIQUE,
    RECIPE_ID char(11) NOT NULL,
    VIDEO_NAME varchar(50),
    
    PRIMARY KEY (VIDEO_ID),
    FOREIGN KEY (RECIPE_ID) REFERENCES RECIPE(RECIPE_ID)
);

INSERT INTO VIDEO(VIDEO_ID, RECIPE_ID, VIDEO_NAME) VALUES 
('23487-23487', '11111-11111', 'Cupcake Tutorial'),
('88888-88888', '22222-22222', 'Pepperoni Pizza Tutorial'),
('77777-77777', '33333-33333', 'Chicken and Waffle Tutorial'),
('66666-66666', '44444-44444', 'Brownie Tutorial'),
('12345-12345', '54321-54321', 'Shrimp Taco Tutorial'),
('12121-12121', '34343-34343', 'Strawberry Cheesecake Tutorial'),
('56565-56565', '78787-78787', 'Tanghulu Tutorial'),
('90909-90909', '80808-80808', 'Buldak Ramen Tutorial'),
('79797-79797', '39393-39393', 'Chocolate Chip Pizookie Tutorial'),
('65656-65656', '36363-36363', 'Beef Stew Tutorial');

/* Ingredient table */
CREATE TABLE INGREDIENT (
	INGREDIENT_NAME varchar(50) NOT NULL,
    INGREDIENT_QUANTITY varchar(15) NOT NULL,
    
	PRIMARY KEY (INGREDIENT_NAME)
);

INSERT INTO INGREDIENT(INGREDIENT_NAME, INGREDIENT_QUANTITY) VALUES 
('All-purpose flour', '1 1/4 cups'), 
('Baking powder', '1 1/4 tsp'),
('Salt', '1/2 tsp'),
('Unsalted butter', '1/2 cup'),
('Sugar', '3/4 cup'),
('Eggs', '2'),
('Pure vanilla extract', '2 tsp'),
('Buttermilk', '1/2 cup'),
('Frosting', '1 can'),
('Sprinkles', '12 pinches');

/* Equipment table */
CREATE TABLE EQUIPMENT (
	EQUIPMENT_NAME varchar(50) NOT NULL,
    EQUIPMENT_QUANTITY int NOT NULL,
    
    PRIMARY KEY (EQUIPMENT_NAME)
);

INSERT INTO EQUIPMENT(EQUIPMENT_NAME, EQUIPMENT_QUANTITY) VALUES 
('12-count cupcake pan', 1),
('Cupcake liners', 12),
('Bowl', 1),
('Whisk', 1),
('Electric mixer', 1),
('Spoon', 1),
('Wire rack', 1),
('Toothpick', 1),
('Oven', 1),
('Timer', 1);

/* Supplies table */
CREATE TABLE SUPPLIES (
	RECIPE_ID char(11) NOT NULL,
    INGREDIENT_NAME varchar(50) NOT NULL, 
    EQUIPMENT_NAME varchar(50) NOT NULL, 
    FOREIGN KEY (RECIPE_ID) REFERENCES RECIPE(RECIPE_ID),
    FOREIGN KEY (INGREDIENT_NAME) REFERENCES INGREDIENT(INGREDIENT_NAME),
    FOREIGN KEY (EQUIPMENT_NAME) REFERENCES EQUIPMENT(EQUIPMENT_NAME)
);

INSERT INTO SUPPLIES(RECIPE_ID, INGREDIENT_NAME, EQUIPMENT_NAME) VALUES
('11111-11111', 'All-purpose flour', '12-count cupcake pan'),
('11111-11111', 'Baking powder', 'Cupcake liners'),
('11111-11111', 'Salt', 'Bowl'),
('11111-11111', 'Unsalted butter', 'Whisk'),
('11111-11111', 'Sugar', 'Electric mixer'),
('11111-11111', 'Eggs', 'Spoon'),
('11111-11111', 'Pure vanilla extract', 'Wire rack'),
('11111-11111', 'Buttermilk', 'Toothpick'),
('11111-11111', 'Frosting', 'Oven'),
('11111-11111', 'Sprinkles', 'Timer');

/* Question 3 */
#3.1 Finds all recipes along with their ratings
SELECT RECIPE.RECIPE_ID, RECIPE_NAME, DURATION, DIFFICULTY_RATING, TASTE_RATING
FROM RECIPE
INNER JOIN RATING ON RECIPE.RECIPE_ID = RATING.RECIPE_ID;

#3.2 AVG aggregate function to calculate the average taste rating from the RATING
SELECT AVG(TASTE_RATING) AS average_taste_rating
FROM RATING;

#3.3 Find all recipes that have a taste rating higher than the average taste rating of all recipes. 
SELECT R.RECIPE_ID, R.RECIPE_NAME, RA.TASTE_RATING
FROM RECIPE R
JOIN RATING RA ON R.RECIPE_ID = RA.RECIPE_ID
WHERE RA.TASTE_RATING > (
    SELECT AVG(TASTE_RATING)
    FROM RATING
);

#3.4  Find users who have rated more than 0 recipes. (GROUP BY & HAVING)
SELECT USER_ID, COUNT(RECIPE_ID) AS rated_recipes_count
FROM RATING
GROUP BY USER_ID
HAVING COUNT(RECIPE_ID) > 0;

#3.5 Left outer join between RECIPE and RATING.
SELECT R.RECIPE_ID, R.RECIPE_NAME, R.DURATION, RA.DIFFICULTY_RATING, RA.TASTE_RATING
FROM RECIPE R
LEFT OUTER JOIN RATING RA ON R.RECIPE_ID = RA.RECIPE_ID;