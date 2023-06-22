<?php 
namespace App\Security;

use DateTime;
use Exception;
use App\Entity\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;

class UserChecker implements UserCheckerInterface
{
    /**
     * @param User $user
     */
    public function checkPreAuth(UserInterface $user){
        if(null===$user->getBannedUntil()){
            return;
        }

        $now = new DateTime();

        if($now < $user->getBannedUntil()){
            throw new AccessDeniedException('The user is banned');
        }
    }

    /**
     * @param User $user
     */
    public function checkPostAuth(UserInterface $user){

    }
}

?>