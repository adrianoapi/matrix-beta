<div class="row">
                          <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                              <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons">add_circle</i>
                                </div>
                                <p class="card-category">Receita</p>
                                <h3 class="card-title">R$ <?= number_format($receita[0]['total'], 2, ',', '.') ?></h3>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                  <i class="material-icons text-danger">warning</i>
                                  <a href="#pablo">Get More Space...</a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                              <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons">payment</i>
                                </div>
                                <p class="card-category">Despesa</p>
                                <h3 class="card-title">R$ <?= number_format($despesa[0]['total'], 2, ',', '.') ?></h3>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                  <i class="material-icons">local_offer</i> Tracked from Google Analytics
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                              <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons">swap_horiz</i>
                                </div>
                                <p class="card-category">Fluxo</p>
                                <h3 class="card-title">R$ <?= number_format($receita[0]['total'] - $despesa[0]['total'], 2, ',', '.') ?></h3>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                  <i class="material-icons">date_range</i> Last 24 Hours
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                              <div class="card-header card-header-danger card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons">save_alt</i>
                                </div>
                                <p class="card-category">Perspectiva</p>
                                <h3 class="card-title">R$ <?= number_format($despesa[0]['total'] - 5400, 2, ',', '.') ?></h3>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                  <i class="material-icons">update</i> Just Updated
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
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
