<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use ApiPlatform\Core\Annotation\ApiResource;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ApiResource(
 * normalizationContext={"groups"={"user:read"}},
 * denormalizationContext={"groups"={"user:write"}},
 * collectionOperations={
     *      "get"={},
     *      "post"={},
     * 
     * "create_user"={
     *          "method"="post",
      *          "path"="/users/create",
      *          "controller"=App\Controller\Api\CreateUser::class
  *       }},
  *
  
  *     
 * 
 * 
 * )
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface

{
    const propriétaire="ROLE_ADMIN";
    const soignant='ROLE_USER';
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"user:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user:read", "user:write"})
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({ "user:write"})
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user:read", "user:write"})
     */
    private $role;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user:read", "user:write"})
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user:read", "user:write"})
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
    * @Groups({"user:read", "user:write"})
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
    * @Groups({"user:read", "user:write"})
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user:read", "user:write"})
     */
    private $cp;

    /**
     * @ORM\Column(type="string", length=255)
    * @Groups({"user:read", "user:write"})
     */
    private $phone;

    
    
 public function getId(): ?int
                      {
                          return $this->id;
                      }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
      /**
      * Renvoie le mot de passe encodé utilisé pour l'authentification.
      * @see UserInterface
      */
     public function getPassword(): ?string
     {
         return $this->password;
     }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }
    
    
    /**
      * Renvoie les rôles accordés à l'utilisateur.
      * @see UserInterface
      */
      public function getRoles(): array
      {
          return [$this->role];
      }
    /**
     * Renvoie l'email pour l'authentification
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }
    /**
     * Utiliser pour encoder le mot de passe
     * @see UserInterface
     */
    public function getSalt()
    {
        
    }
    /**
     * Supprime les données sensibles de l'utilisateur
     * @see UserInterface
     */
    public function eraseCredentials()
    {
    }
       

       /**
        * Loads the user for the given username.
        *
        * @param string $email The username
        *
        * @return UserInterface
        *
        * @throws UsernameNotFoundException if the user is not found
        */
       public function loadUserByUsername($email)
      {
           // TODO: Implement loadUserByUsername() method.
       }



       /**
        * Refreshes the user for the account interface.
        *
        * @param UserInterface $user
        *
        * @return UserInterface
       *
        * @throws UnsupportedUserException if the account is not supported
        */

      public function refreshUser(UserInterface $users)
      {
          // TODO: Implement refreshUser() method.
      }

 
 

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

   

    
        
       
    

   
    
   
    

   
        

    

    
    

    
     
    

    
    
    
    
   

    
   
}
