<?php

namespace Controller;

use Model\Order;
use Model\User;
use Model\UserProduct;

class OrderController
{
    private Order $orderModel;
    private User $userModel;
    private UserProduct $userProductModel;

    public function __construct()
    {
        $this->orderModel = new Order;
        $this->userProductModel = new UserProduct;
        $this->userModel = new User;

    }
    public function getOrder(): void
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
        }
        require_once './../View/order.php';
    }

    public function postOrder($data): void
    {

        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
        }


        $errors = $this->validateOrder($data);

        if (empty($errors)) {
            $userId =  $_SESSION['user_id'];

            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $phoneOrder = $data['phoneOrder'];
            $email = $data['email'];
            $country = $data['country'];
            $address = $data['address'];
            $city = $data['city'];
            $postcode = $data['postcode'];


            $this->orderModel->create($firstname, $lastname, $phoneOrder, $email, $postcode, $country, $city, $address);
            $cartProducts = $this->userProductModel->getAll($userId);

            header('location:/orderProduct');

        }

        require_once './../View/order.php';
    }

    private function validateOrder(array $data): array
    {
        $errors = [];

        if (isset($data['firstname'])) {
            $firstname = $data['firstname'];
            if (empty($firstname)) {
                $errors['firstname'] = 'Укажите имя.';
            } elseif (strlen($firstname) < 2) {
                $errors['firstname'] = 'Имя должно содержать более 2 символов.';
            }
        } else {
            $errors['firstname'] = 'Укажите имя.';
        }

        if (isset($data['lastname'])) {
            $lastname = $data['lastname'];
            if (empty($lastname)) {
                $errors['lastname'] = 'Укажите фамилию.';
            } elseif (strlen($lastname) < 2) {
                $errors['lastname'] = 'Фамилия должна содержать более 2 символов.';
            }
        } else {
            $errors['lastname'] = 'Укажите фамилию.';
        }

        if (isset($data['phoneOrder'])) {
            $phoneOrder = $data['phoneOrder'];
            if (empty($phoneOrder)) {
                $errors['phoneOrder'] = 'Введите Номер Телефона.';
            } elseif (strlen($phoneOrder) < 6) {
                $errors['phoneOrder'] = 'Номер Телефона должен содержать более 6 символов.';
            }
        } else {
            $errors['phoneOrder'] = 'Введите Номер Телефона.';
        }

        if (isset($data['email'])) {
            $email = $data['email'];
            if (empty($email)) {
                $errors['email'] = 'Укажите почту.';
            } elseif (strlen($email) < 5) {
                $errors['email'] = 'Имя почты должно быть длиной от 5 символов.';
            } elseif (!strpos($email, '@')) {
                $errors['email'] = 'Введено некорректное имя почты, нет символа @.';
            } elseif (true) {
                $user = $this->orderModel->getByEmail($email);
                if ($user) {
                    $errors['email'] = "Такая почта уже существует!";
                }elseif (true) {
                    $user = $this->userModel->getByEmail($email);
                    if (!$user) {
                        $errors['email'] = "Такой почты нету в Panda Logo!";
                    }
                }
            }
        } else {
            $errors['email'] = 'Укажите почту.';
        }

        if (isset($data['postcode'])) {
            $postcode = $data['postcode'];
            if (empty($postcode)) {
                $errors['postcode'] = 'Введите Индекса почты.';
            } elseif (strlen($postcode) < 6) {
                $errors['postcode'] = 'Номер Индекса почты должена содержать более 6 символов.';
            }
        } else {
            $errors['postcode'] = 'Введите Индекса почты.';
        }

        if (isset($data['country'])) {
            $country = $data['country'];
            if (empty($country)) {
                $errors['country'] = 'Укажите страну.';
            } elseif (strlen($country) < 2) {
                $errors['country'] = 'Название страны должно содержать более 2 символов.';
            }
        } else {
            $errors['country'] = 'Укажите страну.';
        }

        if (isset($data['address'])) {
            $address = $data['address'];
            if (empty($address)) {
                $errors['address'] = 'Укажите адрес.';
            } elseif (strlen($address) < 2) {
                $errors['address'] = 'Название адреса должно содержать более 2 символов.';
            }
        } else {
            $errors['address'] = 'Укажите адрес.';
        }

        if (isset($data['city'])) {
            $city = $data['city'];
            if (empty($city)) {
                $errors['city'] = 'Укажите город.';
            } elseif (strlen($city) < 2) {
                $errors['city'] = 'Название города должно содержать более 2 символов.';
            }
        } else {
            $errors['city'] = 'Укажите город.';
        }

        return $errors;
    }

    public function getOrderProduct(array $data)
    {


        require_once './../View/orderProduct.php';
    }

    public function postOrderProduct(array $data)
    {

    }
}