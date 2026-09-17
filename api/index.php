<?php
// =====================================================
// PORTFOLIO DE DÉVELOPPEUR WEB - FICHIER UNIQUE
// =====================================================
$nom = "Dahbi";
$prenom = "Hajar";
$metier = "Développeur Web";
$modules = [
    [
        "code" => "M201",
        "title" => "Préparation d'un projet web",
        "description" => "Analyse des besoins, cahier des charges, conception et organisation d'un projet web."
    ],
    [
        "code" => "M202",
        "title" => "Approche agile",
        "description" => "Découverte de la méthode Agile, Scrum, gestion des tâches et travail collaboratif."
    ],
    [
        "code" => "M203",
        "title" => "Gestion des données",
        "description" => "Conception, manipulation et gestion des bases de données avec SQL et MySQL."
    ],
    [
        "code" => "M204",
        "title" => "Développement front-end",
        "description" => "Création d'interfaces modernes et responsives avec HTML, CSS et JavaScript."
    ],
    [
        "code" => "M205",
        "title" => "Développement back-end",
        "description" => "Développement côté serveur avec PHP, gestion des formulaires, sessions et données."
    ],
    [
        "code" => "M206",
        "title" => "Création d'une application Cloud native",
        "description" => "Découverte des architectures Cloud native, conteneurs et déploiement d'applications."
    ],
    [
        "code" => "M207",
        "title" => "Projet de synthèse",
        "description" => "Réalisation d'un projet complet regroupant les compétences acquises durant la formation."
    ]
];
// Traitement du formulaire
$messageEnvoye = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nomContact = htmlspecialchars($_POST["nom"] ?? "");
    $email = htmlspecialchars($_POST["email"] ?? "");
    $message = htmlspecialchars($_POST["message"] ?? "");
    if (!empty($nomContact) && !empty($email) && !empty($message)) {
        $messageEnvoye = true;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>
        <?= $prenom ?> <?= $nom ?> | Portfolio Développeur Web
    </title>
    <style>
        /* =====================================================
           PALETTE
        ===================================================== */
        :root {
            --rose: #EDAFB8;
            --rose-clair: #F7E1D7;
            --beige: #DEDBD2;
            --vert: #B0C4B1;
            --texte: #3f403d;
            --blanc: #ffffff;
        }
        /* =====================================================
           RESET
        ===================================================== */
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
        a {
            text-decoration: none;
        }
        /* =====================================================
           HEADER
        ===================================================== */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 70px;
            background: rgba(255,255,255,0.96);
            border-bottom: 1px solid var(--beige);
            z-index: 1000;
        }
        nav {
            max-width: 1150px;
            height: 70px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
        }
        .logo {
            font-size: 23px;
            font-weight: bold;
            color: var(--texte);
        }
        .logo span {
            color: var(--rose);
        }
        .nav-links {
            display: flex;
            gap: 25px;
            list-style: none;
        }
        .nav-links a {
            color: var(--texte);
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s;
        }
        .nav-links a:hover {
            color: var(--rose);
        }
        /* =====================================================
           HERO
        ===================================================== */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 100px 20px 60px;
            background:
                linear-gradient(
                    135deg,
                    var(--rose-clair),
                    #ffffff,
                    var(--beige)
                );
        }
        .hero-content {
            max-width: 850px;
        }
        .hero-small {
            color: var(--rose);
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 3px;
            margin-bottom: 20px;
        }
        .hero h1 {
            font-size: clamp(42px, 7vw, 72px);
            line-height: 1.1;
            margin-bottom: 25px;
        }
        .hero h1 span {
            color: var(--rose);
        }
        .hero p {
            color: #686965;
            font-size: 18px;
            max-width: 650px;
            margin: auto;
        }
        .buttons {
            margin-top: 35px;
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }
        .btn {
            display: inline-block;
            padding: 13px 24px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-primary {
            background: var(--rose);
            color: var(--texte);
        }
        .btn-primary:hover {
            background: var(--rose-clair);
            transform: translateY(-2px);
        }
        .btn-secondary {
            color: var(--texte);
            background: white;
            border: 1px solid var(--rose);
        }
        .btn-secondary:hover {
            background: var(--rose-clair);
        }
        /* =====================================================
           SECTIONS
        ===================================================== */
        section {
            padding: 100px 20px;
            background: #ffffff;
        }
        .container {
            max-width: 1150px;
            margin: auto;
        }
        .section-title {
            text-align: center;
            margin-bottom: 55px;
        }
        .section-title p {
            color: var(--rose);
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 2px;
        }
        .section-title h2 {
            font-size: 36px;
            margin-top: 8px;
        }
        /* =====================================================
           ABOUT
        ===================================================== */
        .about {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 60px;
            align-items: center;
        }
        .profile {
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--vert);
            border-radius: 15px;
            color: var(--texte);
            font-size: 90px;
        }
        .about-text h3 {
            font-size: 28px;
            margin-bottom: 15px;
        }
        .about-text p {
            color: #686965;
            margin-bottom: 15px;
        }
        .info {
            margin-top: 25px;
        }
        .info p {
            margin-bottom: 8px;
        }
        /* =====================================================
           MODULES
        ===================================================== */
        #modules {
            background: var(--rose-clair);
        }
        .modules {
            display: grid;
            grid-template-columns:
                repeat(3, 1fr);
            gap: 22px;
        }
        .module-card {
            background: white;
            padding: 28px;
            border-radius: 10px;
            border: 1px solid var(--beige);
            transition: 0.3s;
        }
        .module-card:hover {
            transform: translateY(-5px);
            border-color: var(--rose);
            box-shadow:
                0 10px 30px
                rgba(237,175,184,0.25);
        }
        .module-code {
            display: inline-block;
            background: var(--rose-clair);
            color: var(--texte);
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 18px;
        }
        .module-card h3 {
            font-size: 18px;
            margin-bottom: 12px;
        }
        .module-card p {
            color: #686965;
            font-size: 14px;
        }
        /* =====================================================
           COMPÉTENCES
        ===================================================== */
        .skills {
            max-width: 800px;
            margin: auto;
        }
        .skill {
            margin-bottom: 25px;
        }
        .skill-header {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
        }
        .progress {
            height: 8px;
            background: var(--beige);
            border-radius: 10px;
            overflow: hidden;
        }
        .progress-bar {
            height: 100%;
            background: var(--vert);
            border-radius: 10px;
        }
        /* =====================================================
           PROJETS
        ===================================================== */
        #projets {
            background: var(--rose-clair);
        }
        .projects {
            max-width: 900px;
            margin: auto;
        }
        .project {
            display: grid;
            grid-template-columns: 70px 1fr;
            gap: 25px;
            background: white;
            padding: 30px;
            margin-bottom: 20px;
            border-radius: 10px;
            border: 1px solid var(--beige);
        }
        .project-number {
            font-size: 30px;
            font-weight: bold;
            color: var(--rose);
        }
        .project h3 {
            margin-bottom: 8px;
        }
        .project p {
            color: #686965;
            margin-bottom: 15px;
        }
        .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        .tags span {
            padding: 4px 9px;
            background: var(--rose-clair);
            color: var(--texte);
            border-radius: 4px;
            font-size: 12px;
        }
        /* =====================================================
           CONTACT
        ===================================================== */
        .contact-form {
            max-width: 700px;
            margin: auto;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 15px;
            border: 1px solid var(--beige);
            border-radius: 7px;
            font-family: inherit;
            outline: none;
        }
        .contact-form input:focus,
        .contact-form textarea:focus {
            border-color: var(--rose);
        }
        .contact-form button {
            width: fit-content;
            border: none;
            cursor: pointer;
        }
        .success {
            max-width: 700px;
            margin: 0 auto 20px;
            padding: 15px;
            background: var(--vert);
            color: var(--texte);
            border-radius: 7px;
            text-align: center;
        }
        /* =====================================================
           FOOTER
        ===================================================== */
        footer {
            background: var(--vert);
            color: var(--texte);
            text-align: center;
            padding: 30px 20px;
        }
        footer p {
            font-size: 14px;
        }
        .socials {
            margin-top: 10px;
        }
        .socials a {
            color: var(--texte);
            margin: 0 10px;
            font-size: 14px;
        }
        .socials a:hover {
            color: var(--rose);
        }
        /* =====================================================
           RESPONSIVE
        ===================================================== */
        @media (max-width: 900px) {
            .nav-links {
                display: none;
            }
            .modules {
                grid-template-columns: repeat(2, 1fr);
            }
            .about {
                grid-template-columns: 1fr;
            }
            .profile {
                max-width: 300px;
                margin: auto;
            }
        }
        @media (max-width: 600px) {
            section {
                padding: 70px 20px;
            }
            .modules {
                grid-template-columns: 1fr;
            }
            .project {
                grid-template-columns: 1fr;
            }
            .hero h1 {
                font-size: 42px;
            }
            .hero p {
                font-size: 16px;
            }
            .section-title h2 {
                font-size: 30px;
            }
        }
    </style>
