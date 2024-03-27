<?php

namespace Request;

use Repository\OrderRepository;
use Repository\UserRepository;


class OrderRequest extends Request
{

    private OrderRepository $orderModel;
    private UserRepository $userModel;

    public function __construct(string $method, array $body = [], array $headers = [])
    {
        parent::__construct($method, $body, $headers);

        $this->orderModel = new OrderRepository();
        $this->userModel = new UserRepository();
    }


    function validate(): array
    {
        $errors = [];

        if (isset($this->body['firstname'])) {
            $firstname = $this->body['firstname'];
            if (empty($firstname)) {
                $errors['firstname'] = 'Укажите имя.';
            } elseif (strlen($firstname) < 2) {
                $errors['firstname'] = 'Имя должно содержать более 2 символов.';
            }
        } else {
            $errors['firstname'] = 'Укажите имя.';
        }

        if (isset($this->body['lastname'])) {
            $lastname = $this->body['lastname'];
            if (empty($lastname)) {
                $errors['lastname'] = 'Укажите фамилию.';
            } elseif (strlen($lastname) < 2) {
                $errors['lastname'] = 'Фамилия должна содержать более 2 символов.';
            }
        } else {
            $errors['lastname'] = 'Укажите фамилию.';
        }

        if (isset($this->body['phoneOrder'])) {
            $phoneOrder = $this->body['phoneOrder'];
            if (empty($phoneOrder)) {
                $errors['phoneOrder'] = 'Введите Номер Телефона.';
            } elseif (strlen($phoneOrder) < 6) {
                $errors['phoneOrder'] = 'Номер Телефона должен содержать более 6 символов.';
            }
        } else {
            $errors['phoneOrder'] = 'Введите Номер Телефона.';
        }

        if (isset($this->body['email'])) {
            $email = $this->body['email'];
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
                }
//                elseif (true) {
//                    $user = $this->userModel->getByEmail($email);
//                    if (!$user) {
//                        $errors['email'] = "Такой почты нету в Panda Logo!";
//                    }
//                }
            }
        } else {
            $errors['email'] = 'Укажите почту.';
        }

        if (isset($this->body['postcode'])) {
            $postcode = $this->body['postcode'];
            if (empty($postcode)) {
                $errors['postcode'] = 'Введите Индекса почты.';
            } elseif (strlen($postcode) < 6) {
                $errors['postcode'] = 'Номер Индекса почты должена содержать более 6 символов.';
            }
        } else {
            $errors['postcode'] = 'Введите Индекса почты.';
        }

        if (isset($this->body['country'])) {
            $country = $this->body['country'];
            if (empty($country)) {
                $errors['country'] = 'Укажите страну.';
            } elseif (strlen($country) < 2) {
                $errors['country'] = 'Название страны должно содержать более 2 символов.';
            }
        } else {
            $errors['country'] = 'Укажите страну.';
        }

        if (isset($this->body['address'])) {
            $address = $this->body['address'];
            if (empty($address)) {
                $errors['address'] = 'Укажите адрес.';
            } elseif (strlen($address) < 2) {
                $errors['address'] = 'Название адреса должно содержать более 2 символов.';
            }
        } else {
            $errors['address'] = 'Укажите адрес.';
        }

        if (isset($this->body['city'])) {
            $city = $this->body['city'];
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
}