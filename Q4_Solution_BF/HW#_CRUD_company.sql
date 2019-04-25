CREATE TABLE IF NOT EXISTS `crud_company` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `address` VARCHAR(45) NULL,
  `phone` VARCHAR(15) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

insert into crud_company (`name`) values ('Apple'); 
insert into crud_company (`name`) values ('Amazon'); 
insert into crud_company (`name`) values ('Google'); 