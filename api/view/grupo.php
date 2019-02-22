<table id="lista_clientes" class="table table-sm table-hover table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">NOME</th>
            <th scope="col">EMAIL</th>
            <th scope="col">ACAO</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($clientes as $cliente): ?>
        <tr>
            <td><input type="checkbox" name="cadastro[]"></td>
            <td><?= $cliente['id'   ] ?></td>
            <td><a href="#" id="<?= $cliente['id'] ?>" onClick="edit_row(this.id)" alt="clique alterar" title="clique alterar"><?= $cliente['nome' ] ?></a></td>
            <td><?= $cliente['email'] ?></td>
            <td>
                <!--<input type="button" class="btn btn-primary " id="<?= $cliente['id'] ?>" value="E" onClick="edit_row(this.id)">-->
                <input type="button" class="btn btn-danger" id="<?= $cliente['id'] ?>" value="Excluir" onClick="del_row(this.id,this)">
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
    <tfoot>
        <tr><td colspan="5"><input type="button" class="btn btn-danger" value="Excluir itens"></td></tr>
    </tfoot>
</table>