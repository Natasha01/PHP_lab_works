<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Authorization</title>
        <link rel="stylesheet" href="css/auth.css">
        <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    </head>
    <main>
        <h1>Tennis Club</h1>

        <div class= "questionnaire">
            <form action = "main_page.php" name="interview" method="post">
                
                <p>{QUESTION}</p>
                            
                <input  type="radio" name="answer" value="count_answer1"> {ANSWER1}
                <input  type="radio" name="answer" value="count_answer2"> {ANSWER2}
                <input  type="radio" name="answer" value="count_answer3"> {ANSWER3}
                <input  type="radio" name="answer" value="count_answer4"> {ANSWER4}
                     
                <input type="submit" name ="send" value="Ответить">
            
            </form>
        </div>

        <form id='authorization' action='index.php' method='POST'>
            <table>
            <tr>
                <td><label for='log'>Логин: </label></td>
                <td><input name='log' form='authorization'></td>
                <td class="text">Если вы хотите изменить свой пароль, в поля слева введите старые данные, а в поля справа -- новые пароль и его подтверждение, затем нажмите на кнопку "Войти".</td>
            </tr>
            <tr>
                <td><label for='pass'>Пароль: </label></td>
                <td><input name='pass' form='authorization' type="password"></td>
                <td><input class="change_pass" name='_pass' form='authorization' type="password"></td>
            </tr>
            <tr>
                <td><label for='pass2'>Подтверждение пароля: </label></td>
                <td><input name='pass2' form='authorization' type="password"></td>
                <td><input class="change_pass" name='_pass2' form='authorization' type="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type='submit' name='GO' value='Войти'></td>
                <td></td>
            </tr>
            </table>  
	   </form>
    </main>
</html>