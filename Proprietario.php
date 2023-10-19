<?php
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
    echo '<p>Usuário com o CPF ' . esc_html($cpf) . ' já está cadastrado.</p>';
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
    <input type="submit" value="Cadastrar">
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
$query = "SELECT * FROM $table_name";
$results = $wpdb->get_results($query);

if ($results) {
    echo '<ul class = "clientes_info">';
    foreach ($results as $row) {
        echo '<li>Nome:' . esc_html($row->nome) . '</li>';
        echo '<li>Idade: ' . esc_html($row->idade) . '</li>';
        echo '<li>Endereço: ' . esc_html($row->endereco) . '</li>';
        echo '<li>Cpf: ' . esc_html($row->cpf) . '</li>';
        echo '<li>Rg: ' . esc_html($row->rg) . '</li>';
        echo '<li>Estado Civil: ' . esc_html($row->estado_civil) . '</li>';
        echo '<li>Renda Mensal: ' . esc_html($row->renda) . '</li>';

        echo '<form method="post">';
        echo '<input type="hidden" name="client-id" value="' . $row->id . '">';
        echo '<button type="submit" name="delete-client">Excluir</button>';
        echo '</form>';
    echo '</ul>';

    }
}
?>
<style>
    .clientes_info {
        display: flex;
        gap: 18px;
    }
    p{
        color: red;
    }
</style>