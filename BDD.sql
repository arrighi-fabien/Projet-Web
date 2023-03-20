CREATE TABLE center(
   id_center INT AUTO_INCREMENT,
   center_name VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_center),
   UNIQUE(center_name)
);

INSERT INTO `center`(`center_name`)
VALUES
    ('Aix-en-Provence'), 
    ('Angoulême'), 
    ('Arras'), 
    ('Bordeaux'), 
    ('Brest'), 
    ('Caen'), 
    ('Dijon'), 
    ('Grenoble'), 
    ('La Rochelle'), 
    ('Le Mans'), 
    ('Lille'), 
    ('Lyon'), 
    ('Montpellier'), 
    ('Nancy'), 
    ('Nantes'), 
    ('Nice'), 
    ('Orléans'), 
    ('Paris-La Défense'), 
    ('Paris-Nanterre'), 
    ('Pau'), 
    ('Reims'), 
    ('Rouen'), 
    ('Saint-Nazaire'), 
    ('Strasbourg'), 
    ('Toulouse');

CREATE TABLE promotion(
   id_promotion INT AUTO_INCREMENT,
   promotion_name VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_promotion),
   UNIQUE(promotion_name)
);

INSERT INTO `promotion`(`promotion_name`)
VALUES
    ('A1'), 
    ('A2 Informatique'), 
    ('A2 Généraliste'), 
    ('A2 BTP'), 
    ('A2 S3E'), 
    ('A3 Informatique'), 
    ('A3 Généraliste'), 
    ('A3 BTP'), 
    ('A3 S3E'), 
    ('A4 Informatique'), 
    ('A4 Généraliste'), 
    ('A4 BTP'), 
    ('A4 S3E'),
    ('A5 Informatique'), 
    ('A5 Généraliste'), 
    ('A5 BTP'), 
    ('A5 S3E');

CREATE TABLE sector(
   id_sector INT AUTO_INCREMENT,
   sector_name VARCHAR(50),
   PRIMARY KEY(id_sector),
   UNIQUE(sector_name)
);

INSERT INTO `sector`(`sector_name`)
VALUES
    ('Informatique'), 
    ('Généraliste'), 
    ('BTP'), 
    ('S3E');

CREATE TABLE city(
   id_city INT AUTO_INCREMENT,
   city_name VARCHAR(50) NOT NULL,
   postal_code VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_city)
);

INSERT INTO `city`(`city_name`, `postal_code`)
VALUES ('Aix-en-Provence', '13090'),
    ('Angoulême', '16000'),
    ('Arras', '62000'),
    ('Bordeaux', '33000'),
    ('Brest', '29200'),
    ('Caen', '14000'),
    ('Dijon', '21000'),
    ('Grenoble', '38000'),
    ('La Rochelle', '17000'),
    ('Le Mans', '72000'),
    ('Lille', '59000'),
    ('Lyon', '69000'),
    ('Montpellier', '34000'),
    ('Nancy', '54000'),
    ('Nantes', '44000'),
    ('Nice', '06000'),
    ('Orléans', '45000'),
    ('Paris', '75000'),
    ('Pau', '64000'),
    ('Reims', '51000'),
    ('Rouen', '76000'),
    ('Saint-Nazaire', '44600'),
    ('Strasbourg', '67000'),
    ('Toulouse', '31000');

CREATE TABLE skill(
   id_skill INT AUTO_INCREMENT,
   skill_name VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_skill),
   UNIQUE(skill_name)
);

INSERT INTO `skill`(`skill_name`)
VALUES ('Anglais'),
    ('Allemand'),
    ('Espagnol'),
    ('Italien'),
    ('Chinois'),
    ('Japonais'),
    ('Arabe'),
    ('Russe'),
    ('HTML'),
    ('CSS'),
    ('Javascript'),
    ('PHP'),
    ('C'),
    ('C#'),
    ('C++'),
    ('Java'),
    ('Python'),
    ('Ruby'),
    ('Swift'),
    ('SQL'),
    ('MySQL'),
    ('Oracle'),
    ('PostgreSQL'),
    ('PowerShell'),
    ('Bash'),
    ('Assembleur'),
    ('Lua'),
    ('Matlab'),
    ('Scala'),
    ('Haskell'),
    ('Prolog'),
    ('Go'),
    ('Rust'),
    ('Erlang'),
    ('Elixir'),
    ('Dart'),
    ('Kotlin'),
    ('Objective-C'),
    ('Visual Basic'),
    ('Scratch');

