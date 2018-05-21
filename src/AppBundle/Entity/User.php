<?php
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @Vich\Uploadable
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\OneToMany(targetEntity="Note", mappedBy="user")
     */
    private $notes;


    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="text", nullable=true, unique=false)
     */
    private $avatar;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="avatar_file", fileNameProperty="avatar")
     *
     * @var File
     */
    private $avatarFile;


    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->notes = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->email ?: '';
    }


    /**
     *
     * @param File|UploadedFile $image
     *
     * @return User
     */
    public function setAvatarFile(File $image = null)
    {
        $this->avatarFile = $image;
        return $this;
    }

    /**
     * @return File|null
     */
    public function getAvatarFile()
    {
        return $this->avatarFile;
    }

    /**
     * @param string $avatar
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
        return $this;
    }

    /**
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

}
