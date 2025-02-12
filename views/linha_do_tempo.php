<?php
require "db.php";

$id_paciente = $_GET['id'];

$query_nome = "SELECT nome FROM pacientes WHERE id = $id_paciente";
$result_nome = mysqli_query($conexao, $query_nome);
$nome_paciente = mysqli_fetch_assoc($result_nome)['nome'] ?? 'Paciente';

$query = "SELECT data_alteracao, situacao FROM historico_status WHERE paciente_id = $id_paciente ORDER BY data_alteracao ASC";
$result = mysqli_query($conexao, $query);

$datas = [];
$status = [];

while ($row = mysqli_fetch_assoc($result)) {
    $datas[] = $row['data_alteracao'];
    $status[] = $row['situacao'];
}
?>

<div class="d-flex justify-content-center align-items-center">

    <div class="linha-do-tempo">
        <h1 class="titulo-2 text-center mt-4 mb-1">Status - <?php echo htmlspecialchars($nome_paciente); ?></h1>
        <canvas id="timelineChart" width="800" height="400" style="width: 100%;"></canvas>
    </div>

    <script>
    const data = <?php echo json_encode(array_map(function ($date, $status) {
                        return ['date' => $date, 'status' => (int)$status];
                    }, $datas, $status)); ?>;

    function formatDate(dateStr) {
        return new Date(dateStr).getTime();
    }

    const canvas = document.getElementById('timelineChart');
    const ctx = canvas.getContext('2d');

    function resizeCanvas() {
        canvas.width = canvas.parentElement.offsetWidth;
        drawGraph(data);
    }

    window.addEventListener('resize', resizeCanvas);

    function drawGraph(data) {
        if (data.length === 0) return; // Evitar erros se não houver dados

        const dates = data.map(item => formatDate(item.date));
        const status = data.map(item => item.status);

        const margin = 50;
        const width = canvas.width - margin * 2;
        const height = canvas.height - margin * 2;

        ctx.clearRect(0, 0, canvas.width, canvas.height);

        // Linhas de base
        ctx.beginPath();
        ctx.moveTo(margin, height + margin);
        ctx.lineTo(width + margin, height + margin);
        ctx.strokeStyle = '#0095EB';
        ctx.stroke();

        ctx.beginPath();
        ctx.moveTo(margin, margin);
        ctx.lineTo(margin, height + margin);
        ctx.strokeStyle = '#0095EB';
        ctx.stroke();

        // Calcular escala de datas
        const dateRange = dates[dates.length - 1] - dates[0] || 1; // Evitar divisão por zero

        // Linha do gráfico
        ctx.beginPath();
        ctx.moveTo(margin, height + margin - status[0] * 100);
        for (let i = 1; i < data.length; i++) {
            const x = margin + ((dates[i] - dates[0]) / dateRange) * width;
            const y = height + margin - status[i] * 100;
            ctx.lineTo(x, y);
        }
        ctx.strokeStyle = '#4CAF50';
        ctx.lineWidth = 2;
        ctx.stroke();

        // Pontos no gráfico
        data.forEach((item, index) => {
            const x = margin + ((formatDate(item.date) - dates[0]) / dateRange) * width;
            const y = height + margin - item.status * 100;

            ctx.beginPath();
            ctx.arc(x, y, 6, 0, Math.PI * 2, false);
            ctx.fillStyle = item.status === 1 ? '#4CAF50' : '#F44336';
            ctx.fill();
        });

        // Rótulos das datas
        const step = width / (data.length - 1 || 1);
        data.forEach((item, i) => {
            const x = margin + i * step;
            const y = height + margin + 25;

            ctx.font = '14px Arial';
            ctx.fillStyle = '#0095EB';
            ctx.textAlign = 'center';
            ctx.fillText(new Date(item.date).toLocaleDateString(), x, y);
        });
    }

    drawGraph(data);
</script>
    
</div>

<a href="?pagina=#" class="d-flex justify-content-center mt-4 sem-sublinhado">
    <button type="button" class="botao-sucesso text-center mx-1">Voltar</button>
</a>