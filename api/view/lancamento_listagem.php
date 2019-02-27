<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Últimos lançamentos</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
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
                        <tr>
                            <td colspan="2">Receita: <?= number_format($receita[0]['total'], 2, ',', '') ?></td>
                            <td colspan="2">Despesa: <?= number_format($despesa[0]['total'], 2, ',', '') ?></td>
                            <td colspan="3">Total:   <?= number_format($receita[0]['total'] - $despesa[0]['total'], 2, ',', '') ?></td>
                        </tr>
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
              </div>
            </div>
 
            </div>
          </div>
