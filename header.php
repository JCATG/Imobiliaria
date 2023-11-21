<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="icon" href="./assets/imagens/casa.png" type="image/png">
    <link rel="icon" href="./assets/imagens/casa.png" type="image/x-icon">


    <title>Imobiliaria</title>
    <?php wp_head(); ?>
    <style>
        @media only screen and (min-width: 768px) {
            .menu {
                display: flex;
                gap: 32px;
                flex-direction: row;
            }

            .menu li a:hover {
                border-bottom: 1px solid #30475E;
            }
        }

        @media only screen and (max-width: 768px) {
            .menu {
                margin:10px;
                display: flex;
                flex-direction: column;
                gap: 12px;
            }

            .menu li a:hover {
                border-bottom: none;
            }
              .menu-menu-footer-container {
            margin-top: 40px;
        }
        }

        header {
            background-color: white;
        }

        .menu-mobile {
            position: fixed;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            color: black;
            z-index: 1000;
            transition: left 0.3s ease;
        }

        .menu-mobile.show {
            left: 0;
        }

        .menu-mobile a {
            color: white; 
        }

        .menu-mobile .ph-x {
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            position: absolute;
            top: 54px;
            right: 8px;
        }

      
    </style>
</head>

<body>
<header>
        <nav>
            <div class="max-w-5xl mx-auto flex justify-between items-center gap-4 pt-4 md:pt-8 px-4 md:pb-6">
                <div class="text-black ">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo get_template_directory_uri() . '/assets/imagens/casa.png'; ?>" alt="erro" class="w-8">
                    </a>
                </div>
                <div class="hidden md:flex gap-2 text-black">
                    <div class="flex flexe-row">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme-location' => 'my-main-menu'
                            )
                        )
                        ?>
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <button id="menu-button" type="button" class="inline-flex items-center justify-center p-2">
                        <i id="menu-icon" class="ph ph-list text-2xl"></i>
                    </button>
                </div>
            </div>
            <div class="mt-4 menu-mobile bg-pink_100 text-white_100 md:hidden">
                <div class="flex sm:flex-col md:flex-row ">
                    <div class="flex-col control_main_menu bg-myblue text-white w-full">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme-location' => 'my-main-menu'
                            )
                        )
                        ?>
                    </div>
                    <i id="close-menu-icon" class="ph ph-x"></i>
                </div>
            </div>
        </nav>
        <script>
           document.addEventListener("DOMContentLoaded", function () {
                const button = document.getElementById("menu-button");
                const menuMobile = document.querySelector(".menu-mobile");
                const closeMenuIcon = document.getElementById("close-menu-icon");

                button.addEventListener("click", () => {
                    menuMobile.classList.toggle("show");
                });

                closeMenuIcon.addEventListener("click", () => {
                    menuMobile.classList.remove("show");
                });

                const menuItems = document.querySelectorAll('.menu-mobile a');
                menuItems.forEach(item => {
                    item.addEventListener('click', (event) => {
                        event.preventDefault();

                        const targetId = item.getAttribute('href').substring(1);
                        const targetElement = document.getElementById(targetId);
                        const targetPosition = targetElement.offsetTop;

                        menuMobile.classList.remove("show");

                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    });
                });

                window.addEventListener('scroll', () => {
                    if (menuMobile.classList.contains('show')) {
                        menuMobile.classList.remove('show');
                    }
                });
            });           
        </script>
    </header>
</body>
