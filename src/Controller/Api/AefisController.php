<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\Event\Event;

/**
 * Aefis Controller
 *
 * @property \App\Model\Table\AefisTable $Aefis
 *
 * @method \App\Model\Entity\Adr[] paginate($object = null, array $settings = [])
 */
class AefisController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 5,
        'maxLimit' => 15,
        'sortWhitelist' => [
            'id', 'name'
        ]
    ];

    // public function initialize() {
    //    parent::initialize();
    //    $this->Auth->allow(['add', 'edit']);       
    // }

    /**
     * BeforeFilter method
     * Use to format request data
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        //debug($this->request->data);
        if (isset($this->request->data['date_of_birth'])) {
            $this->request->data['date_of_birth'] = implode('-', $this->request->data['date_of_birth']);
        } 
        //date_of_onset_of_reaction
        if (isset($this->request->data['date_of_onset_of_reaction'])) {
            $this->request->data['date_of_onset_of_reaction'] = implode('-', $this->request->data['date_of_onset_of_reaction']);
        }
        //date_of_end_of_reaction
        if (isset($this->request->data['date_of_end_of_reaction'])) {
            $this->request->data['date_of_end_of_reaction'] = implode('-', $this->request->data['date_of_end_of_reaction']);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Designations']
        ];
        $aefis = $this->paginate($this->Aefis);

        $this->set(compact('aefis'));
        $this->set('_serialize', ['aefis']);
    }

    /**
     * View method
     *
     * @param string|null $id Adr id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        //Reverse id
        $id = $this->Util->reverseXOR($id);
        //
        $adr = $this->Aefis->get($id, [
            'contain' => ['Users', 'AdrListOfDrugs', 'AdrOtherDrugs']
        ]);

        $this->set('adr', $adr);
        $this->set('_serialize', ['adr']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adr = $this->Aefis->newEntity();
        if ($this->request->is('post')) {
            $adr = $this->Aefis->patchEntity($adr, $this->request->getData());

            if ($this->Aefis->save($adr, ['validate' => false])) {

                //return $this->redirect(['action' => 'edit', $this->Util->generateXOR($adr->id)]);
                $adr->id = $this->Util->generateXOR($adr->id);
                $this->set('_serialize', ['adr']);
            }
        }
        $users = $this->Aefis->Users->find('list', ['limit' => 200]);
        $designations = $this->Aefis->Designations->find('list', ['limit' => 200]);
        $doses = $this->Aefis->AdrListOfDrugs->Doses->find('list');
        $routes = $this->Aefis->AdrListOfDrugs->Routes->find('list');
        $frequencies = $this->Aefis->AdrListOfDrugs->Frequencies->find('list');
        $this->set(compact('adr', 'users', 'designations', 'doses', 'routes', 'frequencies'));
        $this->set('_serialize', ['adr']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Adr id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        //Reverse id
        $id = $this->Util->reverseXOR($id);
        //

        $adr = $this->Aefis->get($id, [
            'contain' => ['Users', 'AdrListOfDrugs', 'AdrOtherDrugs']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['id'] = $this->Util->reverseXOR($this->request->data['id']);
            $adr = $this->Aefis->patchEntity($adr, $this->request->getData());
            //debug((string)$adr);
            //debug($this->request->data);
            if ($this->Aefis->save($adr, ['associated' => ['AdrListOfDrugs', 'AdrOtherDrugs']])) {

                //return $this->redirect(['action' => 'edit', $this->Util->generateXOR($adr->id)]);
                //generate id
                $adr->id = $this->Util->generateXOR($adr->id);
                //
                $this->set('_serialize', ['adr']);
            }
        }

        //format dates
        if (!empty($adr->date_of_birth)) {
            if(empty($adr->date_of_birth)) $adr->date_of_birth = '--';
            $a = explode('-', $adr->date_of_birth);
            $adr->date_of_birth = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }
        if (!empty($adr->date_of_onset_of_reaction)) {
            if(empty($adr->date_of_onset_of_reaction)) $adr->date_of_onset_of_reaction = '--';
            $a = explode('-', $adr->date_of_onset_of_reaction);
            $adr->date_of_onset_of_reaction = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }
        if (!empty($adr->date_of_end_of_reaction)) {
            if(empty($adr->date_of_end_of_reaction)) $adr->date_of_end_of_reaction = '--';
            $a = explode('-', $adr->date_of_end_of_reaction);
            $adr->date_of_end_of_reaction = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }

        $users = $this->Aefis->Users->find('list', ['limit' => 200]);
        $designations = $this->Aefis->Designations->find('list', ['limit' => 200]);
        $doses = $this->Aefis->AdrListOfDrugs->Doses->find('list');
        $routes = $this->Aefis->AdrListOfDrugs->Routes->find('list');
        $frequencies = $this->Aefis->AdrListOfDrugs->Frequencies->find('list');
        $this->set(compact('adr', 'users', 'designations', 'doses', 'routes', 'frequencies'));
        $this->set('_serialize', ['adr']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Adr id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //Reverse id
        $id = $this->Util->reverseXOR($id);
        //

        $this->request->allowMethod(['post', 'delete']);
        $adr = $this->Aefis->get($id);
        if ($this->Aefis->delete($adr)) {
            $this->Flash->success(__('The adr has been deleted.'));
        } else {
            $this->Flash->error(__('The adr could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
