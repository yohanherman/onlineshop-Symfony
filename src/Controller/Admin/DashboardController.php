<?php

namespace App\Controller\Admin;

use App\Entity\Coffretrouge;
use App\Entity\Images;
use App\Entity\Reviews;
use App\Entity\User;
use App\Entity\Vins;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(VinsCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Shop Wine')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Vins', 'fas fa-list', Vins::class);
        yield MenuItem::linkToCrud('coffrets', 'fas fa-list', Coffretrouge::class);
        yield MenuItem::linkToCrud('commentaires', 'fas fa-user', Reviews::class);
        yield MenuItem::linkToCrud('utilisateurs', 'fas fa-comment', User::class);
        yield MenuItem::linkToCrud('images de vins', 'fas fa-image', Images::class);
    }
}
