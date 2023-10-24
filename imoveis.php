<?php
if (isset($_POST['cadastrar_imovel'])) {

    global $wpdb;

    $table = $wpdb->prefix . 'imoveis';

    $charset_collate = $wpdb->get_charset_collate();

    //Recupera os valores que o usuario digitar no formulario
    $cidade = isset($_POST['cidade']) ? sanitize_text_field($_POST['cidade']) : '';
    $endereco = isset($_POST['endereco']) ? sanitize_text_field($_POST['endereco']) : '';
    $bairro = isset($_POST['bairro']) ? sanitize_text_field($_POST['bairro']) : '';
    $uf = isset($_POST['UF']) ? sanitize_text_field($_POST['UF']) : '';
    $numero_escritura = isset($_POST['numero_escritura']) ? sanitize_text_field($_POST['numero_escritura']) : '';
    $largura_terreno = isset($_POST['largura_terreno']) ? sanitize_text_field($_POST['largura_terreno']) : '';
    $qdt_quarto = isset($_POST['qtd_quartos']) ? sanitize_text_field($_POST['qtd_quartos']) : '';
    $qtd_sala = isset($_POST['qtd_sala']) ? sanitize_text_field($_POST['qtd_sala']) : '';
    $qtd_garagem = isset($_POST['qtd_garagem']) ? sanitize_text_field($_POST['qtd_garagem']) : '';
    $qtd_banheiro = isset($_POST['qtd_banheiro']) ? sanitize_text_field($_POST['qtd_banheiro']) : '';
    $tipo_imovel = isset($_POST['tipo_imovel']) ? sanitize_text_field($_POST['tipo_imovel']) : '';
    $status_imovel = isset($_POST['status_imovel']) ? sanitize_text_field($_POST['status_imovel']) : '';
    $finalidade = isset($_POST['finalidade']) ? sanitize_text_field($_POST['finalidade']) : '';
    $valor_imovel = isset($_POST['valor_imovel']) ? sanitize_text_field($_POST['valor_imovel']) : '';
    $iptu = isset($_POST['iptu']) ? sanitize_text_field($_POST['iptu']) : '';
    $referencia = isset($_POST['referencia']) ? sanitize_text_field($_POST['referencia']) : '';


    $existing_imovel = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table WHERE numero_escritura = %s", $numero_escritura));

    if ($existing_imovel) {
        echo '<p>Imovel ja cadastrado com esse numero ' . esc_html($numero_escritura) . ' de escritura, revise os dados.</p>';
        //ajustarv para que quando der o erro nao inserir no banco, 
    } else {
        $sql = "CREATE TABLE IF NOT EXISTS $table (
        id INT NOT NULL AUTO_INCREMENT,
        cidade varchar(250) NOT NULL,
        endereco varchar(250) NOT NULL,
        bairro varchar(200),
        uf varchar(4),
        numero_escritura int,
        largura_terreno int,
        qtd_quarto int,
        qtd_sala int,
        qtd_garagem int,
        qtd_banheiro int,
        tipo_imovel varchar(50),
        status_imovel varchar(50),
        finalidade varchar(50),
        valor_imovel int,
        iptu int,
        referencia varchar(250),
        PRIMARY KEY (id)
        ) $charset_collate;";
    }
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    $wpdb->insert(
        $table,
        array(
            'cidade' => $cidade,
            'endereco' => $endereco,
            'bairro' => $bairro,
            'uf' => $uf,
            'numero_escritura' => $numero_escritura,
            'largura_terreno' => $largura_terreno,
            'qtd_quarto' => $qdt_quarto,
            'qtd_sala' => $qtd_sala,
            'gtd_garagem' => $qtd_garagem,
            'qtd_banheiro' => $qtd_banheiro,
            'tipo_imovel' => $tipo_imovel,
            'status_imovel' => $status_imovel,
            'finalidade' => $finalidade,
            'valor_imovel' => $valor_imovel,
            'iptu' => $iptu,
            'referencia' => $referencia

        )
    );
}
//exclui dados do banco  pegar as informações do proprietario as informações da casa cadastrada e gerar um pdf para imprimir para ele assinar
//id do corretor, colocar em uma tabela e fazer um grafico de quantidades de casasa ou apo cadastrados com o seu id, 
?>

