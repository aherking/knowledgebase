<?php

namespace App\Entity;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Articles
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")	
 * @ORM\Table(name="articles", uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"name"})})
 * @ORM\Entity
 */
class Article
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
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="date", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="changed", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $changed = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     *
     * @ORM\Column(name="userID", type="integer", nullable=false)
     */
    private $userid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="workflow", type="text", length=16777215, nullable=true)
     */
    private $workflow;

    /**
     * @var string|null
     *
     * @ORM\Column(name="errormessage", type="text", length=16777215, nullable=true)
     */
    private $errormessage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="solution", type="text", length=16777215, nullable=true)
     */
    private $solution;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="articleid")
     * @ORM\JoinTable(name="articles_tags_relations",
     *   joinColumns={
     *     @ORM\JoinColumn(name="articleID", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tagID", referencedColumnName="id")
     *   }
     * )
     */
    private $tagid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tagid = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getChanged(): ?\DateTimeInterface
    {
        return $this->changed;
    }

    public function setChanged(\DateTimeInterface $changed): self
    {
        $this->changed = $changed;

        return $this;
    }

    public function getUserid(): ?int
    {
        return $this->userid;
    }

    public function setUserid(int $userid): self
    {
        $this->userid = $userid;

        return $this;
    }

    public function getWorkflow(): ?string
    {
        return $this->workflow;
    }

    public function setWorkflow(?string $workflow): self
    {
        $this->workflow = $workflow;

        return $this;
    }

    public function getErrormessage(): ?string
    {
        return $this->errormessage;
    }

    public function setErrormessage(?string $errormessage): self
    {
        $this->errormessage = $errormessage;

        return $this;
    }

    public function getSolution(): ?string
    {
        return $this->solution;
    }

    public function setSolution(?string $solution): self
    {
        $this->solution = $solution;

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTagid(): Collection
    {
        return $this->tagid;
    }

    public function addTagid(Tag $tagid): self
    {
        if (!$this->tagid->contains($tagid)) {
            $this->tagid[] = $tagid;
        }

        return $this;
    }

    public function removeTagid(Tag $tagid): self
    {
        if ($this->tagid->contains($tagid)) {
            $this->tagid->removeElement($tagid);
        }

        return $this;
    }

}
