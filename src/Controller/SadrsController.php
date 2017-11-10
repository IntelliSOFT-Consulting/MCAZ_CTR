<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Sadrs Controller
 *
 * @property \App\Model\Table\SadrsTable $Sadrs
 *
 * @method \App\Model\Entity\Sadr[] paginate($object = null, array $settings = [])
 */
class SadrsController extends AppController
{
    public function initialize() {
       parent::initialize();
       //$this->Auth->allow(['add', 'edit']);       
    }

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
        $sadrs = $this->paginate($this->Sadrs);

        $this->set(compact('sadrs'));
        $this->set('_serialize', ['sadrs']);
    }

    /**
     * View method
     *
     * @param string|null $id Sadr id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        //Reverse id
        $id = $this->Util->reverseXOR($id);
        //
        $sadr = $this->Sadrs->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('sadr', $sadr);
        $this->set('_serialize', ['sadr']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sadr = $this->Sadrs->newEntity();
        if ($this->request->is('post')) {
            $sadr = $this->Sadrs->patchEntity($sadr, $this->request->getData());
            $sadr->user_id = $this->Auth->user('id');
            if ($this->Sadrs->save($sadr, ['validate' => false])) {
                $this->Flash->success(__('The sadr has been saved.'));

                return $this->redirect(['action' => 'edit', $this->Util->generateXOR($sadr->id)]);
            }
            $this->Flash->error(__('The sadr could not be saved. Kindly correct the errors below and retry.'));
        }
        $users = $this->Sadrs->Users->find('list', ['limit' => 200]);
        $designations = $this->Sadrs->Designations->find('list', ['limit' => 200]);
        $doses = $this->Sadrs->SadrListOfDrugs->Doses->find('list');
        $routes = $this->Sadrs->SadrListOfDrugs->Routes->find('list');
        $frequencies = $this->Sadrs->SadrListOfDrugs->Frequencies->find('list');
        $this->set(compact('sadr', 'users', 'designations', 'doses', 'routes', 'frequencies'));
        $this->set('_serialize', ['sadr']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sadr id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        //Reverse id
        $id = $this->Util->reverseXOR($id);
        //

        $sadr = $this->Sadrs->get($id, [
            'contain' => ['SadrListOfDrugs', 'SadrOtherDrugs']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sadr = $this->Sadrs->patchEntity($sadr, $this->request->getData());
            //debug((string)$sadr);
            //debug($this->request->data);
            if ($this->Sadrs->save($sadr, ['associated' => ['SadrListOfDrugs', 'SadrOtherDrugs']])) {
                $this->Flash->success(__('The sadr has been saved.'));

                return $this->redirect(['action' => 'edit', $this->Util->generateXOR($sadr->id)]);
            }
            $this->Flash->error(__('The sadr could not be saved. Please, try again.'));
        }

        //format dates
        if (!empty($sadr->date_of_birth)) {
            if(empty($sadr->date_of_birth)) $sadr->date_of_birth = '--';
            $a = explode('-', $sadr->date_of_birth);
            $sadr->date_of_birth = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }
        if (!empty($sadr->date_of_onset_of_reaction)) {
            if(empty($sadr->date_of_onset_of_reaction)) $sadr->date_of_onset_of_reaction = '--';
            $a = explode('-', $sadr->date_of_onset_of_reaction);
            $sadr->date_of_onset_of_reaction = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }
        if (!empty($sadr->date_of_end_of_reaction)) {
            if(empty($sadr->date_of_end_of_reaction)) $sadr->date_of_end_of_reaction = '--';
            $a = explode('-', $sadr->date_of_end_of_reaction);
            $sadr->date_of_end_of_reaction = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }

        $users = $this->Sadrs->Users->find('list', ['limit' => 200]);
        $designations = $this->Sadrs->Designations->find('list', ['limit' => 200]);
        $doses = $this->Sadrs->SadrListOfDrugs->Doses->find('list');
        $routes = $this->Sadrs->SadrListOfDrugs->Routes->find('list');
        $frequencies = $this->Sadrs->SadrListOfDrugs->Frequencies->find('list');
        $this->set(compact('sadr', 'users', 'designations', 'doses', 'routes', 'frequencies'));
        $this->set('_serialize', ['sadr']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sadr id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //Reverse id
        $id = $this->Util->reverseXOR($id);
        //

        $this->request->allowMethod(['post', 'delete']);
        $sadr = $this->Sadrs->get($id);
        if ($this->Sadrs->delete($sadr)) {
            $this->Flash->success(__('The sadr has been deleted.'));
        } else {
            $this->Flash->error(__('The sadr could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
