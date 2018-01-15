<?php
 	$this->Html->script('multi/sponsors', ['block' => true]);
?>
<h5>3.2 Secondary Sponsor Details <br>(<small>Additional individuals, organizations or other legal persons, if any, that have agreed with the primary sponsor to take on responsibilities of sponsorship. where necessary, Click button to add more -
<button type="button" class="btn btn-primary btn-xs" id="addSponsorDetail" title="add ponsor">Add Sponsor</button></small>) </h5>
<div class="ctr-groups">
	<div id="sponsor_primary_contact">
	<?php
		echo $this->Form->control('sponsors.0.id', ['templates' => 'table_form']);
		echo $this->Form->control('sponsors.0.sponsor', array(
			'label' => 'Organization <span class="sterix">*</span>', 'escape' => false
		));
		echo $this->Form->control('sponsors.0.contact_person', array(
			'label' => 'Contact Person', 'escape' => false
		));
		echo $this->Form->control('sponsors.0.address', array(
			'label' => 'Address <span class="sterix">*</span>', 'escape' => false
		));
		echo $this->Form->control('sponsors.0.telephone_number', array(
			'label' => 'Telephone Number <span class="sterix">*</span>', 'escape' => false
		));
		echo $this->Form->control('sponsors.0.fax_number', array(
			'label' => 'Fax Number', 'escape' => false
		));
		echo $this->Form->control('sponsors.0.cell_number', array(
			'label' => 'Mobile Phone Number <span class="sterix">*</span>', 'escape' => false
		));
		echo $this->Form->control('sponsors.0.email_address', array(
			'type' => 'email',
			'label' => 'Email Address <span class="sterix">*</span>', 'escape' => false
		));
		echo $this->Html->tag('hr', '', array('id' => 'sponsorsHr0'));
	?>
	</div>
	<div id="sponsor_details">
	<?php
		if (!empty($application['sponsors'])) {
			for ($i = 0; $i <= count($application['sponsors'])-1; $i++) {
			?>
			<div class="sponsor-group">
			<?php
				echo $this->Form->control('sponsors.'.$i.'.id', ['templates' => 'table_form']);
				echo '<p  class="topper" id="sponsorsDetailLabel'.$i.'">'.($i+1).' additional sponsors</p>';
				echo '<span class="badge badge-info">'.($i+1).'</span>';
				echo $this->Form->control('sponsors.'.$i.'.sponsor', array(
					'label' =>  'Organization <span class="sterix">*</span>', 'escape' => false
				));
				echo $this->Form->control('sponsors.'.$i.'.contact_person', array(
					'label' => 'Contact Person', 'escape' => false
				));
				echo $this->Form->control('sponsors.'.$i.'.address', array(
					'label' =>  'Address <span class="sterix">*</span>', 'escape' => false
				));
				echo $this->Form->control('sponsors.'.$i.'.telephone_number', array(
					'label' =>  'Telephone Number <span class="sterix">*</span>', 'escape' => false
				));
				echo $this->Form->control('sponsors.'.$i.'.fax_number', array(
					'label' => 'Fax Number', 'escape' => false
				));
				echo $this->Form->control('sponsors.'.$i.'.cell_number', array(
					'label' =>  'Mobile phone number <span class="sterix">*</span>', 'escape' => false
				));
				echo $this->Form->control('sponsors.'.$i.'.email_address', array(
					'type' => 'email',
					'label' =>  'Email Address <span class="sterix">*</span>', 'escape' => false
				));
				echo $this->Html->tag('div', '<button id="SponsorDetail'.$i.'" class="btn btn-mini btn-danger removeSponsorDetail" type="button">Remove Detail</button>', array(
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

