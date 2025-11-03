<aside class="display-flex">
    <nav id="navbar-esq" class="display-flex-column">
        <a href="./usr_meus_chamados.php">
            <img src="../../images/logado/Logo.svg" alt="">
        </a>
        <a href="./tec_chamados_abertos.php">
            <img src="../../images/logado/Itens novos.svg" alt="">
        </a>
        <?php if ($_SESSION['admin_logado'] == true): ?>
            <a href="./adm_usuarios.php">
                <img src="../../images/logado/Pessoas.svg" alt="">
            </a>
            <a href="./adm_relatorios.php">
                <img src="../../images/logado/Rede.svg" alt="">
            </a>
        <?php endif ?>
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
            <p>0</p>
        </div>
        <div id="navbar-dir-ancoras" class="display-flex-column">
            <div class="navbar-dir-a display-flex">
                <a href="./tec_chamados_abertos.php">Chamados abertos</a>
                <p><?php if(isset($chamadosabertos)){echo $chamadosabertos;}else{echo '0';}?></p>
            </div>
            <div class="navbar-dir-a display-flex">
                <a href="./tec_chamados_designados.php">Chamados designados</a>
                <p><?php if(isset($chamadosatendimento)){echo $chamadosatendimento;}else{echo '0';}?></p>
            </div>
            <div class="navbar-dir-a display-flex">
                <a href="./tec_chamados_concluidos.php">Chamados concluídos</a>
                <p><?php if(isset($chamadosfinalizados)){echo $chamadosfinalizados;}else{echo '0';}?></p>
            </div>
        </div>
    </section>
</aside>