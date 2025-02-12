<div class="pacientes d-flex justify-content-center align-items-center">
    <div class="tabela-container mt-5 mt-md-0">

        <div class="row titulo-container py-1 mt-5 mt-md-0 mb-0">
            <div class="titulo col-6">
                <h2 class="mt-2">Gestão de Pacientes</h2>
            </div>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <a href="?pagina=inserir_paciente" class="sem-sublinhado"><button class="botao d-flex align-items-center"><i class="fa-solid fa-plus me-2"></i> Novo Paciente</button></a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="tabela table-striped text-center">
                
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Status</th>
                        <th>Editar</th>
                    </tr>
                </thead>

                <tbody>
                        
                        <?php
                            while ($linha = mysqli_fetch_array($consulta_pacientes)) {
                                echo "<tr>
                                        <td><a href='?pagina=linha_do_tempo&id=" . $linha['id'] . "' class='sem-sublinhado link'>" . $linha['nome'] . "</a></td>   
                                        <td> " . $linha['cpf'] . " </td>  
                                        <td> " . $linha['telefone'] . " </td>";
                                        
                                if ($linha['situacao'] == 1) {
                                    echo "<td><i class='fa-solid fa-check'></i></td>";
                                } else {
                                    echo "<td><i class='fa-solid fa-x'></i></td>";
                                }

                                echo "<td><a href='?pagina=editar_paciente&id=" . $linha['id'] . "'><button class='botao-icone'><i class='fa-solid fa-pen'></i></button></a></td>
                                </tr>";
                            } 
                        ?>
    
                </tbody>

            </table>
        </div>

    </div>
</div>