CREATE TABLE users(
   id_user INT AUTO_INCREMENT,
   first_name VARCHAR(50) NOT NULL,
   last_name VARCHAR(50) NOT NULL,
   email VARCHAR(100) NOT NULL,
   password VARCHAR(255) NOT NULL,
   is_admin BOOLEAN NOT NULL DEFAULT 0,
   is_pilot BOOLEAN NOT NULL DEFAULT 0,
   id_center INT NOT NULL,
   PRIMARY KEY(id_user),
   UNIQUE(email),
   FOREIGN KEY(id_center) REFERENCES center(id_center)
);

INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `is_admin`, `is_pilot`, `id_center`)
VALUES 
   ('Jean', 'Dupont', 'jean.dupond@viacesi.fr', 'MDP', false, false, 1),
   ('Pierre', 'Durand', 'pierre.durand@viacesi.fr', 'MDP', false, false, 2),
   ('Paul', 'Martin', 'paul.martin@viacesi.fr', 'MDP', false, false, 11),
   ('Sylvain', 'Dupont', 'sylvain.dupond@viacesi.fr', 'MDP', false, false, 5),
   ('Nathan', 'Ferrer', 'nathan.ferrer@viacesi.fr', 'MDP', true, false, 16),
   ('Fabien', 'Arrighi', 'fabien.arrighi@viacesi.fr', 'MDP', true, false, 16),
   ('Raphaël', 'Attal', 'raphael.attal@viacesi.fr', 'MDP', true, false, 16),
   ('Valentin', 'Girod', 'valentin.girod@viacesi.fr', 'MDP', false, false, 16),
   ('Thomas', 'Cordier', 'thomas.cordier@viacesi.fr', 'MDP', false, false, 16),
   ('Malek', 'Nasri', 'malek.nasri@viacesi.fr', 'MDP', false, false, 16),
   ('Youssef', 'Abou-msallem', 'yaboumsallem@cesi.fr', 'MDP', false, true, 16);


CREATE TABLE company(
   id_company INT AUTO_INCREMENT,
   company_name VARCHAR(50) NOT NULL,
   description TEXT NOT NULL,
   email VARCHAR(100) NOT NULL,
   nb_student_accepted INT NOT NULL DEFAULT 0,
   is_visible BOOLEAN NOT NULL DEFAULT 0,
   id_sector INT NOT NULL,
   PRIMARY KEY(id_company),
   FOREIGN KEY(id_sector) REFERENCES sector(id_sector)
);

