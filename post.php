<?php

class Post {
    private $id;

    private $nom;

    private $photo;

    private $description;

    private $categorie = [];

    private $date;


    public function getNom(): string
    {
        return $this->nom;
    }
    public function getExcerpt(): string
    {
        if ($this-> description === null) {
            return null;
        }
        Text::excerpt($this->description, 60);
    }




}
