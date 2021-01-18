<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CommitteeDates Controller
 *
 * @property \App\Model\Table\CommitteeDatesTable $CommitteeDates
 *
 * @method \App\Model\Entity\CommitteeDate[] paginate($object = null, array $settings = [])
 */
class CommitteeDatesController extends AppController
{
    public $paginate = [
        // 'limit' => 2,
        'CommitteeDates' => ['scope' => 'committeedates'],
    ];

    public function add()
    {
        $committeeDate = $this->CommitteeDates->newEntity();
        if ($this->request->is('post')) {
            $committeeDate = $this->CommitteeDates->patchEntity($committeeDate, $this->request->getData());
            $committeeDate->user_id = $this->Auth->user('id');

            if($this->request->is('json')) {
                if($committeeDate->errors()) {
                    $this->response->body('Failure');
                    $this->response->statusCode(403);
                    $this->set([
                        'errors' => $committeeDate->errors(), 
                        'message' => 'Unable to save form', 
                        '_serialize' => ['errors', 'message']]);
                    return;
                }
            }

            if ($this->CommitteeDates->save($committeeDate)) {
                $this->Flash->success(__('The committee date has been saved.'));

                if($this->request->is('json')) {
                    if($committeeDate->errors()) {
                        $this->response->body('Failure');
                        $this->response->statusCode(200);
                        $this->set([
                            'errors' => null, 
                            'message' => $committeeDate->toArray(), 
                            '_serialize' => ['errors', 'message']]);
                        return;
                    }
                }

                return $this->redirect($this->referer());
            }
            // debug($committeeDate->errors());
            $this->Flash->error(__("The committee date could not be saved. \n".json_encode($committeeDate->errors())));
        }
        return $this->redirect($this->referer());
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $committeeDate = $this->CommitteeDates->get($id);
        if ($this->CommitteeDates->delete($committeeDate)) {
            $this->Flash->success(__('The committee date has been deleted.'));
        } else {
            $this->Flash->error(__('The committee date could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }
}
