DELIMITER $$

CREATE
    /*[DEFINER = { user | CURRENT_USER }]*/
    TRIGGER `enchan_crm`.`fullname` BEFORE INSERT 
    ON `enchan_crm`.`enchan_users`
    FOR EACH ROW 
    
    BEGIN
	SET NEW.full_name = CONCAT(NEW.first_name,' ' , NEW.middle_initial,'.',' ',NEW.last_name);
    END$$

DELIMITER ;