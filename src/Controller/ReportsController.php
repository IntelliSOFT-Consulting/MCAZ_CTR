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
