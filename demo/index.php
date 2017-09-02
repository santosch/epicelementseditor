<?php require_once "../e3/e3.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<h1>Hello, world!</h1>

<?php echo EpicElementsEditor::renderEditor(); ?>

<script src="assets/libs/jquery-3.2.1.min.js"></script>
<script src="assets/libs/knockout-3.4.2.js"></script>
<script src="../e3/core/js/e3.js"></script>
<?php echo EpicElementsEditor::renderScriptConfig(); ?>

</body>
</html>