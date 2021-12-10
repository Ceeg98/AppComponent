CREATE TABLE componente(
    id int auto_increment not null,
    unique_code varchar(255),
    nombre varchar(255),
    precio int,
    descripcion text,
    idTipo_componente int,
    created_at datetime,
    updated_at datetime,
    CONSTRAINT pk_componente PRIMARY KEY(id),
    CONSTRAINT fk_componente_tipo_componente FOREIGN KEY(idTipo_componente) REFERENCES tipo_componente(id)
)ENGINE=InnoDb;

CREATE TABLE tipo_componente(
    id int auto_increment not null,
    nombre varchar(255),
    created_at datetime,
    updated_at datetime,
    CONSTRAINT pk_tipo_componente PRIMARY KEY (id)
)ENGINE=InnoDb

CREATE TABLE componente_sucursal(
    id_componente int not null,
    id_sucursal int not null,
    stock int,
    created_at datetime,
    updated_at datetime,
    CONSTRAINT fk_componente_sucursal_sucursal FOREIGN KEY(id_sucursal) REFERENCES sucursal(id),
    CONSTRAINT fk_componente_sucursal_componente FOREIGN KEY(id_componente) REFERENCES componente(id)
)ENGINE=InnoDb;

CREATE TABLE sucursal(
    id int auto_increment not null,
    nombre varchar(255),
    created_at datetime,
    updated_at datetime,
    CONSTRAINT pk_sucursal PRIMARY KEY(id)
)ENGINE=InnoDb;