</head>
<body>
<!-- =====================================================
     NAVIGATION
===================================================== -->
<header>
    <nav>
        <div class="logo">
            <?= $prenom ?><span>Dev</span>
        </div>
        <ul class="nav-links">
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
</header>
<!-- =====================================================
     ACCUEIL
===================================================== -->
<section id="accueil" class="hero">
    <div class="hero-content">
        <div class="hero-small">
            PORTFOLIO DE DÉVELOPPEUR WEB
        </div>
        <h1>
            Bonjour, je suis
            <span><?= $prenom ?></span>
        </h1>
        <p>
            <?= $metier ?> passionné par la création
            d'applications web modernes, simples et performantes.
        </p>
        <div class="buttons">
            <a href="#modules"
               class="btn btn-primary">
                Découvrir ma formation
            </a>
            <a href="#contact"
               class="btn btn-secondary">
                Me contacter
            </a>
        </div>
    </div>
</section>
<!-- =====================================================
     À PROPOS
===================================================== -->
<section id="apropos">
    <div class="container">
        <div class="section-title">
            <p>MON PROFIL</p>
            <h2>À propos de moi</h2>
        </div>
        <div class="about">
            <div class="profile">
                &lt;/&gt;
            </div>
            <div class="about-text">
                <h3><?= $prenom ?> <?= $nom ?></h3>
                <p>
                    Je suis un développeur web en formation,
                    intéressé par la conception et le développement
                    d'applications web modernes.
                </p>
                <p>
                    Durant ma formation, j'ai développé des compétences
                    en front-end, back-end, bases de données, méthodes
                    agiles et technologies Cloud.
                </p>
                <div class="info">
                    <p>
                        <strong>Formation :</strong>
                        Développement Digital
                    </p>
                    <p>
                        <strong>Spécialité :</strong>
                        Développement Web
                    </p>
                    <p>
                        <strong>Technologies :</strong>
                        HTML, CSS, JavaScript, PHP, MySQL
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =====================================================
     MODULES M201 - M207
