<?php


namespace App\Manager;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;


use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserManager
{


    protected $entityManager;
    protected $userRepository;
    private $passwordEncoder;

    public function __construct(
        
        EntityManagerInterface $entityManager,
        UserRepository $userRepository,
        UserPasswordEncoderInterface $passwordEncoder
    ) {
       
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
        $this->passwordEncoder = $passwordEncoder;
    }

       public function findEmail(string $email)
       {
          $users = $this->userRepository->findByEmail($email);
          
          if ($users) {
              return $users[0];
            }
            return null;
        }
              
              
     public function registerAccount(User $users )
     {
             if ($this->findEmail($users->getEmail())){
                throw new BadRequestHttpException();
            }  
            //$this->entityManager->persist($users);
            //$this->entityManager->flush();
            

           
    
      
    $users->setEmail($users->getEmail());
    
    $password = $this->passwordEncoder->encodePassword($users,$users->getPassword());
    $users->setPassword($password);
    
    $this->entityManager->persist($users);
    $this->entityManager->flush();

    return[
        "message" => "creation d'un utilisateur effectué",
        "users" => $users
    ];
    
    }
    public function isValid(object $users, string $password): bool
    {
        return $this->userPasswordEncoder->isPasswordValid($users, $password);

    }
}
    
    
