<h1>Interesse dos clientes </h1>
<style>
       .btn-pesquisar {
        padding: 5px;
    }

    .message-full {
        display: none;
        word-wrap: break-word;
        /* Adicione esta linha */
    }

    .user_nao_encontado,
    .read-more,
    .read-less {
        color: red;
        cursor: pointer;
    }

    .clientes_info {
        border-collapse: collapse;
        width: 100%;
        max-width: 100%;
    }

    .clientes_info th,
    .clientes_info td {
        padding: 8px;
        text-align: left;
    }

    .clientes_info th {
        background-color: #f2f2f2;
    }

    .clientes_info tr:nth-child(even) {
        background-color: #fdfdfd;
    }

    .message-box {
        width: 200px;
    }
</style>
<?php

global $wpdb;
$table_name = $wpdb->prefix . 'newsletter';

if (isset($_POST['delete-client'])) {
    $client_id = intval($_POST['client-id']);
    if ($client_id > 0) {
        $wpdb->delete($table_name, ['id' => $client_id]);
    }
}
if (isset($_POST['search'])) {
    $search_name = sanitize_text_field($_POST['search-name']);
    $query = "SELECT * FROM $table_name WHERE nome LIKE %s ORDER BY CASE WHEN nome = %s THEN 1 WHEN nome LIKE %s THEN 2 ELSE 3 END";
    $results = $wpdb->get_results($wpdb->prepare($query, '%' . $search_name . '%', $search_name, $search_name . '%'));

    if (empty($results)) {

        echo '<p class="user_nao_encontado">Nenhum usuário encontrado.</p>';
        $query = "SELECT * FROM $table_name";
        $results = $wpdb->get_results($query);
    }
} else {
    $query = "SELECT * FROM $table_name";
    $results = $wpdb->get_results($query);
}


if ($results) {
    echo '<form method="post">';
    echo '<input type="text" name="search-name" id="search-name" placeholder="Pesquisar pelo nome">';
    echo '<button type="submit" name="search" class="btn-pesquisar">Pesquisar</button>';
    echo '</form>';
    echo '<table class="clientes_info">';
    echo '<tr>';
    echo '<th>Nome</th>';
    echo '<th>Email</th>';
    echo '<th>Numero de quartos</th>';
    echo '<th>Garagem para Quantos Carros</th>';
    echo '<th>Quantidade de banheiro</th>';
    echo '<th>Tipo Imovel</th>';
    echo '</tr>';
    
    foreach ($results as $row) {
        echo '<tr>';
        echo '<td>' . esc_html($row->nome) . '</td>';
        echo '<td>' . esc_html($row->email) . '</td>';
        echo '<td>' . esc_html($row->numero_quartos) . '</td>';
        echo '<td>' . esc_html($row->com_garagem) . '</td>';
        echo '<td>' . esc_html($row->qtd_banheiro) . '</td>';
        echo '<td>' . esc_html($row->tipo_imovel) . '</td>';

        echo '</td>';
        echo '<td>';
        echo '<form method="post">';
        echo '<input type="hidden" name="client-id" value="' . $row->id . '">';
        echo '<button type="submit" class="excluir-btn" name="delete-client">Excluir</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
    
    echo '</table>';
}
?>