===================================================== -->
<section id="modules">
    <div class="container">
        <div class="section-title">
            <p>MA FORMATION</p>
            <h2>Modules M201 à M207</h2>
        </div>
        <div class="modules">
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
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- =====================================================
     COMPÉTENCES
===================================================== -->
<section id="competences">
    <div class="container">
        <div class="section-title">
            <p>MES TECHNOLOGIES</p>
            <h2>Compétences</h2>
        </div>
        <div class="skills">
            <div class="skill">
                <div class="skill-header">
                    <span>HTML / CSS</span>
                    <span>90%</span>
                </div>
                <div class="progress">
                    <div
                        class="progress-bar"
                        style="width:90%">
                    </div>
                </div>
            </div>
            <div class="skill">
                <div class="skill-header">
                    <span>JavaScript</span>
                    <span>80%</span>
                </div>
                <div class="progress">
                    <div
                        class="progress-bar"
                        style="width:80%">
                    </div>
                </div>
            </div>
            <div class="skill">
                <div class="skill-header">
                    <span>PHP</span>
                    <span>85%</span>
                </div>
                <div class="progress">
                    <div
                        class="progress-bar"
                        style="width:85%">
                    </div>
                </div>
            </div>
            <div class="skill">
                <div class="skill-header">
                    <span>MySQL</span>
                    <span>80%</span>
                </div>
                <div class="progress">
                    <div
                        class="progress-bar"
                        style="width:80%">
                    </div>
                </div>
            </div>
            <div class="skill">
                <div class="skill-header">
                    <span>Git / GitHub</span>
                    <span>75%</span>
                </div>
                <div class="progress">
                    <div
                        class="progress-bar"
                        style="width:75%">
                    </div>
                </div>
            </div>
            <div class="skill">
                <div class="skill-header">
                    <span>Cloud</span>
                    <span>70%</span>
                </div>
                <div class="progress">
                    <div
                        class="progress-bar"
                        style="width:70%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =====================================================
     PROJETS
