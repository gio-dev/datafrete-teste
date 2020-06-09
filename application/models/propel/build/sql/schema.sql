
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- calc_distancias
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `calc_distancias`;

CREATE TABLE `calc_distancias`
(
    `ID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `CEP_ORIGEM` VARCHAR(10) NOT NULL,
    `CEP_DESTINO` VARCHAR(10) NOT NULL,
    `LAT_ORIGEM` VARCHAR(255) NOT NULL,
    `LAT_DESTINO` VARCHAR(255) NOT NULL,
    `LONG_ORIGEM` VARCHAR(255) NOT NULL,
    `LONG_DESTINO` VARCHAR(255) NOT NULL,
    `DISTANCIA_CALCULADA` FLOAT(12,2) NOT NULL,
    `CREATED_AT` DATETIME,
    `UPDATED_AT` DATETIME,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
