<?php

namespace Bootcamp\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Page
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Page
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
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(name="slug", length=255, unique=true)
     */
    private $slug;
    
    /**
     * @var string
     *
     * @ORM\Column(name="metaTitle", type="string", length=255)
     */
    private $metaTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="metaKeywords", type="string", length=255)
     */
    private $metaKeywords;

    /**
     * @var string
     *
     * @ORM\Column(name="metaDescription", type="text")
     */
    private $metaDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="lead", type="text")
     */
    private $lead;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="pages")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * 
     * @var User
     */
    protected $user;
    
    /**
     * @ORM\ManyToOne(targetEntity="Page", inversedBy="pages")
     *
     * @var User
     */
    protected $page;
    
    /**
     * @ORM\OneToMany(targetEntity="Page", mappedBy="page")
     * @var ArrayCollection
     */
    protected $pages;

    public function __construct()
    {
    	$this->createdAt = new \DateTime();
    	$this->pages = new ArrayCollection();
    }

    public function __toString()
    {
    	return $this->getTitle();
    }
    
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
     * Set metaTitle
     *
     * @param string $metaTitle
     * @return Page
     */
    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;

        return $this;
    }

    /**
     * Get metaTitle
     *
     * @return string 
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    /**
     * Set metaKeywords
     *
     * @param string $metaKeywords
     * @return Page
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;

        return $this;
    }

    /**
     * Get metaKeywords
     *
     * @return string 
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * Set metaDescription
     *
     * @param string $metaDescription
     * @return Page
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * Get metaDescription
     *
     * @return string 
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Page
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set lead
     *
     * @param string $lead
     * @return Page
     */
    public function setLead($lead)
    {
        $this->lead = $lead;

        return $this;
    }

    /**
     * Get lead
     *
     * @return string 
     */
    public function getLead()
    {
        return $this->lead;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Page
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Page
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set user
     *
     * @param \Bootcamp\AdminBundle\Entity\User $user
     * @return Page
     */
    public function setUser(\Bootcamp\AdminBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Bootcamp\AdminBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set page
     *
     * @param \Bootcamp\AdminBundle\Entity\Page $page
     * @return Page
     */
    public function setPage(\Bootcamp\AdminBundle\Entity\Page $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \Bootcamp\AdminBundle\Entity\Page 
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Add pages
     *
     * @param \Bootcamp\AdminBundle\Entity\Page $pages
     * @return Page
     */
    public function addPage(\Bootcamp\AdminBundle\Entity\Page $pages)
    {
        $this->pages[] = $pages;

        return $this;
    }

    /**
     * Remove pages
     *
     * @param \Bootcamp\AdminBundle\Entity\Page $pages
     */
    public function removePage(\Bootcamp\AdminBundle\Entity\Page $pages)
    {
        $this->pages->removeElement($pages);
    }

    /**
     * Get pages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Page
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