===================================================== -->
<section id="projets">
    <div class="container">
        <div class="section-title">
            <p>MES RÉALISATIONS</p>
            <h2>Projets</h2>
        </div>
        <div class="projects">
            <article class="project">
                <div class="project-number">
                    01
                </div>
                <div>
                    <h3>
                        Application de gestion
                    </h3>
                    <p>
                        Création d'une application permettant
                        de gérer des utilisateurs et des données
                        à travers une interface web.
                    </p>
                    <div class="tags">
                        <span>PHP</span>
                        <span>MySQL</span>
                        <span>HTML</span>
                        <span>CSS</span>
                    </div>
                </div>
            </article>
            <article class="project">
                <div class="project-number">
                    02
                </div>
                <div>
                    <h3>
                        Application Web
                    </h3>
                    <p>
                        Développement d'une interface responsive
                        avec JavaScript et consommation d'une API.
                    </p>
                    <div class="tags">
                        <span>HTML</span>
                        <span>CSS</span>
                        <span>JavaScript</span>
                        <span>API</span>
                    </div>
                </div>
            </article>
            <article class="project">
                <div class="project-number">
                    03
                </div>
                <div>
                    <h3>
                        Projet de synthèse — M207
                    </h3>
                    <p>
                        Projet final permettant de mettre en pratique
                        les connaissances des modules M201 à M206
                        dans une application complète.
                    </p>
                    <div class="tags">
                        <span>PHP</span>
                        <span>MySQL</span>
                        <span>JavaScript</span>
                        <span>Git</span>
                        <span>Cloud</span>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>
<!-- =====================================================
     CONTACT
===================================================== -->
<section id="contact">
    <div class="container">
        <div class="section-title">
            <p>CONTACT</p>
            <h2>Me contacter</h2>
        </div>
        <?php if ($messageEnvoye): ?>
            <div class="success">
                Merci <?= $nomContact ?>,
                votre message a bien été reçu.
            </div>
        <?php endif; ?>
        <form
            class="contact-form"
            method="POST"
            action="#contact"
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
                placeholder="Votre adresse email"
                required
            >
            <textarea
                name="message"
                rows="6"
                placeholder="Votre message"
                required
            ></textarea>
            <button
                type="submit"
                class="btn btn-primary"
            >
                Envoyer le message
            </button>
        </form>
    </div>
</section>
<!-- =====================================================
     FOOTER
===================================================== -->
<footer>
    <p>
        ©️ <?= date("Y") ?>
        <?= $prenom ?> <?= $nom ?> —
        Portfolio Développeur Web
    </p>
    <div class="socials">
        <a href="#" target="_blank">
            GitHub
        </a>
        <a href="#" target="_blank">
            LinkedIn
        </a>
    </div>
</footer>
<script>
    // =====================================================
    // PETIT EFFET AU DÉFILEMENT
    // =====================================================
    const cards = document.querySelectorAll(
        ".module-card, .project"
    );
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = "1";
                    entry.target.style.transform =
                        "translateY(0)";
                }
            });
        },
        {
            threshold: 0.1
        }
    );
    cards.forEach(card => {
        card.style.opacity = "0";
        card.style.transform =
            "translateY(20px)";
        card.style.transition =
            "opacity 0.6s ease, transform 0.6s ease";
        observer.observe(card);
    });
</script>
</body>
</html>