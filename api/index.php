<?php
$nom = "Dahbi";
$prenom = "Hajar";
$metier = "Développeur Web";
/*
|--------------------------------------------------------------------------
| MODULES + ATELIERS
|--------------------------------------------------------------------------
| Pour ajouter un atelier :
|
| 1. Mets le PDF dans le dossier correspondant.
| 2. Ajoute son nom et son chemin ici.
|
*/
$modules = [
    [
        "code" => "M201",
        "title" => "Préparation d'un projet web",
        "description" => "Analyse des besoins, cahier des charges, conception et organisation d'un projet web.",
        "ateliers" => [
            [
                "title" => "Atelier 1 - Analyse du projet",
                "file" => "docs/Dahbi_Hajar_Atelier_UML_Immobilier.pdf"
            ],
            [
                "title" => "Atelier 2 - Cahier des charges",
                "file" => "pdf/M201/atelier2.pdf"
            ]
        ]
    ],
    [
        "code" => "M202",
        "title" => "Développement Front-End",
        "description" => "Création d'interfaces web avec HTML, CSS et JavaScript.",
        "ateliers" => [
            [
                "title" => "Atelier 1 - HTML & CSS",
                "file" => "pdf/M202/atelier1.pdf"
            ],
            [
                "title" => "Atelier 2 - JavaScript",
                "file" => "pdf/M202/atelier2.pdf"
            ]
        ]
    ],
    [
        "code" => "M203",
        "title" => "Développement Back-End",
        "description" => "Développement des fonctionnalités côté serveur et gestion des données.",
        "ateliers" => [
            [
                "title" => "Atelier 1 - PHP",
                "file" => "pdf/M203/atelier1.pdf"
            ]
        ]
    ],
    [
        "code" => "M204",
        "title" => "Bases de données",
        "description" => "Conception, organisation et manipulation des bases de données.",
        "ateliers" => [
            [
                "title" => "Atelier 1 - SQL",
                "file" => "pdf/M204/atelier1.pdf"
            ]
        ]
    ],
    [
        "code" => "M205",
        "title" => "Développement Web",
        "description" => "Mise en pratique des technologies et outils du développement web.",
        "ateliers" => [
            [
                "title" => "Atelier 1",
                "file" => "pdf/M205/atelier1.pdf"
            ]
        ]
    ],
    [
        "code" => "M206",
        "title" => "Projet de synthèse",
        "description" => "Réalisation d'un projet web complet en utilisant les compétences acquises.",
        "ateliers" => [
            [
                "title" => "Atelier 1",
                "file" => "pdf/M206/atelier1.pdf"
            ]
        ]
    ],
    [
        "code" => "M207",
        "title" => "Communication professionnelle",
        "description" => "Communication, présentation et préparation à l'insertion professionnelle.",
        "ateliers" => [
            [
                "title" => "Atelier 1",
                "file" => "pdf/M207/atelier1.pdf"
            ]
        ]
    ]
];
/*
|--------------------------------------------------------------------------
| FORMULAIRE DE CONTACT
|--------------------------------------------------------------------------
*/
$message_envoye = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom_contact = htmlspecialchars($_POST["nom"] ?? "");
    $email_contact = htmlspecialchars($_POST["email"] ?? "");
    $message_contact = htmlspecialchars($_POST["message"] ?? "");
    if (
        !empty($nom_contact) &&
        !empty($email_contact) &&
        !empty($message_contact)
    ) {
        $message_envoye = true;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Portfolio - <?= htmlspecialchars($prenom . " " . $nom) ?>
    </title>
    <style>
        /* ==============================
           VARIABLES
        ============================== */
        :root {
            --rose: #EDAFB8;
            --rose-clair: #F7E1D7;
            --beige: #DEDBD2;
            --vert: #B0C4B1;
            --texte: #3f403d;
            --blanc: #ffffff;
        }
        /* ==============================
           RESET
        ============================== */
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
            background: #ffffff;
            color: var(--texte);
            line-height: 1.6;
        }
        /* ==============================
           NAVBAR
        ============================== */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 8%;
            z-index: 1000;
            border-bottom: 1px solid var(--beige);
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: var(--rose);
        }
        nav ul {
            list-style: none;
            display: flex;
            gap: 30px;
        }
        nav ul li a {
            text-decoration: none;
            color: var(--texte);
            font-weight: 500;
            transition: 0.3s;
        }
        nav ul li a:hover {
            color: var(--rose);
        }
        /* ==============================
           HERO
        ============================== */
        .hero {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 120px 20px 80px;
            background:
                linear-gradient(
                    135deg,
                    var(--rose-clair),
                    #ffffff,
                    var(--beige)
                );
        }
        .hero-content {
            max-width: 800px;
        }
        .hero h1 {
            font-size: 55px;
            margin-bottom: 20px;
        }
        .hero h1 span {
            color: var(--rose);
        }
        .hero h2 {
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: 500;
        }
        .hero p {
            font-size: 18px;
            margin-bottom: 30px;
        }
        .btn {
            display: inline-block;
            padding: 12px 25px;
            background: var(--rose);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            transition: 0.3s;
        }
        .btn:hover {
            background: var(--vert);
            transform: translateY(-2px);
        }
        /* ==============================
           SECTIONS
        ============================== */
        section {
            padding: 90px 8%;
            background: #ffffff;
        }
        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }
        .section-title h2 {
            font-size: 35px;
            margin-bottom: 10px;
        }
        .section-title p {
            color: #777;
        }
        /* ==============================
           ABOUT
        ============================== */
        .about {
            max-width: 900px;
            margin: auto;
            text-align: center;
        }
        .about p {
            font-size: 17px;
            margin-bottom: 15px;
        }
        /* ==============================
           MODULES
        ============================== */
        .modules {
            background: var(--rose-clair);
        }
        .modules-container {
            max-width: 1200px;
            margin: auto;
            display: grid;
            grid-template-columns:
                repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }
        .module-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow:
                0 5px 20px rgba(0, 0, 0, 0.05);
            transition: 0.3s;
        }
        .module-card:hover {
            transform: translateY(-5px);
        }
        .module-code {
            display: inline-block;
            background: var(--vert);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            margin-bottom: 15px;
        }
        .module-card h3 {
            margin-bottom: 10px;
            font-size: 21px;
        }
        .module-card p {
            color: #666;
        }
        /* ==============================
           ATELIERS
        ============================== */
        .ateliers {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid var(--beige);
        }
        .ateliers h4 {
            margin-bottom: 12px;
            font-size: 17px;
        }
        .atelier-btn {
            display: block;
            margin-bottom: 8px;
            padding: 10px 14px;
            background: var(--rose-clair);
            color: var(--texte);
            text-decoration: none;
            border-radius: 10px;
            transition: 0.3s;
        }
        .atelier-btn:hover {
            background: var(--rose);
            transform: translateY(-2px);
        }
        /* ==============================
           COMPETENCES
        ============================== */
        .skills-container {
            max-width: 1000px;
            margin: auto;
            display: grid;
            grid-template-columns:
                repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        .skill {
            background: var(--beige);
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            font-weight: bold;
        }
        .skill:nth-child(even) {
            background: var(--vert);
        }
        /* ==============================
           PROJETS
        ============================== */
        .projects {
            background: var(--rose-clair);
        }
        .projects-container {
            max-width: 1100px;
            margin: auto;
            display: grid;
            grid-template-columns:
                repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }
        .project-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow:
                0 5px 20px rgba(0, 0, 0, 0.05);
        }
        .project-card h3 {
            margin-bottom: 12px;
        }
        .project-card p {
            color: #666;
            margin-bottom: 20px;
        }
        /* ==============================
           CONTACT
        ============================== */
        .contact-container {
            max-width: 700px;
            margin: auto;
        }
        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 14px;
            border: 1px solid var(--beige);
            border-radius: 10px;
            font-family: inherit;
            outline: none;
        }
        .contact-form input:focus,
        .contact-form textarea:focus {
            border-color: var(--rose);
        }
        .contact-form textarea {
            min-height: 150px;
            resize: vertical;
        }
        .contact-form button {
            border: none;
            padding: 14px;
            background: var(--rose);
            color: white;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }
        .contact-form button:hover {
            background: var(--vert);
        }
        .success-message {
            background: var(--vert);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
        }
        /* ==============================
           FOOTER
        ============================== */
        footer {
            background: var(--beige);
            text-align: center;
            padding: 25px;
            margin-top: 0;
        }
        /* ==============================
           RESPONSIVE
        ============================== */
        @media (max-width: 768px) {
            nav {
                flex-direction: column;
                gap: 15px;
            }
            nav ul {
                gap: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }
            .hero h1 {
                font-size: 40px;
            }
            .hero h2 {
                font-size: 23px;
            }
            section {
                padding: 70px 5%;
            }
        }
    </style>
