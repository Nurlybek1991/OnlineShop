<?php

namespace Controller;

use Repository\CommentRepository;
use Request\CommentRequest;
use Service\AuthenticationService\AuthenticationServiceInterface;
use Service\CommentService;

class CommentController
{

    private AuthenticationServiceInterface $authenticationService;
    private CommentService $commentService;
    private CommentRepository $commentModel;

    public function __construct(AuthenticationServiceInterface $authenticationService, CommentService $commentService, CommentRepository $commentModel)
    {
        $this->authenticationService = $authenticationService;
        $this->commentService = $commentService;
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

        require_once './../View/productInfo.php';


    }
}