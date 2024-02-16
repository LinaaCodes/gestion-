<?php

class Produit
{
    private int $id;

    private string $name;

    private string $description;

    private float $price;

    private string $nProduit;

    public function __construct(int $id, string $name, string $description,$price, string $nProduit)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->nProduit = $nProduit;
    }



    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of price
     *
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @param float $price
     *
     * @return self
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of nProduit
     *
     * @return string
     */
    public function getNProduit(): string
    {
        return $this->nProduit;
    }

    /**
     * Set the value of nProduit
     *
     * @param string $nProduit
     *
     * @return self
     */
    public function setNProduit(string $nProduit): self
    {
        $this->nProduit = $nProduit;

        return $this;
    }



    public function __toString()
    {
        return "<br>  Nom du produit : " . $this->name .
        '<br> prix : ' . $this->price .
        '<br>  numéro de Produit ' . $this->nProduit .
        " <br>  description :  " . $this->description . '<br>';
    }






} //fin de la class produit