<?php

namespace Hoax\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="recipe")
 */
class Recipe
{
    /**
     * @var int $id
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $name
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @var ArrayCollection|Ingredient[] $ingredients
     *
     * @ORM\ManyToMany(targetEntity="Recipe", mappedBy="ingredients")
     */
    protected $ingredients;


    public function __construct()
    {
        $this->ingredients = new ArrayCollection;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->$id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add an ingredient
     *
     * @param $ingredient Ingredient
     */
    public function addIngredient($ingredient)
    {
        $this->ingredients->add($ingredient);
    }

    /**
     * Remove an ingredient
     *
     * @param $ingredient Ingredient
     */
    public function removeIngredient($ingredient)
    {
        $this->ingredients->removeElement($ingredient);
    }

    /**
     * Return the ingredients that are in
     * the current recipe
     *
     * @return ArrayCollection|Ingredient[]
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }
}
