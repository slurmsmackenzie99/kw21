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
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\Document[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentsController extends AppController
{
    public $documentsTableObj;


    public function beforefilter(EventInterface $event){
        parent::beforefilter($event);
        $this->documentsTableObj = FactoryLocator::get('Table')->get('Documents');
        $this->ksiegaTableObj = FactoryLocator::get('Table')->get('Ksiega');
        $this->usersTableObj = FactoryLocator::get('Table')->get('Users');
    }

    public function add(){
        $var = '{"params":{"region":"WA1G","numer":"00069574","numerKontrolny":"3"},"2.2.1":[{"numerUdzialu":"1","wielkoscUdzialu":"1 \/ 1","rodzajWspolnosci":"---"}],"2.2.2":[],"2.2.3":[],"2.2.4":[],"2.2.5":[{"listaWskazan":"1","imiePierwsze":"MIECZYS\u0141AW","imieDrugie":"LEON","nazwisko":"MUSZY\u0143SKI","drugiCzlonNazwisko":"---","imieOjca":"---","imieMatki":"---","pesel":"52041104812"}]}';
        // $var = utf8_decode($var);
        $var = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
            return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UTF-16BE');
        }, $var);
        debug($var); die;
  

        $document = $this->Documents->newEmptyEntity();
        $documentEnt = $this->Documents->newEmptyEntity();
        $usersTable = $this->getTableLocator()->get('Users');
        $users = $usersTable->newEmptyEntity();

        if ($this->request->is('post')) {
            $documentData = $this->request->getData();
            debug($documentData);

            $documentText = $this->request->getData('post_document');
            debug($documentText);

            $userid = $this->request->getData('id');
            //debug($userid);

            $targetPath = WWW_ROOT. 'documents'. DS . 'post_document'. DS. $userid;

            //if file got a name, is not empty and doesn't produce error, move it to destination dir
            //and assign it it's name
            if (!empty($name)) {
                if ($documentText->getSize() > 0 && $documentText->getError() == 0) {
                    $documentText->moveTo($targetPath);
                    $documentData['post_document'] = $name;
                }
            }

            $posts = $this->Documents->patchEntity($documentEnt, $documentData);
            //$posts = $this->Documents->patchEntity($documentEnt, $userid);

            if ($result=$this->Documents->save($posts)) {
                $this->Flash->success(__('Your id and document has been saved.'));
                return $this->redirect(['controller'=>'Documents','action' => 'index']);
            }else{
                $this->Flash->error(__('Unable to add your document.'));
                return $this->redirect(['controller'=>'Documents','action' => 'add']);
            }
        }
        $this->set(compact('documentEnt', 'document', 'users'));
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

//    public function openandread($id= null){
//        $path = '../webroot/documents/post_document/inpjut.csv';
//        $row = 1;
//        if (($handle = fopen($path, "r")) !== FALSE) {
//            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//                $num = count($data);
//                //  echo "<p> $num fields in line $row: <br /></p>\n";
//                //  $row++;
//                for ($c=0; $c < $num; $c++) {
//                        echo $data[$c] . "<br>";
//                        if($c % 3 == 0){
//
//                        }
//
//                }
//            }
//            fclose($handle);
//        }
//    }
}
