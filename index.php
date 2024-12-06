<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Caixa Eletrôinico</title>
</head>
<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <header>
            <h1> Caixa Eletrôinico </h1>
        </header>

        <section>
            <label for=""> Qual valor você deseja sacar? (R$) </label> <br>
            <input type="number" name="numReais" id="numReais">

            <p> <button> Sacar </button> </p>
        </section>

        <?php 
            $fmtReal = numfmt_create("pt-BR", NumberFormatter::CURRENCY);
            $numReais = $_POST['numReais'] ?? 0;
        ?>

        <section>
            <header>
                <h1> Saque de <?php echo numfmt_format_currency($fmtReal, $numReais, "BRL"); ?> </h1>
            </header>
            <?php 
                $resto = $numReais;

                // Saque de R$100
                $tot100 = intdiv($resto, 100);
                $resto = $resto % 100;

                // Saque de R$50
                $tot50 = intdiv($resto, 50);
                $resto = $resto % 50;

                // Saque de R$20
                $tot20 = intdiv($resto, 20);
                $resto = $resto % 20;

                // Saque de R$10
                $tot10 = intdiv($resto, 10);
                $resto = $resto % 10;

                // Saque de R$5
                $tot5 = intdiv($resto, 5);
                $resto = $resto % 5;

                // Saque de R$2
                $tot2 = intdiv($resto, 2);
                $resto = $resto % 2;

                // Saque de R$1
                $tot1 = intdiv($resto, 1);
            ?>

            <ul>
                <li role="list" class="lista-Img"> <img src="img/100-reais.jpg" alt="Nota de 100 Reais"> x<?php echo $tot100; ?>  </li>
                <li role="list" class="lista-Img"> <img src="img/50-reais.jpg" alt="Nota de 50 Reais"> x<?php echo $tot50 ?> </li>
                <li role="list" class="lista-Img"> <img src="img/20-reais.jpg" alt="Nota de 20 Reais"> x<?php echo $tot20 ?> </li>
                <li role="list" class="lista-Img"> <img src="img/10-reais.jpg" alt="Nota de 10 Reais"> x<?php echo $tot10 ?> </li>
                <li role="list" class="lista-Img"> <img src="img/5-reais.jpg" alt="Nota de 5 Reais"> x<?php echo $tot5 ?> </li>
                <li role="list" class="lista-Img"> <img src="img/2-reais.jpg" alt="Nota de 2 Reais"> x<?php echo $tot2 ?> </li>
                <li role="list" class="lista-Img"> <img src="img/1-real.png" alt="Moeda de 1 Real"> x<?php echo $tot1 ?> </li>
            </ul>
        </section>
    </form>
</body>
</html>