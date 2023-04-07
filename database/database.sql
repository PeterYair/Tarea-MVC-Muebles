CREATE DATABASE Muebles;
USE Muebles;

CREATE TABLE mueble
(
	idmueble				INT AUTO_INCREMENT PRIMARY KEY,
	nombremueble 			VARCHAR(100)	NOT NULL,
	categoria				CHAR(1) 	NOT NULL,				
	marca		 		CHAR(1)	NOT NULL,
	precio				DECIMAL(7,2)	NOT NULL,
	color				VARCHAR(20)	NOT NULL,
	estado				CHAR(1) 		NOT NULL DEFAULT('1'),
	fecharegistro			DATETIME		NOT NULL DEFAULT NOW()
)ENGINE=INNODB;

INSERT mueble(nombremueble, categoria, precio, marca, color)
	VALUES('Juego de Sala Alaska 3-2-1 Cuerpos', 'S', 1969, 'M', 'Marron'),
		('Futón 3 cuerpos Independiente Negro', 'S', 399.90, 'H', 'Negro'),
		('Juego de Comedor 6 Sillas Dartagnan', 'M', 899.90, 'J', 'Negro'),
		('Panel de TV The Wall 2A 60" Miel Plomo', 'S',  519.90, 'C', 'Café');

SELECT * FROM mueble;

-- S : sala 
-- O : Oficina y Escritorio
-- M : Muebles de comedor


-- M : Mica
-- H : Homy
-- C : Coros
-- J : JUST HOME COLLECTION

DELIMITER $$
CREATE PROCEDURE spu_mueble_listar()
BEGIN
	SELECT idmueble, nombremueble, 
	CASE
		WHEN categoria = 'S' THEN 'Sala'
		WHEN categoria = 'O' THEN 'Oficina y Escritorio'
		WHEN categoria = 'M' THEN 'Muebles de comedor'
	END 'categoria', 
	CASE
		WHEN marca = 'M' THEN 'Mica'
		WHEN marca = 'H' THEN 'Homy'
		WHEN marca = 'C' THEN 'Coros'
		WHEN marca = 'J' THEN 'Just Home Collection'
	END 'marca',
	precio, color FROM mueble
	WHERE estado = '1'
	ORDER BY idmueble DESC;
END $$

CALL spu_mueble_listar;

DELIMITER $$
CREATE PROCEDURE spu_mueble_registrar
(
	IN _nombremueble 	VARCHAR(100),
	IN _categoria		CHAR(1), 
	IN _marca			CHAR(1),
	IN _precio		DECIMAL(7,2),
	IN _color			VARCHAR(20)
)
BEGIN
	INSERT INTO mueble(nombremueble, categoria, marca, precio, color)
	VALUES (_nombremueble, _categoria, _marca, _precio, _color);
END $$

CALL spu_mueble_registrar('dawdwa','M', 'J', 1234, 'rojo');

DELIMITER $$
CREATE PROCEDURE spu_muebles_eliminar(IN _idmueble INT)
BEGIN	
  UPDATE mueble
	SET estado = '0'
	WHERE idmueble = _idmueble;
END $$		
CALL spu_muebles_eliminar(9);