<?php
$nom = "Hajar Dahbi";
$poste = "Développeur Web Full Stack";
$email = "dahbihajar213@gmail.com";
$github = "https://github.com/hajaardhb";

$modules = [
    [
        "code" => "M201",
        "titre" => "Préparation d'un projet web",
        "description" => "Analyse du besoin, cahier des charges, planification et organisation d'un projet web."
    ],
    [
        "code" => "M202",
        "titre" => "Approche agile",
        "description" => "Utilisation de la méthode Agile, gestion des tâches, sprints et suivi de projet."
    ],
    [
        "code" => "M203",
        "titre" => "Gestion des données",
        "description" => "Conception de bases de données, SQL, relations entre les tables et manipulation des données."
    ],
    [
        "code" => "M204",
        "titre" => "Développement front-end",
        "description" => "Création d'interfaces modernes avec HTML, CSS, JavaScript et responsive design."
    ],
    [
        "code" => "M205",
        "titre" => "Développement back-end",
        "description" => "Développement serveur avec PHP, gestion des formulaires et connexion à une base de données."
    ],
    [
        "code" => "M206",
        "titre" => "Création d'une application Cloud native",
        "description" => "Découverte du cloud, des API, du déploiement et des applications évolutives."
    ],
    [
        "code" => "M207",
        "titre" => "Projet de synthèse",
        "description" => "Réalisation d'un projet complet mettant en pratique les compétences acquises."
    ]
];

