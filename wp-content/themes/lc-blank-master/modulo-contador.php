<?php
$dataAtual = strtotime('now') * 1000;

ob_start();
?>

<div class="container-contador">
    <div class="contador-unidades">
        <div id="contador-dias"></div>
        <span class="contador-label">dias</span>
    </div>
    <div class="dois-pontos">:</div>
    <div class="contador-unidades">
        <div id="contador-horas"></div>
        <span class="contador-label">horas</span>
    </div>
    <div class="dois-pontos">:</div>
    <div class="contador-unidades">
        <div id="contador-minutos"></div>
        <span class="contador-label">minutos</span>
    </div>
    <div class="dois-pontos">:</div>
    <div class="contador-unidades">
        <div id="contador-segundos"></div>
        <span class="contador-label">segundos</span>
    </div>
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
        document.getElementById('contador-dias').innerHTML = dias.toString().padStart(2, "0");
        document.getElementById('contador-horas').innerHTML = horas.toString().padStart(2, "0");
        document.getElementById('contador-minutos').innerHTML = minutos.toString().padStart(2, "0");
        document.getElementById('contador-segundos').innerHTML = segundos.toString().padStart(2, "0");
        dataAtual += 1000;
    }, 1000);
</script>
