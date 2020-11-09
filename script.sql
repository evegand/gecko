CREATE DATABASE empresa_matricula;

USE empresa_matricula;

CREATE TABLE empleado (
	nombre VARCHAR(20) NOT NULL DEFAULT '',
	inic CHAR(2) DEFAULT NULL,
	apellido VARCHAR(20) NOT NULL DEFAULT '',
	nss CHAR(9) NOT NULL DEFAULT '0',
	fecha_ncto DATE DEFAULT NULL,
	direccion VARCHAR(30) DEFAULT NULL,
	sexo ENUM('H', 'M') DEFAULT NULL,
	salario FLOAT(6,2) DEFAULT NULL,
	nss_superv CHAR(9) DEFAULT NULL,
	nd TINYINT(4) DEFAULT NULL,
	PRIMARY KEY (nss)
);

CREATE TABLE localizaciones_dept (
	numerod TINYINT(4) NOT NULL DEFAULT '0',
	localizacion VARCHAR(25) NOT NULL DEFAULT '',
	PRIMARY KEY (numerod, localizacion)
);

CREATE TABLE departamento (
	nombred VARCHAR(15) NOT NULL DEFAULT '',
	numerod TINYINT(4) NOT NULL DEFAULT '0',
	nss_jefe CHAR(9) NOT NULL DEFAULT '',
	FOREIGN KEY (numerod) REFERENCES localizaciones_dept (numerod),
	FOREIGN KEY (nss_jefe) REFERENCES empleado (nss),
	fecha_inic_jefe_dept DATE DEFAULT NULL,
	PRIMARY KEY (numerod)
);

CREATE TABLE dependientes (
	id INT AUTO_INCREMENT,
	nsse CHAR(9) NOT NULL DEFAULT '0',
	nombre_dependiente VARCHAR(30) NOT NULL DEFAULT '',
	sexo ENUM('M', 'H') DEFAULT NULL,
	fecha_nto DATE DEFAULT NULL,
	parentesco ENUM('HIJA', 'HIJO', 'ESPOSA') DEFAULT NULL,
	FOREIGN KEY (nsse) REFERENCES empleado (nss),
	PRIMARY KEY (id)
);

CREATE TABLE proyecto (
	nombrep VARCHAR(30) NOT NULL DEFAULT '',
	numerop TINYINT(4) NOT NULL DEFAULT '0',
	localizacion VARCHAR(25) DEFAULT NULL,
	numd TINYINT(4) NOT NULL DEFAULT '0',
	FOREIGN KEY (numd) REFERENCES localizaciones_dept (numerod),
	PRIMARY KEY (numerop)
);

CREATE TABLE trabaja_en (
	id INT AUTO_INCREMENT,
	nsse CHAR(9) NOT NULL DEFAULT '0',
	np TINYINT(4) NOT NULL DEFAULT '0',
	horas DECIMAL(3, 1) NOT NULL DEFAULT '0.0',
	FOREIGN KEY (np) REFERENCES proyecto (numerop),
	FOREIGN KEY	(nsse) REFERENCES empleado (nss),
	PRIMARY KEY(id)
);

/* ----------------------------------------------------- */
INSERT INTO empleado (nombre, inic, apellido, nss, fecha_ncto, direccion, sexo, salario, nss_superv, nd)
VALUES ('JUAN', 'B', 'Martinez', '123', '1965-01-09', '731 Fondren, Houston, TX', 'H', 300, '333', 5);

INSERT INTO empleado (nombre, inic, apellido, nss, fecha_ncto, direccion, sexo, salario, nss_superv, nd)
VALUES ('Francisco', 'T', 'Wong', '333', '1955-12-08', '638 Voss, Houston, TX', 'H', 400, '888', 5);

INSERT INTO empleado (nombre, inic, apellido, nss, fecha_ncto, direccion, sexo, salario, nss_superv, nd)
VALUES ('Alicia', 'J', 'Zelaya', '999', '1968-07-19', '3321 Castle, Spring, TX', 'M', 250, '987', 4);

INSERT INTO empleado (nombre, inic, apellido, nss, fecha_ncto, direccion, sexo, salario, nss_superv, nd)
VALUES ('Jennifer', 'S', 'Wallace', '987', '1941-06-20', '291 Berry, Bellaire, TX', 'M', 430, '888', 4);

