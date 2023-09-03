<?php
// Array com os dias úteis da semana
$dias_semana = array('Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira');

// Conexão com o banco de dados
require_once 'conexao.php';

// Verificar se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conn->connect_error);
}

// Definir a semana inicialmente como a semana atual
$semana_desejada = date('Y-m-d', strtotime('monday this week'));

// Verificar se o usuário selecionou uma semana diferente
if (isset($_GET['semana'])) {
    $semana_desejada = $_GET['semana'];
}

// Calcular a data de início e fim da semana
$inicio_semana = date('Y-m-d', strtotime('monday this week', strtotime($semana_desejada)));
$fim_semana = date('Y-m-d', strtotime('friday this week', strtotime($semana_desejada)));

// Query para buscar as aulas do professor logado na semana desejada
$id_professor = $_SESSION["id"]; // Defina o ID do professor com base no usuário autenticado
$sql = "SELECT titulo, data, turma FROM aulas WHERE id_professor = '$id_professor' AND data BETWEEN '$inicio_semana' AND '$fim_semana'";
$result = $conn->query($sql);

// Criar um array para armazenar os títulos das aulas por turma
$turmas = array();
while ($row = $result->fetch_assoc()) {
    $data_aula = date('Y-m-d', strtotime($row["data"]));
    $dia_semana = date('N', strtotime($row["data"]));
    $dia_semana_nome = $dias_semana[$dia_semana - 1];
    $turma = $row["turma"];
    $titulo_aula = $row["titulo"];

    if (!isset($turmas[$turma])) {
        $turmas[$turma] = array();
    }

    if (!isset($turmas[$turma][$dia_semana_nome])) {
        $turmas[$turma][$dia_semana_nome] = array();
    }

    $turmas[$turma][$dia_semana_nome][] = $titulo_aula;
}

// Criar a tabela
echo "<table>";
echo "<tr>";
echo "<th>Turma</th>";
foreach ($dias_semana as $dia) {
    echo "<th>" . $dia . "</th>";
}
echo "</tr>";

// Loop para exibir as turmas e os títulos das aulas
foreach ($turmas as $turma => $aulas_por_dia) {
    echo "<tr>";
    echo "<td>" . $turma . "</td>";

    foreach ($dias_semana as $dia) {
        echo "<td>";
        if (isset($aulas_por_dia[$dia])) {
            foreach ($aulas_por_dia[$dia] as $titulo_aula) {
                echo $titulo_aula . "<br>";
            }
        }
        echo "</td>";
    }

    echo "</tr>";
}

echo "</table>";


?>

<!-- Calendário para seleção da semana -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $("#semana").datepicker({
            dateFormat: "yy-mm-dd",
            showWeek: true,
            firstDay: 1,
            onSelect: function (dateText, inst) {
                window.location.href = "index.php?semana=" + dateText;
            }
        });
    });
</script>

<!-- Formulário para seleção da semana -->
<form action="index.php" method="GET">
<br>
    <label for="semana">Selecione a semana:</label>
    <input type="text" id="semana" name="semana" value="<?php echo $semana_desejada; ?>" readonly>
    <input type="submit" value="Selecionar">
</form>
