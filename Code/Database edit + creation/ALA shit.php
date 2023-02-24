
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ALA_Questions_test";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare('INSERT INTO questions (question, answer)
VALUES (:question, :answer)');

        $stmt->bindParam(':question', $question);
        $stmt->bindParam(':answer', $answer);

        if(isset($_POST['submit'])){
            if($_POST['Answer'] == 1 or 0){
                $question = $_POST['Question'];
                $answer = $_POST['Answer'];
                $stmt->execute();
            } else {
                echo 'Error: maybe try keeping the value to 1 or 0';
            }
        } else {
            echo 'Please fill in your question.';
        }

        } catch (PDOException $e) {
        echo "Connection had a big gae:<br>" . $e->getMessage();;
        }
    ?>
    <form method="POST">
            Question<br>
          <input type="text" id="Question" name="Question" placeholder="Question" required><br><br>
            Answer
            <Input type="radio" id="Answer" name='Answer' value='1' required>True</Input>
            <Input type="radio" id="Answer" name='Answer' value='0' required>False</Input><br>  
          <input type="submit" id="submit" name="submit" value="Submit">
    </form>
    <br>
    <br>
    <br>
    <br>
    <form method="POST">
            Answer
            <Input type="radio" id="Answer" name='Answer' value='1' required>True</Input>
            <Input type="radio" id="Answer" name='Answer' value='0' required>False</Input><br>  
          <input type="submit" id="submit" name="submit" value="Submit">
    </form>
</body> 
</html>
