<?php
declare(strict_types=1);

namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\Datasource\FactoryLocator;

/**
 * Documents Controller
 *
 * @property \App\Model\Table\DocumentsTable $Documents
 * @method \App\Model\Entity\Document[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentsController extends AppController
{
    public $documentsTableObj;

	public function beforefilter(EventInterface $event){
	    parent::beforefilter($event);
	    $this->documentsTableObj = FactoryLocator::get('Table')->get('Documents');
	}
    public function add(){
    	$documentEnt = $this->documentsTableObj->newEmptyEntity();
    	if ($this->request->is('post')) {
    	    $documentData = $this->request->getData();
            $documentImage = $this->request->getData('post_document');
            $name = $documentImage->getClientFilename();
            $type = $documentImage->getClientMediaType();
            $targetPath = WWW_ROOT. 'documents'. DS . 'post_document'. DS. $name;
            if (!empty($name)) {
                if ($documentImage->getSize() > 0 && $documentImage->getError() == 0) {
                    $documentImage->moveTo($targetPath); 
                    $documentData['post_document'] = $name;
                }
            }
            $posts = $this->documentsTableObj->patchEntity($documentEnt, $documentData);
            if ($this->documentsTableObj->save($posts)) {
                $this->Flash->success(__('Your post has been saved.'));
                return $this->redirect(['controller'=>'Documents','action' => 'index']);
            }else{
                $this->Flash->error(__('Unable to add your post.'));
                return $this->redirect(['controller'=>'Documents','action' => 'add']);
                }
    	}
    	$this->set(compact('documentEnt', $documentEnt));
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $documents = $this->paginate($this->Documents);

        $this->set(compact('documents'));
    }

    /**
     * View method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $document = $this->Documents->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('document'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $document = $this->Documents->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $document = $this->Documents->patchEntity($document, $this->request->getData());
            if ($this->Documents->save($document)) {
                $this->Flash->success(__('The document has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document could not be saved. Please, try again.'));
        }
        $this->set(compact('document'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $document = $this->Documents->get($id);
        if ($this->Documents->delete($document)) {
            $this->Flash->success(__('The document has been deleted.'));
        } else {
            $this->Flash->error(__('The document could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
