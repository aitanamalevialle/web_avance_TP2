<?php

// Déclaration de la classe 'Voyage' qui hérite (étend) d'une classe de base nommée 'CRUD'.
class Voyage extends CRUD {

    // Déclaration d'une propriété protégée '$table'. Cela indique le nom de la table dans la base de données.
    protected $table = 'voyage';
    
    // Déclaration d'une propriété protégée '$primaryKey'. Ceci spécifie la clé primaire de la table 'voyage'.
    protected $primaryKey = 'id';
    
    // Déclaration d'un tableau protégé '$fillable'. Ce tableau contient les noms des colonnes
    // de la table 'voyage' que la classe est autorisée à remplir lors des opérations d'insertion ou de mise à jour.
    protected $fillable = ['id', 'destination', 'date_depart', 'date_retour', 'prix', 'description'];
    
}

?>