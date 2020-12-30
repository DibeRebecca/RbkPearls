<?php
namespace App\Entity;
class Search{
     /**
     * @var int|null
     */
    private $maxprix;
   public function getMaxPrix()
   {
      return $this->maxprix;
   }
   public function setMaxPrix($maxprix)
   {
       $this->maxprix=$maxprix;
   }
}
?>