echo "Instead of denying permissions to controllers, check if you can check prefix in controller before filter
	  and redirect to appropriate action..."
bin/cake acl_extras aco_sync
bin/cake acl grant Groups.1 controllers
bin/cake acl deny Groups.1 controllers/Manager/Applications
bin/cake acl deny Groups.1 controllers/Finance/Applications
bin/cake acl deny Groups.1 controllers/Applicant/Applications
bin/cake acl deny Groups.1 controllers/Manager/Users
bin/cake acl deny Groups.1 controllers/Finance/Users
bin/cake acl deny Groups.1 controllers/Applicant/Users
# bin/cake acl deny Groups.2 controllers #TODO: Remove this global assignment
bin/cake acl grant Groups.2 controllers/Manager/Users
bin/cake acl grant Groups.2 controllers/Manager/Applications
bin/cake acl grant Groups.2 controllers/Users/profile
bin/cake acl grant Groups.2 controllers/Users/edit
#Applicants
bin/cake acl grant Groups.4 controllers/Users/profile
bin/cake acl grant Groups.4 controllers/Users/edit
bin/cake acl grant Groups.4 controllers/Applicant/Users
bin/cake acl grant Groups.4 controllers/Applicant/Applications
bin/cake acl deny Groups.4 controllers/Manager/Applications
bin/cake acl grant Groups.4 controllers/Applications/add
bin/cake acl grant Groups.4 controllers/Applications/edit
bin/cake acl grant Groups.4 controllers/Applications/view
bin/cake acl grant Groups.4 controllers/Applications/delete
bin/cake acl grant Groups.4 controllers/Attachments/download
bin/cake acl grant Groups.4 controllers/Attachments/delete
bin/cake acl grant Groups.4 controllers/Sponsors/delete
bin/cake acl grant Groups.4 controllers/InvestigatorContacts/delete
bin/cake acl grant Groups.4 controllers/Participants/delete
bin/cake acl grant Groups.4 controllers/SiteDetails/delete
bin/cake acl grant Groups.4 controllers/Medicines/delete
bin/cake acl grant Groups.4 controllers/Committees/delete
bin/cake acl grant Groups.4 controllers/Organizations/delete
#Finance permissions
bin/cake acl grant Groups.5 controllers/Finance/Users
bin/cake acl grant Groups.5 controllers/Finance/Applications
#Evaluators permissions
bin/cake acl grant Groups.3 controllers/Internalevaluator/Users
bin/cake acl grant Groups.3 controllers/Users/profile
bin/cake acl grant Groups.3 controllers/Users/edit
bin/cake acl grant Groups.3 controllers/Internalevaluator/Applications
bin/cake acl grant Groups.6 controllers/Externalevaluator/Users
bin/cake acl grant Groups.6 controllers/Externalevaluator/Applications
bin/cake acl grant Groups.6 controllers/Users/profile
bin/cake acl grant Groups.6 controllers/Users/edit