$competences = [
    "PHP",
    "HTML5",
    "CSS3",
    "JavaScript",
    "MySQL",
    "Git & GitHub",
    "Responsive Design",
    "Méthode Agile"
];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description"
          content="Portfolio professionnel de Hajar Dahbi">

    <title><?= htmlspecialchars($nom); ?> - Portfolio</title>

    <style>
        :root {
            --dark: #3f3a3a;
            --dark-light: #5c5555;

            --primary: #b0c4b1;
            --primary-dark: #8fa993;
            --primary-light: #edafb8;

            --beige: #f7e1d7;
            --gray-beige: #dedbd2;

            --text: #514949;
            --muted: #766f6f;
            --white: #ffffff;
            --background: #f7e1d7;
            --border: #dedbd2;

            --shadow: 0 10px 30px rgba(63, 58, 58, 0.12);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            color: var(--text);
            background: var(--white);
            line-height: 1.6;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .container {
            width: 90%;
            max-width: 1150px;
            margin: auto;
        }

        /* Navigation */

        header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: var(--white);
            border-bottom: 1px solid var(--border);
        }

        nav {
            min-height: 75px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            color: var(--dark);
            font-size: 1.6rem;
            font-weight: bold;
        }

        .logo span {
            color: var(--primary-dark);
        }

        .nav-links {
            display: flex;
            gap: 25px;
            list-style: none;
        }

        .nav-links a {
            color: var(--text);
            font-size: 0.95rem;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary-dark);
        }

        /* Accueil */

        .hero {
            padding: 110px 0;
            background: linear-gradient(
                135deg,
                var(--beige),
                var(--white)
            );
        }

        .hero-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 50px;
        }

        .hero-text {
            max-width: 650px;
        }

        .subtitle,
        .section-label {
            margin-bottom: 12px;
            color: var(--primary-dark);
            font-size: 0.85rem;
            font-weight: bold;
            letter-spacing: 1.5px;
        }

        .hero h1 {
            margin-bottom: 8px;
            color: var(--dark);
            font-size: 3.5rem;
        }

        .hero h2 {
            margin-bottom: 20px;
            color: var(--primary-dark);
            font-size: 1.5rem;
            font-weight: normal;
        }

        .hero-description {
            max-width: 570px;
            color: var(--muted);
            font-size: 1.1rem;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            padding: 13px 22px;
            border-radius: 6px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-primary {
            color: var(--dark);
            background: var(--primary);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-secondary {
            color: var(--dark);
            background: var(--white);
            border: 1px solid var(--border);
        }

        .btn-secondary:hover {
            background: var(--primary-light);
        }

        .hero-card {
            width: 280px;
            padding: 40px 25px;
            color: var(--white);
            background: var(--dark);
            border-radius: 12px;
            text-align: center;
            box-shadow: var(--shadow);
        }

        .profile-icon {
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: var(--dark);
            background: var(--primary-light);
            border-radius: 50%;
            font-size: 2rem;
            font-weight: bold;
        }

        .hero-card h3 {
            margin-bottom: 8px;
        }

        .hero-card p {
            color: var(--gray-beige);
        }

        /* Sections */

        .section {
            padding: 90px 0;
        }

        .section-light {
            background: var(--background);
        }

        .section-header {
            max-width: 650px;
            margin: 0 auto 45px;
            text-align: center;
        }

        .section h2 {
            margin-bottom: 15px;
            color: var(--dark);
            font-size: 2.2rem;
        }

        .section-header p:last-child {
            color: var(--muted);
        }

        /* À propos */

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 70px;
            align-items: start;
        }

        .about-text {
            color: var(--muted);
        }

        .about-text p {
            margin-bottom: 18px;
        }

        /* Modules */

        .modules-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .module-card {
            padding: 28px;
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(63, 58, 58, 0.06);
            transition: 0.3s;
        }

        .module-card:hover {
            border-color: var(--primary);
            transform: translateY(-6px);
            box-shadow: var(--shadow);
        }

        .module-code {
            display: inline-block;
            margin-bottom: 18px;
            padding: 6px 12px;
            color: var(--dark);
            background: var(--primary-light);
            border-radius: 5px;
            font-size: 0.85rem;
            font-weight: bold;
        }

        .module-card h3 {
            margin-bottom: 12px;
            color: var(--dark);
            font-size: 1.1rem;
        }

        .module-card p {
            margin-bottom: 18px;
            color: var(--muted);
            font-size: 0.95rem;
        }

        .module-link {
            color: var(--primary-dark);
            font-size: 0.9rem;
            font-weight: bold;
        }

        /* Compétences */

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 14px;
            max-width: 800px;
            margin: auto;
        }

        .skill {
            padding: 12px 20px;
            color: var(--dark);
            background: var(--gray-beige);
            border-radius: 30px;
            font-size: 0.95rem;
            font-weight: bold;
        }

        /* Contact */

        .contact-section {
            color: var(--white);
            background: var(--dark);
        }

        .contact-section h2 {
            color: var(--white);
        }

        .contact-section .section-label {
            color: var(--primary-light);
        }

        .contact-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
        }

        .contact-content p {
            color: var(--gray-beige);
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 15px;
            text-align: right;
        }

        .contact-link {
            color: var(--primary-light);
            transition: 0.3s;
        }

        .contact-link:hover {
            color: var(--white);
        }

        /* Footer */

        footer {
            padding: 25px 0;
            color: var(--gray-beige);
            background: #302c2c;
            font-size: 0.85rem;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        /* Responsive */

        @media (max-width: 850px) {
            nav {
                flex-direction: column;
                gap: 15px;
                padding: 18px 0;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 12px;
            }

            .hero-content,
            .contact-content {
                flex-direction: column;
                align-items: flex-start;
            }

            .hero {
                padding: 80px 0;
            }

            .hero h1 {
                font-size: 2.7rem;
            }

            .hero-card {
                align-self: center;
                width: 100%;
                max-width: 350px;
            }

            .modules-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .contact-info {
                text-align: left;
            }

            .footer-content {
                flex-direction: column;
            }
        }

        @media (max-width: 550px) {
            .hero-buttons {
                flex-direction: column;
            }

            .btn {
                text-align: center;
            }

            .about-content,
            .modules-grid {
                grid-template-columns: 1fr;
            }

            .section h2 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <header>
        <nav class="container">
            <a href="#accueil" class="logo">
                Hajar<span>.</span>
            </a>

            <ul class="nav-links">
                <li><a href="#accueil">Accueil</a></li>
                <li><a href="#apropos">À propos</a></li>
                <li><a href="#modules">Modules</a></li>
                <li><a href="#competences">Compétences</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>

        <!-- Accueil -->
        <section id="accueil" class="hero">
            <div class="container hero-content">

                <div class="hero-text">
                    <p class="subtitle">Bonjour, je suis</p>

                    <h1>
                        <?= htmlspecialchars($nom); ?>
                    </h1>

                    <h2>
                        <?= htmlspecialchars($poste); ?>
                    </h2>

                    <p class="hero-description">
                        Passionnée par la création d'applications web modernes,
                        performantes et faciles à utiliser.
                    </p>

                    <div class="hero-buttons">
                        <a href="#modules" class="btn btn-primary">
                            Découvrir mon parcours
                        </a>

                        <a href="<?= htmlspecialchars($github); ?>"
                           target="_blank"
                           class="btn btn-secondary">
                            Mon GitHub
                        </a>
                    </div>
                </div>

                <div class="hero-card">
                    <div class="profile-icon">&lt;/&gt;</div>
                    <h3>Développeuse Web</h3>
                    <p>Créative, organisée et motivée</p>
                </div>

            </div>
        </section>

        <!-- À propos -->
        <section id="apropos" class="section">
            <div class="container about-content">

                <div>
                    <p class="section-label">À PROPOS DE MOI</p>
                    <h2>Une développeuse passionnée par le web</h2>
                </div>

                <div class="about-text">
                    <p>
                        Je suis Hajar Dahbi, développeuse web en formation.
                        Je m'intéresse au développement front-end,
                        au développement back-end et à la gestion des données.
                    </p>

                    <p>
                        Mon objectif est de créer des applications web
                        simples, modernes, accessibles et adaptées aux besoins
                        des utilisateurs.
                    </p>
                </div>

            </div>
        </section>

        <!-- Modules -->
        <section id="modules" class="section section-light">
            <div class="container">

                <div class="section-header">
                    <p class="section-label">MON PARCOURS</p>
                    <h2>Modules de formation</h2>
                    <p>
                        Les compétences développées durant mon parcours.
                    </p>
                </div>

                <div class="modules-grid">
                    <?php foreach ($modules as $module): ?>
                        <article class="module-card">

                            <div class="module-code">
                                <?= htmlspecialchars($module["code"]); ?>
                            </div>

                            <h3>
                                <?= htmlspecialchars($module["titre"]); ?>
                            </h3>

                            <p>
                                <?= htmlspecialchars($module["description"]); ?>
                            </p>

                            <a href="#contact" class="module-link">
                                En savoir plus →
                            </a>

                        </article>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>

        <!-- Compétences -->
        <section id="competences" class="section">
            <div class="container">

                <div class="section-header">
                    <p class="section-label">MES COMPÉTENCES</p>
                    <h2>Technologies utilisées</h2>
                </div>

                <div class="skills-list">
                    <?php foreach ($competences as $competence): ?>
                        <span class="skill">
                            <?= htmlspecialchars($competence); ?>
                        </span>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>

        <!-- Contact -->
        <section id="contact" class="section contact-section">
            <div class="container contact-content">

                <div>
                    <p class="section-label">CONTACT</p>
                    <h2>Travaillons ensemble</h2>

                    <p>
                        Vous avez un projet ou une question ?
                        N'hésitez pas à me contacter.
                    </p>
                </div>

                <div class="contact-info">
                    <a href="mailto:<?= htmlspecialchars($email); ?>"
                       class="contact-link">
                        <?= htmlspecialchars($email); ?>
                    </a>

                    <a href="<?= htmlspecialchars($github); ?>"
                       target="_blank"
                       class="contact-link">
                        github.com/hajaardhb
                    </a>
                </div>

            </div>
        </section>

    </main>

    <!-- Pied de page -->
    <footer>
        <div class="container footer-content">
            <p>
                © <?= date("Y"); ?>
                <?= htmlspecialchars($nom); ?>.
                Tous droits réservés.
            </p>

            <p>
                Portfolio réalisé avec PHP, HTML et CSS.
            </p>
        </div>
    </footer>

</body>

</html>
