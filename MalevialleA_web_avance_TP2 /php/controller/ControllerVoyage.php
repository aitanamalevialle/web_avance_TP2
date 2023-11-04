<?php

RequirePage::model('CRUD');
RequirePage::model('Voyage');

class ControllerVoyage extends controller {

    public function index(){
        $voyage = new Voyage;
        $select = $voyage->select();
        return Twig::render('voyage-index.php', ['voyages'=>$select]);
    }

    public function create(){
        $voyage = new Voyage;
        $select = $voyage->select();
        return Twig::render('voyage-create.php', ['voyages'=>$select]);
    }

    public function store(){
        $voyage = new Voyage;
        $insert = $voyage->insert($_POST);
        RequirePage::url('voyage/show/'.$insert);
    }

    public function show($id){
        $voyage = new Voyage;
        $selectId = $voyage->selectId($id);
        return Twig::render('voyage-show.php', ['voyage'=>$selectId]);
    }

    public function edit($id){
        $voyage = new Voyage;
        $selectId = $voyage->selectId($id);
        return Twig::render('voyage-edit.php', ['voyage'=>$selectId]);
    }

    public function update(){
        print_r($_POST);
        $voyage = new Voyage;
        $update = $voyage->update($_POST);
        RequirePage::url('voyage/show/'.$_POST['id']);
    }

    public function destroy(){
        $voyage = new Voyage;
        $update = $voyage->delete($_POST['id']);
        RequirePage::url('voyage/index');
    }
    
}

?>