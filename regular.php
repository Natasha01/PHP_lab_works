<!DOCTYPE  html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <title>regular</title>
    <link href="css/regular.css" type="text/css" rel="stylesheet">
</head>
<body>
    <form action="regular.php" method="post">
        <p>ORIGINAL TEXT:</p>
        <textarea rows="20" cols="150" name="text">
                <?php echo $_POST["text"];?>
        </textarea>
        <div>
            <input type="submit" value="Submit">
        </div>
        <p>RESULT:</p>
        
        <?php
            $text = $_POST["text"];
            $text = preg_replace('/\b[+-]?\d+\.?\d*\b/', '<span style = "text-decoration: underline">$0</span>', $text);
            $text = preg_replace('/\b[A-ZА-ЯЁ][-\w]*\b/u', '<span style = "color: green">$0</span>', $text);
            $text = preg_replace('/\b[А-ЯЁA-Z]{2,}\b/u', '<span style = "color: red">$0</span>', $text);
            echo $text;
        ?>
            
    </form>
</body>
</html>