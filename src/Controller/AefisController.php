<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Aefis Controller
 *
 * @property \App\Model\Table\AefisTable $Aefis
 *
 * @method \App\Model\Entity\Aefi[] paginate($object = null, array $settings = [])
 */
class AefisController extends AppController
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
        $aefis = $this->paginate($this->Aefis);

        $this->set(compact('aefis'));
        $this->set('_serialize', ['aefis']);
    }

    /**
     * View method
     *
     * @param string|null $id Aefi id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aefi = $this->Aefis->get($id, [
            'contain' => ['Users', 'Designations']
        ]);

        $this->set('aefi', $aefi);
        $this->set('_serialize', ['aefi']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aefi = $this->Aefis->newEntity();
        if ($this->request->is('post')) {
            $aefi = $this->Aefis->patchEntity($aefi, $this->request->getData());
            $aefi->user_id = $this->Auth->user('id');
            if ($this->Aefis->save($aefi, ['validate' => false])) {
                $this->Flash->success(__('The aefi has been saved.'));

                return $this->redirect(['action' => 'edit', $this->Util->generateXOR($aefi->id)]);
            }
            $this->Flash->error(__('The aefi could not be saved. Please, try again.'));
        }
        $users = $this->Aefis->Users->find('list', ['limit' => 200]);
        $designations = $this->Aefis->Designations->find('list', ['limit' => 200]);
        $this->set(compact('aefi', 'users', 'designations'));
        $this->set('_serialize', ['aefi']);

    }

    /**
     * Edit method
     *
     * @param string|null $id Aefi id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        //Reverse id
        $id = $this->Util->reverseXOR($id);
        //

        $aefi = $this->Aefis->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aefi = $this->Aefis->patchEntity($aefi, $this->request->getData());
            if ($this->Aefis->save($aefi)) {
                $this->Flash->success(__('The aefi has been saved.'));

                return $this->redirect(['action' => 'edit', $this->Util->generateXOR($aefi->id)]);
            }
            $this->Flash->error(__('The aefi could not be saved. Please, try again.'));
        }
        //format dates
        if (!empty($aefi->date_of_birth)) {
            if(empty($aefi->date_of_birth)) $aefi->date_of_birth = '--';
            $a = explode('-', $aefi->date_of_birth);
            $aefi->date_of_birth = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }
        if (!empty($aefi->date_of_onset_of_reaction)) {
            if(empty($aefi->date_of_onset_of_reaction)) $aefi->date_of_onset_of_reaction = '--';
            $a = explode('-', $aefi->date_of_onset_of_reaction);
            $aefi->date_of_onset_of_reaction = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }

        $users = $this->Aefis->Users->find('list', ['limit' => 200]);
        $designations = $this->Aefis->Designations->find('list', ['limit' => 200]);
        $this->set(compact('aefi', 'users', 'designations'));
        $this->set('_serialize', ['aefi']);

    }

    /**
     * Delete method
     *
     * @param string|null $id Aefi id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aefi = $this->Aefis->get($id);
        if ($this->Aefis->delete($aefi)) {
            $this->Flash->success(__('The aefi has been deleted.'));
        } else {
            $this->Flash->error(__('The aefi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
