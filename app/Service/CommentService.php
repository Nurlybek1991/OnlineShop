<?php

namespace Service;

use Repository\CommentRepository;
use Service\AuthenticationService\AuthenticationServiceInterface;

class CommentService
{

    private CommentRepository $commentModel;
    private AuthenticationServiceInterface $authenticationService;

    public function __construct(AuthenticationServiceInterface $authenticationService,CommentRepository $commentModel)
    {
        $this->authenticationService = $authenticationService;
        $this->commentModel = $commentModel;
    }

    public function getComment(): array
    {
        $user = $this->authenticationService->getCurrentUser();
        if (!$user instanceof User) {
            return [];
        }

        $userId = $user->getId();

        return $this->commentModel->add($userId);
    }
}