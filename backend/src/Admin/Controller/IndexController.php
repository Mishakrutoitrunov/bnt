<?php

namespace App\Admin\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'admin_index', methods: ['GET'])]
    public function index()
    {
        return $this->render('admin/index.html.twig');
    }
}