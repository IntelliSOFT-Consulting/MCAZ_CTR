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
bin/cake acl grant Groups.3 controllers/Users/profile
#Applicants
bin/cake acl grant Groups.4 controllers/Users/profile
bin/cake acl grant Groups.4 controllers/Applicant/Users
bin/cake acl grant Groups.4 controllers/Applicant/Applications
bin/cake acl grant Groups.4 controllers/Applications/add
bin/cake acl grant Groups.4 controllers/Applications/edit
bin/cake acl grant Groups.4 controllers/Applications/view
bin/cake acl grant Groups.4 controllers/Applications/delete
bin/cake acl grant Groups.4 controllers/Attachments/download
#Finance permissions
bin/cake acl grant Groups.5 controllers/Finance/Users
bin/cake acl grant Groups.5 controllers/Finance/Applications
