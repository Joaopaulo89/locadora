<form method="post" action="index.php">
    <input type="hidden" name="id" value="<?php echo isset($veiculoEdit) ? $veiculoEdit->getId() : ''; ?>">
    
    <label>Modelo:
        <input type="text" name="modelo" required value="<?php echo isset($veiculoEdit) ? $veiculoEdit->getModelo() : ''; ?>">
    </label><br>

    <label>Marca:
        <input type="text" name="marca" required value="<?php echo isset($veiculoEdit) ? $veiculoEdit->getMarca() : ''; ?>">
    </label><br>

    <label>Ano:
        <input type="number" name="ano" required value="<?php echo isset($veiculoEdit) ? $veiculoEdit->getAno() : ''; ?>">
    </label><br>

    <label>Preço:
        <input type="number" name="preco" required value="<?php echo isset($veiculoEdit) ? $veiculoEdit->getPreco() : ''; ?>">
    </label><br>

    <label>Situação:
        <select name="situacao">
            <option value="Disponível" <?php echo (isset($veiculoEdit) && $veiculoEdit->getSituacao() == 'Disponível') ? 'selected' : ''; ?>>Disponível</option>
            <option value="Alugado" <?php echo (isset($veiculoEdit) && $veiculoEdit->getSituacao() == 'Alugado') ? 'selected' : ''; ?>>Alugado</option>
        </select>
    </label><br>

    <button type="submit" name="acao" value="salvar">Salvar</button>
</form>