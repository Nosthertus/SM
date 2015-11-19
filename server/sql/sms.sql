CREATE DEFINER = CURRENT_USER TRIGGER `SM`.`user_BEFORE_INSERT` BEFORE INSERT ON `user` FOR EACH ROW
BEGIN
	INSERT INTO accounts(id, accounts_status,accounts_registered,accounts_cancelled,user_id) VALUES(null,'Active',NOW(),null,new.id);
END
