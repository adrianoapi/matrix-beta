<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">


    <table class="table">
      <thead class=" text-primary">
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
      </thead>
      <tbody>
        <?php 
            foreach($lancamentos as $lancamento):

                switch ($lancamento['pagamento_id']) {
                    case 5:
                        $label = 'success';
                        break;
                    case 1:
                        $label = 'primary';
                        break;
                    default:
                        $label = 'danger';
                        break;
                }
        ?>
            <tr>
                <td><input type="checkbox" name="cadastro[]"></td>
                <td><?= Helper::dataToBr($lancamento['dt_lancamento']) ?></td>
                <td><?= utf8_encode($lancamento['grupo']) ?></td>
                <td><?= utf8_encode($lancamento['descricao' ]) ?></td>
                <td class="text-<?=$label?>"><?= $lancamento['valor' ] ?></td>
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

</div>
</div>