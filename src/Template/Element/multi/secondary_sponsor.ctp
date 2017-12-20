<?php
 	$this->Html->script('multi/secondary_sponsor', ['block' => true]);
?>
<h5>3.2 Secondary Sponsor Details (<small>where necessary, Click button to add more -
<button type="button" class="btn btn-primary btn-mini" id="addsponsorsDetail" title="add ponsor">Add Sponsor</button></small>) </h5>
<div class="ctr-groups">
	<div id="sponsor_primary_contact">
	<?php
		echo $this->Form->input('secondary_sponsor.0.id', ['templates' => 'table_form']);
		echo $this->Form->input('secondary_sponsor.0.sponsor', array(
			'label' => 'Sponsor <span class="sterix">*</span>', 'escape' => false
		));
		echo $this->Form->input('secondary_sponsor.0.contact_person', array(
			'label' => 'Contact Person', 'escape' => false
		));
		echo $this->Form->input('secondary_sponsor.0.address', array(
			'label' => 'Address <span class="sterix">*</span>', 'escape' => false
		));
		echo $this->Form->input('secondary_sponsor.0.telephone_number', array(
			'label' => 'Telephone Number <span class="sterix">*</span>', 'escape' => false
		));
		echo $this->Form->input('secondary_sponsor.0.fax_number', array(
			'label' => 'Fax Number', 'escape' => false
		));
		echo $this->Form->input('secondary_sponsor.0.cell_number', array(
			'label' => 'Mobile phone number <span class="sterix">*</span>', 'escape' => false
		));
		echo $this->Form->input('secondary_sponsor.0.email_address', array(
			'type' => 'email',
			'label' => 'Email Address <span class="sterix">*</span>', 'escape' => false
		));
		echo $this->Html->tag('hr', '', array('id' => 'sponsorsHr0'));
	?>
	</div>
	<div id="sponsor_details">
	<?php
		if (!empty($this->request->data['secondary_sponsor'])) {
			for ($i = 1; $i <= count($this->request->data['secondary_sponsor'])-1; $i++) {
			?>
			<div class="sponsor-group">
			<?php
				echo $this->Form->input('secondary_sponsor.'.$i.'.id', ['templates' => 'table_form']);
				echo '<p  class="topper" id="sponsorsDetailLabel'.$i.'">'.$i.' additional secondary_sponsor</p>';
				echo '<span class="badge badge-info">'.$i.'</span>';
				echo $this->Form->input('secondary_sponsor.'.$i.'.secondary_sponsor', array(
					'label' =>  'secondary_sponsor <span class="sterix">*</span>', 'escape' => false
				));
				echo $this->Form->input('secondary_sponsor.'.$i.'.contact_person', array(
					'label' => 'Contact Person', 'escape' => false
				));
				echo $this->Form->input('secondary_sponsor.'.$i.'.address', array(
					'label' =>  'Address <span class="sterix">*</span>', 'escape' => false
				));
				echo $this->Form->input('secondary_sponsor.'.$i.'.telephone_number', array(
					'label' =>  'Telephone Number <span class="sterix">*</span>', 'escape' => false
				));
				echo $this->Form->input('secondary_sponsor.'.$i.'.fax_number', array(
					'label' => 'Fax Number', 'escape' => false
				));
				echo $this->Form->input('secondary_sponsor.'.$i.'.cell_number', array(
					'label' =>  'Mobile phone number <span class="sterix">*</span>', 'escape' => false
				));
				echo $this->Form->input('secondary_sponsor.'.$i.'.email_address', array(
					'type' => 'email',
					'label' =>  'Email Address <span class="sterix">*</span>', 'escape' => false
				));
				echo $this->Html->tag('div', '<button id="secondary_sponsorDetail'.$i.'" class="btn btn-mini btn-danger removesponsorsDetail" type="button">Remove Detail</button>', array(
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

