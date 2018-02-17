<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Attachments Controller
 *
 * @property \App\Model\Table\AttachmentsTable $Attachments
 *
 * @method \App\Model\Entity\Attachment[] paginate($object = null, array $settings = [])
 */
class AttachmentsController extends AppController
{

    /**
     * View method
     *
     * @param string|null $id Attachment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function download($id = null) {
        $attachment = $this->Attachments->get($id, [
            'contain' => []
        ]);
        if(!$attachment) {
            $this->Flash->error(__('Attachment does not exist.'));
            return $this->redirect('/');
        }
        $this->loadModel($attachment['model']);
        $parent = $this->{$attachment['model']}->get($attachment['foreign_key']);

        // debug($parent);
        // return;
        if($this->Auth->user('group_id') == 4 && $parent->user_id != $this->Auth->user('id')) {
            $this->Flash->error(__('You don\'t have permissions to access the file.'));
            return $this->redirect('/');
        }

        $response = $this->response->withFile(substr($attachment['dir'], 8).$attachment['file'], ['download' => true]);
        // Return the response to prevent controller from trying to render
        // a view.
        return $response;
    }

    public function view($id = null)
    {
        $attachment = $this->Attachments->get($id, [
            'contain' => []
        ]);

        $this->set('attachment', $attachment);
        $this->set('_serialize', ['attachment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attachment = $this->Attachments->newEntity();
        if ($this->request->is('post')) {
            $attachment = $this->Attachments->patchEntity($attachment, $this->request->getData());
            if ($this->Attachments->save($attachment)) {
                /*$this->Flash->success(__('The attachment has been saved.'));

                return $this->redirect(['action' => 'index']);*/
                $this->set([
                        'message' => 'Success', 
                        'content' => $attachment,
                        '_serialize' => ['message', 'content']]);
                    return;
            } else {
                $this->response->body('Failure');
                $this->response->statusCode(403);
                $this->set([
                        'errors' => $attachment->errors(),
                        'message' => 'Failure', 
                        '_serialize' => ['errors','message']]);
                    return;
            }
        }
        $this->set(compact('attachment'));
        $this->set('_serialize', ['attachment']);
    }

    

    /**
     * Delete method
     *
     * @param string|null $id Attachment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    //TODO: Delete attachment self only
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attachment = $this->Attachments->get($this->request->getData('id'));
        if ($this->Attachments->delete($attachment)) {
            $this->set([
                        'message' => 'The attachment has been deleted.', 
                        '_serialize' => ['message']]);
                    return;
        } else {
            $this->response->body('Failure');
            $this->response->statusCode(403);
            $this->set([
                'errors' => $attachment->errors(), 
                'message' => 'The attachment could not be deleted. Please, try again', 
                '_serialize' => ['errors', 'message']]);
            return;
        }

        // return $this->redirect(['action' => 'index']);
    }
}
