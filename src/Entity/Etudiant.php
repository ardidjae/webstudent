<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EtudiantRepository::class)]
class Etudiant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Le nom doit comporter au minimum 2 caractères',
        maxMessage: 'Le nom doit comporter au maximum 50 caractères',
    )]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Le prenom doit comporter au minimum 2 caractères',
        maxMessage: 'Le prenom doit comporter au maximum 50 caractères',
    )]
    private ?string $prenom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\LessThan(
        'today',
        message:'La date ne peut pas être supérieure à aujourdhui'
    )]
    private ?\DateTimeInterface $dateNaiss = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(
        min: 2,
        max: 100,
        minMessage: 'Le ville doit comporter au minimum 2 caractères',
        maxMessage: 'Le ville doit comporter au maximum 100 caractères',
    )]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(
        min: 2,
        max: 100,
        minMessage: 'La rue doit comporter au minimum 2 caractères',
        maxMessage: 'La rue doit comporter au maximum 100 caractères',
    )]
    private ?string $rue = null;

    #[ORM\Column(length: 5)]
    #[Assert\Length(
        min: 5,
        minMessage: 'Le code postal doit comporter au minimum 5 caractères',
    )]
    private ?string $copos = null;

    #[ORM\Column(length: 50)]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Le surnom doit comporter au minimum 2 caractères',
        maxMessage: 'Le surnom doit comporter au maximum 50 caractères',
    )]
    private ?string $surnom = null;

    #[ORM\ManyToOne(inversedBy: 'etudiants')]
    private ?Maison $maison = null;

    #[ORM\OneToMany(mappedBy: 'etudiant', targetEntity: Note::class)]
    private Collection $notes;

    #[ORM\ManyToOne(inversedBy: 'etudiants')]
    private ?Promotion $promotion = null;

    #[ORM\ManyToOne(inversedBy: 'etudiants')]
    private ?Baguette $baguette = null;

    #[ORM\ManyToMany(targetEntity: Competence::class, mappedBy: 'etudiant')]
    private Collection $competences;

    public function __construct()
    {
        $this->notes = new ArrayCollection();
        $this->competences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaiss(): ?\DateTimeInterface
    {
        return $this->dateNaiss;
    }

    public function setDateNaiss(\DateTimeInterface $dateNaiss): static
    {
        $this->dateNaiss = $dateNaiss;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): static
    {
        $this->rue = $rue;

        return $this;
    }

    public function getCopos(): ?string
    {
        return $this->copos;
    }

    public function setCopos(string $copos): static
    {
        $this->copos = $copos;

        return $this;
    }

    public function getSurnom(): ?string
    {
        return $this->surnom;
    }

    public function setSurnom(string $surnom): static
    {
        $this->surnom = $surnom;

        return $this;
    }

    public function getMaison(): ?Maison
    {
        return $this->maison;
    }

    public function setMaison(?Maison $maison): static
    {
        $this->maison = $maison;

        return $this;
    }

    /**
     * @return Collection<int, Note>
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): static
    {
        if (!$this->notes->contains($note)) {
            $this->notes->add($note);
            $note->setEtudiant($this);
        }

        return $this;
    }

    public function removeNote(Note $note): static
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getEtudiant() === $this) {
                $note->setEtudiant(null);
            }
        }

        return $this;
    }

    public function getPromotion(): ?Promotion
    {
        return $this->promotion;
    }

    public function setPromotion(?Promotion $promotion): static
    {
        $this->promotion = $promotion;

        return $this;
    }

    public function getBaguette(): ?Baguette
    {
        return $this->baguette;
    }

    public function setBaguette(?Baguette $baguette): static
    {
        $this->baguette = $baguette;

        return $this;
    }

    /**
     * @return Collection<int, Competence>
     */
    public function getCompetences(): Collection
    {
        return $this->competences;
    }

    public function addCompetence(Competence $competence): static
    {
        if (!$this->competences->contains($competence)) {
            $this->competences->add($competence);
            $competence->addEtudiant($this);
        }

        return $this;
    }

    public function removeCompetence(Competence $competence): static
    {
        if ($this->competences->removeElement($competence)) {
            $competence->removeEtudiant($this);
        }

        return $this;
    }
}
