<?php

global $wpdb;
$table_name = $wpdb->prefix . 'formulario';

if (isset($_POST['delete-client'])) {
    $client_id = intval($_POST['client-id']);
    if ($client_id > 0) {
        $wpdb->delete($table_name, ['id' => $client_id]);
    }
}
$query = "SELECT * FROM $table_name";
$results = $wpdb->get_results($query);

if ($results) {
    echo '<table class = "clientes_info">';
    echo '<tr>';
    echo '<th>Nome</th>';
    echo '<th>Email</th>';
    echo '<th>Celular</th>';
    echo '<th>Cidade</th>';
    echo '<th>Tipo Imovel</th>';
    echo '<th>Finalidade</th>';
    echo '<th>Cidade Imovel</th>';
    echo '<th>Mensagem</th>';

    echo '</tr>';
    foreach ($results as $row) {
        echo '<tr>';
        echo '<td>' . esc_html($row->nome) . '</td>';
        echo '<td>' . esc_html($row->email) . '</td>';
        echo '<li>' . esc_html($row->celular) . '</td>';
        echo '<td>' . esc_html($row->cidade) . '</td>';
        echo '<td>' . esc_html($row->tipoImovel) . '</td>';
        echo '<td>' . esc_html($row->finalidade) . '</td>';
        echo '<td>' . esc_html($row->cidadeimovel) . '</td>';
        echo '<td>' . esc_html($row->mensagem) . '</td>';
        echo '<td>';
        echo '<form method="post">';
        echo '<input type="hidden" name="client-id" value="' . $row->id . '">';
        echo '<button type="submit" name="delete-client">Excluir</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
?>


<style>
      .clientes_info {
        border-collapse: collapse;
        width: 100%;
        max-width: 70%;
    }

    .clientes_info th, .clientes_info td {
        padding: 8px;
        text-align: left;
    }

    .clientes_info th {
        background-color: #f2f2f2;
    }

    .clientes_info tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>