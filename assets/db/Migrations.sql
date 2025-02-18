CREATE TABLE IF NOT EXISTS utenti (
id int NOT NULL AUTO_INCREMENT,
nome varchar(45),
cognome varchar(45),
email varchar(255),
password varchar(255),
PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS eventi (
id int NOT NULL AUTO_INCREMENT,
attendees text,
nome_evento varchar(255),
data_evento datetime,
PRIMARY KEY (id)
);

-- fix syntax error = eventi instead of evento
INSERT INTO `eventi`(`attendees`, `nome_evento`, `data_evento`) VALUES ('ulysses200915@varen8.com,qmonkey14@falixiao.com,mavbafpcmq@hitbase.net','Test Edusogno 1', '2022-10-13 14:00'), ('dgipolga@edume.me,qmonkey14@falixiao.com,mavbafpcmq@hitbase.net','Test Edusogno 2', '2022-10-15 19:00'), ('dgipolga@edume.me,ulysses200915@varen8.com,mavbafpcmq@hitbase.net','Test Edusogno 2', '2022-10-15 19:00');

-- add utenti data
INSERT INTO `utenti`(`nome`, `cognome`, `email`, `password`) VALUES ('Marco','Rossi', 'ulysses200915@varen8.com', 'Edusogno123'), ('Filippo', "D'Amelio", 'qmonkey14@falixiao.com','Edusogno?123'), ('Gianluca', 'Carta', 'mavbafpcmq@hitbase.net', 'EdusognoCiao'), ('Stella', "De Grandis", 'dgipolga@edume.me', 'EdusognoGia');