INSERT INTO `company`(`company_name`, `description`, `email`, `nb_student_accepted`, `is_visible`, `id_sector`)
VALUES 
    ('Microsoft', "Microsoft Corporation est une entreprise américaine de logiciels et de services informatiques. Elle est créée en 1975 par Bill Gates et Paul Allen. Elle est basée à Redmond dans l\'État de Washington. Microsoft est le plus grand éditeur de logiciels au monde, avec un chiffre d\'affaires de 85,9 milliards de dollars en 2016. Elle est également le plus grand éditeur de logiciels de bureautique, de systèmes d\'exploitation et de serveurs. Microsoft est également le plus grand éditeur de logiciels de jeux vidéo, avec une part de marché de 23 % en 2016. Microsoft est également le plus grand éditeur de logiciels de développement de logiciels, avec une part de marché de 32 % en 2016. Microsoft est également le plus grand éditeur de logiciels de développement de logiciels, avec une part de marché de 32 % en 2016.", 'EMAIL', 5, true, 1),
    ('Apple', "Apple Inc. est une entreprise américaine de haute technologie fondée le 1er avril 1976 par Steve Jobs, Steve Wozniak et Ronald Wayne. Elle est spécialisée dans la conception, la fabrication et la commercialisation de produits électroniques grand public, notamment des ordinateurs personnels, des tablettes, des smartphones, des montres connectées, des téléviseurs intelligents, des systèmes d\'exploitation, des logiciels et des services en ligne. Apple est le plus grand fabricant mondial de smartphones et de tablettes, et le troisième plus grand fabricant mondial de PC. En 2016, Apple est la deuxième entreprise la plus rentable du monde, derrière ExxonMobil, et la plus rentable du secteur de la technologie. En 2016, Apple est la deuxième entreprise la plus rentable du monde, derrière ExxonMobil, et la plus rentable du secteur de la technologie.", 'EMAIL', 15, true, 1),
    ('Google', "Google LLC est une entreprise américaine de services Internet et de publicité en ligne. Elle est créée en 1998 par Larry Page et Sergey Brin, alors étudiants à l\'Université de Stanford. Elle est basée à Mountain View en Californie. Google est le plus grand moteur de recherche au monde, avec un chiffre d\'affaires de 90,1 milliards de dollars en 2016. Elle est également le plus grand éditeur de logiciels de bureautique, de systèmes d\'exploitation et de serveurs. Google est également le plus grand éditeur de logiciels de jeux vidéo, avec une part de marché de 23 % en 2016. Google est également le plus grand éditeur de logiciels de développement de logiciels, avec une part de marché de 32 % en 2016. Google est également le plus grand éditeur de logiciels de développement de logiciels, avec une part de marché de 32 % en 2016.", 'EMAIL', 111, true, 2),
    ('La poste', "La Poste est une société anonyme française principalement présente en tant qu'opérateur de services postaux, banque, assurance, opérateur de téléphonie mobile, fournisseur de services numériques et de solutions commerce, commerce en ligne et collecte et vente de données.", 'EMAIL', 0, true, 3),
    ('Cesi', "Campus d’enseignement supérieur et de formation professionnelle, CESI poursuit sa mission sociétale en permettant à des étudiants, alternants et salariés de devenir acteurs des transformations des entreprises et de la société, grâce à ses écoles et activités.", 'EMAIL', 0, true, 4),
    ('Cegos', "Cegos est un groupe international de formation professionnelle, de conseil et d’outils de gestion des ressources humaines. Il est un acteur majeur de la formation professionnelle et de la gestion des ressources humaines en France et à l’international. Il est présent dans 20 pays et emploie 2400 collaborateurs.", 'EMAIL', 0, true, 4),
    ('Bpce', "BPCE est un groupe bancaire français, le troisième groupe bancaire français en termes de nombre de clients, le deuxième en termes d'actifs, et le premier en termes de dépôts. Il est issu de la fusion de la Banque populaire et de la Caisse d'épargne en 2009.", 'EMAIL', 0, true, 1),
    ('Capgemini', "Capgemini est un groupe français de services informatiques et de conseil en technologies de l'information et de la communication. Il est le deuxième groupe mondial de services informatiques indépendant, derrière IBM. Il est présent dans plus de 40 pays et emploie plus de 180 000 personnes.", 'EMAIL', 0, true, 2),
    ('Sopra Steria', "Sopra Steria est une société de services informatiques française, créée en 1989 à Paris et implantée dans 20 pays. Elle est présente dans 15 pays européens, au Canada et aux États-Unis. Elle est cotée à la Bourse de Paris depuis 2000.", 'EMAIL', 0, true, 2),
    ('Orange', "Orange S.A. est un groupe français de télécommunications. Il est coté à la Bourse de Paris et est membre de l'indice CAC 40. Orange est le troisième opérateur mondial en termes de revenus, le premier en Europe et le deuxième en France. Orange est le troisième opérateur mondial en termes de revenus, le premier en Europe et le deuxième en France.", 'EMAIL', 0, true, 1),
    ('Dassault Systèmes', "Dassault Systèmes est une entreprise française de logiciels de conception assistée par ordinateur et de gestion de la conception. Elle est créée en 1981 par Bernard Charles et est basée à Vélizy-Villacoublay dans les Yvelines.", 'EMAIL', 15, true, 2),
    ('Société Générale', "Société Générale est un groupe bancaire français, le premier groupe bancaire français en termes d'actifs, le deuxième en termes de nombre de clients et le premier en termes de dépôts. Il est issu de la fusion de la Société Générale de Banque et de la Banque française de l'Ouest en 2000.", 'EMAIL', 0, true, 1),
    ('BNP Paribas', "BNP Paribas est un groupe bancaire français, le premier groupe bancaire français en termes de nombre de clients, le troisième en termes d'actifs, et le deuxième en termes de dépôts. Il est issu de la fusion de la Banque nationale de Paris et de la Banque de Paris et des Pays-Bas en 2000.", 'EMAIL', 0, true, 2),
    ('Total', "Total S.A. est une entreprise française, spécialisée dans l'exploration, la production, la raffinage, la commercialisation et la distribution de produits pétroliers et gaziers, et dans les énergies renouvelables. Elle est basée à Courbevoie, dans les Hauts-de-Seine.", 'EMAIL', 0, true, 1),
    ('Vinci', "Vinci est un groupe français de construction et de concessions d'infrastructures. Il est coté à la Bourse de Paris et est membre de l'indice CAC 40. Il est créé en 1899 par Général Electric et est basé à Rueil-Malmaison dans les Hauts-de-Seine.", 'EMAIL', 0, true, 1),
    ('Suez', "Suez est un groupe français de services de l'eau et des déchets. Il est coté à la Bourse de Paris et est membre de l'indice CAC 40. Il est créé en 2008 par la fusion de Saur et d'Lyonnaise des Eaux et est basé à La Défense dans les Hauts-de-Seine.", 'EMAIL', 10, true, 1),
    ('Airbus', "Airbus Group SE est un groupe industriel européen de l'aéronautique et de l'espace. Il est créé en 2000 par la fusion de Matra Aérospatiale et de DaimlerChrysler Aerospace AG et est basé à Blagnac dans la banlieue de Toulouse.", 'EMAIL', 0, true, 1),
    ('Sanofi', "Sanofi est un groupe pharmaceutique français, le troisième groupe pharmaceutique mondial en termes de chiffre d'affaires, le premier en France et le deuxième en Europe. Il est coté à la Bourse de Paris et est membre de l'indice CAC 40. Il est créé en 2004 par la fusion de l'ancien groupe Sanofi-Synthélabo et de l'ancien groupe Aventis.", 'EMAIL', 15, true, 1);



