<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller
{
    public function login(): void
    {
        if (Auth::check()) {
            $this->redirect(Auth::isAdmin() ? '/admin' : '/portal');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            verify_csrf();
            $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
            $pass = $_POST['password'] ?? '';
            $user = $email ? User::findByEmail($email) : null;

            if ($user && password_verify($pass, $user['password'])) {
                session_regenerate_id(true);
                $_SESSION['user'] = [
                    'id' => (int)$user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                ];
                flash('success', 'Welcome back to RescuePro, ' . $user['name'] . '.');
                $this->redirect($user['role'] === 'admin' ? '/admin' : '/portal');
            }
            flash('error', 'Invalid email address or password.');
        }

        $this->view('auth/login', [
            'title' => 'Customer & Dispatch Sign In',
        ]);
    }

    public function register(): void
    {
        if (Auth::check()) {
            $this->redirect('/portal');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            verify_csrf();
            $name = trim($_POST['name'] ?? '');
            $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
            $pass = $_POST['password'] ?? '';
            $confirm = $_POST['password_confirmation'] ?? '';

            $error = '';
            if (strlen($name) < 2) {
                $error = 'Please enter your full name (at least 2 characters).';
            } elseif (!$email) {
                $error = 'Please enter a valid email address.';
            } elseif (strlen($pass) < 8) {
                $error = 'Password must be at least 8 characters long.';
            } elseif ($pass !== $confirm) {
                $error = 'Passwords do not match.';
            } elseif (User::findByEmail($email)) {
                $error = 'An account with this email already exists.';
            }

            if ($error !== '') {
                flash('error', $error);
            } else {
                $id = User::create($name, $email, $pass);
                session_regenerate_id(true);
                $_SESSION['user'] = [
                    'id' => $id,
                    'name' => $name,
                    'email' => $email,
                    'role' => 'customer',
                ];
                flash('success', 'Your RescuePro Customer Portal account is ready.');
                $this->redirect('/portal');
            }
        }

        $this->view('auth/register', [
            'title' => 'Create Customer Portal Account',
        ]);
    }

    public function logout(): void
    {
        verify_csrf();
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $p = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $p['path'], $p['domain'], (bool)$p['secure'], (bool)$p['httponly']);
        }
        session_destroy();
        header('Location: ' . url('/'));
        exit;
    }
}
