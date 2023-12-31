<?php

namespace App\Controller;

use App\Entity\Author;
use App\Repository\AuthorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class AuthorController extends AbstractController
{
    #[Route('/api/authors', name: 'app_author', methods:['GET'])]
    public function getAllAuthor(AuthorRepository $authorRepository, SerializerInterface $serializer ): JsonResponse
    {
        $AuthorList = $authorRepository->findAll();
        $JsonAuthorList = $serializer->serialize($AuthorList, 'json');
        return new JsonResponse($JsonAuthorList, Response::HTTP_OK, [], true);
    }
    #[Route('/api/authors{id}', name: 'app_author', methods:['GET'])]
    public function getDetailsAuthor(Author $author, SerializerInterface $serializer ): JsonResponse
    {
        $JsonAuthor = $serializer->serialize($author, 'json');
        return new JsonResponse($JsonAuthor, Response::HTTP_OK, [], true);
    }
}
