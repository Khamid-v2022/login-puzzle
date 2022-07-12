<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Puzzle</title>

    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/main.css" rel="stylesheet" type="text/css" />
    

</head>
<body class="text-center">
    <form class="form-signin" id="submit_form">
        <h1 class="h3 mb-3 font-weight-normal"></h1>
        <div class="form-group">
            <label for="name" class="sr-only">Name</label>
            <input type="text" id="name" class="form-control" placeholder="Name" required="" autofocus="">
        </div>
        <div class="form-group">
            <label for="phone_number" class="sr-only">Password</label>
            <input type="text" id="phone_number" class="form-control" placeholder="Phone number" required="">
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>


<div class="modal fade" id="puzzle_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Please solve this puzzle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="">
                    <div id="dropZone">
                        <div id="dropBox_img_1" class="drop-zone-item" ondrop="drop_to_zone(event)" ondragover="allowDrop(event)">
                        </div>
                        <div id="dropBox_img_2" class="drop-zone-item" ondrop="drop_to_zone(event)" ondragover="allowDrop(event)">
                        </div>
                        <div id="dropBox_img_3" class="drop-zone-item" ondrop="drop_to_zone(event)" ondragover="allowDrop(event)"></div>
                        <div id="dropBox_img_4" class="drop-zone-item" ondrop="drop_to_zone(event)" ondragover="allowDrop(event)"></div>
                        <div id="dropBox_img_5" class="drop-zone-item" ondrop="drop_to_zone(event)" ondragover="allowDrop(event)"></div>
                        <div id="dropBox_img_6" class="drop-zone-item" ondrop="drop_to_zone(event)" ondragover="allowDrop(event)"></div>
                    </div>
        
                    <div id="images" ondrop="drop(event)" ondragover="allowDrop(event)">
                      <!--   <img class="image-item" id="img_1" src="/assets/img/1.jpg" draggable="true" ondragstart="drag(event)" />
                        <img class="image-item" id="img_2" src="/assets/img/2.jpg" draggable="true" ondragstart="drag(event)"/>
                        <img class="image-item" id="img_3" src="/assets/img/3.jpg" draggable="true" ondragstart="drag(event)" />
                        <img class="image-item" id="img_4" src="/assets/img/4.jpg" draggable="true" ondragstart="drag(event)" />
                        <img class="image-item" id="img_5" src="/assets/img/4.jpg" draggable="true" ondragstart="drag(event)" />
                        <img class="image-item" id="img_6" src="/assets/img/4.jpg" draggable="true" ondragstart="drag(event)" /> -->
                    </div>
                </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="retry_puzzle()">Retry</button>
        </div>
    </div>
  </div>
</div>


<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button type="button" class="close btn-round btn-primary" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe  id="youtube_video" width="560" height="315" src="https://www.youtube.com/embed/VF1Yz05iQM0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
</html>