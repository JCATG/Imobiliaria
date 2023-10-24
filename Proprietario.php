<?php
if (isset($_POST['cadastrar_prop'])) {

    global $wpdb;

    $table = $wpdb->prefix . 'proprietarios';

    $charset_collate = $wpdb->get_charset_collate();

    //Recupera os valores que o usuario digitar no formulario
    $nome = isset($_POST['nome']) ? sanitize_text_field($_POST['nome']) : '';
    $idade = isset($_POST['idade']) ? sanitize_text_field($_POST['idade']) : '';
    $endereco = isset($_POST['endereco']) ? sanitize_text_field($_POST['endereco']) : '';
    $cpf = isset($_POST['cpf']) ? sanitize_text_field($_POST['cpf']) : '';
    $rg = isset($_POST['rg']) ? sanitize_text_field($_POST['rg']) : '';
    $estado_civil = isset($_POST['estado_civil']) ? sanitize_text_field($_POST['estado_civil']) : '';
    $renda = isset($_POST['renda']) ? sanitize_text_field($_POST['renda']) : '';

    $existing_user = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table WHERE cpf = %s", $cpf));

    if ($existing_user) {
        echo '<p>Proprietario com o CPF ' . esc_html($cpf) . ' já está cadastrado.</p>';
        //ajustarv para que quando der o erro nao inserir no banco, 
    } else {
        $sql = "CREATE TABLE IF NOT EXISTS $table (
    id INT NOT NULL AUTO_INCREMENT,
    nome varchar(50) NOT NULL,
    idade int,
    endereco varchar(200),
    cpf int,
    rg int,
    estado_civil varchar(50),
    renda float,
    PRIMARY KEY (id)
    ) $charset_collate;";
    }
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    $wpdb->insert(
        $table,
        array(
            'nome' => $nome,
            'idade' => $idade,
            'endereco' => $endereco,
            'cpf' => $cpf,
            'rg' => $rg,
            'estado_civil' => $estado_civil,
            'renda' => $renda
        )
    );
}
//exclui dados do banco

?>
<h1>Cadastro de Proprietarios</h1>
<form method="post" class="flex flex-wrap">
    <input type="text" placeholder="Nome:" name="nome">
    <input type="text" placeholder="Idade:" name="idade">
    <input type="text" placeholder="Endereço:" name="endereco">
    <input type="text" placeholder="CPF:" name="cpf">
    <input type="text" placeholder="RG:" name="rg">
    <input type="text" placeholder="Telefone:" name="tel">
    <input type="text" placeholder="Estado Civil" name="estado_civil">
    <input type="text" placeholder="Renda mensal:" name="renda">
    <input type="submit" value="Cadastrar" name="cadastrar_prop">
</form>

<?php
global $wpdb;
$table_name = $wpdb->prefix . 'proprietarios';

if (isset($_POST['delete-client'])) {
    $client_id = intval($_POST['client-id']);
    if ($client_id > 0) {
        $wpdb->delete($table_name, ['id' => $client_id]);
    }
}

if (isset($_POST['search'])) {
    $search_name = sanitize_text_field($_POST['search-name']);
    $query = $wpdb->prepare("SELECT * FROM $table_name WHERE nome LIKE %s", '%' . $search_name . '%');
    $results = $wpdb->get_results($query);
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
    echo '<th>id</th>';
    echo '<th>Nome</th>';
    echo '<th>Idade</th>';
    echo '<th>Endereço</th>';
    echo '<th>CPF</th>';
    echo '<th>RG</th>';
    echo '<th>Estado Civil</th>';
    echo '<th>Renda Mensal</th>';
    echo '<th>Excluir</th>';
    echo '</tr>';
    foreach ($results as $row) {
        echo '<tr>';
        echo '<td>' . esc_html($row->id) . '</td>';
        echo '<td>' . esc_html($row->nome) . '</td>';
        echo '<td>' . esc_html($row->idade) . '</td>';
        echo '<td>' . esc_html($row->endereco) . '</td>';
        echo '<td>' . esc_html($row->cpf) . '</td>';
        echo '<td>' . esc_html($row->rg) . '</td>';
        echo '<td>' . esc_html($row->estado_civil) . '</td>';
        echo '<td>' . esc_html($row->renda) . '</td>';

        echo '<td>';
        echo '<form method="post">';
        echo '<input type="hidden" name="client-id" value="' . $row->id . '">';
        echo '<button type="submit" class="excluir-btn" name="delete-client" onclick="return confirm(\'Tem certeza que deseja excluir este cliente?\');">Excluir</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
?>
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