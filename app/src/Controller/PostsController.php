<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\Datasource\FactoryLocator;
/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{
    
    public $postsTableObj;

	public function beforefilter(\Cake\Event\EventInterface $event){
	    parent::beforefilter($event);
	    $this->postsTableObj = FactoryLocator::get('Table')->get('Posts');
	}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $posts = $this->paginate($this->Posts);

        $this->set(compact('posts'));
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('post'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add(){
    	$postEnt = $this->postsTableObj->newEmptyEntity();
    	if ($this->request->is('post')) {
    	    $postData = $this->request->getData();
            $postImage = $this->request->getData('post_image');
            $name = $postImage->getClientFilename();
            $type = $postImage->getClientMediaType();
            $targetPath = WWW_ROOT. 'img'. DS . 'post_image'. DS. $name;
            if ($type == 'image/jpeg' || $type == 'image/jpg' || $type == 'image/png') {
                if (!empty($name)) {
                    if ($postImage->getSize() > 0 && $postImage->getError() == 0) {
                        $postImage->moveTo($targetPath); 
                        $postData['post_image'] = $name;
                    }
                }
            }
    	    $posts = $this->postsTableObj->patchEntity($postEnt, $postData);
    	if ($this->postsTableObj->save($posts)) {
    	    $this->Flash->success(__('Your post has been saved.'));
            return $this->redirect(['controller'=>'Posts','action' => 'index']);
    	}else{
    	    $this->Flash->error(__('Unable to add your post.'));
            return $this->redirect(['controller'=>'Posts','action' => 'add']);
    	    }
    	}
    	$this->set(compact('postEnt', $postEnt));
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $this->set(compact('post'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
