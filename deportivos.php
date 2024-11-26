<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";  // Cambia por tus credenciales
$password = "";      // Cambia por tu contraseña
$dbname = "legendary_motors";  // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar los autos deportivos
$sql = "SELECT * FROM autos_deportivos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Autos Deportivos</title>
    <style>
        /* Estilos previamente proporcionados */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #1e2a37;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        h1 {
            margin: 0;
            font-size: 2.5em;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo img {
            vertical-align: middle;
            max-height: 95px;
            margin-right: 10px;
        }

        .logo span {
            font-size: 2em;
            font-weight: bold;
            color: white;
        }

        .section-description {
            text-align: center;
            font-size: 1.1em;
            color: #555;
            padding: 20px;
            margin-bottom: 30px;
        }

        .section-description strong {
            color: #1e2a37;
        }

        .car-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
        }

        .car {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            transition: transform 0.3s ease-in-out;
        }

        .car:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .car img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            transition: transform 0.3s ease-in-out;
        }

        .car img:hover {
            transform: scale(1.05);
        }

        .car h3 {
            margin: 10px 0;
            color: #333;
        }

        .car p {
            color: #555;
        }

        footer {
            background-color: #1e2a37;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        footer p {
            margin: 0;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .car-container {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 480px) {
            .car-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="legendary_motors.JPG" alt="Logo">
            <span>Legendary Motors</span>
        </div>
        <h1>Autos Deportivos</h1>
    </header>

    <main>
        <section>
            <div class="section-description">
                <p><strong>Los autos deportivos</strong> son conocidos por su potencia, velocidad y diseño innovador. Estos vehículos están diseñados para ofrecer una experiencia de conducción excepcional, combinando tecnología avanzada con un estilo único que atrae tanto a los entusiastas del motor como a aquellos que buscan lo mejor en rendimiento y lujo.</p>
            </div>

            <div class="car-container">
                <?php
                // Verificar si hay resultados
                if ($result->num_rows > 0) {
                    // Mostrar cada auto en el catálogo
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='car'>
                                <img src='" . $row['imagen_url'] . "' alt='" . $row['modelo'] . "'>
                                <h3>" . $row['modelo'] . "</h3>
                                <p>" . $row['descripcion'] . "</p>
                                <p>Motor: " . $row['motor'] . "</p>
                                <p>Potencia: " . $row['potencia'] . "</p>
                                <p>Aceleración: " . $row['aceleracion'] . "</p>
                              </div>";
                    }
                } else {
                    echo "<p>No hay autos deportivos disponibles en el catálogo.</p>";
                }
                ?>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Catálogo de Autos Deportivos. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
