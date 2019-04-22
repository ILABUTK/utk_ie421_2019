use rzhou7;

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `photo` VARCHAR(256),
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

insert into users (`email`, `password`) values ('user1', 'password1');