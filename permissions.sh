echo "Instead of denying permissions to controllers, check if you can check prefix in controller before filter
      and redirect to appropriate action..."
bin/cake acl_extras aco_sync
bin/cake cache clear_all
echo "Assigning Admin permissions....................."
bin/cake acl grant Groups.1 controllers
bin/cake acl grant Groups.2 controllers/Admin
bin/cake acl deny Groups.4 controllers/Applications
bin/cake acl deny Groups.1 controllers/Manager
bin/cake acl deny Groups.1 controllers/Finance
bin/cake acl deny Groups.1 controllers/Applicant
bin/cake acl deny Groups.1 controllers/Finance
# grant mcaz users base
# bin/cake acl grant Groups.1 controllers/Base/Amendments
# bin/cake acl deny Groups.2 controllers #TODO: Remove this global assignment
echo "Assigning Manager permissions................."
bin/cake acl grant Groups.2 controllers/Manager
bin/cake acl grant Groups.2 controllers/Users/profile
bin/cake acl grant Groups.2 controllers/Users/edit
#Applicants
echo "Assigning Applicant permissions................"
bin/cake acl grant Groups.4 controllers/Users/profile
bin/cake acl grant Groups.4 controllers/Users/edit
bin/cake acl grant Groups.4 controllers/Applicant
bin/cake acl deny Groups.4 controllers/Applications
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
echo "Assigning Finance permissions........................"
bin/cake acl grant Groups.5 controllers/Users/profile
bin/cake acl grant Groups.5 controllers/Users/edit
bin/cake acl grant Groups.5 controllers/Finance
#Evaluators permissions
echo "Assigning Evaluators permissions......................"
bin/cake acl grant Groups.3 controllers/Users/profile
bin/cake acl grant Groups.3 controllers/Users/edit
bin/cake acl grant Groups.3 controllers/Evaluator
bin/cake acl grant Groups.6 controllers/ExternalEvaluator
bin/cake acl grant Groups.6 controllers/Users/profile
bin/cake acl grant Groups.6 controllers/Users/edit

sudo chmod -R 777 .
