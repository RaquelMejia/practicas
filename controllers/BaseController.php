<?php

require_once 'config/TemplateEngine.php';

class BaseController {

    public function _construct(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
  
        }
    }

    // Método para renderizar vistas
    protected function view($name, $data = []) {
        $template = new TemplateEngine('views/' . $name . '.php');
        return $template->render($data);
    }

    // Método para redirigir a otra ruta
    protected function redirect($url) {
        header('Location: ' . $url);
        exit();
    }

    // Método para enviar una respuesta JSON
    protected function json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }

    // Método para manejar errores personalizados
    protected function error($message, $code = 500) {
        http_response_code($code);
        echo $message;
        exit();
    }


    // Método para abortar con un código de error personalizado
    protected function abort($code = 404) {
        http_response_code($code);
        echo 'Página no encontrada';
        exit();
    }

    // Método para establecer un mensaje de flash en la sesión
    protected function setFlash($message, $type = "success") {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['flash_message'] = [
            'message' => $message,
            'type' => $type
        ];
    }

    // Método para obtener y eliminar el mensaje de flash (si existe)
    protected function getFlash() {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION['flash_message'])) {
            $flash = $_SESSION['flash_message'];
            unset($_SESSION['flash_message']); // Elimina el mensaje después de obtenerlo
            return $flash;
        }
        return null;
    }
}


