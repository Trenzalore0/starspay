<?php

declare(strict_types=1);

namespace App\Partner\src\Controller;

use App\Partner\src\Entity\Partner;
use App\Partner\src\Entity\PartnerUser;
use App\Partner\src\Entity\Role;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/json', name: 'app_test_json')]
    public function index(): JsonResponse
    {
        $data = [
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/TestController.php',
        ];
        return $this->json($data);
    }

    #[Route('/template', name: 'app_test_template')]
    public function testTemplate(): Response
    {
        return $this->render('@Partner/test.html.twig', [
            'user_first_name' => 'kleydson',
            'user_age' => 25
        ]);
    }

    #[Route('/index', name: 'test')]
    public function get(): Response
    {
        $role = new Role();
        $role->setName('admin');

        $partner = new Partner();
        $partner->setName('StarsPayTest');
        $partner->setKey(bin2hex(random_bytes(12)));
        $partner->setSecret(bin2hex(random_bytes(20)));
        $partner->setWdpass(bin2hex(random_bytes(16)));

        $partnerUser = new PartnerUser();
        $partnerUser->setName('kleydson');
        $partnerUser->setEmail('kleydson122@gmail.com');
        $partnerUser->setPassword(password_hash('1234', PASSWORD_DEFAULT));
        $partnerUser->setPartner($partner);
        $partnerUser->setRole($role);

        $this->entityManager->persist($role);
        $this->entityManager->persist($partner);
        $this->entityManager->persist($partnerUser);

        return new Response();
    }
}
