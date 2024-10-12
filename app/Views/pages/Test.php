<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Just tesing</title>
    <style>
        body {
            background: slategray;
            padding: 0;
            margin: 0;
            font-family: Arial;
        }
        .space {
            width: 800px;
            padding: 20px;
            margin: 20px auto;
            font-family: Verdana;
            font-size: 14px;
            color: white;
            border: 1px solid black;
        }
    </style>
</head>
<body >
	<h1 style="text-align: center; color: white;">Добро пожаловать !</h1>
    <div class="space">
        <p>
            Ты сейчас видишь тестовую страницу - сдесь пример демонстрации кода
            тоесть данных, которые получены путем запроса к бд <br><br> <b style="color: orange;"> $query = $db->query('SELECT * FROM test'); </b>
        </p>
        <b style="color: navajowhite;">Эти данные получены путем простого не динамического способа - то-есть без автоматического обновления страницы</b>
    </div>
</body>
</html>
