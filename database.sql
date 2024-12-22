CREATE TABLE IF NOT EXISTS users (
    id              int(255) auto_increment not null,
    role            varchar(20),
    name            varchar(100),
    surname         varchar(200),
    nick            varchar(100),
    email           varchar(255),
    password        varchar(255),
    image           varchar(255),
    created_at      datetime,
    updated_at      datetime,
    remember_token  varchar(255),

    CONSTRAINT pk_user PRIMARY KEY(id)
)ENGINE=InnoDB ;


INSERT INTO users VALUES (null, 'user', 'Javier', 'Garcia', 'Javi', 'javi@gmail.com','123',null,CURDATE(),CURDATE(),null);
INSERT INTO users VALUES (null, 'user', 'Manolo', 'lopez', 'Lolo', 'lolo@gmail.com','123',null,CURDATE(),CURDATE(),null);



CREATE TABLE IF NOT EXISTS images  (
 id               int(255) auto_increment not null,
 user_id          int(255),
 image_path       varchar(255),
 description      text,
 created_at       datetime,
 updated_at       datetime,
 CONSTRAINT pk_images PRIMARY KEY(id),
 CONSTRAINT fk_images_user_id FOREIGN KEY(user_id) REFERENCES users(id)

) ENGINE=InnoDB ;

INSERT INTO images VALUES (null, 1, 'image.jpg', 'descripcion de la imagen', CURDATE(), CURDATE());
INSERT INTO images VALUES (null, 2, 'playa.jpg', 'esto es una imagen de la playa', CURDATE(), CURDATE());
INSERT INTO images VALUES (null, 1, 'montaña.jpg', 'Esta montaña es preciosa', CURDATE(), CURDATE());

CREATE TABLE IF NOT EXISTS comments(
 id               int(255) auto_increment not null,
 user_id          int(255),
 image_id         int(255),
 content          text,
 created_at       datetime,
 updated_at       datetime,
    CONSTRAINT pk_comments PRIMARY KEY(id),
    CONSTRAINT fk_comments_user_id FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT fk_coments_image_id FOREIGN KEY (image_id) REFERENCES images(id) 
) ENGINE=InnoDB ;

INSERT INTO comments VALUES (null, 1, 1, 'Esto es una imagen muy interesante', CURDATE(), CURDATE());
INSERT INTO comments VALUES (null, 2, 2, 'Esto es en la playa o en la montaña??', CURDATE(), CURDATE());
INSERT INTO comments VALUES (null, 1, 3, 'esto si que es un paisage de playa o montaña', CURDATE(), CURDATE());

CREATE TABLE IF NOT EXISTS likes (
 id               int(255) auto_increment not null,
 user_id          int(255),
 image_id         int(255),
 created_at       datetime,
 updated_at       datetime,
    CONSTRAINT pk_likes PRIMARY KEY(id),
    CONSTRAINT fk_likes_user_id FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT fk_likes_image_id FOREIGN KEY(image_id) REFERENCES images(id)
) ENGINE=InnoDB ;
INSERT INTO likes VALUES (null, 1, 1, CURDATE(), CURDATE());
INSERT INTO likes VALUES (null, 1, 2, CURDATE(), CURDATE());
INSERT INTO likes VALUES (null, 2, 2, CURDATE(), CURDATE());
