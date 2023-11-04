<?php

// Inclusion des fichiers de modèle nécessaires pour les opérations de CRUD.
RequirePage::model('CRUD');
RequirePage::model('Facture');
RequirePage::model('Voyage');
RequirePage::model('Client');

// Classe du contrôleur pour gérer les requêtes liées aux factures.
class ControllerFacture extends controller {

    // Affiche une liste de factures.
    public function index(){
        $facture = new Facture;
        $voyage = new Voyage;
        $client = new Client;

        $factures = $facture->select();

        // Enrichissement de chaque facture avec les données de voyage et de client associées.
        foreach ($factures as & $facture) {
            $voyageData = $voyage->selectId($facture['voyage_id']);
            $clientData = $client->selectId($facture['client_id']);
            $facture['voyage'] = $voyageData;
            $facture['client'] = $clientData;
        }

        // Rendu de la vue index avec les données des factures.
        return Twig::render('facture-index.php', ['factures' => $factures]);
    }
    
    // Affiche le formulaire de création d'une nouvelle facture.
    public function create(){
        $voyage = new Voyage;
        $client = new Client;

        // Récupération des données pour la sélection de voyage et de client.
        $selectVoyages = $voyage->select('destination');
        $selectClients = $client->select('nom');

        // Rendu de la vue de création de facture avec les données de sélection.
        return Twig::render('facture-create.php', ['voyages'=>$selectVoyages, 'clients'=>$selectClients]);
    }

    // Stocke une nouvelle facture dans la base de données.
    public function store(){
        $facture = new Facture;
        $insert = $facture->insert($_POST);
        RequirePage::url('facture/show/'.$insert);
    }

    // Affiche une facture spécifique.
    public function show($id){
        $facture = new Facture;
        $voyage = new Voyage;
        $client = new Client;
        $selectId = $facture->selectId($id);
        $selectVoyage = $voyage->selectId($selectId['voyage_id']);
        $selectClient = $client->selectId($selectId['client_id']);
        return Twig::render('facture-show.php', ['facture'=>$selectId, 'voyage'=>  $selectVoyage['destination'], 'client'=>  $selectClient['nom']]);
    }
    
    // Affiche le formulaire d'édition d'une facture existante.
    public function edit($id){
        $facture = new Facture;
        $voyage = new Voyage;
        $client = new Client;
        $selectId = $facture->selectId($id);
        $selectVoyages = $voyage->select('destination');
        $selectClients = $client->select('nom');
        return Twig::render('facture-edit.php', ['facture'=>$selectId, 'voyages'=>  $selectVoyages, 'clients'=>  $selectClients]);
    }
    
    // Met à jour une facture existante dans la base de données.
    public function update(){
        $facture = new Facture;
        $update = $facture->update($_POST);
        RequirePage::url('facture/show/'.$_POST['id']);
    }

    // Supprime une facture de la base de données.
    public function destroy(){
        $facture = new Facture;
        $update = $facture->delete($_POST['id']);
        RequirePage::url('facture/index');
    }
    
}

?>