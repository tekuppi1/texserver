<?php
/**
 * 抽象コントローラ
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Event\Event;

class AppController extends Controller {

    /** Authentication
     * 認可処理をpassさせる場合はここに。
     */
    public function beforeFilter(Event $event) {
        //$this->Auth->allow(['index', 'view', 'display']);
        $this->set('auth',$this->Auth);
    }

    public function initialize() {
        $this->loadComponent('Flash');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Auth', [
            'authenticate' => [    //認証
                'Form' => [
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginRedirect' => [    //ログイン後に遷移するアクション
                'controller' => 'Admin',
                'action' => 'index'
            ],
            'logoutRedirect' => [   //ログアウト後に遷移するアクション
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authError' => 'ログインできませんでした。ログインしてください。', // ログインに失敗
        ]);

        //ログのグラフ表示用です。
        $this->viewGraph();
        $this->loger("initialize", $this->name, "");
    }

    public function beforeRender(Event $event) {
        if (!array_key_exists('_serialize', $this->viewVars) 
            && in_array($this->response->type(), ['application/json', 'application/xml'])) {
            $this->set('_serialize', true);
        }
    }

    /**
     * ログ出力用のクラスでし！
     * @param {String} $code
     * @param {String} $path - ファイルパス
     * @param {String} $code - その他のパラメーター
     */
    protected function loger($code, $path, $other) {
        $Log = TableRegistry::get('log');
        $LogEntry = $Log->newEntity();
        $LogEntry["code"] = $code;
        $LogEntry["path"] = $path;
        $LogEntry["agent"] = $this->Auth->user('username');
        $LogEntry["other"] = $other;
        $LogEntry["timestamp"] = Time::now();
        $Log->save($LogEntry) ?
            $this->Flash->success(__('SUCCESS SAVE LOG!!')) : $this->Flash->error(__('FALED SAVE LOG!!'));
    }

    /**
     * ログ出力
     * AppControll.initializ()で読んでます。
     */
    protected function viewGraph(){
        $log = TableRegistry::get('log')->find();
        $time = $log->func()->date_format(['timestamp' => 'identifier',"'%Y/%m/%d %H'" => 'literal']);
        $log->group($time);
        $log->select(['count' => $log->func()->count('*'), 'timeCreated'=>$time]);
        $this->set('chartData', $log);
    }
}
