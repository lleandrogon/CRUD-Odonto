<div class="pacientes">
    <h1 class="titulo-2 text-center mt-4 mb-1">Insira um novo paciente</h1>
    <div class="form-inserir-container">
        <form action="processa_paciente.php" method="post" class="form-inserir">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome">
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf">
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone">
            </div>
            <div class="botoes-inserir d-flex justify-content-end align-items-center mt-5">
                <button type="submit" class="botao-sucesso text-center mx-1">Inserir</button>
                <a href="?pagina=#">
                    <button type="button" class="botao-cancelar text-center mx-1">Cancelar</button>
                </a>
            </div>
        </form>
    </div>
</div>