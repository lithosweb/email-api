<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <main>
        {{content}}
    </main>
    <footer>
        <i>
            <h5><?= 'Hour: ' . date('H:i:s') . '</br>Date: ' . date('d-F-Y') ?></h5>
        </i>
        <h4>Regards, Zungvi</h4>
    </footer>
</body>

</html>