</head>
<body>
<!-- ==============================
     NAVIGATION
============================== -->
<nav>
    <div class="logo">
        Hajar Dahbi
    </div>
    <ul>
        <li>
            <a href="#accueil">Accueil</a>
        </li>
        <li>
            <a href="#apropos">À propos</a>
        </li>
        <li>
            <a href="#modules">Modules</a>
        </li>
        <li>
            <a href="#competences">Compétences</a>
        </li>
        <li>
            <a href="#projets">Projets</a>
        </li>
        <li>
            <a href="#contact">Contact</a>
        </li>
    </ul>
</nav>
<!-- ==============================
     ACCUEIL
============================== -->
<section class="hero" id="accueil">
    <div class="hero-content">
        <h1>
            Bonjour, je suis
            <span>Hajar Dahbi</span>
        </h1>
        <h2>
            Développeur Web
        </h2>
        <p>
            Bienvenue sur mon portfolio.
            Découvrez mon parcours, mes compétences,
            mes modules, mes ateliers et mes projets.
        </p>
        <a href="#modules" class="btn">
            Découvrir mes modules
        </a>
    </div>
</section>
<!-- ==============================
     À PROPOS
============================== -->
<section id="apropos">
    <div class="section-title">
        <h2>À propos de moi</h2>
        <p>
            Découvrez mon parcours et mes objectifs.
        </p>
    </div>
    <div class="about">
        <p>
            Je suis Hajar Dahbi, étudiante en développement web.
            Je m'intéresse à la création de sites web modernes,
            simples et interactifs.
        </p>
        <p>
            À travers ma formation, je développe mes compétences
            en développement Front-End, Back-End, bases de données
            et gestion de projets web.
        </p>
    </div>
