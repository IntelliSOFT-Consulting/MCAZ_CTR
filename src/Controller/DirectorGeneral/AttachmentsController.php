<?php
namespace App\Controller\DirectorGeneral;

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

   
    public function addApprovalLetter()
    {        
        $attachment = $this->Attachments->newEntity();
        if ($this->request->is(['post', 'put'])) {
            $attachment = $this->Attachments->patchEntity($attachment, $this->request->getData());
            if ($this->Attachments->save($attachment)) {                
                $this->Flash->success('Successful save for approval letter.');
                return $this->redirect($this->referer());
            } else {                
                $this->Flash->error('Unable to save approval letter');
                return $this->redirect($this->referer());
            }
        }
        $this->Flash->error(__('Unknown application. Kindly contact MCAZ.')); 
        return $this->redirect($this->referer());
    }
}
