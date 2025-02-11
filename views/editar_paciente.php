<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $consulta_paciente = mysqli_query($conexao, "SELECT * FROM pacientes WHERE id = $id");
        
        if ($linha = mysqli_fetch_array($consulta_paciente)) {
?>

<div class="pacientes">
    <h1 class="titulo-2 text-center mt-4 mb-1">Editar Paciente</h1>
    <div class="form-inserir-container">
        <form action="atualizar_paciente.php" method="post" class="form-inserir">
            <input type="hidden" name="id" value="<?php echo $linha['id']; ?>">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $linha['nome']; ?>">
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $linha['cpf']; ?>">
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $linha['telefone']; ?>">
            </div>
            <div class="mb-3">
                <label for="situacao" class="form-label">Status</label><br>
                <div class="d-flex">
                    <div class="form-check me-3">
                        <input type="radio" id="ativo" name="situacao" value="1" class="form-check-input" <?php echo ($linha['situacao'] == 1) ? 'checked' : ''; ?>>
                        <label for="ativo" class="form-check-label">Ativo</label>
                    </div>

                    <div class="form-check">
                        <input type="radio" id="inativo" name="situacao" value="0" class="form-check-input" <?php echo ($linha['situacao'] == 0) ? 'checked' : ''; ?>>
                        <label for="inativo" class="form-check-label">Inativo</label>
                    </div>
                </div>
            </div>
            
            <div class="botoes-inserir d-flex justify-content-end align-items-center mt-5">
                <button type="submit" class="botao-sucesso text-center mx-1">Editar</button>
                <a href="?pagina=#">
                    <button type="button" class="botao-cancelar text-center mx-1">Cancelar</button>
                </a>
            </div>
        </form>
    </div>
</div>

<?php 
        } else {
            echo "Paciente não encontrado.";
        }
    } else {
        echo "ID não informado.";
    }
?>
