<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SiteDetails Controller
 *
 * @property \App\Model\Table\SiteDetailsTable $SiteDetails
 *
 * @method \App\Model\Entity\SiteDetail[] paginate($object = null, array $settings = [])
 */
class SiteDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Applications', 'Counties']
        ];
        $siteDetails = $this->paginate($this->SiteDetails);

        $this->set(compact('siteDetails'));
        $this->set('_serialize', ['siteDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Site Detail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $siteDetail = $this->SiteDetails->get($id, [
            'contain' => ['Applications', 'Counties']
        ]);

        $this->set('siteDetail', $siteDetail);
        $this->set('_serialize', ['siteDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $siteDetail = $this->SiteDetails->newEntity();
        if ($this->request->is('post')) {
            $siteDetail = $this->SiteDetails->patchEntity($siteDetail, $this->request->getData());
            if ($this->SiteDetails->save($siteDetail)) {
                $this->Flash->success(__('The site detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The site detail could not be saved. Please, try again.'));
        }
        $applications = $this->SiteDetails->Applications->find('list', ['limit' => 200]);
        $counties = $this->SiteDetails->Counties->find('list', ['limit' => 200]);
        $this->set(compact('siteDetail', 'applications', 'counties'));
        $this->set('_serialize', ['siteDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Site Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $siteDetail = $this->SiteDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $siteDetail = $this->SiteDetails->patchEntity($siteDetail, $this->request->getData());
            if ($this->SiteDetails->save($siteDetail)) {
                $this->Flash->success(__('The site detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The site detail could not be saved. Please, try again.'));
        }
        $applications = $this->SiteDetails->Applications->find('list', ['limit' => 200]);
        $counties = $this->SiteDetails->Counties->find('list', ['limit' => 200]);
        $this->set(compact('siteDetail', 'applications', 'counties'));
        $this->set('_serialize', ['siteDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Site Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $siteDetail = $this->SiteDetails->get($id);
        if ($this->SiteDetails->delete($siteDetail)) {
            $this->Flash->success(__('The site detail has been deleted.'));
        } else {
            $this->Flash->error(__('The site detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
