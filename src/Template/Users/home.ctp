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
      <div style="min-height: 320px">
        <h3 class="btn-zangu"><?= $this->Html->link('<i class="fa fa-file" aria-hidden="true"></i> ADRS', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu')); ?> <small class="badge" style="background-color: #71C7A0;"><?= $this->Paginator->counter(['format' => __('{{count}}'), 'model' => 'Sadrs']) ?></small>          
        </h3>
        <hr>
        <p>Adverse drug reaction. 
          <small><a class="btn btn-primary tiptip" data-original-title="Report ADR" href="/sadrs/add" role="button"><i class="fa fa-plus" aria-hidden="true"></i></a></small>
        </p>
 
        <ul class="list-unstyled">
          <?php 
            $i = 1;
            foreach ($sadrs as $sadr): ?>
          <li><?php 
                  if($sadr->submitted == 2) {
                    echo $i++.'. '.$this->Html->link('<span class="text-success">'.$sadr->reference_number.' &nbsp; &nbsp;<i class="fa fa-check" aria-hidden="true"></i></span>', ['controller' => 'Sadrs', 'action' => 'view', $sadr->id], ['escape' => false]);
                  } else {
                    echo $i++.'. '.$this->Html->link(h($sadr->created->i18nFormat('dd-MM-yyyy HH:mm')).' &nbsp; &nbsp;<i class="fa fa-pencil" aria-hidden="true"></i>', ['controller' => 'Sadrs', 'action' => 'edit', $sadr->id], ['escape' => false]);
                  }
                  
                 ?></li>
          <?php endforeach; ?>
        </ul>
        <nav aria-label="Page navigation">
          <h6><small><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total'), 'model' => 'Sadrs']) ?></small></h6>
            <ul class="pagination pagination-sm">
                <?= $this->Paginator->first('<< ', ['model' => 'Sadrs']) ?>
                <?= $this->Paginator->prev('< ' , ['model' => 'Sadrs']) ?>
                <?= $this->Paginator->next(' >', ['model' => 'Sadrs']) ?>
                <?= $this->Paginator->last(' >>', ['model' => 'Sadrs']) ?>
            </ul>
                            
        </nav>        
      </div>

        <h3 class="btn-zangu"><?= $this->Html->link('<i class="fa fa-file-o" aria-hidden="true"></i> SAES', ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu')); ?> <small class="badge" style="background-color: #7f7fff;"><?= $this->Paginator->counter(['format' => __('{{count}}'), 'model' => 'Adrs']) ?></small></h3>
        <hr>
          <p>Serious Adverse Event Reporting Form. <a class="btn btn-info tiptip" href="/adrs/add"  data-original-title="Report SAE" role="button"><i class="fa fa-plus" aria-hidden="true"></i></a></p>          
        <ul class="list-unstyled">
          <?php 
            $i = 1;
            foreach ($adrs as $adr): ?>
          <li><?php 
                      if($adr->submitted == 2) {
                        echo $i++.'. '.$this->Html->link('<span class="text-success">'.$adr->reference_number.' &nbsp; &nbsp;<i class="fa fa-check" aria-hidden="true"></i></span>', ['controller' => 'Adrs', 'action' => 'view', $adr->id], ['escape' => false]);
                      } else {
                        echo $i++.'. '.$this->Html->link(h($adr->created->i18nFormat('dd-MM-yyyy HH:mm')).' &nbsp; &nbsp;<i class="fa fa-pencil" aria-hidden="true"></i>', ['controller' => 'Adrs', 'action' => 'edit', $adr->id], ['escape' => false]);
                      }
                      
                     ?></li>
          <?php endforeach; ?>
        </ul>
        <small><i>**The SAE form is to be completed for SAEs from Clinical Trials</i></small>
        <nav aria-label="Page navigation">
            <h6><small><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total'), 'model' => 'Adrs']) ?></small></h6>
            <ul class="pagination pagination-sm">
                <?= $this->Paginator->first('<< ', ['model' => 'Adrs']) ?>
                <?= $this->Paginator->prev('< ' , ['model' => 'Adrs']) ?>
                <?= $this->Paginator->next(' >', ['model' => 'Adrs']) ?>
                <?= $this->Paginator->last(' >>', ['model' => 'Adrs']) ?>
            </ul>
        </nav>  
    </div>
    <div class="col-md-4">
      <div style="min-height: 352px">
        <h3 class="btn-zangu"><?= $this->Html->link('<i class="fa fa-file-text-o" aria-hidden="true"></i> AEFI', ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu')); ?> <small class="badge"  style="background-color: #ff92c9;"><?= $this->Paginator->counter(['format' => __('{{count}}'), 'model' => 'Aefis']) ?></small></h3>
        <hr>
        <p>Adverse Event Following Immunization. 
          <a class="btn btn-success tiptip" href="/aefis/add"  data-original-title="Report AEFI" role="button"><i class="fa fa-plus" aria-hidden="true"></i></a></p>
        <ul class="list-unstyled">
          <?php  
            $i = 1;
            foreach ($aefis as $aefi): ?>
          <li><?php 
                  if($aefi->submitted == 2) {
                    echo $i++.'. '.$this->Html->link('<span class="text-success">'.$aefi->reference_number.' &nbsp; &nbsp;<i class="fa fa-check" aria-hidden="true"></i></span>', ['controller' => 'Aefis', 'action' => 'view', $aefi->id], ['escape' => false]);
                  } else {
                    echo $i++.'. '.$this->Html->link(h($aefi->created->i18nFormat('dd-MM-yyyy HH:mm')).' &nbsp; &nbsp;<i class="fa fa-pencil" aria-hidden="true"></i>', ['controller' => 'Aefis', 'action' => 'edit', $aefi->id], ['escape' => false]);
                  }
                  
                 ?> </li>
          <?php endforeach; ?>
        </ul>
        <nav aria-label="Page navigation">
            <h6><small><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total'), 'model' => 'Aefis']) ?></small></h6>
            <ul class="pagination pagination-sm">
                <?= $this->Paginator->first('<< ', ['model' => 'Aefis']) ?>
                <?= $this->Paginator->prev('< ' , ['model' => 'Aefis']) ?>
                <?= $this->Paginator->next(' >', ['model' => 'Aefis']) ?>
                <?= $this->Paginator->last(' >>', ['model' => 'Aefis']) ?>
            </ul>
        </nav>   
      </div>
         
        <h3 class="btn-zangu"><?= $this->Html->link('<i class="fa fa-file-text" aria-hidden="true"></i> AEFI Investigation', ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu')); ?> <small class="badge" style="background-color: #ff92c9;"><?= $this->Paginator->counter(['format' => __('{{count}}'), 'model' => 'Saefis']) ?></small></h3>
        <hr>
        <p class="has-error">Serious Adverse Event Following Immunization. 
          <a class="btn btn-warning active tiptip"  data-original-title="Report SAEFI" href="/saefis/add" role="button"><i class="fa fa-plus" aria-hidden="true"></i></a></p>
        <ul class="list-unstyled">
          <?php  
            $i = 1;
            foreach ($saefis as $saefi): ?>
          <li><?php 
                  if($saefi->submitted == 2) {
                    echo $i++.'. '.$this->Html->link('<span class="text-success">'.$saefi->reference_number.' &nbsp; &nbsp;<i class="fa fa-check" aria-hidden="true"></i></span>', ['controller' => 'Saefis', 'action' => 'view', $saefi->id], ['escape' => false]);
                  } else {
                    echo $i++.'. '.$this->Html->link(h($saefi->created->i18nFormat('dd-MM-yyyy HH:mm')).' &nbsp; &nbsp;<i class="fa fa-pencil" aria-hidden="true"></i>', ['controller' => 'Saefis', 'action' => 'edit', $saefi->id], ['escape' => false]);
                  }
                  
                 ?> </li>
          <?php endforeach; ?>
        </ul>
        <nav aria-label="Page navigation">
            <h6><small><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total'), 'model' => 'Saefis']) ?></small></h6>
            <ul class="pagination pagination-sm">
                <?= $this->Paginator->first('<< ', ['model' => 'Saefis']) ?>
                <?= $this->Paginator->prev('< ' , ['model' => 'Saefis']) ?>
                <?= $this->Paginator->next(' >', ['model' => 'Saefis']) ?>
                <?= $this->Paginator->last(' >>', ['model' => 'Saefis']) ?>
            </ul>
        </nav> 

    </div>

    <!-- SAE -->
    <div class="col-md-4">
      <?= $this->Html->script('jquery/jquery.shorten', ['block' => true]); ?>
      <?= $this->cell('Notification'); ?>  
    </div>
</div>
