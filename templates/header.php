<header class="flex column">
    <div class="header-top flex center justify-center column">
        <figure class="logo flex center justify-center">
            <img src="../assets/base/logo.avif" alt="logo" width="128" height="128"/>
        </figure>
        <span class="divisor"></span>
        <span class="user-content flex center">
            <figure class="user-icon flex center justify-center">
                <img src="../assets/icons/user.svg" alt="Meu usuário" title="Meu usuário" width="24" height="24"/>
            </figure>
            <p class="welcome">Olá, <span class="name"><?= $_SESSION['username']; ?></span></p>
            <a class="logout" href="../includes/logout.php">- Sair</a>
        </span>
    </div>
    <div class="header-middle flex center justify-center">
        <nav class="navigation-menu flex center justify-center">
            <ul class="flex justify-center center column">
                <li class="btn-include-costumer">Incluir +</li>
                <li class="btn-remove-costumer"">Remover</li>
                <li class="btn-show-filter"><a href="../includes/filter.php">Filtros</a></li>
            </ul>
        </nav>
    </div>
    <div class="header-bottom flex justify-center center">
        <iframe src="https://lottie.host/embed/1404f425-b327-46a2-a3d8-12eea00ff4cb/M7IEpQLz5p.json"></iframe>
    </div>
</header>
