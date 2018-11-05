<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Hash;

/**
 * Adrs Controller
 *
 * @property \App\Model\Table\AdrsTable $Adrs
 *
 * @method \App\Model\Entity\Adr[] paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController
{

    public function initialize() {
       parent::initialize();
       $this->loadModel('Applications');
       $this->Auth->allow(['publicReports', 'protocolsPerYear', 'protocolsPerMonth', 'protocolsPerPhase', 'researchArea', 'processingStatus']);  
    }

    public function publicReports() {

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        //Just render page for now...
        /*$this->loadModel('Applications');
        $application_stats = $this->Applications->find('all')->select([ 'Provinces.province_name',
                                                          'count' => $this->Applications->find('all')->func()->count('*')
                                                        ])
                                                 ->where(['province_id IS NOT' => null])
                                                 ->group('Provinces.province_name')
                                                 ->contain(['Provinces'])
                                                 ->hydrate(false);
        $this->set('application_stats', $application_stats);
        $this->set('_serialize', ['application_stats']);*/
        

    }

    public function protocolsPerYear()
    {
        $application_stats = $this->Applications->find('all')->select([ 'year' => 'date_format(created,"%Y")',
                                                          'count' => $this->Applications->find('all')->func()->count('*')
                                                        ])
                                                 ->where(['submitted' => 2])
                                                 ->group('year')
                                                 ->hydrate(false);
        foreach ($application_stats->toArray() as $key => $value) {
            $data[] = ['name' => $value['year'],
                       'y' => $value['count']];
        }
        if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Success',
                        'title' => 'Protocols per year',
                        'data' => $data, 
                        '_serialize' => ['message', 'data', 'title']]);
                    return;
                }
    }

    public function protocolsPerMonth()
    {
        $application_stats = $this->Applications->find('all')->select([ 'mnth' => 'date_format(created,"%b")',
                                                          'count' => $this->Applications->find('all')->func()->count('*')
                                                        ])
                                                 ->where(['submitted' => 2])
                                                 ->group('mnth')
                                                 ->hydrate(false);
        foreach ($application_stats->toArray() as $key => $value) {
            $data[] = ['name' => $value['mnth'],
                       'y' => $value['count']];
        }
        if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Success',
                        'title' => 'Protocols by month',
                        'data' => $data, 
                        '_serialize' => ['message', 'data', 'title']]);
                    return;
                }
    }

    public function test() {
        $application_stats = $this->Applications->find('all')
                                ->innerJoinWith('Amendments')
                                ->select([ 'year' => 'date_format(Amendments.created,"%Y")',
                                                          'count' => $this->Applications->find('all')->func()->count('distinct Applications.id')
                                                        ])
                                                 ->where(['Amendments.submitted' => 2])
                                                 ->group('year')
                                                 ->hydrate(false);
        foreach ($application_stats->toArray() as $key => $value) {
            $data[] = ['name' => $value['year'],
                       'y' => $value['count']];
        }
        if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Success',
                        'title' => 'Amendments per year',
                        'data' => $data, 
                        '_serialize' => ['message', 'data', 'title']]);
                    return;
                }
    }

    public function timelinesForReview() {
        // Timelines taken for initial review of protocol by MCAZ
        $application_stats = $this->Applications->find('all')
                                ->innerJoinWith('Evaluations')
                                ->select([ 'year' => 'date_format(Applications.date_submitted,"%Y")',
                                           'protocol' => 'Applications.id',
                                           'min' => $this->Applications->find('all')->func()->min('datediff(Evaluations.created, Applications.date_submitted)')
                                        ])
                                ->where(['Applications.submitted' => 2, 'date_submitted IS NOT' => null])
                                ->group(['year', 'protocol'])
                                ->hydrate(false);
        
        //Hash::extract($application_stats->toArray(), '{n}.min');
        foreach ($application_stats->toArray() as $app) {
            $arr[$app['year']][] = $app['min'];
        }

        //Code to introduce dummy variables when the protocols are too few. MCAZ to confirm default values to use
        $dummies = (count($application_stats->toArray()) > 5) ? [] : array(10, 10, 10, 10, 10, 10);
        foreach ($arr as $key => $value) {
            //pr(Hash::extract($this->box_plot_values(array_merge($value, $dummies)), '{s}'))
            $cats[] = $key;
            $data[] = array_map('intval', array_values($this->box_plot_values(array_merge($value, $dummies))));
        }

        if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Success',
                        'title' => 'Timelines taken for initial review of protocol by MCAZ',
                        'cats' => $cats,
                        'data' => $data, 
                        '_serialize' => ['message', 'data', 'title', 'cats']]);
                    return;
                }
    }

    private function box_plot_values($array)
    {
        $return = array(
            'lower_outlier'  => 0,
            'min'            => 0,
            'q1'             => 0,
            'median'         => 0,
            'q3'             => 0,
            'max'            => 0,
            'higher_outlier' => 0,
        );

        $array_count = count($array);
        sort($array, SORT_NUMERIC);

        $return['min']            = $array[0];
        $return['lower_outlier']  = $return['min'];
        $return['max']            = $array[$array_count - 1];
        $return['higher_outlier'] = $return['max'];
        $middle_index             = floor($array_count / 2);
        $return['median']         = $array[$middle_index]; // Assume an odd # of items
        $lower_values             = array();
        $higher_values            = array();

        // If we have an even number of values, we need some special rules
        if ($array_count % 2 == 0)
        {
            // Handle the even case by averaging the middle 2 items
            $return['median'] = round(($return['median'] + $array[$middle_index - 1]) / 2);

            foreach ($array as $idx => $value)
            {
                if ($idx < ($middle_index - 1)) $lower_values[]  = $value; // We need to remove both of the values we used for the median from the lower values
                elseif ($idx > $middle_index)   $higher_values[] = $value;
            }
        }
        else
        {
            foreach ($array as $idx => $value)
            {
                if ($idx < $middle_index)     $lower_values[]  = $value;
                elseif ($idx > $middle_index) $higher_values[] = $value;
            }
        }

        $lower_values_count = count($lower_values);
        $lower_middle_index = floor($lower_values_count / 2);
        $return['q1']       = $lower_values[$lower_middle_index];
        if ($lower_values_count % 2 == 0)
            $return['q1'] = round(($return['q1'] + $lower_values[$lower_middle_index - 1]) / 2);

        $higher_values_count = count($higher_values);
        $higher_middle_index = floor($higher_values_count / 2);
        $return['q3']        = $higher_values[$higher_middle_index];
        if ($higher_values_count % 2 == 0)
            $return['q3'] = round(($return['q3'] + $higher_values[$higher_middle_index - 1]) / 2);

        // Check if min and max should be capped
        $iqr = $return['q3'] - $return['q1']; // Calculate the Inner Quartile Range (iqr)
        if ($return['q1'] > $iqr)                  $return['min'] = $return['q1'] - $iqr;
        if ($return['max'] - $return['q3'] > $iqr) $return['max'] = $return['q3'] + $iqr;

        //modified to fit highcharts
        unset($return['lower_outlier']);
        unset($return['higher_outlier']);
        return $return;
    }



    public function notificationsPerYear() {
        $application_stats = $this->Applications->find('all')
                                ->innerJoinWith('Attachments')
                                ->select([ 'year' => 'date_format(Attachments.created,"%Y")',
                                                          'count' => $this->Applications->find('all')->func()->count('distinct Attachments.id')
                                                        ])
                                                 //->where(['Att.submitted' => 2])
                                                 ->group('year')
                                                 ->hydrate(false);
        foreach ($application_stats->toArray() as $key => $value) {
            $data[] = ['name' => $value['year'],
                       'y' => $value['count']];
        }
        if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Success',
                        'title' => 'DSMB, Clarification Memos etc. per year',
                        'data' => $data, 
                        '_serialize' => ['message', 'data', 'title']]);
                    return;
                }
    }

    public function amendmentsPerYear() {
        $application_stats = $this->Applications->find('all')
                                ->innerJoinWith('Amendments')
                                ->select([ 'year' => 'date_format(Amendments.created,"%Y")',
                                                          'count' => $this->Applications->find('all')->func()->count('distinct Amendments.id')
                                                        ])
                                                 ->where(['Amendments.submitted' => 2])
                                                 ->group('year')
                                                 ->hydrate(false);
        foreach ($application_stats->toArray() as $key => $value) {
            $data[] = ['name' => $value['year'],
                       'y' => $value['count']];
        }
        if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Success',
                        'title' => 'Amendments per year',
                        'data' => $data, 
                        '_serialize' => ['message', 'data', 'title']]);
                    return;
                }
    }

    public function processingStatus() {
        $application_stats = $this->Applications->find('all')
                            ->leftJoinWith('Evaluations')
                            ->leftJoinWith('DgReviews')
                            ->leftJoinWith('RequestInfos')
                            ->select([ 'process_status' => '
                                case when Applications.approved = \'Approved\' then \'Approved\' 
                                     when Evaluations.id > 0 then \'Evaluated\'
                                     when DgReviews.id > 0 then \'Director General\'
                                     when RequestInfos.id > 0 then \'Request for Info\'
                                     else \'Unknown\' end ',
                             'count' => $this->Applications->find('all')->func()->count('distinct protocol_no')
                                       ])
                                 ->where(['submitted' => 2])
                                 ->group('process_status')
                                 ->hydrate(false);

        //$this->set(compact('application_stats'));
        foreach ($application_stats->toArray() as $key => $value) {
            $data[] = ['name' => $value['process_status'],
                       'y' => $value['count']];
        }
        if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Success',
                        'title' => 'By Status',
                        'data' => $data, 
                        '_serialize' => ['message', 'data', 'title']]);
                    return;
                }
    }

    public function protocolsPerPhase() {
        $application_stats = $this->Applications->find('all')->select([ 'year' => 'date_format(created,"%Y")',
                            'phase' => 'case when trial_human_pharmacology = 1 then \'PHASE I\'
                                              when trial_therapeutic_exploratory = 1 then \'PHASE II\'
                                              when trial_therapeutic_confirmatory = 1 then \'PHASE III\'
                                              when trial_therapeutic_use = 1 then \'PHASE IV\'
                                              else \'Unknown\' end ',
                            'count' => $this->Applications->find('all')->func()->count('*')
                                                        ])
                                                 ->where(['submitted' => 2])
                                                 ->group(['year', 'phase'])
                                                 ->hydrate(false);
        foreach ($application_stats->toArray() as $key => $value) {
            $arr[$value['phase']][] = ['name' => $value['year'],
                       'y' => $value['count']];
        }
        foreach ($arr as $key => $value) {
            $data[] = ['name' => $key, 'data' => $value];
        }
        if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Success',
                        'title' => 'Distribution of  phases of applications',
                        'data' => $data, 
                        '_serialize' => ['message', 'data', 'title']]);
                    return;
                }
    }

    public function researchArea()  {
        $application_stats = $this->Applications->find('all')->select([ //'area' => 
                     'diagnosis' => 'scope_diagnosis', 'prophylaxis' => 'scope_prophylaxis',
 'therapy' => 'scope_therapy', 'safety' => 'scope_safety', 'efficacy' => 'scope_efficacy',
 'pharmacokinetic' => 'scope_pharmacokinetic', 'pharmacodynamic' => 'scope_pharmacodynamic',
 'bioequivalence' => 'scope_bioequivalence', 'dose response' => 'scope_dose_response',
 'pharmacogenetic' => 'scope_pharmacogenetic', 'pharmacogenomic' => 'scope_pharmacogenomic', 'pharmacoecomomic' => 'scope_pharmacoecomomic',
 'others' => 'scope_others'
                                                        ])
                                                 ->where(['submitted' => 2])
                                                 ->hydrate(false);
        foreach ($application_stats->toArray() as $application_stat) {
            foreach ($application_stat as $key => $value) {
                $arr[$key] = (($arr[$key]) ?? 0) + $value;
            }
        }
        foreach ($arr as $key => $value) {
            $data[] = ['name' => $key, 'y' => $value];
        }
        if($this->request->is('json')) {
                    $this->set([
                        'message' => 'Success',
                        'title' => 'Research Area applied for',
                        'data' => $data, 
                        '_serialize' => ['message', 'data', 'title']]);
                    return;
                }
    }
}
