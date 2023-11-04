<?php

class Facture extends CRUD {

    protected $table = 'facture';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'client_id', 'voyage_id', 'montant', 'date_facture'];
    
}

?>