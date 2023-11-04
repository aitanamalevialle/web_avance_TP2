<?php

class Client extends CRUD {

    protected $table = 'client';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nom', 'courriel', 'telephone', 'adresse'];
    
}

?>