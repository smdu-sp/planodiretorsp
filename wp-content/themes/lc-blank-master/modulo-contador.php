<?php
$dataAtual = strtotime('now') * 1000;

ob_start();
?>

<div class="container-contador">
    <div id="contador-dias">Teste</div>
    <div id="contador-horas"></div>
    <div id="contador-minutos"></div>
    <div id="contador-segundos"></div>
</div>

<script>
    let dataAtual = <?= $dataAtual; ?>;
    let x = setInterval(() => {
        const dataLimite = new Date("Oct 25, 2022 00:00:00").getTime();
        let periodo = (dataLimite - dataAtual) / 1000;
        let dias = Math.floor(periodo / (24 * 60 * 60));
        let horas = Math.floor((periodo % (24 * 60 * 60)) / (60 * 60));
        let minutos = Math.floor((periodo % (60 * 60)) / 60);
        let segundos = Math.floor((periodo % 60));
        document.getElementById('contador-dias').innerHTML = dias;
        document.getElementById('contador-horas').innerHTML = horas;
        document.getElementById('contador-minutos').innerHTML = minutos;
        document.getElementById('contador-segundos').innerHTML = segundos;
        dataAtual += 1000;
    }, 1000);
</script>
