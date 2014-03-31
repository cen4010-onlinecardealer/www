
USE ocs;

# Drop Constraints 

ALTER TABLE car
DROP FOREIGN KEY `FK_picture_id`,
DROP FOREIGN KEY `FK_condition_id`,
DROP FOREIGN KEY `FK_model_make_id`,
DROP FOREIGN KEY `FK_status_id`;

ALTER TABLE credit_card
DROP FOREIGN KEY `CON_credit_card_id`;

ALTER TABLE user
DROP FOREIGN KEY `FK_user_type_id`,
DROP FOREIGN KEY `FK_billing_address_id`,
DROP FOREIGN KEY `FK_shipping_address_id`,
DROP FOREIGN KEY `FK_credit_card_id`;

ALTER TABLE transactions
DROP FOREIGN KEY `FK_user_number_id`,
DROP FOREIGN KEY `FK_car_vin`,
DROP FOREIGN KEY `FK__credit_card_id`;

ALTER TABLE address
DROP FOREIGN KEY `CON_state_country_id`;

# Drop Complementary Tables for the Car


DROP TABLE IF EXISTS car_pictures;

DROP TABLE IF EXISTS car_status;

DROP TABLE IF EXISTS car_condition;

DROP TABLE IF EXISTS car_make_model;

DROP TABLE IF EXISTS car;


# Drop Complementary tables for the User

DROP TABLE IF EXISTS state_country;

DROP TABLE IF EXISTS address;

DROP TABLE IF EXISTS card_type;

DROP TABLE IF EXISTS credit_card;

DROP TABLE IF EXISTS user_type;

DROP TABLE IF EXISTS user;

# Drop transactions

DROP TABLE IF EXISTS transactions;