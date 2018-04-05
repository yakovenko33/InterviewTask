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

<div class="container-fluid">
    <div class="container">
        <div class="row-6 text-center">
            <h4>Популярные статьи</h4>
        </div>
    </div>
</div>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="/web/img/slide-1.jpg" alt="First slide">
        </div>
        <?php foreach ($top as $row): ?>
            <div class="carousel-item ">
                <div class="container-fluid" >
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-md-6 offset-md-3">
                                <div class="card">
                                    <h5 class="card-header"><?php echo $row['name_user']; ?></h5>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['date']; ?></h5>
                                        <p class="card-text"><?php print_r(substr($row['article'],0,100)) ; ?> </p>
                                        <a href="article/<?php echo $row['id_article'];?>" class="btn btn-primary">Go somewhere</a>
                                        <h5>Количество коментарий</h5>
                                        <p class="card-text"><?php echo $row['rating']; ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container-fluid">
    <div class="container">
        <div class="row-6 text-center">
            <form  action="/" method="post">
                <div class="form-group">
                    <label for="inputAddress">Автор статьи</label>
                    <input type="text" class="form-control" id="inputAddress" name="author">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Текст статьи</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
                </div>
                <button type="submit" name="ActionButton" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </div>
</div>


<?php foreach ($articles as $row): ?>
        <div class="container-fluid" >
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <h5 class="card-header"><?php echo $row['name_user']; ?></h5>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['date']; ?></h5>
                                <p class="card-text"><?php print_r(substr($row['article'],0,100)) ; ?> </p>
                                <a href="article/<?php echo $row['id_article'];?>" class="btn btn-primary">Go somewhere</a>
                                <h5>Количество коментарий</h5>
                                <p class="card-text"><?php echo $row['rating']; ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php endforeach; ?>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>