<table id="lista_clientes" class="table table-sm table-hover table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Data</th>
            <th scope="col">Grupo</th>
            <th scope="col">Descrição</th>
            <th scope="col">Valor</th>
            <th scope="col">Pgto</th>
            <th scope="col">ACAO</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($lancamentos as $lancamento): ?>
        <tr>
            <td><input type="checkbox" name="cadastro[]"></td>
            <td><?= Helper::dataToBr($lancamento['dt_lancamento']) ?></td>
            <td><?= utf8_encode($lancamento['grupo']) ?></td>
            <td><?= utf8_encode($lancamento['descricao' ]) ?></td>
            <td><?= $lancamento['valor' ] ?></td>
            <td><?= utf8_encode($lancamento['pagamento']) ?></td>
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