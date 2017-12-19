<div class="row-fluid">
	<div class="span12">
		<h4>Documents -
			<small class="muted">(Documents may include files (pictures, scanned documents, pdf, word documents) or generic updates</small></h4>
		<hr>

		<h5><i class="icon-file"></i> Do you have files that you would like to attach along with the Executive 
									Summary? click on the button to add them:
			<button type="button" class="btn-mini" id="addDocument">&nbsp;<i class="icon-plus"></i>&nbsp;</button>
		</h5>
	    <table id="buildDocumentsForm"  class="table table-bordered  table-condensed table-striped">
			<thead>
			  <tr id="documentsTableHeader">
				<th>#</th>
				<th width="45%">File</th>
				<th width="45%">Text Description</th>
				<th>	</th>
			  </tr>
			</thead>
			<tbody>
			<?php
				// print_r($application['Document']);
				if (!empty($application['Document'])) {
					for ($i = 0; $i <= count($application['Document'])-1; $i++) {
			?>
			  <tr>
				<td><?php echo $i+1; ?></td>
				<td>
					<div class="control-group"><?php
						echo $this->Form->input('Document.'.$i.'.id');
						echo $this->Form->input('Document.'.$i.'.model', array('type'=>'hidden', 'value'=>'Application'));
						echo $this->Form->input('Document.'.$i.'.group', array('type'=>'hidden', 'value'=>'document'));
						echo $this->Form->input('Document.'.$i.'.filesize', array('type' => 'hidden'));
						echo $this->Form->input('Document.'.$i.'.basename', array('type' => 'hidden'));
						echo $this->Form->input('Document.'.$i.'.checksum', array('type' => 'hidden'));
						if (!empty($application['Document'][$i]['id']) &&
							!empty($application['Document'][$i]['basename'])) {
							echo $this->Html->link(__($application['Document'][$i]['basename']),
								array('controller' => 'attachments',  'action' => 'download',
									$application['Document'][$i]['id'], 'full_base' => true),
								array('class' => 'btn btn-info')
								);
							// echo $this->Form->input('Document.'.$i.'.filename', array('type' => 'hidden'));
						} else {
							echo $this->Form->input('Document.'.$i.'.file', array(
								'label' => false, 'between' => false, 'after' => false, 'class' => 'span12 input-file',
								'error' => array('escape' => false, 'attributes' => array( 'class' => 'help-block')),
								'type' => 'file',
							));
						}
					?>
				</div>
				</td>
				<td>
					<?php
						if (!empty($application['Document'][$i]['id']) &&
							!empty($application['Document'][$i]['basename'])) {
							echo $application['Document'][$i]['description'];
							echo $this->Form->input('Document.'.$i.'.description', array('type' => 'hidden'));
						} else {
							echo $this->Form->input('Document.'.$i.'.description', array(
								'label' => false, 'between' => false, 'rows' => '1', 'after' => false, 'class' => 'span11',));
						}
					?>
				</td>
				<td>
					<button  type="button" class="btn-mini remove-row" 	value="<?php if (isset($application['Document'][$i]['id'])) { echo $application['Document'][$i]['id']; } ?>" >
						&nbsp;<i class="icon-minus"></i>&nbsp;
					</button>					
				</td>
			  </tr>
			  <?php } } ; ?>

			</tbody>
	  </table>
	</div><!--/span-->
</div><!--/row-->
