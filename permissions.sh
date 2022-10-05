echo "
	Tasks:
	1. Clear cache
	2. Assign permissions to users based on Groups
	#3. Grant permissions to folders
"
bin/cake acl_extras aco_sync
bin/cake cache clear_all
echo "Assigning Admin permissions....................."
bin/cake acl grant Groups.1 controllers
bin/cake acl grant Groups.1 controllers/Reports
bin/cake acl deny Groups.1 controllers/Admin/Applications
bin/cake acl deny Groups.1 controllers/Admin/Amendments
bin/cake acl deny Groups.1 controllers/Manager
bin/cake acl deny Groups.1 controllers/Finance
bin/cake acl deny Groups.1 controllers/Applicant
# grant mcaz users base
# bin/cake acl grant Groups.1 controllers/Base/Amendments
# bin/cake acl deny Groups.2 controllers #TODO: Remove this global assignment
echo "Assigning Manager permissions................."
bin/cake acl deny Groups.2 controllers/Admin
bin/cake acl deny Groups.2 controllers/Evaluator
bin/cake acl deny Groups.2 controllers/Applicant
bin/cake acl deny Groups.2 controllers/Finance
bin/cake acl grant Groups.2 controllers/Refids
bin/cake acl grant Groups.2 controllers/Reports
bin/cake acl grant Groups.2 controllers/Sdrugs
bin/cake acl grant Groups.2 controllers/Quality
bin/cake acl grant Groups.2 controllers/CommitteeDates
bin/cake acl grant Groups.2 controllers/Manager
bin/cake acl grant Groups.2 controllers/Users/profile
bin/cake acl grant Groups.2 controllers/Users/edit
bin/cake acl grant Groups.2 controllers/Attachments/download
bin/cake acl grant Groups.2 controllers/Notifications/delete
#Applicants
echo "Assigning Applicant permissions................"
bin/cake acl deny Groups.4 controllers/Manager
bin/cake acl deny Groups.4 controllers/Finance
bin/cake acl deny Groups.4 controllers/Evaluator
bin/cake acl deny Groups.4 controllers/Admin
bin/cake acl grant Groups.4 controllers/Applications
bin/cake acl grant Groups.4 controllers/Users/profile
bin/cake acl grant Groups.4 controllers/Users/edit
bin/cake acl grant Groups.4 controllers/Applicant
bin/cake acl grant Groups.4 controllers/Attachments/download
bin/cake acl grant Groups.4 controllers/Attachments/delete
bin/cake acl grant Groups.4 controllers/Sponsors/delete
bin/cake acl grant Groups.4 controllers/InvestigatorContacts/delete
bin/cake acl grant Groups.4 controllers/Participants/delete
bin/cake acl grant Groups.4 controllers/SiteDetails/delete
bin/cake acl grant Groups.4 controllers/Medicines/delete
bin/cake acl grant Groups.4 controllers/Committees/delete
bin/cake acl grant Groups.4 controllers/Organizations/delete
bin/cake acl grant Groups.4 controllers/Notifications/delete
#Finance permissions
echo "Assigning Finance permissions........................"
bin/cake acl grant Groups.5 controllers/Reports
bin/cake acl grant Groups.5 controllers/Users/profile
bin/cake acl grant Groups.5 controllers/Users/edit
bin/cake acl grant Groups.5 controllers/Finance
bin/cake acl grant Groups.5 controllers/Attachments/download
bin/cake acl grant Groups.5 controllers/Notifications/delete
#Evaluators permissions
echo "Assigning Evaluators permissions......................"
bin/cake acl grant Groups.3 controllers/Reports
bin/cake acl grant Groups.3 controllers/CommitteeDates
bin/cake acl grant Groups.3 controllers/Users/profile
bin/cake acl grant Groups.3 controllers/Users/edit
bin/cake acl grant Groups.3 controllers/Evaluator
bin/cake acl grant Groups.3 controllers/Sdrugs
bin/cake acl grant Groups.3 controllers/Quality
# bin/cake acl grant Groups.3 controllers/Base
bin/cake acl grant Groups.3 controllers/Notifications/delete
bin/cake acl grant Groups.6 controllers/Attachments/download
bin/cake acl grant Groups.6 controllers/Reports
bin/cake acl grant Groups.6 controllers/Sdrugs
bin/cake acl grant Groups.6 controllers/Quality
bin/cake acl grant Groups.6 controllers/ExternalEvaluator
bin/cake acl grant Groups.6 controllers/Users/profile
bin/cake acl grant Groups.6 controllers/Users/edit
# bin/cake acl grant Groups.6 controllers/Base
bin/cake acl grant Groups.6 controllers/Attachments/download
bin/cake acl grant Groups.6 controllers/Notifications/delete
#Secretary General permissions
echo "Assigning Secretary General permissions......................"
bin/cake acl grant Groups.7 controllers/Reports
bin/cake acl grant Groups.7 controllers/DirectorGeneral
bin/cake acl grant Groups.7 controllers/Users/profile
bin/cake acl grant Groups.7 controllers/Users/edit
bin/cake acl grant Groups.7 controllers/Attachments/download
bin/cake acl grant Groups.7 controllers/Notifications/delete

#sudo chmod -R 777 .
