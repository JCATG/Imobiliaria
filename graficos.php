<?php
global $wpdb;
$table_name = $wpdb->prefix . 'imoveis';

$imoveis = $wpdb->get_results("SELECT status_imovel FROM $table_name");


$contagem_alugado = 0;
$contagem_venda = 0;

foreach ($imoveis as $imovel) {
    if ($imovel->status_imovel === 'alugado') {
        $contagem_alugado++;
    } elseif ($imovel->status_imovel === 'Disponivel') {
        $contagem_venda++;
    }
}

$grafico_data = array(
    array('Status', 'Quantidade'),
    array('alugado', $contagem_alugado),
    array('Disponivel', $contagem_venda),
);
?>
<div id="grafico"></div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(desenharGrafico);

    function desenharGrafico() {
        var data = google.visualization.arrayToDataTable(<?php echo json_encode($grafico_data); ?>);

        var options = {
            title: 'Status dos Imóveis',
            pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('grafico'));

        chart.draw(data, options);
    }
</script>
