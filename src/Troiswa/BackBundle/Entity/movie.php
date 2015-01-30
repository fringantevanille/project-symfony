<?php

namespace Troiswa\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * movie
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Troiswa\BackBundle\Entity\movieRepository")
 */
class movie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_de_sortie", type="datetime")
     */
    private $dateDeSortie;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    private $fichier;

    /**
     * @var integer
     *
     * @ORM\Column(name="duree", type="smallint")
     */
    private $duree;

    /**
     * @var integer
     *
     * @ORM\Column(name="note", type="smallint")
     */
    private $note;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return movie
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return movie
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dateDeSortie
     *
     * @param \DateTime $dateDeSortie
     * @return movie
     */
    public function setDateDeSortie($dateDeSortie)
    {
        $this->dateDeSortie = $dateDeSortie;

        return $this;
    }

    /**
     * Get dateDeSortie
     *
     * @return \DateTime 
     */
    public function getDateDeSortie()
    {
        return $this->dateDeSortie;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return movie
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     * @return movie
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return integer 
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set note
     *
     * @param integer $note
     * @return movie
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer 
     */
    public function getNote()
    {
        return $this->note;
    }

    public function setFichier($fichier)
    {
        $this->fichier = $fichier;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer
     */
    public function getFichier()
    {
        return $this->fichier;
    }

    public function upload()
    {

        // $this->fichier correspond à la classs de l'objet uploadedFile
        $nomImage = $this->fichier->getClientOriginalName();

        $this->fichier->move(
                $this->getUploadRootDir(),
                $nomImage
        );

        $this->image = $nomImage;
    }

    private function getUploadRootDir()
    {
        return __DIR__ . "/../../../../web/img";
    }



}
