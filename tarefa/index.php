<?php include "cabecalho.php" ?>
<center>
<h1>📌Tarefas</h1>
<a href="novo-formulario.php" class="btn btn-primary">Adicionar Tarefa</a>
<br>
<hr>
<br>
<h2>Lista de Tarefas</h2>
<br>
<table class="table">
    <tr>
        <th>&nbsp;</th>
        <th>ID</th>
        <th>Título</th>
        <th>Descrição</th>
        <th>Status</th>
        <th>&nbsp;</th>
    </tr>

    <?php
    include "conexao.php";
    $sql = "select * from tarefas order by status asc, id desc";
    $resultado = mysqli_query($conexao, $sql);

    while($umaTarefa = mysqli_fetch_assoc($resultado)){
    ?>

    <tr>
        <td>
        <?php
        if($umaTarefa['status'] == 0){
            ?>
            <a href="editar-salvar.php?id=<?=$umaTarefa['id']?>">✔</a>;
            <?php
        }
        ?>   
        </td>
        <td><?=$umaTarefa['id'];?></td>
        <td><?=$umaTarefa['titulo'];?></td>
        <td><?=$umaTarefa['descricao'];?></td>
        <td>
            <?php
            if($umaTarefa['status'] == 1){
                echo "Completo";
                }else{
                    echo "Pendente";
                }
                ?>
        </td>
        <td>
            <a href="excluir.php?id=<?=$umaTarefa['id']?>" onclick="return confirm('Tem certeza que deseja deletar este registro?')" class="btn">❌</a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>

</center>
<?php include "rodape.php" ?>