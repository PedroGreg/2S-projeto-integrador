<aside class="display-flex">
    <nav id="navbar-esq" class="display-flex-column">
        <a href="./chamados_abertos.php">
            <img src="../../images/logado/Logo.svg" alt="">
        </a>
        <a href="./usr_meus_chamados.php">
            <img src="../../images/logado/Itens novos.svg" alt="">
        </a>
        <!-- <a href="./adm_usuarios.php">
                <img src="../../images/logado/Pessoas.svg" alt="">
            </a>
            <a href="">
                <img src="../../images/logado/Rede.svg" alt="">
            </a> -->
    </nav>
    <section id="navbar-dir" class="display-flex-column">
        <div id="navbar-dir-enterprise" class="display-flex">
            <img src="../../images/logado/Logo.svg" alt="">
            <div>
                <h1>GMH SUPPORT</h1>
                <h2>HELP DESK</h2>
            </div>
        </div>
        <div class="navbar-dir-a display-flex">
            <a href="">Pagina Inicial</a>
            <p><?php if (isset($meuschamados)){ echo ($meuschamados);}else{ echo "0";} ?></p>
        </div>
        <div id="navbar-dir-ancoras" class="display-flex-column">
            <div class="navbar-dir-a display-flex">
                <a href="./usr_meus_chamados.php">Meus chamados abertos</a>
                <p><?php if (isset($meuschamados)){ echo $meuschamados;}else{ echo "0";} ?></p>
            </div>
            <div class="navbar-dir-a display-flex">
                <a href="./usr_chamados_finalizados.php">Chamados finalizados</a>
                <p><?php if (isset($chamadosfinalizados)){ echo $chamadosfinalizados;}else{ echo "0";} ?></p>
            </div>
            <div class="navbar-dir-a display-flex">
                <a href="./usr_chamados_pendentes.php">Chamados c/ pendencias</a>
                <p><?php if (isset($chamadospendentes)){ echo $chamadospendentes;}else{ echo "0";} ?></p>
            </div>
        </div>
    </section>
</aside>