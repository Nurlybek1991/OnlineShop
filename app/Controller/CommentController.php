<?php

namespace Controller;

use Repository\CommentRepository;
use Request\CommentRequest;
use Service\AuthenticationService\AuthenticationServiceInterface;
use Service\CartService;


class CommentController
{

    private AuthenticationServiceInterface $authenticationService;
    private CartService $cartService;
    private CommentRepository $commentModel;

    public function __construct(AuthenticationServiceInterface $authenticationService, CartService $cartService, CommentRepository $commentModel)
    {
        $this->authenticationService = $authenticationService;
        $this->cartService = $cartService;
        $this->commentModel = $commentModel;
    }

    public function postComment(CommentRequest $request): void
    {
        if (!$this->authenticationService->check()) {
            header("Location: /login");
        }

        $userId = $this->authenticationService->getCurrentUser()->getId();
        $productId = $request->getProductId();
        $comment = $request->addComment();
        $this->commentModel->add($userId, $productId, $comment);
        $products = $this->cartService->getProduct($productId);
        $comments = $this->commentModel->getOnlyComment($userId,$productId);

        require_once './../View/productInfo.php';


    }
}