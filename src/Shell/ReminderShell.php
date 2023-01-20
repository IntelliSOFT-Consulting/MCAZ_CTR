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
        $managers_finance = $this->Applications->Users->find('all')->where(['Users.group_id IN' => [2,5], 'Users.deactivated' => 0]);
        $managers = $this->Applications->Users->find('all')->where(['Users.group_id IN' => [2], 'Users.deactivated' => 0]);
        // 

        $unAssignedApplications = $this->Applications->find('all')
            ->contain([])
            ->where([
                'Applications.status' => 'Submitted', 'DATE(Applications.date_submitted) <=' => date('Y-m-d', strtotime('-7 days'))
            ])
            ->notMatching('Reminders', function ($q) {
                $ms = $this->Applications->Users->find('all')->where(['Users.group_id IN' => [2,5], 'Users.deactivated' => 0]);
                return $q->where(['Reminders.user_id IN' => Hash::extract($ms->toArray(), '{n}.id'), 'Reminders.reminder_type' => 'unassigned_protocol_reminder_email', 'Reminders.model' => 'Applications']);
            });

        foreach ($unAssignedApplications as $report) {

            foreach ($managers_finance as $manager) {

                // Work on filtering only manager's who have not been notified.

                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'type' => 'unassigned_protocol_reminder_email',
                    'model' => 'Sadrs', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];
                $data = [
                    'email_address' => $manager->email, 'user_id' => $manager->id,
                    'model' => 'Applications', 'foreign_key' => $report->id,
                    'vars' =>  $report->toArray()
                ];
                $data['type'] = 'unassigned_protocol_reminder_email';
                $this->QueuedJobs->createJob('GenericEmail', $data);
                $rem  = $this->Applications->Reminders->newEntity();
                $rem->user_id = $manager->id;
                $rem->model = 'Applications';
                $rem->reminder_type = 'unassigned_protocol_reminder_email';
                $report->reminders = [$rem];
                $this->Applications->save($report);
            }
        }


        $this->out("******* Reminders Executed Successfully");
    }
}
