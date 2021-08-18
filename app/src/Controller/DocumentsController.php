<?php
declare(strict_types=1);

namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\Datasource\FactoryLocator;
use Cake\ORM\Locator\LocatorAwareTrait;

/**
 * Documents Controller
 *
 * @property \App\Model\Table\DocumentsTable $Documents
 * @property \App\Model\Table\KsiegaTable $Ksiega
 * @method \App\Model\Entity\Document[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentsController extends AppController
{
    public $documentsTableObj;


    public function beforefilter(EventInterface $event){
        parent::beforefilter($event);
        $this->documentsTableObj = FactoryLocator::get('Table')->get('Documents');
        $this->documentsTableObj = FactoryLocator::get('Table')->get('Ksiega');
    }

    //post_document, id and user_id need to be exported together
    public function add(){
        $documentEnt = $this->Documents->newEmptyEntity();
//        $ksiegaEntRegion = $this->Ksiega->newEmptyEntity();
        $ksiegaTable = $this->getTableLocator()->get('Ksiega');
        $ksiega = $ksiegaTable->newEmptyEntity();
        //region, number, control_number

        if ($this->request->is('post')) {
            $documentData = $this->request->getData();

            $documentText = $this->request->getData('post_document');

            $userid = $this->request->getData('user_id');
            $name = $documentText->getClientFilename();

            $targetPath = WWW_ROOT. 'documents'. DS . 'post_document'. DS. $name;

            //if file got a name, is not empty and doesn't produce error, move it to destination dir
            //and assign it it's name
            if (!empty($name)) {
                if ($documentText->getSize() > 0 && $documentText->getError() == 0) {
                    $documentText->moveTo($targetPath);
                    $documentData['post_document'] = $name;
                }
            }

            $posts = $this->Documents->patchEntity($documentEnt, $documentData);

            // debug( $posts);die;
            // $id = $this->documentsTableObj->patchEntity($documentEnt, $documentId);
            //below in an if statement
            //&& $this->documentsTableObj->save($id)

            if ($result=$this->Documents->save($posts)) {
                // echo  $id = $this->Documents->lastInsertId();
                //adding id
                // $documentId = $this->request->getData('id');
                //specify the destination directory
                $this->Flash->success(__('Your id and document has been saved.'));
                return $this->redirect(['controller'=>'Documents','action' => 'index']);
            }else{
                $this->Flash->error(__('Unable to add your document.'));
                return $this->redirect(['controller'=>'Documents','action' => 'add']);
            }
        }
        $this->set(compact('documentEnt', $documentEnt));

        //add the information from the files to books table and assign them id
        //$my_file = file_get_contents(__DIR__ . '/webroot/documents/post_document/test.txt');
        //echo $my_file;
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

    public function openandread($id= null){
        //TODO: make path be able to change to fit the user file name
        //TODO after upload assign userID as the filename
        $path = '../webroot/documents/post_document/input.csv';
        $row = 1;
        if (($handle = fopen($path, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                //  echo "<p> $num fields in line $row: <br /></p>\n";
                //  $row++;
                for ($c=0; $c < $num; $c++) {
                        echo $data[$c] . "<br>";
                        if($c % 3 == 0){
                            //TODO split in threes
                        }
                    
                }
            }
            fclose($handle);
            //TODO displayed .csv fields are entered into the ksiega
        }
    }
}
