<?php

namespace Controller;

use Repository\CommentRepository;
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

    public function postComment()
    {
        if (!$this->authenticationService->check()) {
            header("Location: /login");
        }

        $userId = $this->authenticationService->getCurrentUser()->getId();
    }
}