<?php

$nom = "Dahbi";
$prenom = "Hajar";
$metier = "Développeur Web";

/*
|--------------------------------------------------------------------------
| MODULES + ATELIERS
|--------------------------------------------------------------------------
*/

$modules = [

    [
        "code" => "M201",
        "title" => "Préparation d'un projet web",
        "description" => "Analyse des besoins, cahier des charges, conception et organisation d'un projet web.",
        "ateliers" => [
            [
                "title" => "Atelier 1 - Agence d'immobilier",
                "file" => "docs/Dahbi_Hajar_Atelier_UML_Immobilier.pdf"
            ],
            [
                "title" => "Atelier 2 - Figma",
                "file" => "docs/figma.pdf"
            ]
        ]
    ],

    [
        "code" => "M202",
        "title" => "Approche agile",
        "description" => "Appliquer les méthodes agiles en équipe.",
        "ateliers" => [
            [
                "title" => "Atelier 1 - Gestion de projet : Methodes classiques",
                "file" => "docs/Atelier 1 gestion de projet methodes classiques.pdf"
            ],
            [
                "title" => "Atelier 2",
                "file" => "pdf/M202/atelier2.pdf"
            ]
        ]
    ],

    [
        "code" => "M203",
        "title" => "Gestion des donnees",
        "description" => "Conception, organisation et manipulation des bases de données.",
        "ateliers" => [
            [
                "title" => "Atelier 1",
                "file" => "pdf/M202/atelier1.pdf"
            ],
            [
                "title" => "Atelier 2",
                "file" => "pdf/M202/atelier2.pdf"
            ]
        ]
    ],

    [
        "code" => "M204",
        "title" => "Développement Front-End",
        "description" => "Concevoir des interfaces web modernes et interactives.",
        "ateliers" => [
            [
                "title" => "Atelier 1",
                "file" => "pdf/M203/atelier1.pdf"
            ]
        ]
    ],

    [
        "code" => "M205",
        "title" => "Développement Back-End",
        "description" => "Serveur et les fonctionnalités d’une application.",
        "ateliers" => [
            [
                "title" => "Atelier 1",
                "file" => "pdf/M204/atelier1.pdf"
            ]
        ]
    ],

    [
        "code" => "M206",
        "title" => "Création d’une application Cloud native",
        "description" => "Mise en pratique des technologies et outils du développement web.",
        "ateliers" => [
            [
                "title" => "Atelier 1",
                "file" => "pdf/M205/atelier1.pdf"
            ]
        ]
    ],

    [
        "code" => "M207",
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
        "code" => "M208",
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

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Portfolio - <?= htmlspecialchars($prenom . " " . $nom) ?>
    </title>


    <style>

        /* =====================================================
           PALETTE ROSE PASTEL
        ===================================================== */

        :root {

            --rose-principal: #E8B4C3;

            --rose-clair: #FFF7F9;

            --rose-pale: #FFFAFC;

            --rose-poudre: #F6DDE4;

            --rose-accent: #D99AAA;

            --rose-fonce: #C78396;

            --rose-footer: #D49AAA;

            --texte: #5B4A50;

            --texte-clair: #8A747C;

            --blanc: #FFFFFF;

            --border: #F0D8DF;

            --gradient:
                linear-gradient(
                    135deg,
                    #E8B4C3,
                    #D99AAA
                );

            --shadow:
                0 8px 25px
                rgba(210, 145, 165, 0.10);

            --shadow-hover:
                0 15px 35px
                rgba(210, 145, 165, 0.18);
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

            font-family:
                "Segoe UI",
                Arial,
                Helvetica,
                sans-serif;

            background:
                var(--blanc);

            color:
                var(--texte);

            line-height:
                1.7;

            overflow-x:
                hidden;
        }


        /* =====================================================
           NAVIGATION
        ===================================================== */

        nav {

            position: fixed;

            top: 0;

            left: 0;

            width: 100%;

            background:
                rgba(255, 255, 255, 0.96);

            backdrop-filter:
                blur(12px);

            display: flex;

            justify-content:
                space-between;

            align-items:
                center;

            padding:
                18px 8%;

            z-index:
                1000;

            border-bottom:
                1px solid var(--border);

            box-shadow:
                0 4px 20px
                rgba(210, 145, 165, 0.07);

            animation:
                navDown 0.7s ease;
        }


        .logo {

            font-size:
                25px;

            font-weight:
                800;

            color:
                var(--rose-fonce);
        }


        nav ul {

            list-style:
                none;

            display:
                flex;

            gap:
                30px;
        }


        nav ul li a {

            text-decoration:
                none;

            color:
                var(--texte);

            font-weight:
                600;

            position:
                relative;

            transition:
                0.3s;
        }


        nav ul li a:hover {

            color:
                var(--rose-fonce);
        }


        nav ul li a::after {

            content:
                "";

            position:
                absolute;

            width:
                0;

            height:
                2px;

            bottom:
                -7px;

            left:
                50%;

            background:
                var(--rose-principal);

            transition:
                0.3s;

            transform:
                translateX(-50%);
        }


        nav ul li a:hover::after {

            width:
                100%;
        }


        /* =====================================================
           HERO
        ===================================================== */

        .hero {

            min-height:
                100vh;

            display:
                flex;

            justify-content:
                center;

            align-items:
                center;

            text-align:
                center;

            padding:
                120px 20px 80px;

            position:
                relative;

            overflow:
                hidden;

            background:
                linear-gradient(
                    135deg,
                    #FFF8FA,
                    #FFFFFF,
                    #FCECEF
                );
        }


        .hero::before {

            content:
                "";

            position:
                absolute;

            width:
                430px;

            height:
                430px;

            border-radius:
                50%;

            background:
                rgba(232, 180, 195, 0.18);

            top:
                -180px;

            right:
                -100px;

            animation:
                floating 7s ease-in-out infinite;
        }


        .hero::after {

            content:
                "";

            position:
                absolute;

            width:
                320px;

            height:
                320px;

            border-radius:
                50%;

            background:
                rgba(246, 221, 228, 0.60);

            bottom:
                -160px;

            left:
                -100px;

            animation:
                floating 8s ease-in-out infinite reverse;
        }


        .hero-content {

            max-width:
                850px;

            position:
                relative;

            z-index:
                2;

            animation:
                heroAppear 1s ease;
        }


        .hero h1 {

            font-size:
                58px;

            line-height:
                1.2;

            margin-bottom:
                20px;

            color:
                var(--texte);

            font-weight:
                800;
        }


        .hero h1 span {

            color:
                var(--rose-fonce);

            display:
                inline-block;

            animation:
                softPulse 3s ease-in-out infinite;
        }


        .hero h2 {

            font-size:
                29px;

            margin-bottom:
                20px;

            font-weight:
                600;

            color:
                var(--rose-accent);
        }


        .hero p {

            font-size:
                18px;

            color:
                var(--texte-clair);

            max-width:
                700px;

            margin:
                0 auto 32px;
        }


        /* =====================================================
           BOUTONS
        ===================================================== */

        .btn {

            display:
                inline-block;

            padding:
                13px 29px;

            background:
                var(--gradient);

            color:
                white;

            text-decoration:
                none;

            border-radius:
                30px;

            font-weight:
                600;

            box-shadow:
                0 8px 20px
                rgba(210, 145, 165, 0.20);

            transition:
                all 0.3s ease;
        }


        .btn:hover {

            transform:
                translateY(-4px);

            box-shadow:
                0 13px 28px
                rgba(210, 145, 165, 0.28);

            background:
                linear-gradient(
                    135deg,
                    #D99AAA,
                    #C78396
                );
        }


        /* =====================================================
           SECTIONS
        ===================================================== */

        section {

            padding:
                100px 8%;

            background:
                var(--blanc);
        }


        .section-title {

            text-align:
                center;

            margin-bottom:
                55px;

            animation:
                fadeUp 0.8s ease;
        }


        .section-title h2 {

            font-size:
                38px;

            margin-bottom:
                10px;

            color:
                var(--texte);

            font-weight:
                800;
        }


        .section-title h2::after {

            content:
                "";

            display:
                block;

            width:
                55px;

            height:
                4px;

            margin:
                12px auto 0;

            border-radius:
                10px;

            background:
                var(--rose-principal);
        }


        .section-title p {

            color:
                var(--texte-clair);

            margin-top:
                12px;
        }


        /* =====================================================
           À PROPOS
        ===================================================== */

        .about {

            max-width:
                900px;

            margin:
                auto;

            text-align:
                center;

            padding:
                38px;

            border-radius:
                20px;

            border:
                1px solid var(--border);

            box-shadow:
                var(--shadow);

            background:
                #FFFFFF;

            animation:
                fadeUp 0.9s ease;
        }


        .about p {

            font-size:
                17px;

            margin-bottom:
                15px;

            color:
                var(--texte-clair);
        }


        /* =====================================================
           MODULES
        ===================================================== */

        .modules {

            background:
                var(--rose-clair);
        }


        .modules-container {

            max-width:
                1200px;

            margin:
                auto;

            display:
                grid;

            grid-template-columns:
                repeat(
                    auto-fit,
                    minmax(280px, 1fr)
                );

            gap:
                28px;
        }


        .module-card {

            background:
                var(--blanc);

            padding:
                28px;

            border-radius:
                20px;

            border:
                1px solid var(--border);

            box-shadow:
                var(--shadow);

            transition:
                all 0.35s ease;

            position:
                relative;

            overflow:
                hidden;
        }


        .module-card::before {

            content:
                "";

            position:
                absolute;

            top:
                0;

            left:
                0;

            width:
                100%;

            height:
                4px;

            background:
                var(--gradient);

            transform:
                scaleX(0);

            transition:
                0.35s;
        }


        .module-card:hover {

            transform:
                translateY(-8px);

            box-shadow:
                var(--shadow-hover);
        }


        .module-card:hover::before {

            transform:
                scaleX(1);
        }


        .module-code {

            display:
                inline-block;

            background:
                var(--rose-poudre);

            color:
                var(--rose-fonce);

            padding:
                6px 14px;

            border-radius:
                20px;

            font-size:
                13px;

            font-weight:
                700;

            margin-bottom:
                15px;
        }


        .module-card h3 {

            margin-bottom:
                10px;

            font-size:
                21px;

            color:
                var(--texte);
        }


        .module-card p {

            color:
                var(--texte-clair);
        }


        /* =====================================================
           ATELIERS
        ===================================================== */

        .ateliers {

            margin-top:
                22px;

            padding-top:
                18px;

            border-top:
                1px solid var(--border);
        }


        .ateliers h4 {

            margin-bottom:
                13px;

            font-size:
                17px;

            color:
                var(--rose-fonce);
        }


        .atelier-btn {

            display:
                block;

            margin-bottom:
                9px;

            padding:
                11px 14px;

            background:
                var(--rose-pale);

            color:
                var(--texte);

            text-decoration:
                none;

            border-radius:
                12px;

            border:
                1px solid transparent;

            transition:
                all 0.3s ease;
        }


        .atelier-btn:hover {

            background:
                var(--rose-poudre);

            color:
                var(--rose-fonce);

            border-color:
                var(--rose-principal);

            transform:
                translateX(5px);
        }


        /* =====================================================
           COMPÉTENCES
        ===================================================== */

        .skills-container {

            max-width:
                1000px;

            margin:
                auto;

            display:
                grid;

            grid-template-columns:
                repeat(
                    auto-fit,
                    minmax(200px, 1fr)
                );

            gap:
                20px;
        }


        .skill {

            background:
                var(--rose-pale);

            padding:
                25px;

            border-radius:
                18px;

            text-align:
                center;

            font-weight:
                700;

            color:
                var(--texte);

            border:
                1px solid var(--border);

            transition:
                all 0.3s ease;
        }


        .skill:nth-child(even) {

            background:
                var(--rose-poudre);
        }


        .skill:hover {

            background:
                var(--rose-principal);

            color:
                white;

            transform:
                translateY(-6px);

            box-shadow:
                0 12px 25px
                rgba(210, 145, 165, 0.22);
        }


        /* =====================================================
           PROJETS
        ===================================================== */

        .projects {

            background:
                var(--rose-clair);
        }


        .projects-container {

            max-width:
                1100px;

            margin:
                auto;

            display:
                grid;

            grid-template-columns:
                repeat(
                    auto-fit,
                    minmax(280px, 1fr)
                );

            gap:
                28px;
        }


        .project-card {

            background:
                var(--blanc);

            padding:
                30px;

            border-radius:
                20px;

            border:
                1px solid var(--border);

            box-shadow:
                var(--shadow);

            transition:
                all 0.35s ease;
        }


        .project-card:hover {

            transform:
                translateY(-8px);

            box-shadow:
                var(--shadow-hover);
        }


        .project-card h3 {

            margin-bottom:
                12px;

            color:
                var(--texte);

            font-size:
                21px;
        }


        .project-card p {

            color:
                var(--texte-clair);

            margin-bottom:
                22px;
        }


        /* =====================================================
           CONTACT
        ===================================================== */

        .contact-container {

            max-width:
                700px;

            margin:
                auto;
        }


        .contact-form {

            display:
                flex;

            flex-direction:
                column;

            gap:
                16px;
        }


        .contact-form input,
        .contact-form textarea {

            width:
                100%;

            padding:
                15px 17px;

            border:
                1px solid var(--border);

            border-radius:
                12px;

            font-family:
                inherit;

            font-size:
                15px;

            outline:
                none;

            background:
                var(--rose-pale);

            color:
                var(--texte);

            transition:
                all 0.3s ease;
        }


        .contact-form input:focus,
        .contact-form textarea:focus {

            border-color:
                var(--rose-principal);

            background:
                white;

            box-shadow:
                0 0 0 4px
                rgba(232, 180, 195, 0.15);

            transform:
                translateY(-2px);
        }


        .contact-form textarea {

            min-height:
                150px;

            resize:
                vertical;
        }


        .contact-form button {

            border:
                none;

            padding:
                14px;

            background:
                var(--gradient);

            color:
                white;

            border-radius:
                30px;

            cursor:
                pointer;

            font-size:
                16px;

            font-weight:
                600;

            transition:
                all 0.3s ease;
        }


        .contact-form button:hover {

            transform:
                translateY(-3px);

            box-shadow:
                0 12px 25px
                rgba(210, 145, 165, 0.25);
        }


        .success-message {

            background:
                #F4FBF6;

            color:
                #5C8066;

            padding:
                15px;

            border-radius:
                12px;

            margin-bottom:
                20px;

            text-align:
                center;

            border:
                1px solid #D4EBD9;

            animation:
                success 0.5s ease;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        footer {

            background:
                var(--rose-footer);

            color:
                #FFF7F9;

            text-align:
                center;

            padding:
                40px 20px;
        }


        .footer-content {

            max-width:
                900px;

            margin:
                auto;
        }


        .footer-content h3 {

            color:
                white;

            font-size:
                24px;

            margin-bottom:
                18px;
        }


        .footer-info {

            display:
                flex;

            justify-content:
                center;

            align-items:
                center;

            gap:
                35px;

            flex-wrap:
                wrap;

            margin-bottom:
                20px;
        }


        .footer-info p {

            font-size:
                15px;
        }


        .footer-info a {

            color:
                white;

            text-decoration:
                none;

            font-weight:
                600;

            transition:
                0.3s;
        }


        .footer-info a:hover {

            color:
                #FFE5EC;
        }


        .footer-line {

            width:
                70px;

            height:
                2px;

            background:
                #F3C7D2;

            margin:
                15px auto;
        }


        footer .copyright {

            font-size:
                13px;

            color:
                #FFEAF0;
        }


        /* =====================================================
           ANIMATIONS
        ===================================================== */

        @keyframes navDown {

            from {

                opacity:
                    0;

                transform:
                    translateY(-30px);
            }

            to {

                opacity:
                    1;

                transform:
                    translateY(0);
            }
        }


        @keyframes heroAppear {

            from {

                opacity:
                    0;

                transform:
                    translateY(35px);
            }

            to {

                opacity:
                    1;

                transform:
                    translateY(0);
            }
        }


        @keyframes fadeUp {

            from {

                opacity:
                    0;

                transform:
                    translateY(25px);
            }

            to {

                opacity:
                    1;

                transform:
                    translateY(0);
            }
        }


        @keyframes floating {

            0%,
            100% {

                transform:
                    translateY(0);
            }

            50% {

                transform:
                    translateY(20px);
            }
        }


        @keyframes softPulse {

            0%,
            100% {

                transform:
                    scale(1);
            }

            50% {

                transform:
                    scale(1.02);
            }
        }


        @keyframes success {

            from {

                opacity:
                    0;

                transform:
                    scale(0.95);
            }

            to {

                opacity:
                    1;

                transform:
                    scale(1);
            }
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 768px) {

            nav {

                flex-direction:
                    column;

                gap:
                    15px;

                padding:
                    15px 5%;
            }


            nav ul {

                gap:
                    15px;

                flex-wrap:
                    wrap;

                justify-content:
                    center;
            }


            nav ul li a {

                font-size:
                    13px;
            }


            .hero {

                padding-top:
                    160px;
            }


            .hero h1 {

                font-size:
                    40px;
            }


            .hero h2 {

                font-size:
                    23px;
            }


            .hero p {

                font-size:
                    16px;
            }


            section {

                padding:
                    75px 5%;
            }


            .section-title h2 {

                font-size:
                    31px;
            }


            .about {

                padding:
                    25px;
            }


            .footer-info {

                flex-direction:
                    column;

                gap:
                    8px;
            }
        }


        @media (max-width: 480px) {

            .hero h1 {

                font-size:
                    34px;
            }


            .hero h2 {

                font-size:
                    20px;
            }


            .logo {

                font-size:
                    21px;
            }


            nav ul {

                gap:
                    10px;
            }


            nav ul li a {

                font-size:
                    12px;
            }


            .module-card,
            .project-card {

                padding:
                    22px;
            }
        }

    </style>

</head>


<body>


<!-- =====================================================
     NAVIGATION
===================================================== -->

<nav>

    <div class="logo">
        Hajar Dahbi
    </div>


    <ul>

        <li>
            <a href="#accueil">
                Accueil
            </a>
        </li>

        <li>
            <a href="#apropos">
                À propos
            </a>
        </li>

        <li>
            <a href="#modules">
                Modules
            </a>
        </li>

        <li>
            <a href="#competences">
                Compétences
            </a>
        </li>

        <li>
            <a href="#projets">
                Projets
            </a>
        </li>

        <li>
            <a href="#contact">
                Contact
            </a>
        </li>

    </ul>

</nav>


<!-- =====================================================
     ACCUEIL
===================================================== -->

<section class="hero" id="accueil">

    <div class="hero-content">

        <h1>

            Bonjour, je suis

            <span>
                Hajar Dahbi
            </span>

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


<!-- =====================================================
     À PROPOS
===================================================== -->

<section id="apropos">

    <div class="section-title">

        <h2>
            À propos de moi
        </h2>

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


<!-- =====================================================
     MODULES
===================================================== -->

<section class="modules" id="modules">

    <div class="section-title">

        <h2>
            Mes Modules
        </h2>

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
                            Ateliers
                        </h4>


                        <?php foreach ($module["ateliers"] as $atelier): ?>

                            <a
                                href="<?= htmlspecialchars($atelier["file"]) ?>"
                                target="_blank"
                                class="atelier-btn"
                            >

                                <?= htmlspecialchars($atelier["title"]) ?>

                            </a>

                        <?php endforeach; ?>

                    </div>

                <?php endif; ?>

            </article>

        <?php endforeach; ?>

    </div>

</section>


<!-- =====================================================
     COMPÉTENCES
===================================================== -->

<section id="competences">

    <div class="section-title">

        <h2>
            Mes Compétences
        </h2>

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


<!-- =====================================================
     PROJETS
===================================================== -->

<section class="projects" id="projets">

    <div class="section-title">

        <h2>
            Mes Projets
        </h2>

        <p>
            Quelques projets réalisés pendant ma formation.
        </p>

    </div>


    <div class="projects-container">


        <article class="project-card">

            <h3>
                Remy's Journey
            </h3>

            <p>

                Création d’un site web de restaurant inspiré de Ratatouille, 
                développé avec HTML, CSS, JavaScript et PHP, présentant le menu, 
                les spécialités et l’univers du restaurant.

            </p>

            <a href="docs/home.php" class="btn">
                Voir le projet
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
                Voir le projet
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
                Voir le projet
            </a>

        </article>


    </div>

</section>


<!-- =====================================================
     CONTACT
===================================================== -->

<section id="contact">

    <div class="section-title">

        <h2>
            Contact
        </h2>

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


<!-- =====================================================
     FOOTER
===================================================== -->

<footer>

    <div class="footer-content">

        <h3>
            Contactez moi
        </h3>


        <div class="footer-info">

            <p>

                Tél :
                <a href="tel:+212 0619165777">
                    +212 619165777
                </a>

            </p>


            <p>

                Email :
                <a href="mailto:dahbihajar213@gmail.com">
                    dahbihajar213@gmail.com
                </a>

            </p>

        </div>


        <div class="footer-line"></div>


        <p class="copyright">

            © <?= date("Y") ?> Contacter moi
            Tous droits réservés.

        </p>

    </div>

</footer>


</body>

</html>
