<?php
/*
Template Name: Relatório Imobiliário
*/
get_header();

global $wpdb;
$table_name = $wpdb->prefix . 'proprietarios';
$imoveis = $wpdb->get_results("SELECT * FROM $table_name");
$mensagem = 

'Olá ' . esc_html($imovel->nome) . ', você acaba de registrar seu imóvel em nossa imobiliária.
Abaixo estão suas informações pessoais
Nome/idade/cpf/rg/endereco/renda
Abaixo esta as informações de sua residencia





Apos confeir todos os dados assine este documento


Ao assinar voce concorda com os termos 
Sua casa está localizada em ' . esc_html($imovel->endereco);



echo '<h1>Relatório Imobiliário</h1>';
echo '<ul>';
foreach ($imoveis as $imovel) {
    echo '<li>';
    echo 'Olá ' . esc_html($imovel->nome) . ', você acaba de registrar seu imóvel em nossa imobiliária. Sua casa está localizada em ' . esc_html($imovel->endereco);
    echo '</li>';
}
echo '</ul>';

get_footer();
?>
