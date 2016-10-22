<?php
/**
 * ログ出力 コントローラ
 */
namespace App\Controller;

use App\Controller\AppController;
class LogController extends AppController {

    public function index() {
        $log = $this->paginate($this->Log);
        $this->set(compact('log'));
        $this->set('_serialize', ['log']);
    }

    public function view($id = null) {
        $log = $this->Log->get($id, [
            'contain' => []
        ]);
        $this->set('log', $log);
        $this->set('_serialize', ['log']);
    }

    public function add() {
        $log = $this->Log->newEntity();
        if ($this->request->is('post')) {
            $log = $this->Log->patchEntity($log, $this->request->data);

            //param set
            $log->code = "code";
            $log->path = "path";
            $log->agent = "agent";
            $log->other = "other";

            if ($this->Log->save($log)) {
                $this->Flash->success(__('ログ出力成功'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('ログ出力失敗'));
            }
        }
        $this->set(compact('log'));
        $this->set('_serialize', ['log']);
    }
}
