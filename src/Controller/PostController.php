<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use function GuzzleHttp\json_decode;

/**
 * @Route("/post", name="post")
 */
class PostController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(PostRepository $postRepository)
    {
        $posts = $postRepository->findAll();
        dump($posts);
        die;
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request)
    {
        // dd($request->getParameter());
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);

        dd(1, $form->getErrors());

        die;

        $post->setTitle('This is going to be a title !!!!');

        $em = $this->getDoctrine()->getManager();

        $em->persist($post);
        $em->flush();

        return $this->json(['status' => 'ok']);
    }
}
