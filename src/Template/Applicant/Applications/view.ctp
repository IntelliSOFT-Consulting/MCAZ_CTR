<?php
  $this->extend('/Element/applications/application_view');
  // $this->assign('editable', false);
  // $this->assign('baseClass', 'sadr_form');  
?>

<?php $this->start('tabs'); ?>
    <!-- Nav tabs -->    
    <?= $this->Html->script('application_view', ['block' => true]); ?>
    <ul>
      <li><a href="#tabs-1">1. Abstract</a></li>
      <li><a href="#tabs-2">2. Investigator</a></li>
      <li><a href="#tabs-3">3. Sponsor</a></li>
      <li><a href="#tabs-4">4. Participants</a></li>
      <li><a href="#tabs-5">5. Sites</a></li>
      <li><a href="#tabs-6">6. Interventions</a></li>
      <li><a href="#tabs-7">7. Criteria</a></li>
      <li><a href="#tabs-8">8. Scope</a></li>
      <li><a href="#tabs-9">9. Design</a></li>
      <li><a href="#tabs-10">10. Ethical Considerations</a></li>
      <li><a href="#tabs-11">11. Organizations</a></li>
      <li><a href="#tabs-12">12. Other details</a></li>
      <li><a href="#tabs-13">13. Checklist </a></li>
      <li><a href="#tabs-14">14. Notifications</a></li>
      <li><a href="#tabs-15">15. MC10 Form</a></li>
      <li><a href="#tabs-16">16. Financials</a></li>
    </ul>
<?php $this->end(); ?>
