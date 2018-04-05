<!doctype html>
<html lang="en">

<?php require_once(ROOT.'/views/header.php');?>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a href="/" class="navbar-brand">
            <img src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" width="30", height="30" halt="logo"/>
            <span>Interview Task</span>
        </a>

    </nav>





    <?php foreach ($article as $row): ?>
        <div class="container-fluid" >
            <div class="container">
                <div class="row text-center">
                    <div class="card">
                        <h5 class="card-header"><?php echo $row['name_user']; ?></h5>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['date']; ?></h5>
                            <p class="card-text"><?php echo $row['article']; ?> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="container-fluid" >
        <div class="container">
            <div class="row text-center">
                <h2>Коментарии</h2>
                <hr>
            </div>
        </div>
    </div>


    <div class="container-fluid" >
        <div class="container">
            <div class="row text-center">
                <div class="card">
                    <h5 class="card-header">Featured</h5>
                    <div class="card-body">
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="container">
            <div class="row-6 text-center">
                <form  action="/" method="post">
                    <div class="form-group">
                        <label for="inputAddress">Имя автора</label>
                        <input type="text" class="form-control" id="inputAddress" name="author">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Коментарий</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>
    </div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>