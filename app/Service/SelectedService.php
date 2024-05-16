<?php

namespace Service;

use Entity\User;
use Repository\SelectedRepository;
use Service\AuthenticationService\AuthenticationServiceInterface;

class SelectedService
{
    private SelectedRepository $selectedModel;
    private AuthenticationServiceInterface $authenticationService;

    public function __construct(AuthenticationServiceInterface $authenticationService,SelectedRepository $selectedModel)
    {
        $this->authenticationService = $authenticationService;
        $this->selectedModel = $selectedModel;
    }

    public function getProducts(): array
    {
        $user = $this->authenticationService->getCurrentUser();
        if (!$user instanceof User) {
            return [];
        }
        $userId = $user->getId();

        return $this->selectedModel->getAll($userId);
    }
}