</section>
<!-- ==============================
     MODULES
============================== -->
<section class="modules" id="modules">
    <div class="section-title">
        <h2>Mes Modules</h2>
        <p>
            Retrouvez mes modules et les ateliers réalisés
            pendant ma formation.
        </p>
    </div>
    <div class="modules-container">
        <?php foreach ($modules as $module): ?>
            <article class="module-card">
                <div class="module-code">
                    <?= htmlspecialchars($module["code"]) ?>
                </div>
                <h3>
                    <?= htmlspecialchars($module["title"]) ?>
                </h3>
                <p>
                    <?= htmlspecialchars($module["description"]) ?>
                </p>
                <?php if (!empty($module["ateliers"])): ?>
                    <div class="ateliers">
                        <h4>
                            📚 Ateliers
                        </h4>
                        <?php foreach ($module["ateliers"] as $atelier): ?>
                            <a
                                href="<?= htmlspecialchars($atelier["file"]) ?>"
                                target="_blank"
                                class="atelier-btn"
                            >
                                📄
                                <?= htmlspecialchars($atelier["title"]) ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<!-- ==============================
     COMPÉTENCES
============================== -->
<section id="competences">
    <div class="section-title">
        <h2>Mes Compétences</h2>
        <p>
            Les technologies et compétences que j'utilise.
        </p>
    </div>
    <div class="skills-container">
        <div class="skill">
            HTML
        </div>
        <div class="skill">
            CSS
        </div>
        <div class="skill">
            JavaScript
        </div>
        <div class="skill">
            PHP
        </div>
        <div class="skill">
            MySQL
        </div>
        <div class="skill">
            Git / GitHub
        </div>
        <div class="skill">
            UML
        </div>
        <div class="skill">
            Conception Web
        </div>
    </div>
</section>
<!-- ==============================
     PROJETS
============================== -->
<section class="projects" id="projets">
    <div class="section-title">
        <h2>Mes Projets</h2>
        <p>
            Quelques projets réalisés pendant ma formation.
        </p>
    </div>
    <div class="projects-container">
        <article class="project-card">
            <h3>
                Portfolio personnel
            </h3>
            <p>
                Création d'un portfolio personnel avec HTML,
                CSS et PHP pour présenter mon parcours,
                mes compétences et mes travaux.
            </p>
            <a href="#contact" class="btn">
                En savoir plus
            </a>
        </article>
        <article class="project-card">
            <h3>
                Projet Web
            </h3>
            <p>
                Conception et développement d'un projet web
                dans le cadre de ma formation.
            </p>
            <a href="#contact" class="btn">
                En savoir plus
            </a>
        </article>
        <article class="project-card">
            <h3>
                Base de données
            </h3>
            <p>
                Création et gestion d'une base de données
                avec SQL et MySQL.
            </p>
            <a href="#contact" class="btn">
                En savoir plus
            </a>
        </article>
    </div>
</section>
<!-- ==============================
     CONTACT
============================== -->
<section id="contact">
    <div class="section-title">
        <h2>Contact</h2>
        <p>
            Vous pouvez me contacter grâce à ce formulaire.
        </p>
    </div>
    <div class="contact-container">
        <?php if ($message_envoye): ?>
            <div class="success-message">
                Votre message a bien été envoyé !
            </div>
        <?php endif; ?>
        <form
            class="contact-form"
            method="POST"
            action=""
        >
            <input
                type="text"
                name="nom"
                placeholder="Votre nom"
                required
            >
            <input
                type="email"
                name="email"
                placeholder="Votre adresse e-mail"
                required
            >
            <textarea
                name="message"
                placeholder="Votre message"
                required
            ></textarea>
            <button type="submit">
                Envoyer le message
            </button>
        </form>
    </div>
</section>
<!-- ==============================
     FOOTER
============================== -->
<footer>
    <p>
        © <?= date("Y") ?> Hajar Dahbi.
        Tous droits réservés.
    </p>
</footer>
</body>
</html>