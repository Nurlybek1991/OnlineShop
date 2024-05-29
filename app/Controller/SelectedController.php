<?php

namespace Controller;

use Repository\SelectedRepository;
use Request\SelectedRequest;
use Service\AuthenticationService\AuthenticationServiceInterface;
use Service\SelectedService;

class SelectedController
{
    private AuthenticationServiceInterface $authenticationService;
    private SelectedService $selectedService;
    private SelectedRepository $selectedModel;

    public function __construct(AuthenticationServiceInterface $authenticationService, SelectedService $selectedService, SelectedRepository $selectedModel)
    {
        $this->authenticationService = $authenticationService;
        $this->selectedService = $selectedService;
        $this->selectedModel = $selectedModel;
    }

    public function getSelected(): void
    {
        if (!$this->authenticationService->check()) {
            header("Location: /login");
        }
        $products = $this->selectedService->getProducts();
        require_once './../View/selected.php';
    }

    public function addSelected(SelectedRequest $request): void
    {
        if (!$this->authenticationService->check()) {
            header("Location: /login");
        }
        $userId = $this->authenticationService->getCurrentUser()->getId();
        $productId = $request->getProductId();

        $errors = $request->addValidate($userId);

        if (empty($errors)) {
            $this->selectedModel->add($userId, $productId);
        }
        header("Location: /main");
    }

    public function deleteSelected(SelectedRequest $request): void
    {
        if (!$this->authenticationService->check()) {
            header("Location: /login");
        }

        $userId = $this->authenticationService->getCurrentUser()->getId();
        $productId = $request->getProductId();

        $errors = $request->deleteValidate($userId);

        if (empty($errors)) {
            $this->selectedModel->delete($userId, $productId);
        }
        header("Location: /selected");
    }


}