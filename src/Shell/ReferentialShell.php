<?php
namespace App\Shell;

use Cake\Console\Shell;

/**
 * Referential shell command.
 */
class ReferentialShell extends Shell
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Applications');
        $this->loadModel('Users');
        $this->loadModel('Queue.QueuedJobs');  
        $this->loadModel('Refids');
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
        $this->out("****Start of Generating Reference Numbers****");
        $query = $this->Applications 
        ->find('all') 
        // You can add extra things to the query if you need to
        ->where(['report_type' => 'Initial', 'submitted' => '2'])
        ->order(['Applications.id' => 'asc'])
        ->distinct();
        $count=0;
        foreach($query as $application){
            $count++;
            $refid = $this->Applications->Refids->newEntity(
                [
                  'foreign_key' => $application->id,
                  'model' => 'Applications',
                  'year' => date('Y')
                ]
              );
              $this->Applications->Refids->save($refid);
              $refid = $this->Applications->Refids->get($refid->id);
              $application->protocol_no = 'CT' . $refid->refid . '/' . $refid->year;
              $this->Applications->save($application);

        $this->out("****Report ID****".$application->id."**** Counter ".$count);
        }

        $this->out("****End of Generating Reference Numbers****");
    }
}
