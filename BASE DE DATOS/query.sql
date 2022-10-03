CREATE TABLE venta_salida (
    idVentaSalida INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    fecVS DATE NOT NULL,
    smart INT NOT NULL,
    kit INT NOT NULL,
    sim INT NOT NULL,
    plan INT NOT NULL,
    IdRegistro INT NOT NULL,
    FOREIGN KEY (IdRegistro) REFERENCES registro (IdRegistro)
);
