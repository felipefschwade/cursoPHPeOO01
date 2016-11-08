<?php
require_once("cabecalho.php");
require_once("banco-produto.php");
require_once("class/Produto.php");
require_once("class/Categoria.php");

$Produto = new Produto();
$categoria = new Categoria();

$Produto->id = $_POST['id'];
$Produto->nome = $_POST['nome'];
$Produto->preco = $_POST['preco'];
$Produto->descricao = $_POST['descricao'];

if(array_key_exists('usado', $_POST)) {
	$Produto->usado = "true";
} else {
	$Produto->usado = "false";
}

$categoria->id = $_POST['categoria_id'];

$Produto->categoria = $categoria;
if(alteraProduto($conexao, $Produto)) { ?>
	<p class="text-success">O produto <?= $Produto->nome ?>, <?= $Produto->preco ?> foi alterado.</p>
<?php 
} else {
	$msg = mysqli_error($conexao);
?>
	<p class="text-danger">O produto <?= $Produto->nome ?> não foi alterado: <?= $msg?></p>
<?php
}
?>

<?php include("rodape.php"); ?>