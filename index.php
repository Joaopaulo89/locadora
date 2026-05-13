<?php  
require_once 'controller/VeiculoController.php';
require_once 'model/Veiculo.php';

$controller = new VeiculoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modelo   = $_POST['modelo'];
    $marca    = $_POST['marca'];
    $ano      = $_POST['ano'];
    $preco    = $_POST['preco'];
    $situacao = $_POST['situacao'];
    $id       = $_POST['id'] ?? '';

    if ($_POST['acao'] === 'salvar') {
        if ($id) {
            $controller->atualizar($id, $modelo, $marca, $ano, $preco, $situacao);
        } else {
            $controller->salvar($modelo, $marca, $ano, $preco, $situacao);
        }
    }
}

if (isset($_GET['editar'])) {
    $veiculoEdit = $controller->buscarPorId($_GET['editar']);
}

if (isset($_GET['deletar'])) {
    $controller->deletar($_GET['deletar']);
}

if (isset($_GET['alugar'])) {
    $controller->atualizarSituacao($_GET['alugar'], 'Alugado');
}

if (isset($_GET['devolver'])) {
    $controller->atualizarSituacao($_GET['devolver'], 'Disponível');
}

require_once 'view/veiculo_form.php';

$veiculos = $controller->listar();
echo "<h2>Lista de Veículos</h2>";
echo "<table border='1'>";
echo "<tr><th>Modelo</th><th>Marca</th><th>Ano</th><th>Preço</th><th>Situação</th><th>Ações</th></tr>";
foreach ($veiculos as $v) {
    echo "<tr>";
    echo "<td>{$v->getModelo()}</td>";
    echo "<td>{$v->getMarca()}</td>";
    echo "<td>{$v->getAno()}</td>";
    echo "<td>R$ {$v->getPreco()}</td>";
    echo "<td>{$v->getSituacao()}</td>";
    echo "<td>";
    if ($v->getSituacao() == 'Disponível') {
        echo "<a href='?alugar={$v->getId()}'>Alugar</a> | ";
    } else {
        echo "<a href='?devolver={$v->getId()}'>Devolver</a> | ";
    }
    echo "<a href='?editar={$v->getId()}'>Editar</a> | ";
    echo "<a href='?deletar={$v->getId()}' onclick=\"return confirm('Deseja realmente excluir?');\">Excluir</a>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";