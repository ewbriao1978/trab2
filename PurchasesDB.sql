CREATE TABLE `customers` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `name` VARCHAR( 255 ) NOT NULL,
  `email` VARCHAR( 255 ) NOT NULL,
  `passwd` VARCHAR( 255 ) NOT NULL


)
 ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `orders` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `description` VARCHAR( 255 ) NOT NULL,
  `amount` DOUBLE NOT NULL,
  `customer_id` INT NOT NULL 

)
 ENGINE=InnoDB DEFAULT CHARSET=latin1;

 ALTER TABLE `orders` ADD CONSTRAINT `fk_id_order` FOREIGN KEY ( `customer_id` ) REFERENCES `customers` ( `id` ) ;
