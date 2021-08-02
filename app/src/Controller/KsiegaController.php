<?php
declare(strict_types=1);

namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\Datasource\FactoryLocator;
use Slim\Http;

// use League\Csv\Reader;

/**
 * Ksiega Controller
 *
 * @property \App\Model\Table\KsiegaTable $Ksiega
 * @method \App\Model\Entity\Ksiega[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class KsiegaController extends AppController
{

	public $formTableObj;

    public function beforefilter(EventInterface $event){
	    parent::beforefilter($event);
	    $this->formTableObj = FactoryLocator::get('Table')->get('Ksiega'); //or Table/Form???
	}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        //nie działa pobieranie .csv z zewnętrznego linku (https://raw.githubusercontent.com/slurmsmackenzie99/external_csv_file/main/input.csv)
        //docelowo ma być nie-lokalnie
        // $csv = Reader::createFromPath('/var/www/vhosts/p.tt/kw21.g12.pw/app/src/Model/input.csv', 'r');
        // $csv->setHeaderOffset(0);

        // $header = $csv->getHeader(); //returns the CSV header record
        // $records = $csv->getRecords(); //returns all the CSV records as an Iterator object

        // echo $csv->toString(); //returns the CSV document as a string


        $ksiega = $this->paginate($this->Ksiega);

        $this->set(compact('ksiega'));
    }

    /**
     * View method
     *
     * @param string|null $id Ksiega id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ksiega = $this->Ksiega->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('ksiega'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ksiega = $this->Ksiega->newEmptyEntity();
        if ($this->request->is('post')) {
            $ksiega = $this->Ksiega->patchEntity($ksiega, $this->request->getData());
            if ($this->Ksiega->save($ksiega)) {
                $this->Flash->success(__('The ksiega has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ksiega could not be saved. Please, try again.'));
        }
        $this->set(compact('ksiega'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ksiega id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ksiega = $this->Ksiega->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ksiega = $this->Ksiega->patchEntity($ksiega, $this->request->getData());
            if ($this->Ksiega->save($ksiega)) {
                $this->Flash->success(__('The ksiega has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ksiega could not be saved. Please, try again.'));
        }
        $this->set(compact('ksiega'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ksiega id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ksiega = $this->Ksiega->get($id);
        if ($this->Ksiega->delete($ksiega)) {
            $this->Flash->success(__('The ksiega has been deleted.'));
        } else {
            $this->Flash->error(__('The ksiega could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function form($id = null)
    {
        //upload file to document in like region, number, control_number? split
        //loop for as many times as there is entries
        
        // $document = $this->Ksiega->newEmptyEntity();
        // if($this->request->is('post')){
        //     $document = $this->Ksiega->patchEntity($document, $this->request->getData());
        //     if ($this->Ksiega->save($document)) {
        //         $this->Flash->success(__('The record has been saved.'));
        //         //page that says it sumbitted successfully
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('The record could not be saved. Please, try again.'));
        // }
        // $this->set(compact('document'));

        /* Reminder - below is instantiated at the beginning:
        // public $formTableObj;

        // public function beforefilter(EventInterface $event){
        //     parent::beforefilter($event);
        //     $this->formTableObj = FactoryLocator::get('Table')->get('Ksiega'); //or Table/Form???
        */
        //https://www.webscodex.com/2020/10/file-upload-in-cakephp-4.html

        $formEnt = $this->formTableObj->newEmptyEntity(); //create an empty entity for the form

        if($this->request->is('post')){
            $formData = $this->request->getData();
            $formCSV = $this->request->getData('post_csv'); //not sure what it does? in the example it was 'post_image'
            $name = $formCSV->getClientFilename(); //filename to specify the path for the target
            $type = $formCSV->getClientMediaType(); //get type of file for later authorization
            $targetPath = WWW_ROOT . 'document' . DS .'post_csv' . DS . $name; //specify the path in the webroot

            if ($type == 'document/csv' || $type == 'document/XLSX' || $type == 'document/xls') {
                if (!empty($name)) {
                    if ($formCSV->getSize() > 0 && $formCSV->getError() == 0) {
                        $formCSV->moveTo($targetPath); 
                        $formData['input'] = $name;
                    }
                }
            }
            $forms = $this->formTableObj->patchEntity($formEnt, $formData);

            if($this->formTableObj->save($forms)){ 
                $this->Flash->success(__('You document has been saved.'));
                return $this->redirect(['controller'=>'Ksiega', 'action'=> 'index']);
            }else{
                $this->Flash->error(__('Unable to add the document'));
                return $this->redirect(['controller'=>'Ksiega', 'action'=>'form']);
            }
        }
        $this->set(compact('formEnt', $formEnt));
    }
}
