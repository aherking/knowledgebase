<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tags
 *
 * @ORM\Table(name="tags", uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"name"})})
 * @ORM\Entity
 */
class Tag
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="main", type="boolean", length=1, nullable=true, options={"default" : 0})
     */
    private $main;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Article", mappedBy="tagid")
     */
    private $articleid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->articleid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMain(): ?string
    {
        return $this->main;
    }

    public function setMain(?string $parents): self
    {
        $this->parents = $main;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticleid(): Collection
    {
        return $this->articleid;
    }

    public function addArticleid(Article $articleid): self
    {
        if (!$this->articleid->contains($articleid)) {
            $this->articleid[] = $articleid;
            $articleid->addTagid($this);
        }

        return $this;
    }

    public function removeArticleid(Article $articleid): self
    {
        if ($this->articleid->contains($articleid)) {
            $this->articleid->removeElement($articleid);
            $articleid->removeTagid($this);
        }

        return $this;
    }
   
   public function __toString() {
    return $this->name;
}
}
