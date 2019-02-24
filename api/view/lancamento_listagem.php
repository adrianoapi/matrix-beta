<table id="lista_clientes" class="table table-sm table-hover table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">id</th>
            <th scope="col">descricao</th>
            <th scope="col">valor</th>
            <th scope="col">ACAO</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($lancamentos as $lancamento): ?>
        <tr>
            <td><input type="checkbox" name="cadastro[]"></td>
            <td><?= $lancamento['id'   ] ?></td>
            <td><a href="#" id="<?= $lancamento['id'] ?>" onClick="edit_row(this.id)" alt="clique alterar" title="clique alterar"><?= $lancamento['descricao' ] ?></a></td>
            <td><a href="#" id="<?= $lancamento['id'] ?>" onClick="edit_row(this.id)" alt="clique alterar" title="clique alterar"><?= $lancamento['valor' ] ?></a></td>
            <td>
                <!--<input type="button" class="btn btn-primary " id="<?= $lancamento['id'] ?>" value="E" onClick="edit_row(this.id)">-->
                <input type="button" class="btn btn-danger" id="<?= $lancamento['id'] ?>" value="Excluir" onClick="del_row(this.id,this)">
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
    <tfoot>
        <tr><td colspan="5"><input type="button" class="btn btn-danger" value="Excluir itens"></td></tr>
    </tfoot>
</table>