CREATE TABLE internship(
   id_internship INT AUTO_INCREMENT,
   internship_name VARCHAR(100) NOT NULL,
   description TEXT NOT NULL,
   duration INT NOT NULL,
   salary DECIMAL(15,2) NOT NULL,
   offer_date DATE NOT NULL,
   places_students INT NOT NULL,
   id_city INT NOT NULL,
   id_company INT NOT NULL,
   PRIMARY KEY(id_internship),
   FOREIGN KEY(id_city) REFERENCES city(id_city),
   FOREIGN KEY(id_company) REFERENCES company(id_company)
);

INSERT INTO `internship`(`internship_name`, `description`, `duration`, `salary`, `offer_date`, `places_students`, `id_city`, `id_company`)
VALUES 
    ("Stage de fin d\'étude", 'Description', 15, 1, '2018-01-01', 5, 1, 1),
    ("Stage - Chargé de Communication & Marque Employeur F/H - Paris", "Rejoignez BPCE en tant que Chargé.e de Communication digitale & Marque Employeur pour un stage à partir de Mars ! Les missions c'est important, l'équipe et l'environnement aussi … ! \n\n Vous intégrez une équipe qui vous offrira un accompagnement de proximité : 5 Responsables de projets en charge des sujets : Recrutement, Marque Employeur, Réseaux sociaux, Gestion de carrières, etc", 24, 2, '2018-01-01', 5, 5, 2),
    ("Cyber Security - Web Engineer (Symfony/Angular) Final Year Internship", 'Description', 15, 4, '2018-01-01', 5, 1, 1),
    ("Sales Development Representative - Stage", "Nous souhaitons renforcer nos équipes pour accompagner le développement de nos clients, grands groupes à forte croissance et le lancement de nouveaux projets d’envergure. Rattaché(e) au manager commercial, vous êtes un véritable ambassadeur de la marque auprès des clients. En collaboration avec les nombreux membres de votre équipe", 15, 5, '2018-01-01', 5, 5, 1),
    ("Category Manager Junior", "Au sein de l’équipe Opérations, notre Category Manager Junior a pour mission d’élaborer, de piloter et d’animer le catalogue produit, en collaboration avec les différentes équipes de Beebs (Marketing, Tech, Brand). Avec près de 2M de produits mis en ligne, cette mission est centrale et se concentre sur plusieurs catégories clés (Vêtements, Jeux & Jouets, Alimentaires, Maison, Puériculture…).", 15, 1, '2018-01-01', 5, 1, 2),
    ("Monteur(se) vidéo en stage", 'Description', 15, 5, '2018-01-01', 5, 1, 2),
    ("Business Developer B2B Internship - French Speaker", 'We are looking for a French native speaker Business Developer to develop and be fully in charge of the French market. You will join the adventure from the beginning, and you will contribute to the growth of the company in Europe. You will work in a multicultural company & offices (job based in the city center of Paris).\n\n As a Business Developer B2B, you will be in charge of growing the company business on the French market.', 15, 5, '2018-01-01', 5, 5, 3),
    ("Assistant chef de projet", 'L’Assistant Chef de Projet est un poste central chez Walter Learning : vous êtes amené(e) à porter le produit, c’est-à-dire l’ensemble de nos formations. Ce poste, très complet, vise à assister le Chef de Projet dans son travail quotidien : stratégie de développement, choix des thèmes de formation, conception pédagogique, discussions avec les formateurs, suivi des tournages, etc.\nEn tant qu’Assistant Chef de Projet, vous portez l’ambition de l’entreprise : reconnaître de nouvelles opportunités, collaborer avec des experts dans de nombreux domaines, et surtout, préparer du contenu de haute qualité.', 15, 6, '2018-01-01', 5, 1, 3),
    ("Stage - Chargé de Communication & Marque Employeur F/H - Paris", "Rejoignez BPCE en tant que Chargé.e de Communication digitale & Marque Employeur pour un stage à partir de Mars ! Les missions c'est important, l'équipe et l'environnement aussi … ! \n\n Vous intégrez une équipe qui vous offrira un accompagnement de proximité : 5 Responsables de projets en charge des sujets : Recrutement, Marque Employeur, Réseaux sociaux, Gestion de carrières, etc", 15, 6, '2018-01-01', 5, 5, 3),
    ("WEBMARKETING - STAGE", 'Description', 15, 1, '2018-01-01', 5, 1, 3);

