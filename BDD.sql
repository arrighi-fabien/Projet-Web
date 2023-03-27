-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 27 mars 2023 à 10:50
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidate`
--

CREATE TABLE `candidate` (
  `id_user` int(11) NOT NULL,
  `id_internship` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `candidate`
--

INSERT INTO `candidate` (`id_user`, `id_internship`) VALUES
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
(5, 3),
(6, 5),
(6, 6),
(6, 10),
(6, 12),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(7, 6);

-- --------------------------------------------------------

--
-- Structure de la table `center`
--

CREATE TABLE `center` (
  `id_center` int(11) NOT NULL,
  `center_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `center`
--

INSERT INTO `center` (`id_center`, `center_name`) VALUES
(1, 'Aix-en-Provence'),
(2, 'Angoulême'),
(3, 'Arras'),
(4, 'Bordeaux'),
(5, 'Brest'),
(6, 'Caen'),
(7, 'Dijon'),
(8, 'Grenoble'),
(9, 'La Rochelle'),
(10, 'Le Mans'),
(11, 'Lille'),
(12, 'Lyon'),
(13, 'Montpellier'),
(14, 'Nancy'),
(15, 'Nantes'),
(16, 'Nice'),
(17, 'Orléans'),
(18, 'Paris-La Défense'),
(19, 'Paris-Nanterre'),
(20, 'Pau'),
(21, 'Reims'),
(22, 'Rouen'),
(23, 'Saint-Nazaire'),
(24, 'Strasbourg'),
(25, 'Toulouse');

-- --------------------------------------------------------

--
-- Structure de la table `city`
--

