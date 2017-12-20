<?php
namespace App\Controller\Admin;

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
            'contain' => ['AefiListOfVaccines', 'AefiListOfDiluents', 'Attachments']
        ]);

        if(strpos($this->request->url, 'pdf')) {
            $this->viewBuilder()->helpers(['Form' => ['templates' => 'pdf_form',]]);
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => $aefi->reference_number.'.pdf'
                ]
            ]);
        }
        $designations = $this->Aefis->Designations->find('list', ['limit' => 200]);
        $provinces = $this->Aefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('aefi', 'designations', 'provinces'));
        $this->set('_serialize', ['aefi', 'designations', 'provinces']);
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
                //update field
                $query = $this->Aefis->query();
                $query->update()
                    ->set(['reference_number' => 'AEFI'.$aefi->id.'/'.$aefi->created->i18nFormat('yyyy')])
                    ->where(['id' => $aefi->id])
                    ->execute();
                //
                $this->Flash->success(__('The aefi has been saved.'));

                return $this->redirect(['action' => 'edit', $aefi->id]);
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

        $aefi = $this->Aefis->get($id, [
            'contain' => ['AefiListOfVaccines', 'AefiListOfDiluents', 'Attachments']
        ]);
        if ($aefi->submitted == 2) {
            $this->Flash->success(__('Report '.$aefi->reference_number.' already submitted.'));
            return $this->redirect(['action' => 'view', $aefi->id]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aefi = $this->Aefis->patchEntity($aefi, $this->request->getData());
            if (!empty($aefi->attachments)) {
              for ($i = 0; $i <= count($aefi->attachments)-1; $i++) { 
                $aefi->attachments[$i]->model = 'Aefis';
                $aefi->attachments[$i]->category = 'attachments';
              }
            }
            
            if ($aefi->submitted == 1) {
              //save changes button
              if ($this->Aefis->save($aefi, ['validate' => false])) {
                $this->Flash->success(__('The changes to the Report '.$aefi->reference_number.' have been saved.'));
                return $this->redirect(['action' => 'edit', $aefi->id]);
              } else {
                $this->Flash->error(__('Report '.$aefi->reference_number.' could not be saved. Kindly correct the errors and try again.'));
              }
            } elseif ($aefi->submitted == 2) {
              //submit to mcaz button
              if ($this->Aefis->save($aefi, ['validate' => false])) {
                $this->Flash->success(__('Report '.$aefi->reference_number.' has been successfully submitted to MCAZ for review.'));
                return $this->redirect(['action' => 'view', $aefi->id]);
              } else {
                $this->Flash->error(__('Report '.$aefi->reference_number.' could not be saved. Kindly correct the errors and try again.'));
              }
            } elseif ($aefi->submitted == -1) {
               //cancel button              
                $this->Flash->success(__('Cancel form successful. You may continue editing report '.$aefi->reference_number.' later'));
                return $this->redirect(['controller' => 'Users','action' => 'home']);

           } else {
              if ($this->Aefis->save($aefi, ['validate' => false])) {
                $this->Flash->success(__('The changes to the Report '.$aefi->reference_number.' have been saved.'));
                return $this->redirect(['action' => 'edit', $aefi->id]);
              } else {
                $this->Flash->error(__('Report '.$aefi->reference_number.' could not be saved. Kindly correct the errors and try again.'));
              }
           }

        }

        //format dates
        if (!empty($aefi->date_of_birth)) {
            if(empty($aefi->date_of_birth)) $aefi->date_of_birth = '--';
            $a = explode('-', $aefi->date_of_birth);
            $aefi->date_of_birth = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
        }

        $designations = $this->Aefis->Designations->find('list', ['limit' => 200]);
        $provinces = $this->Aefis->Provinces->find('list', ['limit' => 200]);
        $this->set(compact('aefi', 'designations', 'provinces'));
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