<h1>Cadastro Imovel</h1>
<form method="post" class="flex flex-wrap">
    <input type="text" placeholder="cidade" name="cidade">
    <input type="text" placeholder="Endereço:" name="endereco">
    <input type="text" placeholder="bairro" name="bairro">
    <input type="text" placeholder="UF" name="UF">
    <input type="text" placeholder="numero da escritura:" name="numero_escritura">
    <input type="text" placeholder="largura do terreno" name="largura_terreno">
    <input type="text" placeholder="quantidade de quartos" name="qtd_quartos">
    <input type="text" placeholder="quantidade de sala" name="qtd_sala">
    <input type="text" placeholder="quantidade de garagem" name="qtd_garagem">
    <input type="text" placeholder="quantidade de banheiro" name="qtd_banheiro">
    <input type="text" placeholder="tipo imovel" name="tipo_imovel">
    <input type="text" placeholder="status do imovel" name="status_imovel">
    <input type="text" placeholder="finalidade" name="finalidade">
    <input type="text" placeholder="valor do imovel" name="valor_imovel">
    <input type="text" placeholder="iptu" name="iptu">
    <input type="text" placeholder="referncia do imovel , proximo ao bar do Ze" name="referencia">
    <input type="submit" value="Cadastrar" name="cadastrar_imovel">
</form>
<!-- gerar um relatorio pdf com essas informações cadastradas, e gerra um modelo de contrato e imprimir e dar 
para o proprietario da casa assinar -->
<?php
global $wpdb;
$table_name = $wpdb->prefix . 'imoveis';

if (isset($_POST['delete-imovel'])) {
    $imovel_id = intval($_POST['imovel-id']);
    if ($imovel_id > 0) {
        $wpdb->delete($table_name, ['id' => $imovel_id]);
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
    echo '<th>Cidade</th>';
    echo '<th>Endereço</th>';
    echo '<th>Bairro</th>';
    echo '<th>UF</th>';
    echo '<th>Numero Escritura</th>';
    echo '<th>largura terreno</th>';
    echo '<th>qtd sala</th>';
    echo '<th>qtd quarto</th>';
    echo '<th>qtd banheiro</th>';
    echo '<th>tipo_imovel</th>';
    echo '<th>status_imovel</th>';
    echo '<th>finalidade</th>';
    echo '<th>valor_imovel</th>';
    echo '<th>iptu</th>';
    echo '<th>referencia</th>';
    echo '</tr>';
    foreach ($results as $row) {
        echo '<tr>';
        echo '<td>' . esc_html($row->id) . '</td>';
        echo '<td>' . esc_html($row->cidade) . '</td>';
        echo '<td>' . esc_html($row->endereco) . '</td>';
        echo '<td>' . esc_html($row->bairro) . '</td>';
        echo '<td>' . esc_html($row->UF) . '</td>';
        echo '<td>' . esc_html($row->numero_escritura) . '</td>';
        echo '<td>' . esc_html($row->largura_terreno) . '</td>';
        echo '<td>' . esc_html($row->qtd_sala) . '</td>';
        echo '<td>' . esc_html($row->qtd_quarto) . '</td>';
        echo '<td>' . esc_html($row->qtd_banheiro) . '</td>';
        echo '<td>' . esc_html($row->tipo_imovel) . '</td>';
        echo '<td>' . esc_html($row->status_imovel) . '</td>';
        echo '<td>' . esc_html($row->finalidade) . '</td>';
        echo '<td>' . esc_html($row->valor_imovel) . '</td>';
        echo '<td>' . esc_html($row->iptu) . '</td>';
        echo '<td>' . esc_html($row->referencia) . '</td>';



        echo '<td>';
        echo '<form method="post">';
        echo '<input type="hidden" name="imovel-id" value="' . $row->id . '">';
        echo '<button type="submit" class="excluir-btn" name="delete-imovel" onclick="return confirm(\'Tem certeza que deseja excluir este cliente?\');">Excluir</button>';
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