<h1>Imoveis para possivel negociação</h1>
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
$table_name = $wpdb->prefix . 'formulario';

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
        echo '<td>' . esc_html($row->celular) . '</td>';
        echo '<td>' . esc_html($row->cidade) . '</td>';
        echo '<td>' . esc_html($row->tipoImovel) . '</td>';
        echo '<td>' . esc_html($row->finalidade) . '</td>';
        echo '<td>' . esc_html($row->cidadeimovel) . '</td>';
        echo '<td class="mensagem">';
        $mensagem = esc_html($row->mensagem);

        if (strlen($mensagem) > 10) {
            $limite_letras = 10;
            $primeiras_10_letras = substr($mensagem, 0, $limite_letras);
            $resto_da_mensagem = substr($mensagem, $limite_letras);

            echo '<span class="resumo">' . $primeiras_10_letras . '</span>';
            echo '<span class="texto-completo" style="display: none;">' . $resto_da_mensagem . '</span>';
            echo '<a class="read-more" href="#">... Leia mais</a>';
            echo '<a class="read-less" href="#" style="display: none;"> Leia menos</a>';
        } else {
            echo $mensagem;
        }

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const readMoreLinks = document.querySelectorAll('.read-more');
        const readLessLinks = document.querySelectorAll('.read-less');

        readMoreLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const summary = this.parentElement;
                const fullMessage = summary.querySelector('.texto-completo');
                const readMoreButton = summary.querySelector('.read-more');
                const readLessButton = summary.querySelector('.read-less');
                fullMessage.style.display = 'inline';
                readMoreButton.style.display = 'none';
                readLessButton.style.display = 'inline';
                const summaryText = summary.querySelector('.resumo');
                summaryText.style.display = 'none';
            });
        });

        readLessLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const fullMessage = this.parentElement.querySelector('.texto-completo');
                const readMoreButton = this.parentElement.querySelector('.read-more');
                const readLessButton = this.parentElement.querySelector('.read-less');
                fullMessage.style.display = 'none';
                readMoreButton.style.display = 'inline';
                readLessButton.style.display = 'none';
                const summaryText = this.parentElement.querySelector('.resumo');
                summaryText.style.display = 'inline';
            });
        });
    });
</script>