INSERT INTO empleado (nombre, inic, apellido, nss, fecha_ncto, direccion, sexo, salario, nss_superv, nd)
VALUES ('Ramesh', 'K', 'Narayan', '666', '1962-09-15', '975 Fire Oak, Humble, TX', 'H', 380, '333', 5);

INSERT INTO empleado (nombre, inic, apellido, nss, fecha_ncto, direccion, sexo, salario, nss_superv, nd)
VALUES ('Joyce', 'A', 'English', '453', '1972-07-31', '5631 Rice, Houston, TX', 'M', 250, '333', 5);

INSERT INTO empleado (nombre, inic, apellido, nss, fecha_ncto, direccion, sexo, salario, nss_superv, nd)
VALUES ('Aime', 'V', 'Jabbar', '879', '1969-03-29', '980 Dallas, Houston, TX', 'H', 250, '987', 4);

INSERT INTO empleado (nombre, inic, apellido, nss, fecha_ncto, direccion, sexo, salario, nss_superv, nd)
VALUES ('Jaime', 'E', 'Borg', '888', '1937-11-10', '450 Stone, Houston, TX', 'H', 550, NULL, 1);


SELECT * FROM empleado;
/* ----------------------------------------------------- */


INSERT INTO localizaciones_dept (numerod, localizacion)
VALUES (1, 'Houston');

INSERT INTO localizaciones_dept (numerod, localizacion)
VALUES (4, 'Stafford');

INSERT INTO localizaciones_dept (numerod, localizacion)
VALUES (5, 'Bellaire');

INSERT INTO localizaciones_dept (numerod, localizacion)
VALUES (5, 'Sugarland');

INSERT INTO localizaciones_dept (numerod, localizacion)
VALUES (5, 'Houston');

SELECT * FROM localizaciones_dept;


INSERT INTO departamento (nombred, numerod, nss_jefe, fecha_inic_jefe_dept)
VALUES ('Investigacion', 5, '333', '1988-05-22');

INSERT INTO departamento (nombred, numerod, nss_jefe, fecha_inic_jefe_dept)
VALUES ('Administracion', 4, '987', '1995-01-01');

INSERT INTO departamento (nombred, numerod, nss_jefe, fecha_inic_jefe_dept)
VALUES ('Direccion', 1, '888', '1981-06-19');

SELECT * FROM departamento;




INSERT INTO trabaja_en (nsse, np, horas)
VALUES ('123', '1', '32.5');

INSERT INTO trabaja_en (nsse, np, horas)
VALUES ('123', '2', '7.5');

INSERT INTO trabaja_en (nsse, np, horas)
VALUES ('666', '3', '40.0');

INSERT INTO trabaja_en (nsse, np, horas)
VALUES ('453', '1', '20.0');

INSERT INTO trabaja_en (nsse, np, horas)
VALUES ('453', '2', '20.0');

INSERT INTO trabaja_en (nsse, np, horas)
VALUES ('333', '2', '10.0');

INSERT INTO trabaja_en (nsse, np, horas)
VALUES ('333', '3', '10.0');

INSERT INTO trabaja_en (nsse, np, horas)
VALUES ('333', '10', '10.0');

INSERT INTO trabaja_en (nsse, np, horas)
VALUES ('333', '20', '10.0');

INSERT INTO trabaja_en (nsse, np, horas)
VALUES ('999', '30', '30.0');

INSERT INTO trabaja_en (nsse, np, horas)
VALUES ('999', '10', '10.0');

INSERT INTO trabaja_en (nsse, np, horas)
VALUES ('879', '10', '35.0');

INSERT INTO trabaja_en (nsse, np, horas)
VALUES ('879', '30', '5.0');

INSERT INTO trabaja_en (nsse, np, horas)
VALUES ('987', '30', '20.0');

INSERT INTO trabaja_en (nsse, np, horas)
VALUES ('987', '20', '15.0');

INSERT INTO trabaja_en (nsse, np, horas)
VALUES ('888', '20', NULL);

SELECT * FROM trabaja_en;

INSERT INTO proyecto (nombrep, numerop, localizacion, numd)
VALUES ('ProductoX', 1, 'Bellaire', 5);

INSERT INTO proyecto (nombrep, numerop, localizacion, numd)
VALUES ('ProductoY', 2, 'Sugarland', 5);