CREATE TABLE document(
   id_document INT AUTO_INCREMENT,
   cv BOOLEAN NOT NULL DEFAULT 0,
   lm BOOLEAN NOT NULL DEFAULT 0,
   id_user INT NOT NULL,
   PRIMARY KEY(id_document),
   UNIQUE(id_user),
   FOREIGN KEY(id_user) REFERENCES users(id_user)
);

INSERT INTO `document`(`cv`, `lm`, `id_user`)
VALUES
   (false, false, 1),
   (false, false, 2),
   (false, false, 3),
   (false, false, 4),
   (false, false, 5),
   (false, false, 6),
   (false, false, 7),
   (false, false, 8),
   (false, false, 9),
   (false, false, 10),
   (false, false, 11);



CREATE TABLE is_in(
   id_user INT,
   id_promotion INT,
   PRIMARY KEY(id_user, id_promotion),
   FOREIGN KEY(id_user) REFERENCES users(id_user),
   FOREIGN KEY(id_promotion) REFERENCES promotion(id_promotion)
);

INSERT INTO `is_in`(`id_user`, `id_promotion`)
VALUES
   (1, 1),
   (2, 1),
   (3, 1),
   (4, 8),
   (5, 1),
   (6, 5),
   (7, 3),
   (8, 1),
   (9, 2),
   (10, 2),
   (11, 1);

CREATE TABLE work_at(
   id_company INT,
   id_city INT,
   PRIMARY KEY(id_company, id_city),
   FOREIGN KEY(id_company) REFERENCES company(id_company),
   FOREIGN KEY(id_city) REFERENCES city(id_city)
);

