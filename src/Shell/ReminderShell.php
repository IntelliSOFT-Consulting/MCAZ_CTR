<?php

namespace App\Shell;

use Cake\Console\Shell;
use Cake\Utility\Hash;

/**
 * Reminder shell command.
 */
class ReminderShell extends Shell
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Applications');
        $this->loadModel('Users');
        $this->loadModel('Queue.QueuedJobs');
    }
    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {
        // $this->out($this->OptionParser->help());
        $this->out('******** Start of Reminders *********');
        $managers_finance = $this->Applications->Users->find('all')->where(['Users.group_id IN' => [2, 5], 'Users.deactivated' => 0]);
        $managers = $this->Applications->Users->find('all')->where(['Users.group_id IN' => [2], 'Users.deactivated' => 0]);
        // 

        $unAssignedApplications = $this->Applications->find('all')
            ->contain([])
            ->where([
                'Applications.status' => 'Submitted', 'DATE(Applications.date_submitted) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reminders', function ($q) {
                $ms = $this->Applications->Users->find('all')->where(['Users.group_id IN' => [2, 5], 'Users.deactivated' => 0]);
                return $q->where(['Reminders.user_id IN' => Hash::extract($ms->toArray(), '{n}.id'), 'Reminders.reminder_type' => 'finance_protocol_reminder_email', 'Reminders.model' => 'Applications']);
            });

        foreach ($unAssignedApplications as $report) {

            foreach ($managers_finance as $manager) {

                // Work on filtering only manager's who have not been notified.

                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'type' => 'finance_protocol_reminder_email',
                    'model' => 'Sadrs', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];
                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'model' => 'Applications', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];
                $data['type'] = 'finance_protocol_reminder_email';
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Applications->Reminders->newEntity();
                $rem->user_id = $manager->id;
                $rem->model = 'Applications';
                $rem->reminder_type = 'finance_protocol_reminder_email';
                $report->reminders = [$rem];
                $this->Applications->save($report);
            }
        }

        // STAYED TOO LONG WITHOUT BEING ASSIGNED
        $financeApplications = $this->Applications->find('all')
            ->contain([])
            ->where([
                'Applications.status' => 'Finance', 'DATE(Applications.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reminders', function ($q) {
                $ms = $this->Applications->Users->find('all')->where(['Users.group_id IN' => [2], 'Users.deactivated' => 0]);
                return $q->where(['Reminders.user_id IN' => Hash::extract($ms->toArray(), '{n}.id'), 'Reminders.reminder_type' => 'unassigned_protocol_reminder_email', 'Reminders.model' => 'Applications']);
            });

        foreach ($financeApplications as $report) {

            foreach ($managers as $manager) {

                // Work on filtering only manager's who have not been notified.
                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'type' => 'unassigned_protocol_reminder_email',
                    'model' => 'Applications', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];
                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'model' => 'Applications', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];
                $data['type'] = 'unassigned_protocol_reminder_email';
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Applications->Reminders->newEntity();
                $rem->user_id = $manager->id;
                $rem->model = 'Applications';
                $rem->reminder_type = 'unassigned_protocol_reminder_email';
                $report->reminders = [$rem];
                $this->Applications->save($report);
            }
        }

        // STAYED LONG WITHOUT EVALUATION
        $applications = $this->Applications->find('all')
            ->contain(['AssignEvaluators'])
            ->where([
                'Applications.status' => 'Assigned', 'DATE(Applications.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ]);
        $filt = [0];
        foreach ($applications as $application) {
            $filt = Hash::merge($filt, Hash::extract($application, 'assign_evaluators.{n}.assigned_to'));
        }
        $unEvaluatedApplications = $applications
            ->notMatching('Evaluations', function ($q) use ($filt) {
                return $q->where(['Evaluations.user_id IN' => $filt]);
            })
            ->notMatching('Reminders', function ($q) use ($filt) {
                return $q->where(['Reminders.user_id IN' => $filt, 'Reminders.reminder_type' => 'evaluation_protocol_reminder_email']);
            });

        foreach ($unEvaluatedApplications as $report) {

            foreach ($report->assign_evaluators as $assign) {

                $manager = $this->Applications->Users->get($assign->assigned_to);
                // Work on filtering only manager's who have not been notified.
                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'type' => 'evaluation_protocol_reminder_email',
                    'model' => 'Applications', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];
                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'model' => 'Applications', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];
                $data['type'] = 'evaluation_protocol_reminder_email';
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Applications->Reminders->newEntity();
                $rem->user_id = $manager->id;
                $rem->model = 'Applications';
                $rem->reminder_type = 'evaluation_protocol_reminder_email';
                $report->reminders = [$rem];
                $this->Applications->save($report);
            }
        }

        // STAYED LONG WITHOUT COMMITTEE ACTION
        $committeeApplications = $this->Applications->find('all')
            ->contain(['AssignEvaluators'])
            ->where([
                'Applications.status' => 'Evaluated', 'DATE(Applications.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ]);
        $filt = [0];
        foreach ($committeeApplications as $application) {
            $filt = Hash::merge($filt, Hash::extract($application, 'assign_evaluators.{n}.assigned_to'));
        }
        $unEvaluatedApplications = $committeeApplications
            ->notMatching('CommitteeReviews', function ($q) use ($filt) {
                return $q->where(['CommitteeReviews.user_id IN' => $filt]);
            })
            ->notMatching('Reminders', function ($q) use ($filt) {
                return $q->where(['Reminders.user_id IN' => $filt, 'Reminders.reminder_type' => 'committee_protocol_reminder_email']);
            });

        foreach ($unEvaluatedApplications as $report) {

            foreach ($report->assign_evaluators as $assign) {

                $manager = $this->Applications->Users->get($assign->assigned_to);
                // Work on filtering only manager's who have not been notified.
                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'type' => 'committee_protocol_reminder_email',
                    'model' => 'Applications', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];
                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'model' => 'Applications', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];
                $data['type'] = 'committee_protocol_reminder_email';
                // $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Applications->Reminders->newEntity();
                $rem->user_id = $manager->id;
                $rem->model = 'Applications';
                $rem->reminder_type = 'committee_protocol_reminder_email';
                $report->reminders = [$rem];
                $this->Applications->save($report);
            }
        }
        // STAYED LONG WITHOUT COMMTTEE COMMENTS
        $uncommentedApplications = $this->Applications->find('all')
            ->contain(['AssignEvaluators'])
            ->where([
                'Applications.status' => 'Committee', 'DATE(Applications.action_date) <=' => date('Y-m-d', strtotime('-7 days'))
            ]);
        $filt = [0];
        foreach ($uncommentedApplications as $application) {
            $filt = Hash::merge($filt, Hash::extract($application, 'assign_evaluators.{n}.assigned_to'));
        }
        $unEvaluatedApplications = $uncommentedApplications
            ->notMatching('Comments', function ($q) use ($filt) {
                return $q->where(['Comments.user_id IN' => $filt,'Comments.model'=>'Applications','Comments.category'=>'committee']);
            })
            ->notMatching('Reminders', function ($q) use ($filt) {
                return $q->where(['Reminders.user_id IN' => $filt, 'Reminders.reminder_type' => 'comments_protocol_reminder_email']);
            });

        foreach ($unEvaluatedApplications as $report) {

            foreach ($report->assign_evaluators as $assign) {

                $manager = $this->Applications->Users->get($assign->assigned_to);
                // Work on filtering only manager's who have not been notified.
                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'type' => 'comments_protocol_reminder_email',
                    'model' => 'Applications', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];
                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'model' => 'Applications', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];
                $data['type'] = 'comments_protocol_reminder_email';
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Applications->Reminders->newEntity();
                $rem->user_id = $manager->id;
                $rem->model = 'Applications';
                $rem->reminder_type = 'comments_protocol_reminder_email';
                $report->reminders = [$rem];
                $this->Applications->save($report);
            }
        }

        $this->out("******* Reminders Executed Successfully");
    }
}