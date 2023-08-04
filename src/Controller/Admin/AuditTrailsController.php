<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * AuditTrails Controller
 *
 * @property \App\Model\Table\AuditTrailsTable $AuditTrails
 *
 * @method \App\Model\Entity\AuditTrail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuditTrailsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Search.Prg', [
            'actions' => ['index']
        ]);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [ 
            'order' => ['AuditTrails.created' => 'DESC']
        ];
        $withDeleted = ($this->request->getQuery('deleted')) ? 'withDeleted' : '';
        $query = $this->AuditTrails
            ->find('search', ['search' => $this->request->query, $withDeleted ]);
            $this->set('auditTrails', $this->paginate($query)); 
    }

    /**
     * View method
     *
     * @param string|null $id Audit Trail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $auditTrail = $this->AuditTrails->get($id, [
            'contain' => []
        ]);

        $this->set('auditTrail', $auditTrail);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $auditTrail = $this->AuditTrails->newEntity();
        if ($this->request->is('post')) {
            $auditTrail = $this->AuditTrails->patchEntity($auditTrail, $this->request->getData());
            if ($this->AuditTrails->save($auditTrail)) {
                $this->Flash->success(__('The audit trail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The audit trail could not be saved. Please, try again.'));
        }
        $this->set(compact('auditTrail'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Audit Trail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $auditTrail = $this->AuditTrails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $auditTrail = $this->AuditTrails->patchEntity($auditTrail, $this->request->getData());
            if ($this->AuditTrails->save($auditTrail)) {
                $this->Flash->success(__('The audit trail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The audit trail could not be saved. Please, try again.'));
        }
        $this->set(compact('auditTrail'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Audit Trail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $auditTrail = $this->AuditTrails->get($id);
        if ($this->AuditTrails->delete($auditTrail)) {
            $this->Flash->success(__('The audit trail has been deleted.'));
        } else {
            $this->Flash->error(__('The audit trail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
