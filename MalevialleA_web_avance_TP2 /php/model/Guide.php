<?php

class Guide extends CRUD {

    protected $table = 'guide';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nom', 'courriel', 'telephone', 'langues_parlees', 'specialite'];

}

?>