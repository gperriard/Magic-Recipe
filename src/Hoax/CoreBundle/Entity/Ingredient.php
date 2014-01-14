<?php

namespace Hoax\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="ingredient")
 */
class Ingredient
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
     * @var ArrayCollection|Recipe[] $recipes
     *
     * @ORM\ManyToMany(targetEntity="Recipe", inversedBy="ingredients")
     * @ORM\JoinTable(name="mixture")
     **/
    protected $recipes;


    public function __construct()
    {
        $this->recipes = new ArrayCollection();
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
     * Add the ingredient to a recipe
     *
     * @param $recipe Recipe
     */
    public function addInRecipe($recipe)
    {
        $this->recipes->add($recipe);
    }

    /**
     * Remove an ingredient from a recipe
     *
     * @param $recipe Recipe
     */
    public function removeFromRecipe($recipe)
    {
        $this->recipes->removeElement($recipe);
    }

    /**
     * Return the recipes where the current
     * ingredient is used
     *
     * @return ArrayCollection|Recipe[]
     */
    public function getRecipes()
    {
        return $this->recipes;
    }
}
