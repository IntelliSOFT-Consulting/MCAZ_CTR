<?php
 	$this->Html->script('multi/investigators', ['block' => true]);
?>
<h5>2.1 PRINCIPAL INVESTIGATOR (<small>for multicentre trial; where necessary, Click button to add more -
<button type="button" class="btn-mini" id="addPIContact">Add Contact</button></small>) </h5>
<div class="ctr-groups">
	<div id="investigator_primary_contact">
	<?php
		echo $this->Form->control('investigator_contacts.0.id', ['templates' => 'table_form']);
		echo $this->Form->control('investigator_contacts.0.given_name', array(
			'label' =>  'Given name <span class="sterix">*</span>', 'escape' => false
		));
		echo $this->Form->control('investigator_contacts.0.middle_name', array(
			'label' => 'Middle name, if applicable',			
		));
		echo $this->Form->control('investigator_contacts.0.family_name', array(
			'label' => 'Family name <span class="sterix">*</span>',	'escape' => false
		));
		echo $this->Form->control('investigator_contacts.0.qualification', array(
			'label' => 'Qualification <span class="sterix">*</span>', 'escape' => false
		));
		echo $this->Form->control('investigator_contacts.0.professional_address', array(
			'label' => 'Professional address <span class="sterix">*</span>', 'escape' => false
		));
		echo $this->Form->control('investigator_contacts.0.telephone', array(
			'label' => 'Telephone number <span class="sterix">*</span>', 'escape' => false
		));
		echo $this->Form->control('investigator_contacts.0.email', array(
			'type' => 'email', 'label' => 'email address <span class="sterix">*</span>', 'escape' => false
		));
		// echo $this->Html->tag('div', '<button id="investigator_contactsButton0" type="button">Add Contact</button>', array(
					// 'class' => 'controls', 'escape' => false));
		echo $this->Html->tag('hr', '', array('id' => 'investigator_contactsHr0'));
	?>
	</div>
	<div id="investigator_contacts">
	<?php
		if (!empty($this->request->data['investigator_contacts'])) {
			for ($i = 1; $i <= count($this->request->data['investigator_contacts'])-1; $i++) {
			?>
			<div class="contact-group">
			<?php
				echo $this->Form->control('investigator_contacts.'.$i.'.id', ['templates' => 'table_form']);
				echo $this->Form->control('investigator_contacts.'.$i.'.given_name', array(
					'label' => 'Given name <span class="sterix">*</span>',					
				));
				echo $this->Form->control('investigator_contacts.'.$i.'.middle_name', array(
					'label' => 'Middle name, if applicable',
					
				));
				echo $this->Form->control('investigator_contacts.'.$i.'.family_name', array(
					'label' => 'Family name <span class="sterix">*</span>',
					
				));
				echo $this->Form->control('investigator_contacts.'.$i.'.qualification', array(
					'label' => 'Qualification <span class="sterix">*</span>',
					
				));
				echo $this->Form->control('investigator_contacts.'.$i.'.professional_address', array(
					'label' => 'Professional address <span class="sterix">*</span>',
					
				));
				echo $this->Form->control('investigator_contacts.'.$i.'.telephone', array(
					'label' => 'Telephone number <span class="sterix">*</span>',
					
				));
				echo $this->Form->control('investigator_contacts.'.$i.'.email', array(
					'type' => 'email', 'label' => 'email address <span class="sterix">*</span>',
					
				));
				echo $this->Html->tag('div', '<button id="investigator_contactsButton'.$i.'" class="btn btn-mini btn-danger removePIContact" type="button">Remove Contact</button>', array(
							'class' => 'controls', 'escape' => false));
				echo $this->Html->tag('hr', '', array('id' => 'investigator_contactsHr'.$i));
			?>
			</div>
			<?php
			}
		}
	?>
	</div>
</div>
