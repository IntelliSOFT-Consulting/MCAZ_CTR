<?php
namespace App\Controller\Base;

use App\Controller\AppController;

/**
 * Sites Controller
 *
 * @property \App\Model\Table\SitesTable $Sites
 *
 * @method \App\Model\Entity\Site[] paginate($object = null, array $settings = [])
 */
class SitesBaseController extends AppController
{

    /**
     * Edit method
     *
     * @param string|null $id Site id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function calendar()
    {
        $site = $this->Sites->get(6);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $site = $this->Sites->patchEntity($site, $this->request->getData());
            if ($this->Sites->save($site)) {
                $this->Flash->success(__('The calendar content has been updated.'));

                // return $this->redirect($this->referer());
                return $this->redirect(['controller' => 'Pages','action' => 'calendar', 'prefix' => false]);
            }
            $this->Flash->error(__('The site could not be saved. Please, try again.'));
        }
        $this->set(compact('site'));
        $this->set('_serialize', ['site']);
        $this->render('/Base/Sites/edit');
    }

}
