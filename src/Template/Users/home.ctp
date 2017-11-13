<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr[]|\Cake\Collection\CollectionInterface $sadrs
 */
// pr($this);
// pr($sadrs);
?>

<div class="row">
    <div class="col-md-4">
        <h2>ADR</h2>
        <p>Adverse drug reaction. 
          <?php
              if($this->request->session()->read('Auth.User')) {
          ?>
          <a class="btn btn-primary" href="/sadrs/add" role="button"><i class="fa fa-plus" aria-hidden="true"></i>
</a>
          <?php                  
              } else {
          ?>
          <a class="btn btn-primary" href="/sadrs/add" role="button">Report &raquo;</a>
          <?php
              }
          ?>
        </p>
        <div>
          <?php //echo $this->Paginator->options(['defaultModel' => 'Sadrs']); ?>
        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'Reference #', ['model' => 'Sadrs']) ?></th>                
                    <th><?= $this->Paginator->sort('created', 'Created Date', ['model' => 'Sadrs']) ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sadrs as $sadr): ?>
                <tr>
                    <td><?= $this->Html->link('ADR'.$this->Number->format($sadr->id).'/'.$sadr->created->i18nFormat('yyyy'), ['controller' => 'Sadrs', 'action' => 'edit', $sadr->id])
                     ?></td>
                    <td><?= h($sadr->created->i18nFormat('dd-MM-yyyy')) ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2">
                        <hr>
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <?= $this->Paginator->first('<< ' . __('first'), ['model' => 'Sadrs']) ?>
                                <?= $this->Paginator->prev('< ' . __('previous'), ['model' => 'Sadrs']) ?>
                                <?= $this->Paginator->numbers(['model' => 'Sadrs']) ?>
                                <?= $this->Paginator->next(__('next') . ' >', ['model' => 'Sadrs']) ?>
                                <?= $this->Paginator->last(__('last') . ' >>', ['model' => 'Sadrs']) ?>
                            </ul>
                            <h6><small><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></small></h6>
                        </nav>
                    </td>
                </tr>
            </tbody>
        </table>
        
        </div>
      
    </div>
    <div class="col-md-4">
        <h2>AEFI</h2>
        <p>Adverse Event Following Immunization. 
          <?php
              if($this->request->session()->read('Auth.User')) {
          ?>
          <a class="btn btn-success" href="/aefi/add" role="button"><i class="fa fa-plus" aria-hidden="true"></i></a>
          <?php                  
              } else {
          ?>
          <a class="btn btn-success" href="/aefi/add" role="button">Report &raquo;</a>
          <?php
              }
          ?>
        </p>
        <div>
        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'Reference #', ['model' => 'Aefis']) ?></th>                
                    <th><?= $this->Paginator->sort('created', 'Created Date', ['model' => 'Aefis']) ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($aefis as $aefi): ?>
                <tr>
                    <td><?= $this->Html->link('AEFI'.$this->Number->format($aefi->id).'/'.$aefi->created->i18nFormat('yyyy'), ['controller' => 'Aefis', 'action' => 'edit', $aefi->id])
                     ?></td>
                    <td><?= h($aefi->created->i18nFormat('dd-MM-yyyy')) ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2">
                        <hr>
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <?= $this->Paginator->first('<< ' . __('first'), ['model' => 'Aefis']) ?>
                                <?= $this->Paginator->prev('< ' . __('previous'), ['model' => 'Aefis']) ?>
                                <?= $this->Paginator->numbers(['model' => 'Aefis']) ?>
                                <?= $this->Paginator->next(__('next') . ' >', ['model' => 'Aefis']) ?>
                                <?= $this->Paginator->last(__('last') . ' >>', ['model' => 'Aefis']) ?>
                            </ul>
                            <h6><small><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></small></h6>
                        </nav>
                    </td>
                </tr>
            </tbody>
        </table>
        
        </div>
      
    </div>
    <!-- SAE -->
    <div class="col-md-4">
        <h2>SAE</h2>
        <p>SERIOUS ADVERSE EVENT REPORTING FORM. 
          <?php
              if($this->request->session()->read('Auth.User')) {
          ?>
          <a class="btn btn-info" href="/adrs/add" role="button"><i class="fa fa-plus" aria-hidden="true"></i></a>
          <?php                  
              } else {
          ?>
          <a class="btn btn-info" href="/adrs/add" role="button">Report &raquo;</a>
          <?php
              }
          ?>
        </p>
        <div>
        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'Reference #', ['model' => 'Adrs']) ?></th>                
                    <th><?= $this->Paginator->sort('created', 'Created Date', ['model' => 'Adrs']) ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($adrs as $adr): ?>
                <tr>
                    <td><?= $this->Html->link('SAE'.$this->Number->format($adr->id).'/'.$adr->created->i18nFormat('yyyy'), ['controller' => 'Adrs', 'action' => 'edit', $adr->id])
                     ?></td>
                    <td><?= h($adr->created->i18nFormat('dd-MM-yyyy')) ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2">
                        <hr>
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <?= $this->Paginator->first('<< ' . __('first'), ['model' => 'Adrs']) ?>
                                <?= $this->Paginator->prev('< ' . __('previous'), ['model' => 'Adrs']) ?>
                                <?= $this->Paginator->numbers(['model' => 'Adrs']) ?>
                                <?= $this->Paginator->next(__('next') . ' >', ['model' => 'Adrs']) ?>
                                <?= $this->Paginator->last(__('last') . ' >>', ['model' => 'Adrs']) ?>
                            </ul>
                            <h6><small><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></small></h6>
                        </nav>
                    </td>
                </tr>
            </tbody>
        </table>
        
        </div>
      
    </div>
</div>