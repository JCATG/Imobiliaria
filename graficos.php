<?php
$contagem_casas = wp_count_posts('casa')->publish; // Substitua 'casa' pelo seu custom post type
$contagem_apartamentos = wp_count_posts('apartamento')->publish; // Substitua 'apartamento' pelo seu custom post type

// Contar corretores
$args_corretores = array(
    'post_type' => 'corretores', // Substitua 'corretores' pelo seu custom post type
    'posts_per_page' => -1,
);
$corretores_query = new WP_Query($args_corretores);

$grafico_data = array(
    array('Categoria', 'Quantidade'),
    array('Casas', intval($contagem_casas)),
    array('Apartamentos', intval($contagem_apartamentos)),
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
            title: 'Estatísticas do Portal Imobiliário',
            legend: { position: 'top' },
            bars: 'vertical',
            vAxis: { format: '0' },
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('grafico'));
        chart.draw(data, options);
    }
</script>
