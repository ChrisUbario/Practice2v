<?php session_start();


$conn = new mysqli('localhost', 'root', '', 'bruteforce');
if (isset($_POST['Enviar'])) {
    $email = $_POST['email'];
    $clave = $_POST['clave'];

    $sql = "SELECT nombre,password FROM users WHERE nombre ='$email' and password ='$clave'";
    $execute = mysqli_query($conn, $sql);
    $resultado = mysqli_fetch_assoc($execute);

    $email_valido = $resultado['nombre'] ?? '';
    $clave_valido = $resultado['password'] ?? '';


    if ($email === $email_valido && $clave === $clave_valido) {
        header('location: success.html');
    } else {
        echo 'Credenciales incorrectas';
    }
}




?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login y Registro con HTML5 y CSS3</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Favicon -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <h1>Login</h1>
    <main>
        <article>
            <section>
                <div id="alert"></div>
                <form method="post">
        <input type="text" name="email" id="email" placeholder="Ingresar nombre" required>
        <br><br>

        <input type="password" name="clave" id="clave" placeholder="Ingresar Clave" required>
        <br><br>

        <input type="submit" value="Enviar" name="Enviar">
    </form>
            </section>
        </article>
    </main>
    
</body>
</html>