INSERT INTO `work_at`(`id_company`, `id_city`)
VALUES
    (1, 1),
    (2, 5),
    (3, 1);

CREATE TABLE need(
   id_internship INT,
   id_skill INT,
   PRIMARY KEY(id_internship, id_skill),
   FOREIGN KEY(id_internship) REFERENCES internship(id_internship),
   FOREIGN KEY(id_skill) REFERENCES skill(id_skill)
);

INSERT INTO `need`(`id_internship`, `id_skill`)
VALUES
   (1, 1),
   (1, 2),
   (1, 3),
   (1, 4),
   (1, 5),
   (1, 6);

CREATE TABLE concern(
   id_promotion INT,
   id_internship INT,
   PRIMARY KEY(id_promotion, id_internship),
   FOREIGN KEY(id_promotion) REFERENCES promotion(id_promotion),
   FOREIGN KEY(id_internship) REFERENCES internship(id_internship)
);

INSERT INTO `concern`(`id_promotion`, `id_internship`)
VALUES
    (1, 1),
    (1, 2),
    (1, 3),
    (1, 4),
    (1, 5),
    (1, 6);

CREATE TABLE wishlist(
   id_user INT,
   id_internship INT,
   PRIMARY KEY(id_user, id_internship),
   FOREIGN KEY(id_user) REFERENCES users(id_user),
   FOREIGN KEY(id_internship) REFERENCES internship(id_internship)
);

INSERT INTO `wishlist`(`id_user`, `id_internship`)
VALUES
    (1, 1),
    (1, 2),
    (1, 3),
    (1, 4),
    (1, 5),
    (1, 6),
    (2, 1),
    (2, 2),
    (2, 3),
    (2, 4),
    (2, 5),
    (2, 6),
    (3, 1),
    (3, 2);

CREATE TABLE rate(
   id_user INT,
   id_company INT,
   evaluation INT NOT NULL,
   PRIMARY KEY(id_user, id_company),
   FOREIGN KEY(id_user) REFERENCES users(id_user),
   FOREIGN KEY(id_company) REFERENCES company(id_company)
);

INSERT INTO `rate`(`id_user`, `id_company`, `evaluation`)
VALUES
    (1, 1, 5),
    (1, 2, 5),
    (1, 3, 5),
    (2, 1, 5),
    (2, 2, 5),
    (2, 3, 5),
    (3, 1, 5),
    (3, 2, 5),
    (3, 3, 5),
    (4, 1, 5),
    (4, 2, 5),
    (4, 3, 5),
    (5, 1, 5),
    (5, 2, 5),
    (5, 3, 5),
    (6, 1, 5),
    (6, 2, 5),
    (6, 3, 5),
    (7, 1, 5),
    (7, 2, 5),
    (7, 3, 5);

CREATE TABLE candidate(
   id_user INT,
   id_internship INT,
   PRIMARY KEY(id_user, id_internship),
   FOREIGN KEY(id_user) REFERENCES users(id_user),
   FOREIGN KEY(id_internship) REFERENCES internship(id_internship)
);

INSERT INTO `candidate`(`id_user`, `id_internship`)
VALUES
    (1, 1),
    (1, 2),
    (1, 3),
    (1, 4),
    (1, 5),
    (1, 6),
    (2, 1),
    (2, 2),
    (2, 3),
    (2, 4),
    (2, 5),
    (2, 6),
    (3, 1),
    (3, 2),
    (3, 3),
    (3, 4),
    (6, 5),
    (6, 6),
    (7, 1),
    (7, 2),
    (7, 3),
    (7, 4),
    (7, 5),
    (7, 6);

CREATE TABLE trust(
   id_user INT,
   id_company INT,
   PRIMARY KEY(id_user, id_company),
   FOREIGN KEY(id_user) REFERENCES users(id_user),
   FOREIGN KEY(id_company) REFERENCES company(id_company)
);

INSERT INTO `trust`(`id_user`, `id_company`)
VALUES
    (11, 1),
    (11, 2),
    (11, 5);
