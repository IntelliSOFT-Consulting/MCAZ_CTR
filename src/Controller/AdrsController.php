<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Adrs Controller
 *
 * @property \App\Model\Table\AdrsTable $Adrs
 *
 * @method \App\Model\Entity\Adr[] paginate($object = null, array $settings = [])
 */
class AdrsController extends AppController
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
        if ($this->request->is(['patch', 'post', 'put'])) {
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
        $adrs = $this->paginate($this->Adrs);

        $this->set(compact('adrs'));
        $this->set('_serialize', ['adrs']);
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
        $adr = $this->Adrs->get($id, [
            'contain' => ['AdrLabTests', 'AdrListOfDrugs', 'AdrOtherDrugs', 'Attachments']
        ]);

        // $this->viewBuilder()->setLayout('pdf/default');
        if(strpos($this->request->url, 'pdf')) {
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'pdf_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => $adr->reference_number.'.pdf'
                ]
            ]);
        }
        
        
        $designations = $this->Adrs->Designations->find('list', ['limit' => 200]);
        $doses = $this->Adrs->AdrListOfDrugs->Doses->find('list');
        $routes = $this->Adrs->AdrListOfDrugs->Routes->find('list');
        $frequencies = $this->Adrs->AdrListOfDrugs->Frequencies->find('list');
        $this->set(compact('adr', 'designations', 'doses', 'routes', 'frequencies'));
        $this->set('_serialize', ['adr']);

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
        $adr = $this->Adrs->newEntity();
        if ($this->request->is('post')) {
            $adr = $this->Adrs->patchEntity($adr, $this->request->getData());
            if ($this->Adrs->save($adr, ['validate' => false])) {
                //update field
		$adr->user_id = $this->Auth->user('id');
                $query = $this->Adrs->query();
                $query->update()
                    ->set(['reference_number' => 'SAE'.$adr->id.'/'.$adr->created->i18nFormat('yyyy')])
                    ->where(['id' => $adr->id])
                    ->execute();
                //
                $this->Flash->success(__('The adr has been saved.'));

                return $this->redirect(['action' => 'edit', $adr->id]);
            }
            $this->Flash->error(__('The adr could not be saved. Please, try again.'));
        }
        $users = $this->Adrs->Users->find('list', ['limit' => 200]);
        $designations = $this->Adrs->Designations->find('list', ['limit' => 200]);
        $this->set(compact('adr', 'users', 'designations'));
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
        $adr = $this->Adrs->get($id, [
            'contain' => ['AdrListOfDrugs', 'AdrOtherDrugs', 'AdrLabTests', 'Attachments']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adr = $this->Adrs->patchEntity($adr, $this->request->getData());
            if (!empty($adr->attachments)) {
              for ($i = 0; $i <= count($adr->attachments)-1; $i++) { 
                $adr->attachments[$i]->model = 'Adrs';
                $adr->attachments[$i]->category = 'attachments';
              }
            }
            // debug((string)$adr);
            // debug($this->request->getData());
            if ($this->Adrs->save($adr)) {
                $this->Flash->success(__('The adr has been saved.'));

                return $this->redirect(['action' => 'edit', $adr->id]);
            }
            $this->Flash->error(__('The adr could not be saved. Please, try again.'));
        }
        $users = $this->Adrs->Users->find('list', ['limit' => 200]);
        $designations = $this->Adrs->Designations->find('list', ['limit' => 200]);
        $doses = $this->Adrs->AdrListOfDrugs->Doses->find('list');
        $routes = $this->Adrs->AdrListOfDrugs->Routes->find('list');
        $frequencies = $this->Adrs->AdrListOfDrugs->Frequencies->find('list');
        $this->set(compact('adr', 'users', 'designations', 'doses', 'routes', 'frequencies'));
        // $this->set(compact('adr', 'users', 'designations'));
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
        $this->request->allowMethod(['post', 'delete']);
        $adr = $this->Adrs->get($id);
        if ($this->Adrs->delete($adr)) {
            $this->Flash->success(__('The adr has been deleted.'));
        } else {
            $this->Flash->error(__('The adr could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
