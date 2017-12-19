<?php
 	$this->Html->script('multi/sponsors', ['block' => true]);
?>
<h5>3.1 Primary Sponsor Details (<small>where necessary, Click button to add more -
<button type="button" class="btn btn-primary btn-mini" id="addsponsorsDetail" title="add sponsor">Add Sponsor</button></small>) </h5>
<div class="ctr-groups">
	<div id="sponsor_primary_contact">
	<?php
		echo $this->Form->input('sponsors.0.id', ['templates' => 'table_form']);
		echo $this->Form->input('sponsors.0.sponsor', array(
			'label' => 'sponsors <span class="sterix">*</span>', 'escape' => false
		));
		echo $this->Form->input('sponsors.0.contact_person', array(
			'label' => 'Contact Person', 'escape' => false
		));
		echo $this->Form->input('sponsors.0.address', array(
			'label' => 'Address <span class="sterix">*</span>', 'escape' => false
		));
		echo $this->Form->input('sponsors.0.telephone_number', array(
			'label' => 'Telephone Number <span class="sterix">*</span>', 'escape' => false
		));
		echo $this->Form->input('sponsors.0.fax_number', array(
			'label' => 'Fax Number', 'escape' => false
		));
		echo $this->Form->input('sponsors.0.cell_number', array(
			'label' => 'Mobile phone number <span class="sterix">*</span>', 'escape' => false
		));
		echo $this->Form->input('sponsors.0.email_address', array(
			'type' => 'email',
			'label' => 'Email Address <span class="sterix">*</span>', 'escape' => false
		));
		echo $this->Html->tag('hr', '', array('id' => 'sponsorsHr0'));
	?>
	</div>
	<div id="sponsor_details">
	<?php
		if (!empty($this->request->data['sponsors'])) {
			for ($i = 1; $i <= count($this->request->data['sponsors'])-1; $i++) {
			?>
			<div class="sponsor-group">
			<?php
				echo $this->Form->input('sponsors.'.$i.'.id', ['templates' => 'table_form']);
				echo '<p  class="topper" id="sponsorsDetailLabel'.$i.'">'.$i.' additional sponsors</p>';
				echo '<span class="badge badge-info">'.$i.'</span>';
				echo $this->Form->input('sponsors.'.$i.'.sponsor', array(
					'label' =>  'sponsors <span class="sterix">*</span>', 'escape' => false
				));
				echo $this->Form->input('sponsors.'.$i.'.contact_person', array(
					'label' => 'Contact Person', 'escape' => false
				));
				echo $this->Form->input('sponsors.'.$i.'.address', array(
					'label' =>  'Address <span class="sterix">*</span>', 'escape' => false
				));
				echo $this->Form->input('sponsors.'.$i.'.telephone_number', array(
					'label' =>  'Telephone Number <span class="sterix">*</span>', 'escape' => false
				));
				echo $this->Form->input('sponsors.'.$i.'.fax_number', array(
					'label' => 'Fax Number', 'escape' => false
				));
				echo $this->Form->input('sponsors.'.$i.'.cell_number', array(
					'label' =>  'Mobile phone number <span class="sterix">*</span>', 'escape' => false
				));
				echo $this->Form->input('sponsors.'.$i.'.email_address', array(
					'type' => 'email',
					'label' =>  'Email Address <span class="sterix">*</span>', 'escape' => false
				));
				echo $this->Html->tag('div', '<button id="sponsorsDetail'.$i.'" class="btn btn-mini btn-danger removesponsorsDetail" type="button">Remove Detail</button>', array(
							'class' => 'controls', 'escape' => false));
				echo $this->Html->tag('hr', '', array('id' => 'sponsorsHr'.$i));
			?>
			</div>
			<?php
			}
		}
	?>
	</div>
</div>

