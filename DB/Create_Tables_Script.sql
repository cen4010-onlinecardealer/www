CREATE DATABASE IF NOT EXISTS `ocs`; 


USE ocs; 


DROP TABLE IF EXISTS car_pictures;
CREATE TABLE `ocs`.`car_pictures` (
  `id_car_pictures` INT NOT NULL AUTO_INCREMENT,
  `picture_path` VARCHAR(255) NULL,
  PRIMARY KEY (`id_car_pictures`))
COMMENT = 'Contain the Path to the SOlfer Location and Id of Vehicle of the Pictures';

DROP TABLE IF EXISTS car_status;
CREATE TABLE `ocs`.`car_status` (
  `id_car_status` INT NOT NULL AUTO_INCREMENT,
  `car_status_desc` VARCHAR(45) NULL,
  PRIMARY KEY (`id_car_status`))
COMMENT = 'This will containn different status of vehicles i.e: SOLD, AVAILABLE, ETC';

DROP TABLE IF EXISTS car_condition;
CREATE TABLE `ocs`.`car_condition` (
  `id_car_condition` INT NOT NULL AUTO_INCREMENT,
  `car_condition_name` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id_car_condition`))
COMMENT = 'Condition of the cars. i.e: NEW, USED, REFURBISHED, ETC';

DROP TABLE IF EXISTS car_make_model;
CREATE TABLE `ocs`.`car_make_model` (
  `id_car_make_model` INT NOT NULL AUTO_INCREMENT,
  `car_make_name` VARCHAR(45) NOT NULL,
  `car_model_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_car_make_model`))
COMMENT = 'This will store vehicle make and model';

DROP TABLE IF EXISTS car;
CREATE TABLE `ocs`.`car` (
  `id_vin` VARCHAR(17) NOT NULL,
  `model_make_id` INT NOT NULL,
  `year` YEAR NOT NULL,
  `condition_id` INT NOT NULL,
  `milage` BIGINT NOT NULL,
  `color` VARCHAR(15) NOT NULL,
  `color_description` VARCHAR(45) NULL,
  `comments` VARCHAR(145) NULL,
  `price` DECIMAL NOT NULL,
  `status_id` INT NOT NULL,
  `picture_id` INT NULL,
  PRIMARY KEY (`id_vin`),
  INDEX `IDX_model_make_id` (`model_make_id` ASC),
  INDEX `IDX_condition_id` (`condition_id` ASC),
  INDEX `IDX_status_id` (`status_id` ASC),
  INDEX `IDX_picture_id` (`picture_id` ASC),
  CONSTRAINT `FK_model_make_id`
    FOREIGN KEY (`model_make_id`)
    REFERENCES `ocs`.`car_make_model` (`id_car_make_model`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_condition_id`
    FOREIGN KEY (`condition_id`)
    REFERENCES `ocs`.`car_condition` (`id_car_condition`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_picture_id`
    FOREIGN KEY (`picture_id`)
    REFERENCES `ocs`.`car_pictures` (`id_car_pictures`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_status_id`
    FOREIGN KEY (`status_id`)
    REFERENCES `ocs`.`car_status` (`id_car_status`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
COMMENT = 'Contains Car Details';


#Complementary tables for the User

DROP TABLE IF EXISTS state_country;
CREATE TABLE `ocs`.`state_country` (
  `id_state_country` INT NOT NULL AUTO_INCREMENT,
  `state` VARCHAR(45) NOT NULL,
  `country` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_state_country`))
COMMENT = 'Contain States and Country';

DROP TABLE IF EXISTS address;
CREATE TABLE `ocs`.`address` (
  `id_address` INT NOT NULL AUTO_INCREMENT,
  `street` VARCHAR(50) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `state_country_id` INT NOT NULL,
  `zipcode` INT NOT NULL,
  PRIMARY KEY (`id_address`),
  INDEX `IDX_state_country_id` (`state_country_id` ASC),
  CONSTRAINT `CON_state_country_id`
    FOREIGN KEY (`state_country_id`)
    REFERENCES `ocs`.`state_country` (`id_state_country`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
COMMENT = 'Address Standard';

DROP TABLE IF EXISTS card_type;
CREATE TABLE `ocs`.`card_type` (
  `id_card_type` INT NOT NULL AUTO_INCREMENT,
  `card_type_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_card_type`))
COMMENT = 'Credit /card type. i.e: VISA, DISCOVER, MASTERCARD...';

DROP TABLE IF EXISTS credit_card;
CREATE TABLE `ocs`.`credit_card` (
  `id_credit_card` INT NOT NULL AUTO_INCREMENT,
  `credit_card_type_id` INT NOT NULL,
  `credit_card_number` INT(16) NOT NULL,
  `credit_card_expiration_date` DATE NOT NULL,
  PRIMARY KEY (`id_credit_card`),
  INDEX `IDX_credit_card_id` (`credit_card_type_id` ASC),
  CONSTRAINT `CON_credit_card_id`
    FOREIGN KEY (credit_card_type_id)
    REFERENCES `ocs`.`card_type` (`id_card_type`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
COMMENT = 'Standard for Credit Card';

DROP TABLE IF EXISTS user_type;
CREATE TABLE `ocs`.`user_type` (
  `id_user_type` INT NOT NULL AUTO_INCREMENT,
  `user_name_type` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_user_type`))
COMMENT = 'Contains Types of users. i.e: GUEST, USER, ADMIN';

DROP TABLE IF EXISTS user;
CREATE TABLE `ocs`.`user` (
  `id_user_number` INT NOT NULL AUTO_INCREMENT,
  `user_type_id` INT NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `first_name` VARCHAR(45) NOT NULL,
  `middle_initial` CHAR NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `billing_address_id` INT NOT NULL,
  `shipping_address_id` INT NOT NULL,
  `logged_in` BIT NOT NULL,
  `credit_card_id` INT NOT NULL,
  PRIMARY KEY (`id_user_number`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `IDX_user_type_id` (`user_type_id` ASC),
  INDEX `IDX_billing_address_id` (`billing_address_id` ASC),
  INDEX `IDX_shipping_address_id` (`shipping_address_id` ASC),
  INDEX `IDX_credit_card_id` (`credit_card_id` ASC),
  CONSTRAINT `FK_user_type_id`
    FOREIGN KEY (`user_type_id`)
    REFERENCES `ocs`.`user_type` (`id_user_type`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_billing_address_id`
    FOREIGN KEY (`billing_address_id`)
    REFERENCES `ocs`.`address` (`id_address`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_shipping_address_id`
    FOREIGN KEY (`shipping_address_id`)
    REFERENCES `ocs`.`address` (`id_address`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_credit_card_id`
    FOREIGN KEY (`credit_card_id`)
    REFERENCES `ocs`.`credit_card` (`id_credit_card`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
COMMENT = 'Contains User info';

# Functionalities

DROP TABLE IF EXISTS transactions;
CREATE TABLE `ocs`.`transactions` (
  `id_transactions` INT NOT NULL AUTO_INCREMENT,
  `user_number_id` INT NOT NULL,
  `car_vin` VARCHAR(17) NOT NULL,
  `credit_card_id` INT NOT NULL,
  `transaction_date` DATETIME NULL,
  PRIMARY KEY (`id_transactions`),
  INDEX `IDX_user_number_id` (`user_number_id` ASC),
  INDEX `IDX_car_vin` (`car_vin` ASC),
  INDEX `IDX_credit_card_id` (`credit_card_id` ASC),
  CONSTRAINT `FK_user_number_id`
    FOREIGN KEY (`user_number_id`)
    REFERENCES `ocs`.`user` (`id_user_number`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_car_vin`
    FOREIGN KEY (`car_vin`)
    REFERENCES `ocs`.`car` (`id_vin`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK__credit_card_id`
    FOREIGN KEY (`credit_card_id`)
    REFERENCES `ocs`.`credit_card` (`id_credit_card`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
COMMENT = 'User purchasing a car';