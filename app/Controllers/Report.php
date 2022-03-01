<?php
namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Pusher\Pusher;

/*
* Agent_show
* show agent list, delete anget
* @author   Klayuth, Preechaya
* @Create Date  2564-07-30
*/
class Report extends Cdms_controller {
    /*
    * agent_show_ajax
    * show agent list
    * @input    -
    * @output   array of agent
    * @author   Klayuth
    * @Create Date  2564-07-30
    */
    public function show_report() {
        $this->output('v_report');
    }

    public function show_input() {
        $this->output('v_input');
    }

    public function process() {
        $obj =  $this->request->getPost();

        $app_id = "1354801";
        $key = "b485b70127147958e1fa";
        $secret = "fc79828e41d97bae4df6";
        $app_cluster = "ap1";
        $pusher = new Pusher($key, $secret, $app_id, ['cluster' => $app_cluster]);

        $data['message'] = array(
            'cluster' => $obj['cluster'],
            'score' => $obj['score']
        );
        echo 'cluster : ' . $obj['cluster'] . '<br>';
        echo 'score : ' . $obj['score'] . '<br>';
        $pusher->trigger('pusher_score', 'up_score', $data);
        // $this->show_input();
    }

}


