<!DOCTYPE html>
<html>
<head>
    <title>Calculatrice en PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .calculator {
            max-width: 300px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        h2 {
            text-align: center;
        }
        form {
            text-align: center;
            margin-top: 20px;
        }
        input[type="text"], select, input[type="submit"] {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            text-align: center;
            font-size: 18px;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Calculatrice en PHP</h2>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" name="num1" placeholder="Nombre 1" required>
            <select name="operator">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
            <input type="text" name="num2" placeholder="Nombre 2" required>
            <input type="submit" value="Calculer">
        </form>

        <?php
        // Vérifie si le formulaire est soumis
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $operator = $_POST["operator"];
            $result = "";

            // Vérifie si les nombres sont valides
            if (is_numeric($num1) && is_numeric($num2)) {
                // Effectue le calcul en fonction de l'opérateur sélectionné
                switch ($operator) {
                    case "+":
                        $result = $num1 + $num2;
                        break;
                    case "-":
                        $result = $num1 - $num2;
                        break;
                    case "*":
                        $result = $num1 * $num2;
                        break;
                    case "/":
                        if ($num2 != 0) {
                            $result = $num1 / $num2;
                        } else {
                            $result = "Erreur : Division par zéro";
                        }
                        break;
                    default:
                        $result = "Opérateur invalide";
                        break;
                }

                // Affiche le résultat
                echo "<div class='result'>";
                echo "Résultat : $num1 $operator $num2 = $result";
                echo "</div>";
            } else {
                echo "<div class='result error'>";
                echo "Entrée invalide. Veuillez saisir des nombres valides.";
                echo "</div>";
            }
        }
        ?>
    </div>
</body>
</html>
