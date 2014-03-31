//application/controllers/GuestbookController.php
   class GuestbookController extends Zend_Controller_Action {
   
    // snipping indexAction()...
    public function signAction() {
	
        $request = $this->getRequest();
        $form    = new Application_Form_Guestbook();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $model = new Application_Model_Guestbook($form->getValues());
                $model->save();
                return $this->_helper->redirector('index');
            }
        }
        $this->view->form = $form;
    }
}