CREATE TABLE `city` (
  `id_city` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `city`
--

INSERT INTO `city` (`id_city`, `city_name`) VALUES
(1, 'Aix-en-Provence'),
(2, 'Angoulême'),
(3, 'Arras'),
(4, 'Bordeaux'),
(5, 'Brest'),
(6, 'Caen'),
(7, 'Dijon'),
(8, 'Grenoble'),
(9, 'La Rochelle'),
(10, 'Le Mans'),
(11, 'Lille'),
(12, 'Lyon'),
(13, 'Montpellier'),
(14, 'Nancy'),
(15, 'Nantes'),
(16, 'Nice'),
(17, 'Orléans'),
(18, 'Paris'),
(19, 'Pau'),
(20, 'Reims'),
(21, 'Rouen'),
(22, 'Saint-Nazaire'),
(23, 'Strasbourg'),
(24, 'Toulouse'),
(25, 'Ajaccio'),
(26, 'Bastia');

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_description` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `nb_student_accepted` int(11) NOT NULL DEFAULT 0,
  `is_visible` tinyint(1) NOT NULL DEFAULT 0,
  `id_sector` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`id_company`, `company_name`, `company_description`, `email`, `nb_student_accepted`, `is_visible`, `id_sector`) VALUES
(1, 'Microsoft', 'Microsoft Corporation est une entreprise américaine de logiciels et de services informatiques. Elle est créée en 1975 par Bill Gates et Paul Allen. Elle est basée à Redmond dans l’État de Washington. Microsoft est le plus grand éditeur de logiciels au monde, avec un chiffre d’affaires de 85,9 milliards de dollars en 2016. Elle est également le plus grand éditeur de logiciels de bureautique, de systèmes d’exploitation et de serveurs. Microsoft est également le plus grand éditeur de logiciels de jeux vidéo, avec une part de marché de 23 % en 2016. Microsoft est également le plus grand éditeur de logiciels de développement de logiciels, avec une part de marché de 32 % en 2016. Microsoft est également le plus grand éditeur de logiciels de développement de logiciels, avec une part de marché de 32 % en 2016.', 'test@gmail.com', 5, 1, 1),
(2, 'Apple', 'Apple Inc. est une entreprise américaine de haute technologie fondée le 1er avril 1976 par Steve Jobs, Steve Wozniak et Ronald Wayne. Elle est spécialisée dans la conception, la fabrication et la commercialisation de produits électroniques grand public, notamment des ordinateurs personnels, des tablettes, des smartphones, des montres connectées, des téléviseurs intelligents, des systèmes d’exploitation, des logiciels et des services en ligne. Apple est le plus grand fabricant mondial de smartphones et de tablettes, et le troisième plus grand fabricant mondial de PC. En 2016, Apple est la deuxième entreprise la plus rentable du monde, derrière ExxonMobil, et la plus rentable du secteur de la technologie. En 2016, Apple est la deuxième entreprise la plus rentable du monde, derrière ExxonMobil, et la plus rentable du secteur de la technologie.', 'test@gmail.com', 15, 1, 1),
(3, 'Google', 'Google LLC est une entreprise américaine de services Internet et de publicité en ligne. Elle est créée en 1998 par Larry Page et Sergey Brin, alors étudiants à l&#039;Université de Stanford. Elle est basée à Mountain View en Californie. Google est le plus grand moteur de recherche au monde, avec un chiffre d&#039;affaires de 90,1 milliards de dollars en 2016. Elle est également le plus grand éditeur de logiciels de bureautique, de systèmes d&#039;exploitation et de serveurs. Google est également le plus grand éditeur de logiciels de jeux vidéo, avec une part de marché de 23 % en 2016. Google est également le plus grand éditeur de logiciels de développement de logiciels, avec une part de marché de 32 % en 2016. Google est également le plus grand éditeur de logiciels de développement de logiciels, avec une part de marché de 32 % en 2016.', 'google@gmail.com', 666, 1, 2),
(4, 'La poste', 'La Poste est une entreprise française de services postaux et de livraison de colis. Elle a été fondée en 1576 et est aujourd’hui l’une des plus grandes entreprises de services postaux en Europe. <br>La Poste offre une large gamme de services, allant de l’envoi de lettres et de colis à la gestion de services bancaires et de télécommunications. Elle est également un acteur clé dans la distribution de la presse en France. <br>L’entreprise emploie plus de 250 000 personnes et dispose d’un réseau dense de bureaux de poste et de centres de tri à travers le pays. Elle est également présente dans plusieurs pays à travers le monde grâce à sa filiale internationale, La Poste International. <br>La Poste est engagée dans des initiatives de développement durable, notamment en travaillant sur des projets pour réduire les émissions de gaz à effet de serre de ses activités. Elle est également impliquée dans des projets sociaux et communautaires pour soutenir les communautés locales dans lesquelles elle opère.', 'test@gmail.com', 0, 1, 3),
(5, 'Cesi', 'CESI est une école d’ingénieurs française fondée en 1958. Elle est spécialisée dans la formation professionnelle en ingénierie, en informatique et en management. <br>L’objectif de CESI est de former des ingénieurs et des cadres capables de répondre aux besoins de l’industrie et des entreprises. Les programmes de formation sont conçus pour offrir une combinaison de théorie et de pratique, avec une forte orientation vers les besoins du marché du travail. <br>CESI est présent dans plusieurs villes en France et possède également des campus à l’étranger. L’école compte plus de 25 000 diplômés et accueille chaque année plus de 12 000 étudiants. <br>CESI est reconnue pour son engagement en faveur de la qualité de l’enseignement et de la recherche, ainsi que pour sa forte connexion avec le monde de l’entreprise. Elle est régulièrement classée parmi les meilleures écoles d’ingénieurs en France et en Europe. <br>L’entreprise est également impliquée dans des initiatives de développement durable, notamment en travaillant sur des projets pour réduire son impact environnemental et en sensibilisant ses étudiants aux enjeux environnementaux.', 'test@gmail.com', 0, 1, 4),
(6, 'Cegos', 'Cegos est un groupe international de formation professionnelle, de conseil et d’outils de gestion des ressources humaines. Il est un acteur majeur de la formation professionnelle et de la gestion des ressources humaines en France et à l’international. Il est présent dans 20 pays et emploie 2400 collaborateurs.', 'test@gmail.com', 0, 1, 4),
(7, 'Bpce', 'BPCE est un groupe bancaire français, le troisième groupe bancaire français en termes de nombre de clients, le deuxième en termes d’actifs, et le premier en termes de dépôts. Il est issu de la fusion de la Banque populaire et de la Caisse d’épargne en 2009.', 'test@gmail.com', 0, 1, 1),
(8, 'Capgemini', 'Capgemini est une entreprise française de services de conseil, de technologie et d’externalisation. Fondée en 1967, elle est aujourd’hui l’une des plus grandes entreprises de services informatiques au monde. <br>Capgemini offre une gamme complète de services allant du conseil en stratégie aux services d’intégration de systèmes, en passant par l’externalisation de processus métier. Elle est spécialisée dans plusieurs domaines, notamment la transformation numérique, la cybersécurité, l’intelligence artificielle et l’analyse de données. <br>L’entreprise est présente dans plus de 50 pays et emploie plus de 270 000 personnes dans le monde entier. Elle est reconnue pour son expertise technique et sa capacité à innover pour répondre aux besoins de ses clients. <br>Capgemini est également engagée dans des initiatives de développement durable et s’efforce de réduire son impact environnemental grâce à des pratiques commerciales durables et à l’utilisation de technologies respectueuses de l’environnement. Elle est également impliquée dans des projets sociaux et communautaires pour soutenir les communautés locales dans lesquelles elle opère.', 'test@gmail.com', 0, 1, 2),
(9, 'Sopra Steria', 'Sopra Steria est une société de services informatiques française, créée en 1989 à Paris et implantée dans 20 pays. Elle est présente dans 15 pays européens, au Canada et aux États-Unis. Elle est cotée à la Bourse de Paris depuis 2000.', 'test@gmail.com', 0, 1, 2),
(10, 'Orange', 'Orange S.A. est un groupe français de télécommunications. Il est coté à la Bourse de Paris et est membre de l’indice CAC 40. Orange est le troisième opérateur mondial en termes de revenus, le premier en Europe et le deuxième en France. Orange est le troisième opérateur mondial en termes de revenus, le premier en Europe et le deuxième en France.', 'test@gmail.com', 0, 1, 1),
(11, 'Dassault Systèmes', 'Dassault Systèmes est une entreprise française de logiciels de conception assistée par ordinateur et de gestion de la conception. Elle est créée en 1981 par Bernard Charles et est basée à Vélizy-Villacoublay dans les Yvelines.', 'test@gmail.com', 15, 1, 2),
(12, 'Société Générale', 'Société Générale est un groupe bancaire français, le premier groupe bancaire français en termes d’actifs, le deuxième en termes de nombre de clients et le premier en termes de dépôts. Il est issu de la fusion de la Société Générale de Banque et de la Banque française de l’Ouest en 2000.', 'test@gmail.com', 0, 1, 1),
(13, 'BNP Paribas', 'BNP Paribas est un groupe bancaire français, le premier groupe bancaire français en termes de nombre de clients, le troisième en termes d’actifs, et le deuxième en termes de dépôts. Il est issu de la fusion de la Banque nationale de Paris et de la Banque de Paris et des Pays-Bas en 2000.', 'test@gmail.com', 0, 1, 2),
(14, 'Total', 'Total S.A. est une entreprise française, spécialisée dans l’exploration, la production, la raffinage, la commercialisation et la distribution de produits pétroliers et gaziers, et dans les énergies renouvelables. Elle est basée à Courbevoie, dans les Hauts-de-Seine.', 'test@gmail.com', 0, 1, 1),
(15, 'Vinci', 'Vinci est une entreprise française spécialisée dans les secteurs de la construction, des infrastructures et des concessions. Fondée en 1899, elle est aujourd’hui l’une des plus grandes entreprises de construction au monde. <br><br>Vinci est présente dans de nombreux domaines, notamment la construction d’infrastructures de transport (routes, ponts, tunnels, etc.), les travaux publics, la construction de bâtiments, la maintenance et l’exploitation d’infrastructures (aéroports, autoroutes, parkings, etc.), ainsi que dans les services liés à l’énergie et à l’environnement.<br><br>L’entreprise opère dans plusieurs pays à travers le monde et emploie plus de 200 000 personnes. Elle est reconnue pour sa capacité à gérer des projets de grande envergure et à fournir des solutions innovantes et durables pour répondre aux besoins de ses clients.<br><br>Vinci est également engagée dans des initiatives de développement durable et s’efforce de réduire son impact environnemental grâce à des pratiques de construction durables et à l’utilisation de technologies respectueuses de l’environnement. Elle est également impliquée dans des projets sociaux et communautaires pour soutenir les communautés locales dans lesquelles elle opère.', 'test@gmail.com', 0, 1, 1),
(16, 'Suez', 'Suez est un groupe français de services de l’eau et des déchets. Il est coté à la Bourse de Paris et est membre de l’indice CAC 40. Il est créé en 2008 par la fusion de Saur et d’Lyonnaise des Eaux et est basé à La Défense dans les Hauts-de-Seine.', 'test@gmail.com', 10, 1, 1),
(17, 'Airbus', 'Airbus est une entreprise multinationale spécialisée dans la conception, la fabrication et la vente d’avions civils et militaires. Fondée en 1970, elle est basée en Europe et est l’un des plus grands fabricants d’avions au monde, en concurrence avec son rival américain, Boeing. <br><br>Airbus propose une large gamme d’avions, allant des petits avions régionaux aux gros porteurs pour les compagnies aériennes. La société est également un acteur important dans le domaine de l’aviation militaire, fournissant des avions de transport et de ravitaillement en vol, ainsi que des avions de combat.<br><br>L’entreprise est réputée pour son engagement en faveur de l’innovation technologique et de l’efficacité énergétique dans la conception de ses avions. Airbus est également impliqué dans des initiatives de développement durable, notamment en travaillant sur des technologies de propulsion plus propres et en s’engageant à réduire les émissions de gaz à effet de serre de ses activités.<br><br>En tant qu’entreprise internationale, Airbus emploie plus de 130 000 personnes dans le monde entier et travaille avec des partenaires et des fournisseurs de plusieurs pays. Elle est un acteur clé de l’industrie aéronautique mondiale et contribue grandement à l’économie de nombreux pays.', 'test@gmail.com', 0, 1, 1),
(18, 'Sanofi', 'Sanofi est un groupe pharmaceutique français, le troisième groupe pharmaceutique mondial en termes de chiffre d’affaires, le premier en France et le deuxième en Europe. Il est coté à la Bourse de Paris et est membre de l’indice CAC 40. Il est créé en 2004 par la fusion de l’ancien groupe Sanofi-Synthélabo et de l’ancien groupe Aventis.', 'test@gmail.com', 15, 1, 1),
(19, 'Uber Eats', 'Uber Eats est une entreprise de livraison de repas en ligne, filiale de la société Uber Technologies, Inc. Elle a été créée en 2014 et est présente dans de nombreux pays à travers le monde. Uber Eats permet aux utilisateurs de commander de la nourriture depuis leur téléphone portable ou leur ordinateur et de la faire livrer à leur domicile ou à leur bureau. <br><br>L’entreprise collabore avec des restaurants locaux et nationaux pour proposer une large sélection de plats à ses clients. Les utilisateurs peuvent parcourir les menus en ligne, passer commande et suivre en temps réel l’avancée de leur livraison. Les repas sont livrés par des chauffeurs indépendants, également appelés ’coursiers’, qui sont équipés d’une application mobile qui leur permet de recevoir les commandes et de les livrer rapidement.<br><br>Uber Eats a connu une croissance rapide depuis sa création et est devenue l’une des principales plateformes de livraison de repas en ligne dans le monde. L’entreprise a élargi ses services pour inclure des offres de livraison de supermarché et de produits de pharmacie dans certains pays, ainsi que des options de livraison sans contact pour répondre aux besoins de ses clients pendant la pandémie de COVID-19.', 'contact@uber.com', 23, 1, 1),
(20, 'Uber', 'Uber est une entreprise américaine de transport privé fondée en 2009. Elle est connue pour son application mobile qui permet de réserver facilement des courses en voiture avec des conducteurs indépendants. <br>Uber est présente dans plus de 900 villes dans le monde et offre une grande variété de services, allant des trajets en voiture économiques aux trajets en limousine de luxe. Elle est également active dans la livraison de nourriture avec Uber Eats. <br>L’entreprise a connu une croissance rapide ces dernières années, mais elle a également été confrontée à de nombreux défis, notamment en matière de réglementation et de concurrence. Elle est engagée dans des initiatives pour améliorer la sécurité et le confort des passagers et des conducteurs, ainsi que pour réduire son impact environnemental. <br>Uber est également connue pour son engagement envers la diversité et l’inclusion, et elle travaille à créer un environnement de travail inclusif et équitable pour ses employés et ses partenaires. Elle est également impliquée dans des projets sociaux et communautaires pour soutenir les communautés locales dans lesquelles elle opère.', 'uber@contact.com', 15, 1, 1),
(21, 'Bouygues', 'Bouygues est un groupe industriel français fondé en 1952. Il est actif dans plusieurs domaines, notamment la construction, les télécommunications, les médias et l’énergie. <br>Dans le domaine de la construction, Bouygues est l’un des plus importants acteurs mondiaux. Il est impliqué dans des projets de grande envergure, tels que la construction d’aéroports, de ponts et de tunnels, ainsi que de nombreux projets immobiliers résidentiels et commerciaux. <br>Bouygues Telecom, la filiale de Bouygues dans les télécommunications, est l’un des principaux opérateurs de téléphonie mobile et fixe en France. Elle propose des services de haut débit, de télévision et de téléphonie mobile. <br>Le groupe est également présent dans le secteur des médias avec TF1, l’une des principales chaînes de télévision en France. Il possède également des participations dans plusieurs autres entreprises de médias. <br>Enfin, Bouygues est également actif dans le secteur de l’énergie, notamment à travers sa filiale Bouygues Energies & Services, qui fournit des services d’efficacité énergétique et de gestion de l’énergie. <br>Bouygues est reconnu pour son engagement en faveur du développement durable et de l’innovation, ainsi que pour son implication dans des projets sociaux et communautaires pour soutenir les communautés locales dans lesquelles il opère.', 'contact@bouygues.com', 10, 1, 1);
-- --------------------------------------------------------

--
-- Structure de la table `concern`
--

CREATE TABLE `concern` (
  `id_promotion` int(11) NOT NULL,
  `id_internship` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `concern`
--

INSERT INTO `concern` (`id_promotion`, `id_internship`) VALUES
(6, 1),
(2, 2),
(4, 3),
(4, 4),
(4, 5),
(8, 6),
(4, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(2, 13),
(1, 14),
(1, 15),
(1, 16),
(2, 17);

-- --------------------------------------------------------

--
-- Structure de la table `internship`
--

CREATE TABLE `internship` (
  `id_internship` int(11) NOT NULL,
  `internship_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `duration` int(11) NOT NULL,
  `salary` decimal(15,2) NOT NULL,
  `offer_date` datetime NOT NULL DEFAULT current_timestamp(),
  `places_students` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `id_company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `internship`
--

INSERT INTO `internship` (`id_internship`, `internship_name`, `description`, `duration`, `salary`, `offer_date`, `places_students`, `id_city`, `id_company`) VALUES
(1, 'Stage de fin d’étude', 'Description', 15, '1.00', '2023-03-15 20:00:00', 5, 1, 1),
(2, 'Stage - Chargé de Communication & Marque Employeur F/H - Paris', 'Rejoignez BPCE en tant que Chargé.e de Communication digitale & Marque Employeur pour un stage à partir de Mars ! Les missions c’est important, l’équipe et l’environnement aussi … ! <br><br> Vous intégrez une équipe qui vous offrira un accompagnement de proximité : 5 Responsables de projets en charge des sujets : Recrutement, Marque Employeur, Réseaux sociaux, Gestion de carrières, etc', 24, '2.00', '2023-03-21 00:00:00', 5, 5, 2),
(3, 'Cyber Security - Web Engineer (Symfony/Angular) Final Year Internship', 'Description', 15, '4.00', '2018-01-01 00:00:00', 5, 1, 1),
(4, 'Sales Development Representative - Stage', 'Nous souhaitons renforcer nos équipes pour accompagner le développement de nos clients, grands groupes à forte croissance et le lancement de nouveaux projets d’envergure. Rattaché(e) au manager commercial, vous êtes un véritable ambassadeur de la marque auprès des clients. En collaboration avec les nombreux membres de votre équipe', 15, '5.00', '2022-12-01 00:00:00', 5, 5, 1),
(5, 'Responsable junior', 'Au sein de l’équipe Opérations, notre Category Manager Junior a pour mission d’élaborer, de piloter et d’animer le catalogue produit, en collaboration avec les différentes équipes de Beebs (Marketing, Tech, Brand). Avec près de 2M de produits mis en ligne, cette mission est centrale et se concentre sur plusieurs catégories clés (Vêtements, Jeux & Jouets, Alimentaires, Maison, Puériculture…).', 15, '1.00', '2023-03-20 00:00:00', 5, 1, 2),
(6, 'Monteur(se) vidéo en stage', 'Un monteur vidéo en stage est un professionnel en formation qui travaille sur la post-production de contenus audiovisuels. Les tâches principales consistent à trier et sélectionner les images, les séquences et les sons, à les assembler pour raconter une histoire ou communiquer un message, et à effectuer des corrections, des effets visuels et des ajustements de couleurs pour améliorer la qualité globale de la production. <br>Le monteur vidéo peut travailler sur différents types de projets, tels que des vidéos publicitaires, des clips musicaux, des films, des séries télévisées, des documentaires, des vidéos d’entreprise, des vidéos de formation, des podcasts et des émissions de télévision en direct. <br>Le stage de monteur vidéo est une opportunité pour les étudiants et les jeunes professionnels de se familiariser avec les logiciels de montage, de perfectionner leurs compétences techniques et artistiques, de travailler en équipe avec d’autres professionnels de l’audiovisuel et de se familiariser avec les différentes étapes de la production audiovisuelle. Les qualités requises pour réussir dans un stage de monteur vidéo incluent la créativité, la rigueur, la capacité à travailler sous pression et la capacité à apprendre rapidement les nouvelles technologies et les outils de post-production.', 15, '5.00', '2018-01-01 00:00:00', 5, 1, 2),
(7, 'Business Developer B2B Internship - French Speaker', 'We are looking for a French native speaker Business Developer to develop and be fully in charge of the French market. You will join the adventure from the beginning, and you will contribute to the growth of the company in Europe. You will work in a multicultural company & offices (job based in the city center of Paris).<br><br> As a Business Developer B2B, you will be in charge of growing the company business on the French market.', 15, '5.00', '2018-01-01 00:00:00', 5, 5, 3),
(8, 'Assistant chef de projet', 'L’Assistant Chef de Projet est un poste central chez Walter Learning : vous êtes amené(e) à porter le produit, c’est-à-dire l’ensemble de nos formations. Ce poste, très complet, vise à assister le Chef de Projet dans son travail quotidien : stratégie de développement, choix des thèmes de formation, conception pédagogique, discussions avec les formateurs, suivi des tournages, etc.<br>En tant qu’Assistant Chef de Projet, vous portez l’ambition de l’entreprise : reconnaître de nouvelles opportunités, collaborer avec des experts dans de nombreux domaines, et surtout, préparer du contenu de haute qualité.', 15, '6.00', '2018-01-01 00:00:00', 5, 1, 3),
(9, 'Stage - Chargé de Communication & Marque Employeur F/H - Paris', 'Rejoignez BPCE en tant que Chargé.e de Communication digitale & Marque Employeur pour un stage à partir de Mars ! Les missions c’est important, l’équipe et l’environnement aussi … ! <br><br> Vous intégrez une équipe qui vous offrira un accompagnement de proximité : 5 Responsables de projets en charge des sujets : Recrutement, Marque Employeur, Réseaux sociaux, Gestion de carrières, etc', 15, '6.00', '2018-01-01 00:00:00', 5, 5, 3),
(10, 'Web Marketing - Stage', 'Un stage en Web Marketing est une opportunité pour les étudiants et les jeunes professionnels de découvrir le domaine de la promotion en ligne des produits ou services d’une entreprise. Les missions principales incluent l’analyse de la concurrence, la mise en place de stratégies de référencement, la gestion de campagnes publicitaires en ligne, la création de contenu pour les réseaux sociaux et la gestion de la présence en ligne de l’entreprise. <br>Le Web Marketing nécessite des compétences variées, telles que la maîtrise des outils de référencement naturel (SEO), de publicité en ligne (SEA), de marketing par email, de réseaux sociaux et de marketing d’influence. Les stagiaires en Web Marketing doivent également être capables d’analyser les données, de suivre les performances de leurs campagnes et de proposer des améliorations pour optimiser l’efficacité des stratégies marketing. <br>Le stage en Web Marketing est une opportunité pour les étudiants de découvrir un domaine en constante évolution, de travailler en équipe avec des professionnels expérimentés et d’apprendre à utiliser des outils et des logiciels innovants. Les qualités requises pour réussir dans un stage en Web Marketing incluent la créativité, la rigueur, la capacité à travailler sous pression, la capacité à apprendre rapidement et à s’adapter aux nouvelles technologies.', 15, '1.00', '2018-01-01 00:00:00', 5, 1, 3),
(11, 'Consultant en recrutement H/F', 'Un consultant en recrutement est un professionnel qui aide les entreprises à recruter de nouveaux talents. Les principales tâches d’un consultant en recrutement sont de rechercher des candidats, de les évaluer et de les présélectionner pour les postes vacants, ainsi que de coordonner le processus de recrutement avec les employeurs. <br>Les compétences requises pour un consultant en recrutement incluent une excellente communication orale et écrite, la capacité à comprendre les besoins des clients et des candidats, ainsi que la capacité à travailler de manière autonome et en équipe. Les consultants en recrutement doivent également être capables d’utiliser des outils de recrutement tels que les job boards, les réseaux sociaux professionnels, les bases de données de candidats et les tests d’évaluation de compétences. <br>Le stage de consultant en recrutement est une opportunité pour les étudiants et les jeunes professionnels de se familiariser avec les techniques de recrutement, d’acquérir des compétences en communication et en évaluation de candidats, et de travailler en équipe sur des projets de recrutement. Les qualités requises pour réussir dans un stage de consultant en recrutement incluent la capacité à travailler de manière autonome et en équipe, la rigueur, la créativité et la capacité à communiquer efficacement avec les candidats et les employeurs.', 20, '650.00', '2023-03-21 10:37:42', 1, 16, 14),
(12, 'Chargé d&#039;insertion (H/F)', 'Description un peu courte mais bon c&#039;est pas grave', 15, '730.00', '2023-03-21 10:37:43', 5, 18, 18),
(13, 'Porteur de café', 'Votre mission si vous l&#039;acceptez, sera d&#039;apporter le café au patron.', 20, '650.00', '2023-03-25 18:39:53', 1, 18, 17),
(14, 'Jongleur', 'Venez divertir les étudiants du campus de CESI Nice!<br><br>Un jongleur est un artiste de spectacle vivant qui utilise des objets tels que des balles, des massues, des anneaux et des quilles pour créer des mouvements acrobatiques et des séquences de jonglage. Le jongleur doit avoir une grande dextérité manuelle, une excellente coordination œil-main et une bonne concentration pour exécuter ses performances. <br>Le travail du jongleur peut varier considérablement en fonction de son domaine d’activité, allant de spectacles de rue à des représentations dans des événements spéciaux, des festivals, des parcs d’attractions, des soirées privées, des mariages, des événements d’entreprise, des émissions de télévision ou de cinéma. <br>Les compétences requises pour un emploi de jongleur incluent la capacité à apprendre rapidement de nouvelles techniques de jonglage, la capacité à travailler en équipe et à s’adapter à des environnements de travail différents. Les jongleurs peuvent travailler comme artistes indépendants ou être employés par des compagnies de cirque, des compagnies de spectacle, des entreprises événementielles ou des parcs d’attractions.', 9, '100.00', '2023-03-25 21:58:36', 5, 16, 5),
(15, 'Développeur PHP', 'Un développeur PHP est un professionnel de l’informatique spécialisé dans le développement de sites web et d’applications en utilisant le langage de programmation PHP. Les tâches principales incluent la conception, le développement, le test et la maintenance de sites web dynamiques et d’applications web basées sur des technologies telles que MySQL, HTML, CSS et JavaScript. Les développeurs PHP travaillent souvent en équipe avec des designers, des architectes système et des chefs de projet pour concevoir et implémenter des solutions de développement web efficaces et performantes. <br>Les compétences requises pour un développeur PHP incluent la maîtrise du langage de programmation PHP, la connaissance des frameworks PHP tels que Laravel, Symfony, CodeIgniter et Yii, ainsi que la compréhension de l’architecture web et de la sécurité des données. Les développeurs PHP doivent également être capables de travailler avec des outils de gestion de code tels que Git et SVN, ainsi que d’utiliser des outils de développement intégrés tels que PHPStorm ou Visual Studio Code. <br>Le stage de développeur PHP est une opportunité pour les étudiants et les jeunes professionnels de se familiariser avec les technologies de développement web, d’acquérir des compétences en programmation et en résolution de problèmes, de travailler en équipe sur des projets de développement, et de se familiariser avec les dernières tendances et technologies du secteur. Les qualités requises pour réussir dans un stage de développeur PHP incluent la capacité à travailler en équipe, la rigueur, la créativité, la capacité à apprendre rapidement et à s’adapter aux nouvelles technologies.', 20, '650.00', '2023-03-21 10:37:42', 1, 16, 14),
(16, 'Développeur Java', 'Un développeur Java est un professionnel de l’informatique spécialisé dans le développement d’applications en utilisant le langage de programmation Java. Les tâches principales incluent la conception, le développement, le test et la maintenance d’applications Java, de sites web et d’applications mobiles. Les développeurs Java travaillent souvent en équipe avec des designers, des architectes système et des chefs de projet pour concevoir et implémenter des solutions logicielles efficaces et performantes. <br>Les compétences requises pour un développeur Java incluent la maîtrise du langage de programmation Java, la connaissance des frameworks Java tels que Spring, Hibernate, Struts et JavaServer Faces, ainsi que la compréhension de l’architecture logicielle et de la sécurité des données. Les développeurs Java doivent également être capables de travailler avec des outils de gestion de code tels que Git et SVN, ainsi que d’utiliser des environnements de développement intégrés tels que Eclipse ou NetBeans. <br>Le stage de développeur Java est une opportunité pour les étudiants et les jeunes professionnels de se familiariser avec les technologies de développement d’applications, d’acquérir des compétences en programmation et en résolution de problèmes, de travailler en équipe sur des projets de développement, et de se familiariser avec les dernières tendances et technologies du secteur. Les qualités requises pour réussir dans un stage de développeur Java incluent la capacité à travailler en équipe, la rigueur, la créativité, la capacité à apprendre rapidement et à s’adapter aux nouvelles technologies.', 25, '1550.00', '2023-03-21 10:37:42', 1, 16, 14),
(17, 'Full Stack Engineer - Node.js/Vue.js', 'Un ingénieur Full Stack est un professionnel qui possède des compétences à la fois en développement front-end et back-end. Pour ce poste, les compétences spécifiques en Node.js et Vue.js sont requises. Node.js est un environnement d’exécution JavaScript côté serveur qui permet aux développeurs de créer des applications web en utilisant JavaScript pour le back-end. Vue.js est un framework JavaScript qui permet de construire des interfaces utilisateur interactives et dynamiques pour les applications web.<br><br>Les principales responsabilités d’un ingénieur Full Stack incluent la conception, le développement et la maintenance de logiciels, ainsi que la résolution de problèmes liés à l’architecture du système. Les compétences requises pour ce poste incluent une excellente connaissance de JavaScript, ainsi que des compétences en programmation back-end et front-end. Les ingénieurs Full Stack doivent également être capables de travailler avec des bases de données, des API, des outils de développement web et des services cloud.<br><br>Un ingénieur Full Stack avec des compétences en Node.js et Vue.js sera responsable de la création de sites web dynamiques et performants, ainsi que de la conception de solutions techniques efficaces pour répondre aux besoins des utilisateurs. Les tâches spécifiques incluent la conception de l’architecture back-end, le développement de l’interface utilisateur avec Vue.js, l’optimisation des performances et l’intégration de services tiers.<br><br>Ce poste est idéal pour les professionnels passionnés par le développement web, la programmation et les technologies émergentes. Les qualités requises pour réussir en tant qu’ingénieur Full Stack incluent une solide connaissance de JavaScript, de bonnes compétences en communication et une capacité à travailler efficacement en équipe.', 25, '150.00', '2023-03-21 10:37:42', 1, 16, 14);

-- --------------------------------------------------------

--
-- Structure de la table `is_in`
--

CREATE TABLE `is_in` (
  `id_user` int(11) NOT NULL,
  `id_promotion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `is_in`
--

INSERT INTO `is_in` (`id_user`, `id_promotion`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 8),
(5, 2),
(6, 2),
(7, 1),
(8, 1),
(9, 2),
(10, 2),
(11, 1),
(11, 2),
(11, 10);

-- --------------------------------------------------------

--
-- Structure de la table `need`
--

CREATE TABLE `need` (
  `id_internship` int(11) NOT NULL,
  `id_skill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `need`
--

INSERT INTO `need` (`id_internship`, `id_skill`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 21),
(3, 29),
(4, 19),
(5, 1),
(6, 15),
(7, 34),
(8, 31),
(8, 33),
(9, 27),
(10, 13),
(11, 10),
(12, 1),
(12, 13),
(12, 14),
(12, 15),
(12, 26),
(12, 40),
(17, 1),
(15, 2),
(13, 3),
(13, 5),
(13, 6),
(14, 7),
(15, 1),
(16, 18),
(17, 19);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `id_promotion` int(11) NOT NULL,
  `promotion_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`id_promotion`, `promotion_name`) VALUES
(1, 'A1'),
(4, 'A2 BTP'),
(3, 'A2 Généraliste'),
(2, 'A2 Informatique'),
(5, 'A2 S3E'),
(8, 'A3 BTP'),
(7, 'A3 Généraliste'),
(6, 'A3 Informatique'),
(9, 'A3 S3E'),
(12, 'A4 BTP'),
(11, 'A4 Généraliste'),
(10, 'A4 Informatique'),
(13, 'A4 S3E'),
(16, 'A5 BTP'),
(15, 'A5 Généraliste'),
(14, 'A5 Informatique'),
(17, 'A5 S3E');

-- --------------------------------------------------------

--
-- Structure de la table `rate`
--

CREATE TABLE `rate` (
  `id_user` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `evaluation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rate`
--

INSERT INTO `rate` (`id_user`, `id_company`, `evaluation`) VALUES
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
(6, 2, 2),
(6, 3, 5),
(6, 5, 3),
(6, 18, 2),
(7, 1, 5),
(7, 2, 5),
(7, 3, 5);

-- --------------------------------------------------------

--
-- Structure de la table `remember`
--

CREATE TABLE `remember` (
  `id_user` int(11) NOT NULL,
  `remember_token` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sector`
--

CREATE TABLE `sector` (
  `id_sector` int(11) NOT NULL,
  `sector_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sector`
--

INSERT INTO `sector` (`id_sector`, `sector_name`) VALUES
(3, 'BTP'),
(2, 'Généraliste'),
(1, 'Informatique'),
(4, 'S3E');

-- --------------------------------------------------------

--
-- Structure de la table `skill`
--

CREATE TABLE `skill` (
  `id_skill` int(11) NOT NULL,
  `skill_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `skill`
--

INSERT INTO `skill` (`id_skill`, `skill_name`) VALUES
(2, 'Allemand'),
(1, 'Anglais'),
(7, 'Arabe'),
(26, 'Assembleur'),
(25, 'Bash'),
(13, 'C'),
(14, 'C#'),
(15, 'C++'),
(5, 'Chinois'),
(10, 'CSS'),
(36, 'Dart'),
(35, 'Elixir'),
(34, 'Erlang'),
(3, 'Espagnol'),
(32, 'Go'),
(30, 'Haskell'),
(9, 'HTML'),
(4, 'Italien'),
(6, 'Japonais'),
(16, 'Java'),
(11, 'Javascript'),
(37, 'Kotlin'),
(27, 'Lua'),
(28, 'Matlab'),
(21, 'MySQL'),
(38, 'Objective-C'),
(22, 'Oracle'),
(12, 'PHP'),
(23, 'PostgreSQL'),
(24, 'PowerShell'),
(31, 'Prolog'),
(17, 'Python'),
(18, 'Ruby'),
(8, 'Russe'),
(33, 'Rust'),
(29, 'Scala'),
(40, 'Scratch'),
(20, 'SQL'),
(19, 'Swift'),
(39, 'Visual Basic');

-- --------------------------------------------------------

--
-- Structure de la table `trust`
--

CREATE TABLE `trust` (
  `id_user` int(11) NOT NULL,
  `id_company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `trust`
--

INSERT INTO `trust` (`id_user`, `id_company`) VALUES
(3, 1),
(6, 1),
(6, 2),
(6, 16),
(6, 18),
(11, 1),
(11, 2),
(11, 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_pilot` tinyint(1) NOT NULL DEFAULT 0,
  `id_center` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `first_name`, `last_name`, `email`, `password`, `is_admin`, `is_pilot`, `id_center`) VALUES
(1, 'Jean', 'Dupont', 'jean.dupond@viacesi.fr', '$2y$10$0/heedOXDnuIDXrfXk4P5ekGTcJc35KYnbLzQl8N.vN4LzmXbIqri', 0, 0, 1),
(2, 'Pierre', 'Durand', 'pierre.durand@viacesi.fr', '$2y$10$0/heedOXDnuIDXrfXk4P5ekGTcJc35KYnbLzQl8N.vN4LzmXbIqri', 0, 0, 2),
(3, 'Paul', 'Martin', 'paul.martin@viacesi.fr', '$2y$10$0/heedOXDnuIDXrfXk4P5ekGTcJc35KYnbLzQl8N.vN4LzmXbIqri', 0, 0, 11),
(4, 'Sylvain', 'Dupont', 'sylvain.dupond@viacesi.fr', '$2y$10$0/heedOXDnuIDXrfXk4P5ekGTcJc35KYnbLzQl8N.vN4LzmXbIqri', 0, 0, 5),
(5, 'Nathan', 'Ferrer', 'nathan.ferrer@viacesi.fr', '$2y$10$xbkhkJEeDWHTLb2XK4htxuv..SEg6d1.LJcBSCMHNA4Q8lDTKHLkm', 1, 0, 20),
(6, 'Fabien', 'Arrighi', 'fabien.arrighi@viacesi.fr', '$2y$10$0/heedOXDnuIDXrfXk4P5ekGTcJc35KYnbLzQl8N.vN4LzmXbIqri', 1, 0, 16),
(7, 'Raphaël', 'Attal', 'raphael.attal@viacesi.fr', '$2y$10$0/heedOXDnuIDXrfXk4P5ekGTcJc35KYnbLzQl8N.vN4LzmXbIqri', 0, 0, 16),
(8, 'Valentin', 'Girod', 'valentin.girod@viacesi.fr', '$2y$10$0/heedOXDnuIDXrfXk4P5ekGTcJc35KYnbLzQl8N.vN4LzmXbIqri', 0, 0, 16),
(9, 'Thomas', 'Cordier', 'thomas.cordier@viacesi.fr', '$2y$10$0/heedOXDnuIDXrfXk4P5ekGTcJc35KYnbLzQl8N.vN4LzmXbIqri', 0, 0, 16),
(10, 'Malek', 'Nasri', 'malek.nasri@viacesi.fr', '$2y$10$0/heedOXDnuIDXrfXk4P5ekGTcJc35KYnbLzQl8N.vN4LzmXbIqri', 0, 0, 16),
(11, 'Youssef', 'Abou-msallem', 'yaboumsallem@cesi.fr', '$2y$10$0/heedOXDnuIDXrfXk4P5ekGTcJc35KYnbLzQl8N.vN4LzmXbIqri', 0, 1, 16),
(12, 'Paul', 'Gouze', 'paul.gouze@viacesi.fr', '$2y$10$0/heedOXDnuIDXrfXk4P5ekGTcJc35KYnbLzQl8N.vN4LzmXbIqri', 0, 1, 16),
(13, 'Vincent', 'Berthaud', 'vincent.berthaud@viacesi.fr', '$2y$10$0/heedOXDnuIDXrfXk4P5ekGTcJc35KYnbLzQl8N.vN4LzmXbIqri', 0, 1, 16);

-- --------------------------------------------------------

--
-- Structure de la table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_user` int(11) NOT NULL,
  `id_internship` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `wishlist`
--

INSERT INTO `wishlist` (`id_user`, `id_internship`) VALUES
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
(5, 8),
(6, 1),
(6, 2),
(6, 4),
(6, 5),
(6, 6),
(6, 11),
(6, 12);

-- --------------------------------------------------------

--
-- Structure de la table `work_at`
--

CREATE TABLE `work_at` (
  `id_company` int(11) NOT NULL,
  `id_city` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `work_at`
--

INSERT INTO `work_at` (`id_company`, `id_city`) VALUES
(1, 1),
(2, 5),
(2, 19),
(3, 1),
(3, 25),
(4, 14),
(5, 18),
(6, 10),
(7, 20),
(7, 23),
(8, 12),
(9, 18),
(10, 15),
(11, 17),
(11, 22),
(12, 20),
(14, 2),
(14, 19),
(15, 10),
(16, 8),
(17, 3),
(17, 4),
(17, 15),
(18, 14);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id_user`,`id_internship`),
  ADD KEY `candidate_ibfk_2` (`id_internship`);

--
-- Index pour la table `center`
--
ALTER TABLE `center`
  ADD PRIMARY KEY (`id_center`),
  ADD UNIQUE KEY `center_name` (`center_name`);

--
-- Index pour la table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id_city`);

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`),
  ADD KEY `id_sector` (`id_sector`);

--
-- Index pour la table `concern`
--
ALTER TABLE `concern`
  ADD PRIMARY KEY (`id_promotion`,`id_internship`),
  ADD KEY `id_internship` (`id_internship`);


--
-- Index pour la table `internship`
--
ALTER TABLE `internship`
  ADD PRIMARY KEY (`id_internship`),
  ADD KEY `id_city` (`id_city`),
  ADD KEY `id_company` (`id_company`);

--
-- Index pour la table `is_in`
--
ALTER TABLE `is_in`
  ADD PRIMARY KEY (`id_user`,`id_promotion`),
  ADD KEY `is_in_ibfk_2` (`id_promotion`);

--
-- Index pour la table `need`
--
ALTER TABLE `need`
  ADD PRIMARY KEY (`id_internship`,`id_skill`),
  ADD KEY `need_ibfk_2` (`id_skill`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id_promotion`),
  ADD UNIQUE KEY `promotion_name` (`promotion_name`);

--
-- Index pour la table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id_user`,`id_company`),
  ADD KEY `id_company` (`id_company`);

--
-- Index pour la table `remember`
--
ALTER TABLE `remember`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id_sector`),
  ADD UNIQUE KEY `sector_name` (`sector_name`);

--
-- Index pour la table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id_skill`),
  ADD UNIQUE KEY `skill_name` (`skill_name`);

