
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
</head>
<body>
    <?php
    /*
    1. make session x
    2. connect to database x
    3. grab all questions x
    4. display 1 question per slide in carousel x
    5. allow edit of questions
    6. allow to add questions
    7. allow removal of questions
    8. make questions allign with eachother
    */

    /*
    Session start
    */
    session_start();


    /*
    Connect to Data Base
    */
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ALA_Questions_test";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo '<p>Connection made sucsessfully, Welcome to the question editor/creator!</p>';

        } catch (PDOException $e) {
        echo "<p>Connection had a big gae:</p><br>" . $e->getMessage();;
        }

    /*
    Grab all questions
    */
    
    $stmt = $conn->query("SELECT * FROM questions");
    $data = $stmt->fetchAll();

    /*
    Display 1 question per carousel
    */
    ?>
        <main>
            <section id="carouselExample" class="carousel slide">
                <article class="carousel-inner">
                    <div class="carousel-item active">
                        <h1>
                            First question or something? idk?
                        </h1>
                    </div>
                    <?php
                        /*
                        Display 1 question per carousel
                        */
                        foreach($data as $question){
                            echo '<div class="carousel-item">
                                <h1>'. 
                                $question['question']. 
                                '</h1>
                            </div>';
                        }
                    ?>
                </article>
                <!--Back-->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                <!--Next-->
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </section>
        </main>

        <form method="POST">
            Abort session
            <input type="submit" name="abort" value="abort">
            <?php
            if(isset($_POST['abort'])){
                session_abort();
            }
            ?>
        </form>
    <!--Bootstrap dont touch-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <!--Bootstrap dont touch-->
</body> 
</html>
