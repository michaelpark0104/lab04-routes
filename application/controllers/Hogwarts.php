<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hogwarts extends Application {

    function __construct() {
        parent::__construct();
    }

    /**
     * Homepage for our app
     */
    public function index() {
        // this is the view we want shown
        $this->data['pagebody'] = 'homepage';

        // build the list of authors, to pass on to our view
        $source = $this->quotes->all();
        $authors = array();
        foreach ($source as $record) {
            $authors[] = array('who' => $record['who'], 'mug' => $record['mug'], 'href' => $record['where']);
        }
        $this->data['authors'] = $authors;

        $this->render();
    }

    public function shucks() {

        // loads justone
        $this->data['pagebody'] = 'justone';

        // gets 2nd index
        $record = $this->quotes->get(2);

        // merge the records to data array
        $this->data = array_merge($this->data, $record);

        $this->render();
    }

    public function random() {
        $this->data['pagebody'] = 'justone';

        $source = $this->quotes->all();
        $authors = array();

        $record = $source[rand(0, 6)];
        
        $this->data = array_merge($this->data, $record);

        $this->render();
    }

}
