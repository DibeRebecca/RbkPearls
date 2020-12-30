<?php 
// src/Entity/User.php  
namespace App\Entity;  
use FOS\UserBundle\Model\User as BaseUser; 
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;  
/**  
* @ORM\Entity  
* @ORM\Table(name="fos_user")  
 * @UniqueEntity(fields={"username"}, message="There is already an account with this username")
*/
class User extends BaseUser 
{     
	/**      
	* @ORM\Id      
	* @ORM\Column(type="integer")      
	* @ORM\GeneratedValue(strategy="AUTO")      
	*/     
	protected $id;  
    public function __construct()     
    {         
    parent::__construct();         
    // your own logic     
} 
}  