INSERT INTO proyecto (nombrep, numerop, localizacion, numd)
VALUES ('ProductoZ', 3, 'Houston', 5);

INSERT INTO proyecto (nombrep, numerop, localizacion, numd)
VALUES ('Automatizacion', 10, 'Stafford', 4);

INSERT INTO proyecto (nombrep, numerop, localizacion, numd)
VALUES ('Reorganizacion', 20, 'Houston', 1);

INSERT INTO proyecto (nombrep, numerop, localizacion, numd)
VALUES ('Nuevos beneficios', 30, 'Stafford', 4);

SELECT * FROM proyecto;



INSERT INTO dependientes (nsse, nombre_dependiente, sexo, fecha_nto, parentesco)
VALUES ('333', 'Alice', 'M', '1986-04-05', 'HIJA');

INSERT INTO dependientes (nsse, nombre_dependiente, sexo, fecha_nto, parentesco)
VALUES ('333', 'Theodore', 'H', '1983-10-25', 'HIJO');

INSERT INTO dependientes (nsse, nombre_dependiente, sexo, fecha_nto, parentesco)
VALUES ('333', 'Joy', 'M', '1958-05-03', 'ESPOSA');

INSERT INTO dependientes (nsse, nombre_dependiente, sexo, fecha_nto, parentesco)
VALUES ('987', 'Abner', 'H', '1942-02-28', 'ESPOSA');

INSERT INTO dependientes (nsse, nombre_dependiente, sexo, fecha_nto, parentesco)
VALUES ('123', 'Michael', 'H', '1988-01-04', 'HIJO');

INSERT INTO dependientes (nsse, nombre_dependiente, sexo, fecha_nto, parentesco)
VALUES ('123', 'Alice', 'M', '1988-12-30', 'HIJA');

INSERT INTO dependientes (nsse, nombre_dependiente, sexo, fecha_nto, parentesco)
VALUES ('123', 'Elizabeth', 'M', '1967-05-05', 'ESPOSA');

SELECT * FROM dependientes;

/* ------------------------------------------------------- */

A
SELECT nss FROM empleado.

B
SELECT * FROM empleado.

C
SELECT * FROM empleado, departamento;


Uso de distinct

D
SELECT distinct salario FROM empleado;


E
SELECT Fecha_nac, direccion
FROM empleado
WHERE nombre= ́JUAN ́ and inc= ́b and ́
apellido=’Martinez’

Uso de los alias.

De cada empleado, recuperar su nombre de pila y apellido y los de sus
supervisor inmediato

SELECT e.nombre, e.apellido, s.nombre, s.apellido
FROM empleado as e, empleado as s
WHERE e.nss_superv=s.nss




SELECT numerop, numd, apellido, direccion, fecha_nac
FROM proyecto, departamento, empleado
WHERE numd = numerod and nss_jefe = nss and localizacion = 'Stafford';



SELECT nombre, apellido FROM empleado
WHERE direccion like "%Houston, TX%";

SELECT nombred, apellido, nombre, nombrep
FROM departamento, empleado, trabaja_en, proyecto 
WHERE numerod = nd and nss = nsse and np = numerop
ORDER BY nombred DESC, apellido, nombre;


SELECT sum(salario), max(salario), min(SALARIO), avg(SALARIO))
FROM empleado;


SELECT COUNT(*)
FROM empleado;


SELECT numerop, nombrep,count(*) FROM proyecto, trabaja_en
WHERE numerop=np GROUP BY numerop, nombrep;


SELECT DISTINCT e.nombre FROM empleado AS e
WHERE e.nss = '888' OR e.nss = '333' OR e.nss = '987';


SELECT DISTINCT e.nombre
FROM empleado AS e, proyecto AS p
WHERE e.nd = p.numd;


SELECT DISTINCT e.nombre
FROM empleado AS e, departamento AS d
WHERE e.nd = '4';


SELECT DISTINCT e.nombre, t.horas
FROM empleado AS e, proyecto AS p, trabaja_en AS t
WHERE e.nd = p.numd AND t.np = p.numerop;


SELECT DISTINCT d.nombred, l.localizacion
FROM departamento AS d, localizaciones_dept AS l
WHERE d.numerod = l.numerod;


SELECT DISTINCT d.nombre_dependiente
FROM empleado AS e, dependientes AS d
WHERE e.salario > 300.00;

