<?php

namespace App\Classe;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

Class Card
{
    private $session;

    public function __construct( SessionInterface $session)
    {
        $this->session = $session;   
    }

    public function add($id)
    {
        $card = $this->session->get('card',[]);

        if(!empty($card[$id])){

            $card[$id]++;

        }else{

            $card[$id] = 1;
        }

        $this->session->set('card',$card);
    }
    public function get()
    {
        return $this->session->get('card');
    }
    public function remove()
    {
        return $this->session->remove('card');
    }
}