<?php if (isset($_SESSION['cuenta'])) { ?>
        <div class="txt-center">
            <div class="materialert success">
                <div class="material-icons">check</div>
                <?= $_SESSION['cuenta'] ?>
            </div>
        <?php session_unset(); }else{ ?>
        <h1>BIENVENIDO</h1>
        <?php } ?>