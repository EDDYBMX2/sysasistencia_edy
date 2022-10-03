CREATE TABLE branch_office (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(191) NOT NULL,
    latitude VARCHAR (40) NOT NULL,
    longitude VARCHAR (40) NOT NULL,
    radius INT NOT NULL,
    address VARCHAR(25),
    idEmpresa INT NOT NULL,
    FOREIGN KEY (idEmpresa) REFERENCES empresa(idEmpresa)
);

CREATE TABLE schedule (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(191) NOT NULL,
    checkinTime TIME NOT NULL,
    departureTime TIME NOT NULL,
    idEmpresa INT NOT NULL,
    FOREIGN KEY (idEmpresa) REFERENCES empresa(idEmpresa)
);

ALTER TABLE usuario ADD COLUMN pagoHora DECIMAL(18,2) NOT NULL;


ALTER TABLE usuario ADD COLUMN idBranch_office INT NOT NULL;
ALTER TABLE usuario ADD FOREIGN KEY (idBranch_office) REFERENCES branch_office (id);

ALTER TABLE usuario ADD COLUMN idSchedule INT NOT NULL;
ALTER TABLE usuario ADD FOREIGN KEY (idSchedule) REFERENCES schedule (id);
