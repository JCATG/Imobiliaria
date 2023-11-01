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
        @media only screen and (min-width:768px) {
            .menu {
                display: flex;
                gap: 32px;
                flex-direction: row;

            }

            .menu li a:hover {
                border-bottom: 1px solid red;
            }
        }

        @media only screen and (max-width:768px) {
            .menu {
                margin: 0 10px;
                display: flex;
                flex-direction: column;
                gap: 12px;

            }

            .menu li a:hover {
                border-bottom: none;
            }
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
                    <div class="flex-col control_main_menu hidden bg-red-500 text-white w-full">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme-location' => 'my-main-menu'
                            )
                        )
                        ?>
                    </div>
                </div>
            </div>
        </nav>
        <script>
            const button = document.getElementById("menu-button");
            const controlMainMenu = document.querySelector(".control_main_menu");
            const menuIcon = document.getElementById("menu-icon");

            button.addEventListener("click", () => {
                controlMainMenu.classList.toggle("hidden");
                menuIcon.classList.toggle("ph-list");
                menuIcon.classList.toggle("ph-x");
            });
        </script>
    </header>