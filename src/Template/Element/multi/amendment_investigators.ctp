<?php
 	$this->Html->script('multi/investigators', ['block' => true]);
?>
<h5>Individual(s) (<small>where necessary, Click button to add more -
<button type="button" class="btn btn-xs btn-primary" id="addPIContact">Add Contact</button></small>) </h5>

<div class="ctr-groups">
	<div id="investigator_primary_contact">
		<div style="margin-left: 30px;"><h5><b>PRINCIPAL INVESTIGATOR</b></h5> </div>
    <p></p>
	<?php
		// echo $this->Form->control('investigator_contacts.0.id', ['templates' => 'table_form']);
		// echo $this->Form->control('investigator_contacts.0.given_name', array(
		// 	'label' =>  'Full names <span class="sterix">*</span>', 'escape' => false
		// ));
		// echo $this->Form->control('investigator_contacts.0.date_of_birth', ['type' => 'text', 'class' => 'datepickers', 'templates' => [
  //             'input' => '<div class="col-sm-6"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',]]);
		// echo $this->Form->control('investigator_contacts.0.qualification', array(
		// 	'label' => 'Qualification <span class="sterix">*</span>', 'escape' => false
		// ));
		// echo $this->Form->control('investigator_contacts.0.professional_address', array(
		// 	'label' => 'Professional address <span class="sterix">*</span>', 'escape' => false
		// ));
		// echo $this->Form->control('investigator_contacts.0.telephone', array(
		// 	'label' => 'Telephone number <span class="sterix">*</span>', 'escape' => false
		// ));
		// echo $this->Form->control('investigator_contacts.0.email', array(
		// 	'type' => 'email', 'label' => 'email address <span class="sterix">*</span>', 'escape' => false
		// ));
		// echo $this->Html->tag('div', '<button id="investigator_contactsButton0" type="button">Add Contact</button>', array(
					// 'class' => 'controls', 'escape' => false));
		echo $this->Html->tag('hr', '', array('id' => 'investigator_contactsHr0'));
	?>
	</div>
	<div id="investigator_contacts">
	<?php
		if (!empty($application['investigator_contacts'])) {
			for ($i = 1; $i <= count($application['investigator_contacts'])-1; $i++) {
				if ($i == 1) echo "<h5 style='margin-left: 30px;'><b>CO-ORDINATING INVESTIGATOR</b></h5>" ;
			?>
			<div class="contact-group">
			<?php
				echo $this->Form->control('investigator_contacts.'.$i.'.id', ['templates' => 'table_form']);
				echo $this->Form->control('investigator_contacts.'.$i.'.given_name', array(
					'label' => 'Full names <span class="sterix">*</span>',	'escape' => false	
				));
				echo $this->Form->control('investigator_contacts.'.$i.'.date_of_birth', ['type' => 'text', 'class' => 'datepickers', 'templates' => [
              		'input' => '<div class="col-sm-6"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',]]);
				echo $this->Form->control('investigator_contacts.'.$i.'.qualification', array(
					'label' => 'Qualification <span class="sterix">*</span>', 'escape' => false	
					
				));
				echo $this->Form->control('investigator_contacts.'.$i.'.professional_address', array(
					'label' => 'Professional address <span class="sterix">*</span>', 'escape' => false	
					
				));
				echo $this->Form->control('investigator_contacts.'.$i.'.telephone', array(
					'label' => 'Telephone number <span class="sterix">*</span>', 'escape' => false						
				));
				echo $this->Form->control('investigator_contacts.'.$i.'.email', array(
					'type' => 'email', 'label' => 'email address <span class="sterix">*</span>', 'escape' => false						
				));
				echo $this->Html->tag('div', '<button id="investigator_contactsButton'.$i.'" class="btn btn-xs btn-danger removePIContact" type="button">Remove Contact</button>', array(
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