--
-- Index pour la table `trust`
--
ALTER TABLE `trust`
  ADD PRIMARY KEY (`id_user`,`id_company`),
  ADD KEY `id_company` (`id_company`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_center` (`id_center`);

--
-- Index pour la table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_user`,`id_internship`),
  ADD KEY `wishlist_ibfk_2` (`id_internship`);

--
-- Index pour la table `work_at`
--
ALTER TABLE `work_at`
  ADD PRIMARY KEY (`id_company`,`id_city`),
  ADD KEY `work_at_ibfk_2` (`id_city`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `center`
--
ALTER TABLE `center`
  MODIFY `id_center` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `city`
--
ALTER TABLE `city`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;


--
-- AUTO_INCREMENT pour la table `internship`
--
ALTER TABLE `internship`
  MODIFY `id_internship` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id_promotion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `sector`
--
ALTER TABLE `sector`
  MODIFY `id_sector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `skill`
--
ALTER TABLE `skill`
  MODIFY `id_skill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `candidate_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `candidate_ibfk_2` FOREIGN KEY (`id_internship`) REFERENCES `internship` (`id_internship`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`id_sector`) REFERENCES `sector` (`id_sector`);

--
-- Contraintes pour la table `concern`
--
ALTER TABLE `concern`
  ADD CONSTRAINT `concern_ibfk_1` FOREIGN KEY (`id_promotion`) REFERENCES `promotion` (`id_promotion`),
  ADD CONSTRAINT `concern_ibfk_2` FOREIGN KEY (`id_internship`) REFERENCES `internship` (`id_internship`);

--
-- Contraintes pour la table `internship`
--
ALTER TABLE `internship`
  ADD CONSTRAINT `internship_ibfk_1` FOREIGN KEY (`id_city`) REFERENCES `city` (`id_city`),
  ADD CONSTRAINT `internship_ibfk_2` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`);

--
-- Contraintes pour la table `is_in`
--
ALTER TABLE `is_in`
  ADD CONSTRAINT `is_in_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_in_ibfk_2` FOREIGN KEY (`id_promotion`) REFERENCES `promotion` (`id_promotion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `need`
--
ALTER TABLE `need`
  ADD CONSTRAINT `need_ibfk_1` FOREIGN KEY (`id_internship`) REFERENCES `internship` (`id_internship`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `need_ibfk_2` FOREIGN KEY (`id_skill`) REFERENCES `skill` (`id_skill`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `rate_ibfk_2` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`);

--
-- Contraintes pour la table `remember`
--
ALTER TABLE `remember`
  ADD CONSTRAINT `remember_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `trust`
--
ALTER TABLE `trust`
  ADD CONSTRAINT `trust_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `trust_ibfk_2` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_center`) REFERENCES `center` (`id_center`);

--
-- Contraintes pour la table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`id_internship`) REFERENCES `internship` (`id_internship`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `work_at`
--
ALTER TABLE `work_at`
  ADD CONSTRAINT `work_at_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `work_at_ibfk_2` FOREIGN KEY (`id_city`) REFERENCES `city` (`id_city`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
